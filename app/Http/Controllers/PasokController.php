<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pasok,Buku,User,Distributor};

class PasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Buku::all();
        $distributors = Distributor::all();
        $pasok = Pasok::all();
        return view('Pasok.index',compact('pasok','books','distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Buku::all();
        $distributors = Distributor::all();
        return view('Pasok.create',compact('books','distributors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pasok::create($request->all());
        $book = Buku::where('id_buku',$request->id_buku)->first();
        Buku::where('id_buku',$request->id_buku)->update([
            'stok' => $book->stok + $request->jumlah
        ]);
        return redirect('/admin/pasok');
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
        $pasok = Pasok::find($id);
        return view('Pasok.edit',compact('pasok'));
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
        $pasok = Pasok::find($id);
        $pasok->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasok = Pasok::find($id);
        $pasok->delete();
        $book = Buku::where('id_buku',$pasok->id_buku)->first();
        Buku::where('id_buku',$pasok->id_buku)->update([
            'stok' => $book->stok - $pasok->jumlah
        ]);
        return back();
    }
}
