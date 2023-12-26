<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $sanpham = SanPham::all();
        foreach ($sanpham as $sp) {
            $nsx = NhaSanXuat::find($sp->IDNSX);
            $sp->imgNSX = $nsx ? $nsx->imgNSX : 'Không xác định';
        }
        foreach ($sanpham as $sp) {
            $lsp = LoaiSanPham::find($sp->IDLSP);
            $sp->TenLSP = $lsp ? $lsp->TenLSP : 'Không xác định';
        }

        return view('ql.Home', ['SanPham' => $sanpham]);
    }
    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $sanpham = SanPham::where('TenSP', 'like', "%$keyword%")
        ->orWhere('Gia', 'like', "%$keyword%")
        ->get();

        $tenloai = LoaiSanPham::where('TenLSP', 'like', "%$keyword%")
        ->get();

        foreach ($sanpham as $sp) {
            $nsx = NhaSanXuat::find($sp->IDNSX);
            $sp->imgNSX = $nsx ? $nsx->imgNSX : 'Không xác định';
        }
        foreach ($sanpham as $sp) {
            $lsp = LoaiSanPham::find($sp->IDLSP);
            $sp->TenLSP = $lsp ? $lsp->TenLSP : 'Không xác định';
        }
        return view('ql.timkiem', ['Sptk' => $sanpham,'Lsptk'=>$tenloai]);
    }
}
