<?php

namespace App\Http\Controllers;

use App\Models\BOM;
use App\Models\BOMList;
use App\Models\Produk;
use App\Models\Bahan;
use App\Models\MO;
use Illuminate\Http\Request;

class MoController extends Controller
{
    public function manufacture()
    {
        $moDatas = MO::join('bom', 'mo.kode_bom', '=', 'bom.kode_bom')
            ->join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['mo.*', 'produk.nama']);
        $boms = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['bom.*', 'produk.nama']);
        return view('mo.mo', ['moDatas' => $moDatas, 'boms' => $boms]);
    }

    public function manufactureOrder()
    {
        // $moDatas = MO::join('bom', 'mo.kode_bom', '=', 'bom.kode_bom')
        //     ->join('produk', 'bom.kode_produk', '=', 'produk.id')
        //     ->get(['mo.*', 'produk.nama']);
        $boms = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->get(['bom.*', 'produk.nama']);
        return view('mo.mo-input', ['boms' => $boms]);
    }
    
    public function moUpload(Request $request)
    {
        $tanggal = date("Y/m/d");
        MO::create([
            'kode_mo' => $request->kode_mo,
            'kode_bom' => $request->kode_bom,
            'kuantitas' => $request->kuantitas,
            'tanggal'=> $tanggal,
            'status' => 1,
        ]);
        // $moDatas = MO::join('bom', 'mo.kode_bom', '=', 'bom.kode_bom')
        //     ->join('produk', 'bom.kode_produk', '=', 'produk.id')
        //     ->get(['mo.*', 'produk.nama']);
        // $boms = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
        //     ->get(['bom.*', 'produk.nama']);
        return redirect('/home/mo');
    }

    public function moUpdate($kode_mo, Request $request)
    {
        $mo = MO::find($kode_mo);
        $mo->status = $mo->status + 1;
        $mo->kode_bom =  $mo->kode_bom;
        $mo->kuantitas =  $mo->kuantitas;
        $mo->tanggal =  $mo->tanggal;
        $mo->save();
        // $moDatas = MO::join('bom', 'mo.kode_bom', '=', 'bom.kode_bom')
        //     ->join('produk', 'bom.kode_produk', '=', 'produk.id')
        //     ->get(['mo.*', 'produk.nama']);
        // $boms = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
        //     ->get(['bom.*', 'produk.nama']);
        return redirect('/home/mo');
    }

    public function moConfirm($kode_mo, Request $request)
    {
        $bomList = BOMList::Where('kode_bom', $request->kode_bom)->get();
        foreach ($bomList as $item) {
            $product = Product::find($item->kode_produk);
            $product->stok = $product->stok + $item->kuantitas;
            $product->save();
        }
        $mo = MO::find($kode_mo);
        $mo->status = $mo->status + 1;
        $mo->kode_bom =  $mo->kode_bom;
        $mo->kuantitas =  $mo->kuantitas;
        $mo->tanggal =  $mo->tanggal;
        $mo->save();
        return redirect('/home/mo');
    }

    public function caItems($kode_bom)
    {
        $bom = BOM::join('produk', 'bom.kode_produk', '=', 'produk.id')
            ->where('bom.kode_bom', $kode_bom)
            ->first(['bom.*', 'produk.nama', 'produk.harga']);
        $bomList = BOMList::join('bahan', 'bom_list.kode_bahan', '=', 'bahan.id')
            ->where('bom_list.kode_bom', $kode_bom)
            ->get(['bom_list.*', 'bahan.nama', 'bahan.harga', 'bahan.stok']);
        $produk = Bahan::get();
        return view('mo.mo-ca', ['bom' => $bom, 'materials' => $produk, 'list' => $bomList]);
    }

    public function deleteMo($kode_mo){
        $mo = MO::find($kode_mo);

        $mo->delete();
       return redirect('/home/mo/');
    }
}
