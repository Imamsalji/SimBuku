<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Buku,User,Penjualan,Temp} ;
use Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRow = Penjualan::orderBy('id', 'DESC')->get();
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
        $jual = Penjualan::all();
        $books = Buku::all();
        $temp = Temp::Where('id_kasir',Auth::user()->id)->get();
        return view('Penjualan.index',compact('jual','temp','books','kode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function sell(Request $request)
    {
        $temp = Temp::where('id_kasir',Auth::user()->id)->get();
        foreach ($temp as $item) {
            Penjualan::create([
                'id_buku' => $item->id_buku,
                'id_kasir' => $item->id_kasir,
                'jumlah_beli' => $item->$request->jumlah,
                'jumlah_beli' => $item->jumlah_beli,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
