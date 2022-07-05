@extends('layouts.dashboard')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $title }}</h2>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <center>
        <h3>Selamat Datang {{ auth()->user()->name }}</h3>
        <h3 class="mb-5">Anda login sebagai {{ auth()->user()->status }}</h3>
    </center>
    <div class="row">
        @if (auth()->user()->status !== 'penyewa')
            <div class="col-lg-4 mb-3">
                <div class="card shadow text-center" style="width: 22rem;">
                    <div class="card-body p-0">
                        <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">Pengajuan</h5>
                        <div class="progress" style="height: 50px">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ ($pengajuan['setuju'] / $pengajuan['jumlah']) * 100 }}%"
                                aria-valuenow="{{ $pengajuan['setuju'] }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $pengajuan['setuju'] }} <i class="bi bi-check-circle"></i></b>
                            </div>
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="width: {{ ($pengajuan['tolak'] / $pengajuan['jumlah']) * 100 }}%"
                                aria-valuenow="{{ $pengajuan['tolak'] }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $pengajuan['tolak'] }} <i class="bi bi-x-circle"></i></b>
                            </div>
                            <div class="progress-bar bg-secondary" role="progressbar"
                                style="width: {{ ($pengajuan['tunggu'] / $pengajuan['jumlah']) * 100 }}%"
                                aria-valuenow="{{ $pengajuan['tunggu'] }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $pengajuan['tunggu'] }} <i class="bi bi-question-circle"></i></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif

        <div class="col-lg-4 mb-3">
            <div class="card shadow text-center" style="width: 22rem;">
                <div class="card-body p-0">
                    <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">Pelaporan</h5>
                    <div class="progress" style="height: 50px">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ ($pelaporan['setuju'] / $pelaporan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $pelaporan['setuju'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $pelaporan['setuju'] }} <i class="bi bi-check-circle"></i></b>
                        </div>
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: {{ ($pelaporan['tolak'] / $pelaporan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $pelaporan['tolak'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $pelaporan['tolak'] }} <i class="bi bi-x-circle"></i></b>
                        </div>
                        <div class="progress-bar bg-secondary" role="progressbar"
                            style="width: {{ ($pelaporan['tunggu'] / $pelaporan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $pelaporan['tunggu'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $pelaporan['tunggu'] }} <i class="bi bi-question-circle"></i></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card shadow text-center" style="width: 22rem;">
                <div class="card-body p-0">
                    <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">Penyewaan</h5>
                    <div class="progress" style="height: 50px">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ ($penyewaan['setuju'] / $penyewaan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $penyewaan['setuju'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $penyewaan['setuju'] }} <i class="bi bi-check-circle"></i></b>
                        </div>
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: {{ ($penyewaan['tolak'] / $penyewaan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $penyewaan['tolak'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $penyewaan['tolak'] }} <i class="bi bi-x-circle"></i></b>
                        </div>
                        <div class="progress-bar bg-secondary" role="progressbar"
                            style="width: {{ ($penyewaan['tunggu'] / $penyewaan['jumlah']) * 100 }}%"
                            aria-valuenow="{{ $penyewaan['tunggu'] }}" aria-valuemin="0" aria-valuemax="100">
                            <b>{{ $penyewaan['tunggu'] }} <i class="bi bi-question-circle"></i></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user()->status === 'admin')
            <div class="col-lg-4 mb-3">
                <div class="card shadow text-center" style="width: 22rem;">
                    <div class="card-body p-0">
                        <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">User</h5>
                        <div class="progress" style="height: 50px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="{{ $user }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $user }} <i class="bi bi-person-circle"></i></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow text-center" style="width: 22rem;">
                    <div class="card-body p-0">
                        <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">Kost</h5>
                        <div class="progress" style="height: 50px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="{{ $kost }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $kost }} <i class="bi bi-house-door"></i></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow text-center" style="width: 22rem;">
                    <div class="card-body p-0">
                        <h5 class="card-title bg-dark text-white p-3 rounded-top mb-0">Kamar</h5>
                        <div class="progress" style="height: 50px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="{{ $kamar }}" aria-valuemin="0" aria-valuemax="100">
                                <b>{{ $kamar }} <i class="bi bi-door-open"></i></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
@endsection
