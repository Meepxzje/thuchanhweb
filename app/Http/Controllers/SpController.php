<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use App\Models\NhaSanXuat;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SpController extends Controller
{
    public function show()
    {
        $SanPham = SanPham::all();

        foreach ($SanPham as $sp) {
            $nsx = NhaSanXuat::find($sp->IDNSX);
            $sp->TenNSX = $nsx ? $nsx->TenNSX : 'Không xác định';
        }
        foreach ($SanPham as $sp) {
            $lsp = LoaiSanPham::find($sp->IDLSP);
            $sp->TenLSP = $lsp ? $lsp->TenLSP : 'Không xác định';
        }
        foreach ($SanPham as $sp) {
            $ncc = NhaCungCap::find($sp->IDNCC);
            $sp->TenNCC = $ncc ? $ncc->TenNCC : 'Không xác định';
        }
        return view('ql.sp.dssp', compact('SanPham'));
    }
    public function formthem()
    {
        $nsx = NhaSanXuat::select('IDNSX', 'TenNSX')->get();
        $ncc = NhaCungCap::select('IDNCC', 'TenNCC')->get();
        $lsp = LoaiSanPham::select('IDLSP', 'TenLSP')->get();

        return view('ql.sp.themsp', compact('nsx', 'ncc', 'lsp'));
    }
    public function add(Request $request)
    {

        $idsp = $request->input('idsp');
        $tensp = $request->input('tensp');
        $gia = $request->input('gia');
        $mota = $request->input('mota');
        $nsx = $request->input('nsx');
        $lsp = $request->input('lsp');
        $ncc = $request->input('ncc');
        $imgsp = $request->file('imgsp');
        $imgsp1 = $request->file('imgsp1');
        $imgsp2 = $request->file('imgsp2');
        if ($imgsp && $imgsp1 && $imgsp2) {
            $imageName = $imgsp->getClientOriginalName();
            $imgsp->move('img/sp', $imageName);

            $imageName1 = $imgsp1->getClientOriginalName();
            $imgsp1->move('img/sp', $imageName1);

            $imageName2 = $imgsp2->getClientOriginalName();
            $imgsp2->move('img/sp', $imageName2);

            SanPham::create([
                'IDSP' => $idsp,
                'TenSP' => $tensp,
                'Gia' => $gia,
                'MoTa' => $mota,
                'imgSP' => $imageName,
                'imgSP1' => $imageName1,
                'imgSP2' => $imageName2,
                'IDNCC' => $ncc,
                'IDLSP' => $lsp,
                'IDNSX' => $nsx,
            ]);
            return redirect()->route('dssp')->with('success', 'Đã thêm mới thành công!');
        }
    }

    public function destroy($id)
    {
        $sp = SanPham::find($id);
        $sp->delete();
        return redirect()->route('dssp')->with('success', 'Đã xóa thành công!');
    }
    public function edit($id)
    {
        $sp = SanPham::find($id);
        $nsx = NhaSanXuat::select('IDNSX', 'TenNSX')->get();
        $ncc = NhaCungCap::select('IDNCC', 'TenNCC')->get();
        $lsp = LoaiSanPham::select('IDLSP', 'TenLSP')->get();
        return view('ql.sp.sua', compact('sp', 'nsx', 'ncc', 'lsp'));
    }
    public function update(Request $request, $id)
    {
        $sp = SanPham::find($id);
        $tensp = $request->input('tensp');
        $gia = $request->input('gia');
        $mota = $request->input('mota');
        $nsx = $request->input('nsx');
        $lsp = $request->input('lsp');
        $ncc = $request->input('ncc');
        $imgsp = $request->file('imgsp');
        $imgsp1 = $request->file('imgsp1');
        $imgsp2 = $request->file('imgsp2');
        if ($imgsp && $imgsp1 && $imgsp2) {
            $imageName = $imgsp->getClientOriginalName();
            $imgsp->move('img/sp', $imageName);

            $imageName1 = $imgsp1->getClientOriginalName();
            $imgsp1->move('img/sp', $imageName1);

            $imageName2 = $imgsp2->getClientOriginalName();
            $imgsp2->move('img/sp', $imageName2);

            $sp->update([
                'TenSP' => $tensp,
                'Gia' => $gia,
                'MoTa' => $mota,
                'imgSP' => $imageName,
                'imgSP1' => $imageName1,
                'imgSP2' => $imageName2,
                'IDNCC' => $ncc,
                'IDLSP' => $lsp,
                'IDNSX' => $nsx,
            ]);
            return redirect()->route('dssp')->with('success', 'Đã cập nhật thành công!');
        }
    }
   
}
