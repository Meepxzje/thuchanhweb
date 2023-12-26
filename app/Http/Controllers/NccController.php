<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NhaCungCap;

class NccController extends Controller
{
    public function show()
    {
        $ncc = NhaCungCap::select('IDNCC','TenNCC')->get();
        return view('ql.ncc.dsncc', ['NhaCungCap' => $ncc]);
    }
    public function formthem()
    {
        return view('ql.ncc.themncc');
    }
    public function add(Request $request)
    {

        $idncc = $request->input('idncc');
        $tenncc = $request->input('tenncc');

        NhaCungCap::create([
            'IDNCC' => $idncc,
            'TenNCC' => $tenncc,
        ]);
        return redirect()->route('dsncc')->with('success', 'Đã thêm mới thành công!');

    }
    public function destroy($id)
    {
        $ncc = NhaCungCap::find($id);
        $ncc->delete();
        return redirect()->route('dsncc')->with('success', 'Đã xóa thành công!');
    }
    public function edit($id)
    {
   
        $ncc = NhaCungCap::find($id);
        return view('ql.ncc.sua', ['ncc' => $ncc]);
    }
    public function update(Request $request, $id)
    {
        $ncc = NhaCungCap::find($id);
        $tenncc = $request->input('tenncc');
        $ncc->update([
            'TenNCC' => $tenncc,

        ]);
        return redirect()->route('dsncc')->with('success', 'Đã cập nhật thành công!');
    }
}
