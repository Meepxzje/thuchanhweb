<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuMua;
use App\Models\ChiTietPhieuMua;

use Illuminate\Support\Facades\Session;

class PmController extends Controller
{
    public function show()
    {
        $pm = PhieuMua::all();
        return view('ql.pm.dspm', ['PhieuMua' => $pm]);
    }
    public function donhang()
    {
    }
    public function add(Request $request)
    {
        $abc = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $t = '';

        for ($i = 0; $i < 10; $i++) {
            $t .= $abc[rand(0, strlen($abc) - 1)];
        }

        $idpm = $t;
        $ht = $request->input('hoten');
        $dc = $request->input('diachi');
        $sdt = $request->input('sdt');
        $email = $request->input('email');
        $tt = $request->input('trangthai');
        $gioHang = session('cart');


        $donHang = new PhieuMua([
            'IDPM' => $idpm,
            'HoTen' => $ht,
            'DiaChi' => $dc,
            'SDT' => $sdt,
            'email' => $email,
            'TrangThai' => $tt,
        ]);
        $donHang->save();

        foreach ($gioHang as $item) {
            $chiTietDonHang = new ChiTietPhieuMua([
                'IDPM' => $idpm,
                'IDSP' => $item['id'],
                'SoLuong' => $item['soluong'],
                'DonGia' => $item['gia'],
            ]);
            $chiTietDonHang->save();
        }
        session()->forget('cart');

        return redirect()->route('profile.canhan')->with('success', 'Đã thêm mới thành công!');
    }
    public function xoakh($id)
    {

        $pm = PhieuMua::find($id);
        $pm->delete();

        return redirect()->route('profile.canhan')->with('success', 'Đã xóa thành công!');
    }
    public function xoaad($id)
    {
        $pm = PhieuMua::find($id);
        $pm->delete();
        return redirect()->route('dspm')->with('success', 'Đã xóa thành công!');
    }
    public function suaxn($id)
    {
        $pm = PhieuMua::find($id);
        $tt = 'Đã Xác Nhận';
        $pm->update([
            'TrangThai' => $tt
        ]);
        return redirect()->route('dspm')->with('success', 'Đã xóa thành công!');
    }
    public function suadg($id)
    {
        $pm = PhieuMua::find($id);
        $tt = 'Đang Giao';
        $pm->update([
            'TrangThai' => $tt
        ]);
        return redirect()->route('dspm')->with('success', 'Đã xóa thành công!');
    }
    public function suaht($id)
    {
        $pm = PhieuMua::find($id);
        $tt = 'Hoàn Thành';
        $pm->update([
            'TrangThai' => $tt
        ]);
        return redirect()->route('dspm')->with('success', 'Đã xóa thành công!');
    }

}
