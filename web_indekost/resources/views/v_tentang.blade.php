@extends('layouts.main')
@section('container')
   {{-- intro --}}
   <div class="row m-5">
      <h2 class="my-3">{{ $title }}</h2>
      <img src="https://source.unsplash.com/1200x500/?dorm" class="card-img-top" alt="...">
      <center>
         <div class="text-center my-5 w-50">
            <h3>Sistem Informasi Pengelolaan Indekos</h3>
            <p>Sistem informulirasi pengelolaan indekos adalah sebuah sistem website yang berisi informulirasi mengenai kos-kosan yang berdasarkan kategori lokasinya yaitu di sekolah dan pabrik. Sistem ini mempunyai  fitur berupa pencarian lokasi, pengajuan, penyewaan dan pelaporan kos-kosan, dan halaman khusus untuk pemilik dan penyewa. </p>
         </div>
      </center>
   </div>
   
   {{-- tim --}}
   <div class="row" style="background-color: #eee">
      <h3 class="text-center m-5">Tim Indekos</h3>
      <div class="col-6 mb-5">
         <center>
             <div class="w-25 mb-3">
                 <img src="https://source.unsplash.com/800x800/?male" class="card-img-top rounded-circle" alt="...">
             </div>
             <h5>Muhamad Galuh Febrian</h5>
             <span>10107039</span>
         </center>
     </div>
     <div class="col-6 mb-5">
         <center>
             <div class="w-25 mb-3">
                 <img src="https://source.unsplash.com/100x100/?female" class="card-img-top rounded-circle" alt="...">
             </div>
             <h5>Dhea Aryani Nurhilda</h5>
             <span>10107039</span>
         </center>
     </div>
   </div>

   {{-- kontak --}}
   <h3 class="text-center m-5">Kontak</h3>
   <div class="row d-flex justify-content-center m-5">
      <div class="col-5">
         <p>Politeknik Negeri Subang adalah perguruan tinggi negeri pertama di Kabupaten Subang, Provinsi Jawa Barat</p>
         <p><b>Alamat:</b> Jl. Brigjen Katamso No. 37 (Belakang RSUD) Dangdeur, Kec. Subang, Kabupaten Subang, Jawa Barat 41211</p>
         <p><b>Jam:</b> 07:00 - 16:00</p>
         <p><b>Telepon:</b> (0260) 417648</p>
         <p><b>Didirikan:</b> 1 April 2014, Kabupaten Subang</p>
         <p><b>Provinsi:</b> Jawa Barat</p>
      </div>
      <div class="col-5">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6666.148167033228!2d107.82308656442947!3d-6.557564272787776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b178f9e7919%3A0xadbb4b0dbfac97b7!2sBumi%20kembar%20kost!5e0!3m2!1sid!2sid!4v1648175115995!5m2!1sid!2sid" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
   </div>

@endsection
