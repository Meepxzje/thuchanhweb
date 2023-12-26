<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;

class LspController extends Controller
{
    public function show()
    {
        $L = LoaiSanPham::all();
        return view('ql.lsp.dslsp', ['LoaiSanPham' => $L]);
    }
    public function formthem()
    {
        return view('ql.lsp.themlsp');
    }

    public function add(Request $request)
    {

        $idlsp = $request->input('idlsp');
        $tenlsp = $request->input('tenlsp');
        LoaiSanPham::create([
            'IDLSP' => $idlsp,
            'TenLSP' => $tenlsp,

        ]);
        return redirect()->route('dslsp')->with('success', 'Đã thêm mới thành công!');
    }
    public function destroy($id)
    {
        $lsp = LoaiSanPham::find($id);
        $lsp->delete();

        return redirect()->route('dslsp')->with('success', 'Đã xóa thành công!');
    }
    public function edit($id)
    {
        $lsp = LoaiSanPham::find($id);
        return view('ql.lsp.sua', ['lsp' => $lsp]);
    }
  
    public function update(Request $request, $id)
    {
        $lsp = LoaiSanPham::find($id);

        $tenlsp = $request->input('tenlsp');

        $lsp->update([
            'TenLSP' => $tenlsp,
        ]);
        return redirect()->route('dslsp')->with('success', 'Đã cập nhật thành công!');
    }
}
