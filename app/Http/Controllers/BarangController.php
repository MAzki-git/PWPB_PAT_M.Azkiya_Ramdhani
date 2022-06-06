<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function tambah()
    {
        return view('barang.tambah');
    }
    public function siswatambah()
    {
        return view('barang.tambahsiswa');
    }
}
