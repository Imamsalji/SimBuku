@extends('layouts.master')
@section('title', 'Pasokan')
@section('pagetitle')
    <h1>Input Pasok</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
            <div class="card-body">
              <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="tahun_dibayar">Nama Distributor</label>
                        <select name="id_distributor" id="id_distributor" class="form-control">
                            <option value="">pilih Distributor</option>
                            @foreach ($distributors as $item)
                                <option value="{{$item->id_distributor}}">{{$item->nama_distributor}}</option>
                            @endforeach
                        </select>
                    @error('id_distributor')
                        <span class=" text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="id_buku">Judul Buku</label>
                        <select name="id_buku" id="id_buku" class="form-control">
                            <option value="">pilih Buku</option>
                            @foreach ($books as $item)
                                <option value="{{$item->id_buku}}">{{$item->judul}}</option>
                            @endforeach
                        </select>
                    @error('id_buku')
                        <span class=" text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telpon">jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control"
                                    value="">
                            @error('jumlah')
                                <span class=" text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    value="">
                            @error('tanggal')
                                <span class=" text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                <hr>
           <button class="btn btn-primary mr-1 text-right" type="submit">Submit</button>
           <button class="btn btn-primary text-right" type="reset">Reset</button>
      </form>
         </div>
     </div>
           <div class="card">
               <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
                @elseif (session('delete'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('delete') }}
                    </div>
                </div>
                @endif
           <table id="table" class="table table-striped table-bordered table-md">
               <thead>
                <tr>
                    <th>No</th>
                    <th>judul Buku</th>
                    <th>Nama Distributor</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($pasok as $item)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        <a href="{{route('pasok.delete', $item->id_pasok)}}" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
               </tbody>
           </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
  
@endpush

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush
