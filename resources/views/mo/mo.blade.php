@extends('home.master')

@section('judul', 'Halaman Data MO')

@section('isi')
    <div class="pagetitle">
      <h1>Data Manufacturing Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">MO</li>
          <li class="breadcrumb-item active">Data MO</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Manufacturing Order</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <div class="card-body">
                    <a href="/home/mo-input"><button type="button" class="btn btn-primary">Tambah Manufacturing Order</button></a>
                    <a href="/home/mo/cetak" target="_blank"><button type="button" class="btn btn-secondary">Cetak</button></a>
                </div>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode MO</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Tanggal Order</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if($moDatas->count())
                  @foreach($moDatas as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->kode_mo}}</td>
                      @if($item->status == 3)
                      <td><a  href="{{ url('/home/mo-ca/'.$item->kode_bom) }}">{{$item->nama}}</a></td>
                      @else
                      <td>{{$item->nama}}</td>
                      @endif
                      <td>{{$item->kuantitas}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>
                        @if($item->status == 1 )
                        <span class="badge badge-secondary">Draft</span>
                        @elseif($item->status == 2)
                        <span class="badge badge-primary">Mark as Todo</span>
                        @elseif($item->status == 3)
                        <span class="badge badge-warning">Check Availability</span>
                        @elseif($item->status == 4)
                        <span class="badge badge-secondary">Production</span>
                        @elseif($item->status == 5)
                        <span class="badge badge-success">Done</span>
                        @endif
                      </td>
                      <td>
                        <form action="/home/mo/update/{{$item->kode_mo}}" method="post">
                          @method('put')
                          {{ csrf_field() }}
                          @if($item->status == 1 )
                          <button  type="submit" onclick="return confirm('Proses Mark as Todo?');" class="btn btn-info">Mark as Todo</button>
                          @elseif($item->status == 2)
                          <button  type="submit" onclick="return confirm('Proses Check Availability?');" class="btn btn-info">Check Availability</button>
                          @elseif($item->status == 3)
                          <button  type="submit" onclick="return confirm('Proses Produce?');" class="btn btn-info">Produce</button>
                          @elseif($item->status == 4)
                          <!-- <form action="{{ url('/home/rfq/confirm-bill') }}" method="post" class="btn p-0" name="input-form" id="input-form">
                              {{ csrf_field() }}
                              <input type="text" id="kode_rfq" value="{{$rfq->kode_rfq}}" name="kode_rfq" hidden>
                              <button type="submit" onclick="return confirm('Confirm Bill?');" class="btn btn-success">Confirm Bill</button>
                          </form>                 -->
                          <button  type="submit" onclick="return confirm('Sudah selesai?');" class="btn btn-info">Mark as done</button>
                          @endif
                        </form>
                        <a href="{{ url('/home/mo-delete/'.$item->kode_mo) }}" class="btn btn-danger delete-confirm">Cancel</a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7"> No record found </td>
                    </tr>
                    @endif
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection