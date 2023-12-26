<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\SanPham;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
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
        return view('giaodien.index', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer]);
    }
    public function chitiet()
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
        $sl = Sanpham::count();
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();
        return view('giaodien.chitiet', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer])->with(compact('sl'));
    }

    public function chitietdanhmuc($id)
    {
        $idnsx = NhaSanXuat::find($id);
        $idlsp = LoaiSanPham::find($id);
        if ($idnsx) {
            $ten = $idnsx->TenNSX;
        } else if ($idlsp) {
            $ten = $idlsp->TenLSP;
        }
        $sp = SanPham::all();
        $nsx = NhaSanXuat::all();
        $spct = SanPham::where('IDNSX', $id)
            ->orWhere('IDLSP', $id)
            ->get();
        $lsp = LoaiSanPham::all();
        $sl = SanPham::count();
        return view('giaodien.chitietdanhmuc', ['NhaSanXuat' => $nsx, 'LoaiSanPham' => $lsp, 'Spct' => $spct, 'SanPham' => $sp])->with(compact('sl', 'ten'));
    }
    public function chitietsp($id)
    {
        $nhasanxuat = NhaSanXuat::all();
        $loaisanpham = LoaiSanPham::all();
        $sp = SanPham::all();
        $sanpham = SanPham::find($id);
        if ($sanpham) {
            $tensp = $sanpham->TenSP;
        }

        // $imgSP = isset($sanpham->imgSP) ? $sanpham->imgSP : 'Không xác định';
        // $sanpham->imgSP = $imgSP;

        $sl = Sanpham::count();
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();

        return view('giaodien.chitietsp', [
            'SanPham' => $sp,
            'SanPhamct' => $sanpham,
            'NhaSanXuat' => $nhasanxuat,
            'LoaiSanPham' => $loaisanpham,
            'SpAsus' => $spasus,
            'SpAcer' => $spacer
        ])->with(compact('sl', 'tensp'));
    }
    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $sanphamtk = SanPham::where('TenSP', 'like', "%$keyword%")
            ->orWhere('Gia', 'like', "%$keyword%")
            ->get();

        $tenloai = LoaiSanPham::where('TenLSP', 'like', "%$keyword%")
            ->get();

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
        $sl = Sanpham::count();
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();
        return view('giaodien.timkiem', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer, 'Sptk' => $sanphamtk, 'Lsptk' => $tenloai])->with(compact('sl'));
    }

    public function sort(Request $request)
    {
        $orderBy = $request->input('orderby');
        $products = SanPham::query();

        switch ($orderBy) {
            case 'duoi10':
                $products->where('Gia', '<', 10000000);
                break;
            case '10den20':
                $products->whereBetween('Gia', [10000000, 20000000]);
                break;
            case '20trolen':
                $products->where('Gia', '>=', 20000000);
                break;
            default:

                $products->orderBy('Gia', 'asc');
                break;
        }
        $sploc = $products->get();

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
        $sl = Sanpham::count();
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();
        return view('giaodien.loc', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer, 'SpLoc' => $sploc])->with(compact('sl'));
    }
    public function sort1(Request $request)
    {
        $orderBy = $request->input('orderby');
        $sploc = $request->input('sploc');
        $products = SanPham::query();


        if ($sploc) {
            $products->where('IDNSX', 'like', '%' . $sploc . '%');
        }
        switch ($orderBy) {
            case 'duoi10':
                $products->where('Gia', '<', 10000000);
                break;
            case '10den20':
                $products->whereBetween('Gia', [10000000, 20000000]);
                break;
            case '20trolen':
                $products->where('Gia', '>=', 20000000);
                break;
            default:
                $products->orderBy('Gia', 'asc');
                break;
        }


        $splocResult = $products->get();


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
        $ten = $sploc;
        $sl = Sanpham::count();
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();

        return view('giaodien.loc1', [
            'SanPham' => $sanpham,
            'NhaSanXuat' => $nhasanxuat,
            'LoaiSanPham' => $loaisanpham,
            'SpAsus' => $spasus,
            'SpAcer' => $spacer,
            'SpLoc' => $splocResult,
        ])->with(compact('ten'));
    }
}
