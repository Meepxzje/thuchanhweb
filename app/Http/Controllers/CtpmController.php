<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietPhieuMua;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\PhieuMua;
use App\Models\SanPham;
use Illuminate\Support\Facades\Session;

class CtpmController extends Controller
{
    public function xemctdh($id)
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
        $phieuMua = PhieuMua::findOrFail($id);
        $ctpm = ChiTietPhieuMua::where('IDPM', $id)->get();
        foreach ($ctpm as $ct) {
            $sp = SanPham::find($ct->IDSP);
            $ct->TenSP = $sp ? $sp->TenSP : 'Không xác định';
        }
        return view('cart.xemctdh', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer])->with(compact('phieuMua', 'ctpm'));
    }
    public function xemctdhad($id)
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
        $phieuMua = PhieuMua::findOrFail($id);
        $ctpm = ChiTietPhieuMua::where('IDPM', $id)->get();
        foreach ($ctpm as $ct) {
            $sp = SanPham::find($ct->IDSP);
            $ct->TenSP = $sp ? $sp->TenSP : 'Không xác định';
        }
        return view('ql.pm.xemctdhad', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer])->with(compact('phieuMua', 'ctpm'));
    }
}
