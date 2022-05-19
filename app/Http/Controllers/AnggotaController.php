<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaAscRequest;
use App\Http\Requests\AnggotaUmumRequest;
use App\Models\AnggotaAsc;
use App\Models\AnggotaUmum;
use App\Models\Bidang;
use App\Models\Informasi;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anggota.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarumum()
    {
        return view('anggota.daftarumum', [
            'bidang' => Bidang::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarasc()
    {
        return view('anggota.daftarasc', [
            'bidang' => Bidang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AnggotaUmumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanumum(AnggotaUmumRequest $request)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        }

        if ($request->file('kartu_identitas')) {
            $kartu_identitas = $request->file('kartu_identitas');
            $tujuan = 'storage/kartu_identitas';
            $kartu_identitas->move($tujuan, $kartu_identitas->getClientOriginalName());
            $data['kartu_identitas'] = $request->file('kartu_identitas')->getClientOriginalName();
        }

        if ($request->file('kesediaan')) {
            $kesediaan = $request->file('kesediaan');
            $tujuan = 'storage/kesediaan';
            $kesediaan->move($tujuan, $kesediaan->getClientOriginalName());
            $data['kesediaan'] = $request->file('kesediaan')->getClientOriginalName();
        }

        $kode = Tiket::orderBy('created_at', 'desc')->first();

        if ($kode) {
            $orderNr = $kode['kode'];
            $removed1char = substr($orderNr, 4);
            $int = (int)$removed1char;
            $generateOrder_nr = $stpad = 'ATS-' . str_pad($int + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = 'ATS-' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }

        $user = User::where('id', auth()->user()->id)->first();
        $user->update(['foto' => $data['foto'], 'name' => $data['nama']]);

        Tiket::create([
            'kode' => $generateOrder_nr,
            'status' => 'Diproses',
        ]);

        $tiket = Tiket::orderBy('created_at', 'desc')->first();

        $data['tiket_id'] = $tiket['id'];
        $data['user_id'] = auth()->user()->id;

        AnggotaUmum::create($data);

        Alert::success('Pendaftaran berhasil', 'Kode tiket Anda '.$tiket['kode'].' SIMPAN kode tiket Anda untuk melacak status pendaftaran');

        return to_route('anggota.lacak');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AnggotaAscRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanasc(AnggotaAscRequest $request)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        }

        if ($request->file('kesediaan')) {
            $kesediaan = $request->file('kesediaan');
            $tujuan = 'storage/kesediaan';
            $kesediaan->move($tujuan, $kesediaan->getClientOriginalName());
            $data['kesediaan'] = $request->file('kesediaan')->getClientOriginalName();
        }

        $kode = Tiket::orderBy('created_at', 'desc')->first();

        if ($kode) {
            $orderNr = $kode['kode'];
            $removed1char = substr($orderNr, 4);
            $int = (int)$removed1char;
            $generateOrder_nr = $stpad = 'ASC-' . str_pad($int + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = 'ASC-' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }

        $user = User::where('id', auth()->user()->id)->first();
        $user->update(['foto' => $data['foto'], 'name' => $data['nama']]);

        Tiket::create([
            'kode' => $generateOrder_nr,
            'status' => 'Diproses',
        ]);

        $tiket = Tiket::orderBy('created_at', 'desc')->first();

        $data['tiket_id'] = $tiket['id'];
        $data['user_id'] = auth()->user()->id;

        AnggotaAsc::create($data);

        Alert::success('Pendaftaran berhasil', 'Kode tiket Anda '.$tiket['kode'].' SIMPAN kode tiket Anda untuk melacak status pendaftaran');

        return to_route('anggota.lacak');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lacak()
    {
        return view('anggota.lacak', [
            'tiket' => [],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracking(Request $request)
    {
        $kode = Tiket::where('kode', $request->kode)->get();

        if ($kode->count() == 0) {
            return view('anggota.tracking', [
                'tiket' => ''
            ]);
        }

        if ($kode[0]['status'] == 'Diproses') {
            Alert::info('Menunggu', 'Pendaftaran diproses');
        } elseif ($kode[0]['status'] == 'Tidak Lulus') {
            Alert::error('Maaf', 'Anda tidak lulus');
        }

        return view('anggota.tracking', [
            'tiket' => $kode
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        if (auth()->user()->role == 'umum') {
            $data = AnggotaUmum::where('user_id', auth()->user()->id)->first();
        } elseif (auth()->user()->role == 'asc') {
            $data = AnggotaAsc::where('user_id', auth()->user()->id)->first();
        }

        return view('anggota.info', [
            'info' => Informasi::where('bidang_id', $data['bidang_id'])->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $info
     * @return \Illuminate\Http\Response
     */
    public function showinfo($info)
    {
        return view('anggota.showinfo', [
            'info' => Informasi::where('id', $info)->first(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilumum()
    {
        return view('anggota.profilumum', [
            'profil' => AnggotaUmum::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilasc()
    {
        return view('anggota.profilasc', [
            'profil' => AnggotaAsc::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AnggotaUmumRequest  $request
     * @param  \App\Models\AnggotaUmum  $umum
     * @return \Illuminate\Http\Response
     */
    public function updateprofilumum(AnggotaUmumRequest $request, $umum)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        } else {
            $foto = AnggotaUmum::where('id', $umum)->get();
            $data['foto'] = $foto[0]->foto;
        }

        if ($request->file('kartu_identitas')) {
            $kartu_identitas = $request->file('kartu_identitas');
            $tujuan = 'storage/kartu_identitas';
            $kartu_identitas->move($tujuan, $kartu_identitas->getClientOriginalName());
            $data['kartu_identitas'] = $request->file('kartu_identitas')->getClientOriginalName();
        } else {
            $kartu_identitas = AnggotaUmum::where('id', $umum)->get();
            $data['kartu_identitas'] = $kartu_identitas[0]->kartu_identitas;
        }

        $cek = AnggotaUmum::findOrFail($umum);
        $user = User::findOrFail($cek->user_id);
        $user->update(['foto' => $data['foto'], 'name' => $data['nama']]);
        $cek->update($data);

        Alert::success('Berhasil!', 'Profil berhasil diubah');

        return to_route('anggota.profilumum');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AnggotaAscRequest  $request
     * @param  \App\Models\AnggotaAsc  $asc
     * @return \Illuminate\Http\Response
     */
    public function updateprofilasc(AnggotaAscRequest $request, $asc)
    {
        $data = $request->all();

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $tujuan = 'storage/foto';
            $foto->move($tujuan, $foto->getClientOriginalName());
            $data['foto'] = $request->file('foto')->getClientOriginalName();
        } else {
            $foto = AnggotaAsc::where('id', $asc)->get();
            $data['foto'] = $foto[0]->foto;
        }

        $cek = AnggotaAsc::findOrFail($asc);
        $user = User::findOrFail($cek->user_id);
        $user->update(['foto' => $data['foto'], 'name' => $data['nama']]);
        $cek->update($data);

        Alert::success('Berhasil!', 'Profil berhasil diubah');

        return to_route('anggota.profilasc');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function identitasumum()
    {
        return view('anggota.identitasumum', [
            'profil' => AnggotaUmum::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function identitasasc()
    {
        return view('anggota.identitasasc', [
            'profil' => AnggotaAsc::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
