<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departemen = Departemen::latest()->paginate(5);
        return view('departemen.index', [
            'dataDepartemen' => $departemen,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
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
        $dataDepartemen = $request->validate([
            'kode_departemen' => 'required',
            'departemen' => 'required',
            'deskripsi' => 'required',
            
        ]);

        

        Departemen::create($dataDepartemen);

        return redirect()->route('departemen.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, Departemen $departemen)
    {
        $dataDepartemen = $request->validate([
            'kode_departemen' => 'required',
            'departemen' => 'required',
            'deskripsi' => 'required',
        ]);

       

        $departemen->update($dataDepartemen);

        return redirect()->route('departemen.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departemen $departemen)
    {
        
        $departemen->delete($id);

        return redirect()->route('departemen.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterPeraturan(Request $request)
    {
        $departemen = DB::table('departemens')->paginate(5);

        return view('departemen.index', [
            'dataDepartemen' => $departemen,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

}