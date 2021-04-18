@extends('layouts.master')
@section('title', 'Distributor')
@section('pagetitle')
    <h1>Input Distributor</h1>
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
                                <input type="text" name="nama_distributor" id="nama_distributor" class="form-control"
                                    value="">
                            @error('nama_distributor')
                                <span class=" text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" name="alamat" id="alamat" class="form-control"
                                    value=""></textarea>
                            @error('alamat')
                                <span class=" text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="telpon">Telepon</label>
                                <input type="text" name="telpon" id="telpon" class="form-control"
                                    value="">
                            @error('telpon')
                                <span class=" text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        <hr>

               <div class="card-footer text-right">
                   <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <button class="btn btn-primary" type="reset">Reset</button>
               </div>
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
             <th>judul</th>
             <th>No Isbn</th>
             <th>Penulis</th>
             <th>penerbit</th>
             <th>tahun</th>
             <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($books as $item)
         <tr> 
             <td>{{ $item->judul }}</td>
             <td>{{ $item->noisbn }}</td>
             <td>{{ $item->penulis }}</td>
             <td>{{ $item->penerbit }}</td>
             <td>{{ $item->tahun }}</td>
             <td>
                 <a href="{{route('buku.edit', $item->id_buku)}}" class="btn btn-outline-warning">Edit</a>
                 <a href="{{url('buku.delete', $item->id_buku)}}" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-danger">Delete</a>
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
