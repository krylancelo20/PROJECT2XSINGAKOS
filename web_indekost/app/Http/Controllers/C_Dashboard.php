<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Pelaporan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class C_Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.v_dashboard', [
            'title' => 'Dashboard Indekos',
            'pengajuan' => $this->pengajuan(),
            'pelaporan' => $this->pelaporan(),
            'penyewaan' => $this->penyewaan(),
            'user' => User::count(),
            'kost' => Kost::where('status', 'disetujui')->count(),
            'kamar' => Kamar::count()
        ]);
    }

    private function pengajuan()
    {
        $jumlah = (Kost::count() == 0 ? 1 : Kost::count());
        return [
            'setuju' => Kost::where('status', 'disetujui')->count(),
            'tolak' => Kost::where('status', 'ditolak')->count(),
            'tunggu' => Kost::where('status', 'menunggu')->count(),
            'jumlah' => $jumlah,
        ];
    }

    private function pelaporan()
    {
        $jumlah = (Pelaporan::count() == 0 ? 1 : Pelaporan::count());
        return [
            'setuju' => Pelaporan::where('status', 'disetujui')->count(),
            'tunggu' => Pelaporan::where('status', 'menunggu')->count(),
            'tolak' => Pelaporan::where('status', 'ditolak')->count(),
            'jumlah' => $jumlah,
        ];
    }

    private function penyewaan()
    {
        $jumlah = (Penyewaan::count() == 0 ? 1 : Penyewaan::count());
        return [
            'setuju' => Penyewaan::where('status', 'disetujui')->count(),
            'tunggu' => Penyewaan::where('status', 'menunggu')->count(),
            'tolak' => Penyewaan::where('status', 'ditolak')->count(),
            'jumlah' => $jumlah,
        ];
    }

    public function home()
    {
        return view('v_home', [
            'title' => 'Indekos',
            'kost' => Kost::latest()->get(),
            'kamar' => Kamar::all()
        ]);
    }

    public function about()
    {
        return view('v_tentang', [
            'title' => 'Tentang Indekos'
        ]);
    }
}
