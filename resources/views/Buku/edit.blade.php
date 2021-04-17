@extends('layouts.master')
@section('title', 'Data Buku')
@section('pagetitle')
    <h1>Data Buku</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
            <div class="card-body">
              <form action="{{ route('buku.ubah',$book->id_buku) }}" method="POST">
                @csrf
               <div class="row">

                 <div class="col-md-6">
                   <div class="form-group">
                     <label @error('id_buku') class="text-danger" 
                     @enderror>Kode Buku @error('id_buku')
                          {{ $message }}
                       @enderror
                     </label>
                     <input id="id_buku" type="text" name="id_buku" value="{{$kode}}" class="form-control" disabled>
                   </div>
                 </div>

                 <div class="col-md-6">
                    <div class="form-group">
                      <label @error('judul') class="text-danger" 
                      @enderror>Judul Buku @error('judul')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="judul" type="text" name="judul" value="{{$book->judul}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('noisbn') class="text-danger" 
                      @enderror>No Isbn @error('noisbn')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="noisbn" type="text" name="noisbn" value="{{$book->noisbn}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('penulis') class="text-danger" 
                      @enderror>Penulis @error('penulis')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="penulis" type="text" name="penulis" value="{{$book->penulis}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('penerbit') class="text-danger" 
                      @enderror>Penerbit @error('penerbit')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="penerbit" type="text" name="penerbit" value="{{$book->penerbit}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('tahun') class="text-danger" 
                      @enderror>tahun @error('tahun')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="tahun" type="year" name="tahun" value="{{$book->tahun}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('harga_pokok') class="text-danger" 
                      @enderror>Harga Pokok @error('harga_pokok')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="harga_pokok" type="text" name="harga_pokok" value="{{$book->harga_pokok}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('harga_jual') class="text-danger" 
                      @enderror>Harga Jual @error('harga_jual')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="harga_jual" type="text" name="harga_jual" value="{{$book->harga_jual}}" class="form-control" >
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <label @error('diskon') class="text-danger" 
                      @enderror>Diskon @error('diskon')
                           {{ $message }}
                        @enderror
                      </label>
                      <input id="diskon" type="number" name="diskon" value="{{$book->diskon}}" class="form-control" >
                    </div>
                  </div>
               </div>

               <div class="card-footer text-right">
                   <button class="btn btn-primary mr-1" type="submit">Update</button>
                   <button class="btn btn-secondary" type="reset">Reset</button>
                   <a href="{{ route('user') }}" class="btn btn-icon icon-left btn-primary">Cancel</a>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->noisbn }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        <a href="{{url('buku.edit', $item->id)}}" class="btn btn-outline-warning">Edit</a>
                        <a href="{{url('buku.delete', $item->id)}}" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-danger">Delete</a>
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
