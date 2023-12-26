<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\Login;
use App\Models\NhaSanXuat;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $cart = session()->get('cart', []);
        $productIndex = array_search($id, array_column($cart, 'id'));
        if ($productIndex !== false) {
            $cart[$productIndex]['soluong'] += $request->input('soluong', 1);
        } else {
            $product = [
                'id' => $id,
                'soluong' => $request->input('soluong', 1),
                'ten' => $sanpham->TenSP,
                'gia' => $sanpham->Gia,
                'anh' => $sanpham->imgSP,
            ];
            $cart[] = $product;
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Đã thêm mới thành công!');
    }
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
        return view('cart.showx', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer]);
    }


    public function delete($id)
    {
        if (session()->has('cart')) {
            $cart = Session::get('cart', []);
            foreach ($cart as $key => $item) {
                if ($item['id'] === $id) {
                    unset($cart[$key]);
                    Session::put('cart', $cart);
                    return redirect()->route('cart.show')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
                }
            }
        }
        return redirect()->route('cart.show')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
    public function donhang()
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
        if (session()->has('user')) {
            $userData = session('user');
            foreach ($userData as $key => $value) {
                if ($key == 'email') {
                    $userEmail = $value;
                    $canhan = Login::where('email', $userEmail)->get();
                }
            }
        } else {
            return redirect()->route('login');
        }
        $spasus = SanPham::where('IDNSX', 'Asus')->get();
        $spacer = SanPham::where('IDNSX', 'Acer')->get();
        return view('cart.donhang', ['SanPham' => $sanpham, 'NhaSanXuat' => $nhasanxuat, 'LoaiSanPham' => $loaisanpham, 'SpAsus' => $spasus, 'SpAcer' => $spacer, 'Canhan' => $canhan]);
    }
}
