@extends('layouts.dashboard')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $title }}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="/dashboard/kategori/{{ $kategori->id }}/edit" class="btn btn-warning"><i
                        class="bi bi-pencil"></i>
                    Edit</a>
                <form action="/dashboard/kategori/{{ $kategori->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')"><i
                            class="bi bi-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            @if ($kategori->image)
                <img src="{{ asset('/storage/' . $kategori->image) }}" alt="Foto Kategori {{ $kategori->nama }}"
                    class="img-preview img-fluid w-25 my-3 d-block">
            @else
                <img class="img-preview img-fluid w-25 my-3">
            @endif
            <table class="" style="font-size: 1.2em">
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>{{ $kategori->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ $kategori->alamat }}</td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-between my-5">
            <a href="/dashboard/kategori" class="text-dark text-decoration-none">
                < Kembali</a>
        </div>
    </div>
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
@endsection
