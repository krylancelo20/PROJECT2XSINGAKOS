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
    </div>
    <form action="/dashboard/pengajuan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                    required value="{{ auth()->user()->id }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kosan:</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" required value="{{ old('nama') }}">
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
                            @checked(old('wc') == 'dalam')>
                        <label class="form-check-label" for="wc">
                            Dalam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="wc" id="wc2" value="luar   "
                            @checked(old('wc') == 'luar')>
                        <label class="form-check-label" for="wc">
                            Luar
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="jenis1" value="campuran"
                            @checked(old('jenis') == 'campuran')>
                        <label class="form-check-label" for="jenis">
                            Campuran
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="jenis2" value="putra"
                            @checked(old('jenis') == 'putra')>
                        <label class="form-check-label" for="jenis">
                            Putra
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" id="jenis3" value="putri"
                            @checked(old('jenis') == 'putri')>
                        <label class="form-check-label" for="jenis">
                            Putri
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Pilih Tempat Yang Dekat Dengan lokasi Kos Anda :</label>
                    <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id"
                        name="kategori_id">
                        @foreach ($kategori as $kt)
                            <option value="{{ $kt->id }}" @selected(old('kategori_id') == $kt->id)>{{ $kt->nama }}</option>
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
                        name="jarak" required value="{{ old('jarak') }}">
                    @error('jarak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea class="form-control  @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" cols="30"
                        rows="2" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30"
                        rows="2" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <label for="toko">Lokasi Kos</label>
                        <input type="text" class="form-control" id="lokasi_toko"
                            placeholder="Longitude, Latitude" name="lokasi_toko" >
                        <small id="emailHelp2" class="form-text text-danger">*Pilih melalui
                            maps, klik lokasi untuk mendapatkan longituted dan latitude</small>
                        {{-- <small id="emailHelp2" class="form-text text-danger">*Pilih melalui map (klik Lokasi Toko)</small> --}}
                    </div>
                    <div class="m-2" id="map"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Kost <small>(max: 16mb)</small></label>
                    <center>
                        <img class="img-preview img-fluid w-75 my-3">
                    </center>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()" required>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between mb-3">
                @if (auth()->user()->status == 'admin')
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
        @foreach ( $datakategori as $key => $gis)
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
    </script>

@endsection