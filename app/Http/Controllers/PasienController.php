<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Http\Requests\StorepasienRequest;
use App\Http\Requests\UpdatepasienRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportPasien;
use App\Exports\ExportPasien;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function importView(Request $request){
        return view('pasien.index');
    }

    public function import(Request $request){
        Excel::import(new ImportPasien, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportPasien, 'pasien.xlsx');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ldate = date('Y-m-d');
        $pasiens = Pasien::where('created_at',$ldate)->get();
        return view('pasien.index',[
           'pasiens' => $pasiens
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasienRequest $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->riwayat_penyakit = $request->riwayat_penyakit;
        $pasien->faskes = $request->faskes;
        $pasien->berat_badan = $request->berat_badan;
        $pasien->tinggi_badan = $request->tinggi_badan;
        $pasien->tekanan_darah = $request->tekanan_darah;
        $pasien->gds = $request->gds;
        $pasien->kolestrol = $request->kolestrol;
        $pasien->create_by = "user";
        $pasien->created_at = date('Y-m-d');
        $pasien ->save();

        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        $pasiens = Pasien::where('nik',$pasien->nik)->get();
        return view('pasien.show',[
           'pasiens' => $pasiens
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', [
            'pasien'=>$pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepasienRequest  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasienRequest $request, Pasien $pasien)
    {
        $pasien->nama = $request->nama;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->riwayat_penyakit = $request->riwayat_penyakit;
        $pasien->faskes = $request->faskes;
        $pasien->berat_badan = $request->berat_badan;
        $pasien->tinggi_badan = $request->tinggi_badan;
        $pasien->tekanan_darah = $request->tekanan_darah;
        $pasien->gds = $request->gds;
        $pasien->kolestrol = $request->kolestrol;
        $pasien->create_by = "user";
        $pasien->save();

        return redirect()->route('pasien.show', $pasien->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index');
    }
}
