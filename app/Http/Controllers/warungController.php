<?php

namespace App\Http\Controllers;

use App\Models\warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class warungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = warung::orderBy('id', 'desc')->paginate(1);
        return view('warung.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('jenis', $request->jenis);
        Session::flash('nama', $request->nama);

        $request->validate([
            'id' => 'required|numeric|unique:warung,id',
            'jenis' => 'required',
            'nama' => 'required',
        ], [
            'id.required' => 'ID wajib diisi',
            'id.numeric' => 'ID wajib berupa angka',
            'id.unique' => 'ID yang diinputkan sudah ada dalam database',
            'jenis.required' => 'Jenis wajib diisi',
            'nama.required' => 'Nama wajib diisi'
        ]);
        $data = [
            'id' => $request->id,
            'jenis' => $request->jenis,
            'nama' => $request->nama,
        ];
        warung::create($data);
        return redirect()->to('warung')->with('success', 'Berhasil menambahkan data');
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
