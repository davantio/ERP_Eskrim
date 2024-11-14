@extends('home.master')

@section('judul', 'Halaman Dashboard')

@section('isi')
    <div class="pagetitle">
      <h1>Selamat Datang di Halaman Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="card-title">Total Produk</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalProduk }}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="card-title">Total Vendor</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalVendor }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="card-title">Total Pembeli</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalPembeli }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
  </div>
@endsection
