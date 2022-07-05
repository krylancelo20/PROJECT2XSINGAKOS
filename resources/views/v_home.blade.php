@extends('layouts.main')
@section('container')
    {{-- Konten --}}
    <div class="row my-5 bg-white">
        <div class="col-md-5 mx-5">
            <h1>Sistem Informasi Pengelolaan Indekos</h1>
            <p>Website Sistem Informasi Pengelolaan Indekos yang mempunyai fungsi pelaporan, pembayaran, pengajuan, dan
                penyewaan.</p>
            <form action="/kost" class="shadow" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Kosan" aria-label="Cari Kosan"
                        aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>
            {{-- <form action="/kost">
                <div class="input-group shadow">
                    <input type="text" class="form-control" placeholder="Cari Kosan" name="search">
                    <button class="btn btn-success" type="button">Cari</button>
                </div>
            </form> --}}
        </div>
        <div class="col-md-5">
            <img src="https://source.unsplash.com/800x500/?dorm" class="img-fluid" alt="...">
        </div>
    </div>

    {{-- kosan --}}
    <div class="row mt-5 pt-5 mx-5 bg-white">
        <div class="d-flex justify-content-between">
            <h2>Kos-kosan</h2>
            <a href="/kost" class="text-decoration-none text-dark">
                <p>See More -></p>
            </a>
        </div>
        @foreach ($kost as $k)
            @if ($k->status === 'disetujui')
                <div class="col-md-4">
                    <div class="card" style="width: 25rem;">
                        <a href="/kostan/{{ $k->slug }}">
                            <img src="{{ asset('/storage/' . $k->image) }}" alt="Foto Kosan {{ $k->name }}"
                                class="img-preview img-fluid mb-3 d-block">
                        </a>
                        <div class="card-body">
                            <div class="my-3">
                                <a href="/kost?jenis={{ $k->jenis }}"
                                    class="border border-success text-decoration-none text-success p-1">{{ $k->jenis }}</a>
                                <a href="/kost?kategori={{ $k->kategori->slug }}" class="text-decoration-none"><span
                                        class="border border-success text text-success p-1">{{ $k->kategori->nama }}</span></a>
                            </div>
                            <h5 class="card-title">{{ $k->nama }}</h5>
                            <div class="my-3">
                                <span class="m-1"><i class="bi bi-house-door"></i>
                                    {{ $kamar->where('kost_id', $k->id)->sum('jumlah_kamar') }}
                                    {{ $kamar->where('kost_id', $k->id)->sum('sisa_kamar') == 0 ? '(Penuh)' : '(sisa ' . $kamar->where('kost_id', $k->id)->sum('sisa_kamar') . ')' }}
                                </span>
                                <span class="m-1"><i class="bi bi-badge-wc"></i> {{ $k->wc }}</span>
                                <span class="m-1"><i class="bi bi-geo-alt"></i> {{ $k->jarak }} m</span>
                            </div>
                            <div class="card-text">
                                @if ($kamar->where('kost_id', $k->id)->min('harga') == $kamar->where('kost_id', $k->id)->max('harga'))
                                    <p class="mb-3"><span class="fw-bold"> Harga : </span>
                                        Rp. {{ $kamar->where('kost_id', $k->id)->min('harga') }}
                                    </p>
                                @else
                                    <p class="mb-3"><span class="fw-bold"> Harga : </span>
                                        Rp. {{ $kamar->where('kost_id', $k->id)->min('harga') }} - Rp.
                                        {{ $kamar->where('kost_id', $k->id)->min('harga') }}
                                    </p>
                                @endif
                                <p class="mb-3"><span class="fw-bold"> Pemilik : </span>
                                    <a href="/kost?user={{ $k->user->username }}"
                                        class="badge bg-outline-success text-black">{{ $k->user->name }}</a>
                                    <a class="badge bg-success text-decoration-none link-light"
                                        href="https://wa.me/{{ $k->user->nohp }}" target="_blank">
                                        <i class="bi bi-whatsapp"></i> +{{ $k->user->nohp }}
                                    </a>
                                </p>
                                <p class="card-text mt-3"> <span class="fw-bold"> Alamat : <br></span>
                                    {{ $k->alamat }}</p>
                                <a href="/kostan/{{ $k->slug }}" class="btn btn-dark">Lihat Kosan</a>

                            </div>
                        </div>
                    </div>
                </div>
            @else
            @endif
        @endforeach
    </div>
    {{-- keunggulan --}}
    <div class="row my-5" style="background-color: #EEE">
        <h2 class="m-5">Keunggulan Indekos</h2>
        <div class="row d-flex justify-content-evenly text-center m-5">
            <div class="col-lg-3">
                <span class="text text-success fs-3"><i class="bi bi-cash"></i></span>
                <h3>Penyewaan</h3>
                <p>Penyewaan kosan bisa dilakukan secara online dan bisa melakukan secara otomatis dan pemasukan dan
                    pengeluaran yang tercatat digital</p>
            </div>
            <div class="col-lg-3">
                <span class="text text-success fs-3"><i class="bi bi-clipboard-heart"></i></span>
                <h3>Pelaporan</h3>
                <p>Sistem Pelaporan dari penyewa ke pemilik mengenai situasi yang ada dikosan dari pelaporan fasilitas kosan
                    sampai perizinan untuk keluar kosan</p>
            </div>
            <div class="col-lg-3">
                <span class="text text-success fs-3"><i class="bi bi-house-heart"></i></span>
                <h3>Pengajuan</h3>
                <p>Pengajuan diperuntukkan untuk pemilik yang ingin memasukan kosannya dan mengelola kosannya secara digital
                </p>
            </div>
        </div>
    </div>

    {{-- Kategori --}}
    <div class="row my-5 bg-white">
        <div class="d-flex justify-content-evenly">
            <div class="col-lg-5">
                <h2>Kategori Tempat Kostan</h2>
                <p>Cari kosan dengan kategori tempat seperti industri atau instansi tempat bekerja dan sekolah seperti
                    universitas politeknik agar kosan dekat dan tidak boros uang transportasi</p>
                <a href="/kategori/1" class="text-decoration-none text-success">
                    <div class="border border-success text text-success my-2 p-1 w-50">PT YOUME</div>
                </a>
                <a href="/kategori/3" class="text-decoration-none text-success">
                    <div class="border border-success text text-success my-2 p-1 w-50">Politeknik Negeri Subang</div>
                </a>
                <a href="/kategori" class="text-decoration-none text-success">
                    <div class="border border-success text text-success my-2 p-1 w-50">Kategori Lainnya</div>
                </a>
            </div>
            <div class="col-lg-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6666.148167033228!2d107.82308656442947!3d-6.557564272787776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b178f9e7919%3A0xadbb4b0dbfac97b7!2sBumi%20kembar%20kost!5e0!3m2!1sid!2sid!4v1648175115995!5m2!1sid!2sid"
                    width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    {{-- Bergabung --}}
    <div class="row mb-5" style="background-color: #EEE">
        <h2 class="m-5">Bergabung Bersama Kami</h2>
        <div class="row d-flex justify-content-evenly text-center mb-5">
            <div class="col-lg-4 p-4">
                <span class="text text-success fs-3"><i class="bi bi-house-heart-fill"></i></span>
                <h3>Ajukan Kosan</h3>
                <p>Ajukan kosan agar meningkatkan banyak peminat dan memasarkan secara digital</p>
                <a href="/dsahboard/pengajuan"><button class="btn btn-success">Pengajuan</button></a>
            </div>
            <div class="col-lg-4 p-4">
                <span class="text text-success fs-3"><i class="bi bi-person-plus"></i></span>
                <h3>Buat Akun</h3>
                <p>Buat akun agar bisa memudahkan dalam mengakses fitur indekos</p>
                <a href="/register"><button class="btn btn-success">Daftar Akun</button></a>
            </div>
        </div>
    </div>
@endsection
