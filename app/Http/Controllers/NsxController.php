<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NhaSanXuat;

class NsxController extends Controller
{
    public function show()
    {
        $nsx = NhaSanXuat::select('IDNSX','TenNSX','DiaChiNSX','imgNSX')->get();
        return view('ql.nsx.dsnsx', ['NhaSanXuat' => $nsx]);
    }
    public function formthem()
    {
        return view('ql.nsx.themnsx');
    }

    public function add(Request $request)
    {
        $idnsx = $request->input('idnsx');
        $tennsx = $request->input('tennsx');
        $diachinsx = $request->input('diachinsx');
        $imgnsx = $request->file('imgnsx');

        if ($imgnsx) {
            $imageName = $imgnsx->getClientOriginalName();
            $imgnsx->move('img/nsx', $imageName);


            NhaSanXuat::create([
                'IDNSX' => $idnsx,
                'TenNSX' => $tennsx,
                'DiaChiNSX' => $diachinsx,
                'imgNSX' => $imageName,
            ]);

            return redirect()->route('dsnsx')->with('success', 'Đã thêm mới thành công!');
        }
    }
    public function destroy($id)
    {
        $nsx = NhaSanXuat::find($id);
        $nsx->delete();
        return redirect()->route('dsnsx')->with('success', 'Đã xóa thành công!');
    }
    public function edit($id)
    {
        $nsx = NhaSanXuat::find($id);
        return view('ql.nsx.sua', ['nsx' => $nsx]);
    }
    public function update(Request $request, $id)
    {
        $nsx = NhaSanXuat::find($id);
        $tennsx = $request->input('tennsx');
        $diachinsx = $request->input('diachinsx');
        $imgnsx = $request->file('imgnsx');

        if ($imgnsx) {
            $imageName = $imgnsx->getClientOriginalName();
            $imgnsx->move('img/nsx', $imageName);
            $nsx->update([
                'TenNSX' => $tennsx,
                'DiaChiNSX' => $diachinsx,
                'imgNSX' => $imageName,
            ]);
        }
        return redirect()->route('dsnsx')->with('success', 'Đã cập nhật thành công!');
    }
}
