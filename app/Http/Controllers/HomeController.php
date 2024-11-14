<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Vendor;
use App\Models\Pembeli;

class HomeController extends Controller
{
    public function index(){
        $totalProduk = Produk::count(); // Menghitung total produk yang ada
        $totalVendor = Vendor::count();
        $totalPembeli = Pembeli::count();

        return view('home.dashboard', compact('totalProduk', 'totalVendor', 'totalPembeli'));
    }
}
