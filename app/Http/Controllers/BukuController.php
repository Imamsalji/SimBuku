<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRow = Buku::orderBy('id_buku', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();
        $kode = "BK00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "BK0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "BK000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "BK00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "BK0".''.($lastId->id + 1);
            } else {
                    $kode = "BK".''.($lastId->id + 1);
            }
        }
        $books = Buku::all();
        return view('Buku.index',[
            'books'=>$books,
            'kode'=>$kode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Buku $buku)
    {
        return view('Buku.create',compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validasi($request);
        Buku::create([
            'judul' => $request->get('judul'),
            'noisbn' => $request->get('noisbn'),
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit'),
            'tahun' => $request->get('tahun'),
            'harga_pokok' => $request->get('harga_pokok'),
            'harga_jual' => $request->get('harga_jual'),
            'diskon' => $request->get('diskon'),
            'stok' => '0'
        ]);
        return redirect('admin/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getRow = Buku::orderBy('id_buku', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();
        $kode = "BK00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "BK0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "BK000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "BK00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "BK0".''.($lastId->id + 1);
            } else {
                    $kode = "BK".''.($lastId->id + 1);
            }
        }
        $books = Buku::all();
        $book = Buku::where('id_buku',$id)->first();
        return view('Buku.edit',compact('book','books','kode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validasi($request);
        $book = Buku::find($id);
        $book->update($request->all());
        return redirect('admin/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Buku::find($id);
        $book->delete();

    }

    public function _validasi(Request $request)
    {
        $validation = $request->validate(
            [
                'judul' => 'required',
                'noisbn' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun' => 'required',
                'harga_pokok' => 'required',
                'harga_jual' => 'required',
                'diskon' => 'required',
            ],
            [
                'judul.required' => 'Judul harus ada!',
                'noisbn.required' => 'noisbn harus ada!',
                'penulis.required' => 'penulis harus ada!',
                'penerbit.required' => 'penerbit bayar harus ada!',
                'tahun.required' => 'tahun harus ada!',
                'harga_pokok.required' => 'harga pokok harus dipilih!',
                'harga_jual.required' => 'harga jual harus ada!',
                'diskon.required' => 'diskon harus ada!',
            ]
        );
    }
}
