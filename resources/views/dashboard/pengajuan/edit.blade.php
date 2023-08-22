@extends('layouts.dashboard')
@section('container')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    {{-- cdn leaflet fullscreen js dan css --}}
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <style>
        #map {
            height: 700px;
            width: 100%;
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $title }}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="/dashboard/pengajuan/{{ $kost->slug }}" class="btn btn-success"><i class="bi bi-eye"></i>
                    Lihat</a>
                @if (auth()->user()->status == 'pemilik')
                    <form action="/dashboard/pengajuan/{{ $kost->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')"><i
                                class="bi bi-trash"></i> Hapus</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <form action="/dashboard/pengajuan/{{ $kost->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                @if (auth()->user()->status === 'admin')
                    <div class="mb-3">
                        <label for="status" class="form-label">status:</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="menunggu" @selected(old('status', $kost->status) == 'menunggu')>menunggu</option>
                            <option value="disetujui" @selected(old('status', $kost->status) == 'disetujui')>disetujui</option>
                            <option value="ditolak" @selected(old('status', $kost->status) == 'ditolak')>ditolak</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="komentar" class="form-label">komentar:</label>
                        <textarea class="form-control  @error('komentar') is-invalid @enderror" name="komentar" id="komentar" cols="30"
                            rows="2">{{ old('komentar', $kost->komentar) }}</textarea>
                        @error('komentar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kosan:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" required value="{{ old('nama', $kost->nama) }}" readonly>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wc" class="form-label">WC:</label>
                        <input type="text" class="form-control @error('wc') is-invalid @enderror" id="wc"
                            name="2" required value="{{ old('wc', $kost->wc) }}" readonly>
                        @error('wc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis:</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                            name="3" required value="{{ old('jenis', $kost->jenis) }}" readonly>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">kategori:</label>
                        <input type="text" class="form-control @error('kategori_id') is-invalid @enderror"
                            id="kategori_id" name="4" required
                            value="{{ old('kategori_id', $kost->kategori->nama) }}" readonly>
                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jarak" class="form-label">Jarak dari Kategori (meter):</label>
                        <input type="number" class="form-control @error('jarak') is-invalid @enderror" id="jarak"
                            name="5" required value="{{ old('jarak', $kost->jarak) }}" readonly>
                        @error('jarak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <textarea class="form-control  @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" cols="30"
                            rows="2" readonly>{{ old('deskripsi', $kost->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                            rows="2" readonly>{{ old('alamat', $kost->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi_toko" class="form-label">Lokasi Kos :</label>
                        <textarea class="form-control  @error('lokasi_toko') is-invalid @enderror" name="lokasi_toko" id="lokasi_toko" cols="30"
                            rows="2" readonly>{{ old('lokasi_toko', $kost->lokasi_toko) }}</textarea>
                        @error('lokasi_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="m-2" id="map"></div>
                @else
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kosan:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" required value="{{ old('nama', $kost->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wc" class="form-label">WC:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wc" id="wc1" value="dalam"
                                @checked(old('wc', $kost->wc) == 'dalam')>
                            <label class="form-check-label" for="wc">
                                Dalam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wc" id="wc2"
                                value="luar   " @checked(old('wc', $kost->wc) == 'luar')>
                            <label class="form-check-label" for="wc">
                                Luar
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="jenis1"
                                value="campuran" @checked(old('jenis', $kost->jenis) == 'campuran')>
                            <label class="form-check-label" for="jenis">
                                Campuran
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="jenis2" value="putra"
                                @checked(old('jenis', $kost->jenis) == 'putra')>
                            <label class="form-check-label" for="jenis">
                                Putra
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="jenis3" value="putri"
                                @checked(old('jenis', $kost->jenis) == 'putri')>
                            <label class="form-check-label" for="jenis">
                                Putri
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">kategori:</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id"
                            name="kategori_id">
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}" @selected(old('kategori_id', $kost->kategori_id) == $kt->id)>{{ $kt->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jarak" class="form-label">Jarak dari Kategori (meter):</label>
                        <input type="number" class="form-control @error('jarak') is-invalid @enderror" id="jarak"
                            name="jarak" required value="{{ old('jarak', $kost->jarak) }}">
                        @error('jarak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <textarea class="form-control  @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                            cols="30" rows="2">{{ old('deskripsi', $kost->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                            rows="2">{{ old('alamat', $kost->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="m-2" id="map"></div>
                    <div class="mb-3">
                        <label for="lokasi_toko" class="form-label">Lokasi Kos :</label>
                        <textarea class="form-control  @error('lokasi_toko') is-invalid @enderror" name="lokasi_toko" id="lokasi_toko" cols="30"
                            rows="2">{{ old('lokasi_toko', $kost->lokasi_toko) }}</textarea>
                        @error('lokasi_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Kost <small>(max: 16mb)</small></label>
                    <center>
                        @if ($kost->image)
                            <img src="/foto/{{$kost->image}}" alt="Foto Profil {{ $kost->name }}"
                                class="img-preview img-fluid w-75 my-3 d-block">
                        @else
                            <img class="img-preview img-fluid w-75 my-3">
                        @endif
                    </center>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-between mb-3">
                @if (auth()->user()->status)
                    <a href="/dashboard/kost" class="text-dark text-decoration-none">
                        < Kembali</a>
                        @else
                            <a href="/dashboard/pengajuan" class="text-dark text-decoration-none">
                                < Kembali</a>
                @endif
                <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
        </div>
    </form>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script>
        var map = L.map('map', {
        center: [-6.571589, 107.758736],
        zoom: 15,
        fullscreenControl: true
                                })
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        @foreach ($datakost as $key => $value)
                L.marker([{{ $value->lokasi_toko}}])
                .bindPopup("<div style='min-width:200px'><img width='200px' src='{{ url('foto/') }}/{{ $value->image }}' alt='toko-img' class='custom-img-map rounded'>" +
                        "<div class='my-1'><p class='fs-5 text-capitalize fw-bold'>{{ $value->nama }}</p></div> <div class='my-1'><p class='fs-8 text-capitalize fw-bold'>{{ $value->alamat }}</p></div>")
                
                    .addTo(map);
                    @endforeach
        @foreach ($datakategori as $key => $gis)
                L.marker([{{ $gis->lokasi_kategori}}])
                .bindPopup("<div style='min-width:200px'><img width='200px' src='{{ url('foto/') }}/{{ $gis->image }}' alt='toko-img' class='custom-img-map rounded'>" +
                        "<div class='my-1'><p class='fs-5 text-capitalize fw-bold'>{{ $gis->nama }}</p></div> <div class='my-1'><p class='fs-8 text-capitalize fw-bold'>{{ $gis->alamat }}</p></div>")
                
                    .addTo(map);
                    @endforeach
        // set koordinat lokasi ke dalam curLocation yang mana nilai dari curLocation juga akan
        // digunakan untuk menampilkan marker pada map
        var curLocation = [-0.4922612112757657, 117.14561375238749];
        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true',
        });
        map.addLayer(marker);

        // dan ketika marker tersebut di geser akan mendapatkan titik koordinat yaitu latitude  dan longitudenya
        // lalu menambahkan titik koordinat tersebut ke dalam tag input dengan namenya location 
        marker.on('dragend', function(event) {
            var lokasi_toko = marker.getLatLng();
            marker.setLatLng(lokasi_toko, {
                draggable: 'true',
            }).bindPopup(lokasi_toko).update();

            $('#lokasi_toko').val(lokasi_toko.lat + "," + lokasi_toko.lng).keyup()
        });

        // selain itu dengan fungsi di bawah juga bisa mendapatkan nilai latitude dan longitude
        // dengan cara klik lokasi pada map maka nilai latitude dan longitudenya juga akan
        // langsung muncul pada input text location

        var loc = document.querySelector("[name=lokasi_toko]");
        map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            loc.value = lat + "," + lng;
        });

        for (i in datas) {
            //     // lalu hasil loopingan tersebut kita definisikan ke dalam variabel baru,
            //     // title dan loc selanjutnya kita masukkan ke dalam variabel marker dan marker ini
            //     // yang akan kita pakai dalam option markersLayer

            //     // jadi ketika kkta melakukan pencarian data spot, nama dari spot tersebut akan muncul kemudian 
            //     // jika kita klik nama tersebut akan langsung di arahkan ke spot tersebut dan juga menampilkan marker dari spot itu
            //     // beserta popup yang berisi informasi spot.

            var title = datas[i].title,
                loc = datas[i].loc,
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                });
                markersLayer.addLayer(marker);
            }
    </script>
@endsection
