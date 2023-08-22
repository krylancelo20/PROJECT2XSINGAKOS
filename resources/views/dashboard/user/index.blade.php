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
    <div class="">
        <div class="row my-3 d-flex justify-content-between">
            {{-- <div class="col-lg-2">
                <a class="btn btn-dark" href="/dashboard/user/create"><i class="bi bi-plus-circle"></i> Tambah Data</a>
            </div> --}}
        </div>
        <div class="table-responsive text-center">
            <table class="table table-bordered table-light">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="color: white">#</th>
                        <th scope="col" style="color: white">Nama</th>
                        <th scope="col" style="color: white">Username</th>
                        <th scope="col" style="color: white">Email</th>
                        <th scope="col" style="color: white">Status</th>
                        <th scope="col" style="color: white">Status Akun</th>
                        <th scope="col" style="color: white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>  
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                @if($user->ban == '0')
                                    <label class="py-2 px-3 badge btn-primary">Aktif</label>
                                @elseif($user->ban == '1')
                                <label class="py-2 px-3 badge btn-danger">Tidak Aktif</label>

                                @endif
                                {{-- {{ $user->ban}} --}}
                            </td>
                            <td>
                                <a href="/dashboard/user/{{ $user->id }}" class="btn btn-success"><i
                                    class="bx bx-info-circle"></i></a>
                            <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning"><i
                                    class="bx bx-pencil"></i></a>
                            {{-- <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')"><i
                                        class="bx bx-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
@endsection
