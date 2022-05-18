<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\InformasiRequest;
use App\Http\Requests\TiketRequest;
use App\Models\Admin;
use App\Models\AnggotaAsc;
use App\Models\AnggotaUmum;
use App\Models\Bidang;
use App\Models\Informasi;
use App\Models\Tiket;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard', [
            'umum' => AnggotaUmum::all()->count(),
            'asc' => AnggotaAsc::all()->count(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function umum()
    {
        return view('admin.umum', [
            'anggota' => AnggotaUmum::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asc()
    {
        return view('admin.asc', [
            'anggota' => AnggotaAsc::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TiketRequest  $request
     * @param  \App\Models\AnggotaUmum  $umum
     * @return \Illuminate\Http\Response
     */
    public function updateumum(TiketRequest $request, $umum)
    {
        $data = AnggotaUmum::where('id', $umum)->first();
        $cek = Tiket::findOrFail($data->tiket_id);
        $cek->update(['status' => $request->status]);

        if ($cek->status == "Lulus") {
            $user = User::where('id', $data->user_id)->first();
            $user->update(['role' => 'umum']);
        }

        Alert::success('Berhasil!', 'Status berhasil diubah');

        return to_route('admin.umum');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TiketRequest  $request
     * @param  \App\Models\AnggotaAsc  $asc
     * @return \Illuminate\Http\Response
     */
    public function updateasc(TiketRequest $request, $asc)
    {
        $data = AnggotaAsc::where('id', $asc)->first();
        $cek = Tiket::findOrFail($data->tiket_id);
        $cek->update(['status' => $request->status]);

        if ($cek->status == "Lulus") {
            $user = User::where('id', $data->user_id)->first();
            $user->update(['role' => 'asc']);
        }

        Alert::success('Berhasil!', 'Status berhasil diubah');

        return to_route('admin.asc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaUmum  $umum
     * @return \Illuminate\Http\Response
     */
    public function hapusumum($umum)
    {
        $cek = AnggotaUmum::findOrFail($umum);

        Tiket::destroy($cek['tiket_id']);

        AnggotaUmum::destroy($umum);

        Alert::success('Berhasil!', 'Anggota berhasil dihapus');

        return to_route('admin.umum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaAsc  $asc
     * @return \Illuminate\Http\Response
     */
    public function hapusasc($asc)
    {
        $cek = AnggotaAsc::findOrFail($asc);

        Tiket::destroy($cek['tiket_id']);

        AnggotaAsc::destroy($asc);

        Alert::success('Berhasil!', 'Anggota berhasil dihapus');

        return to_route('admin.asc');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        return view('admin.info', [
            'informasi' => Informasi::all(),
            'bidang' => Bidang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\InformasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahinfo(InformasiRequest $request)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        }

        $admin = Admin::where('user_id', auth()->user()->id)->first();

        $data['admin_id'] = $admin['id'];

        Informasi::create($data);

        Alert::success('Berhasil!', 'Informasi berhasil ditambahkan');

        return to_route('admin.info');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InformasiRequest  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function updateinfo(InformasiRequest $request, $informasi)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        } else {
            $foto = Informasi::where('id', $informasi)->get();
            $data['foto'] = $foto[0]->foto;
        }

        $admin = Admin::where('user_id', auth()->user()->id)->first();

        $data['admin_id'] = $admin['id'];

        $cek = Informasi::findOrFail($informasi);
        $cek->update($data);

        Alert::success('Berhasil!', 'Informasi berhasil diubah');

        return to_route('admin.info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function hapusinfo($informasi)
    {
        Informasi::destroy($informasi);

        Alert::success('Berhasil!', 'Informasi berhasil dihapus');

        return to_route('admin.info');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        return view('admin.profil', [
            'profil' => Admin::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function updateprofil(AdminRequest $request, $admin)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        } else {
            $foto = Admin::where('id', $admin)->get();
            $data['foto'] = $foto[0]->foto;
        }

        $cek = Admin::findOrFail($admin);
        $user = User::findOrFail($cek->user_id);
        $user->update(['foto' => $data['foto'], 'name' => $data['nama']]);
        $cek->update($data);

        Alert::success('Berhasil!', 'Profil berhasil diubah');

        return to_route('admin.profil');
    }
}
