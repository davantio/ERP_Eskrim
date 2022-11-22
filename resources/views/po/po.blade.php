@extends('home.master')

@section('judul', 'Halaman Data PO')

@section('isi')
    <div class="pagetitle">
      <h1>Data Purchase Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">PO<</li>
          <li class="breadcrumb-item active">Data PO</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Purchase Order</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Nama Vendor</th>
                    <th scope="col">Tanggal Order</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                          <a href="/home/rfq/edit">Edit</a>
                          <a href="/home/rfq/delete">Hapus</a>
                      </td>
                    </tr>
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection
