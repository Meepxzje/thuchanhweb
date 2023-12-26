<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\Login;
use App\Models\NhaSanXuat;
use App\Models\PhieuMua;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function canhan()
    {
        $sanpham = SanPham::all();
        $nhasanxuat = NhaSanXuat::all();
        $loaisanpham = LoaiSanPham::all();
        foreach ($sanpham as $sp) {
            $nsx = NhaSanXuat::find($sp->IDNSX);
            $sp->imgNSX = $nsx ? $nsx->imgNSX : 'Không xác định';
        }
        foreach ($sanpham as $sp) {
            $lsp = LoaiSanPham::find($sp->IDLSP);
            $sp->TenLSP = $lsp ? $lsp->TenLSP : 'Không xác định';
        }
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();
        if (session()->has('user')) {
            $userData = session('user');
            foreach ($userData as $key => $value) {
                if ($key == 'email') {
                    $userEmail = $value;
                    $canhan = Login::where('email', $userEmail)->get();
                    $pm = PhieuMua::where('email', $userEmail)->get();
                }
            }
        } else {
            return redirect()->route('login');
        }
        return view('profile.canhan', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer, 'Canhan' => $canhan,'Phieumua'=>$pm]);
    }
    public function update(Request $request)
    {

        $email = Login::find($request->input('email'));
        $ten = $request->input('ten');
        $diachi = $request->input('diachi');
        $sdt = $request->input('sdt');
        $img = $request->file('imgpro');

        if ($img) {
            $imageName = $img->getClientOriginalName();
            $img->move('img/profile', $imageName);
            $email->update([
                'ten' => $ten,
                'diachi' => $diachi,
                'imgpro' => $imageName,
                'sdt' => $sdt,
            ]);
            return redirect()->route('profile.canhan');
        } else {
            $email->update([
                'ten' => $ten,
                'diachi' => $diachi,
                'sdt' => $sdt,
            ]);
            return redirect()->route('profile.canhan');
        }
    }
}
