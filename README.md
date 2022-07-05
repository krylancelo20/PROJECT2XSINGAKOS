# SISTEM INFORMASI PENGELOLAAN INDEKOST
Sistem informasi ini yaitu untuk memudahkan penyewa dan pemilik dalam melakukan proses pengelolaan kos-kosan yang meliputi penyewaan, pembayaran, pelaporan, dan pengajuan yang dilakukan secara online. 

## Starter Menjalankan Sistem Indekost
<ol>
	<li>Membuka aplikasi XAMPP dan menjalankan apache dan mysql</li>
    <li>Menyalakan koneksi internet wifi</li>
	<li>Membuat Database web_indekost</li>
    <li>Buka CMD dan arahkan ke lokasi sistem indekos</li>
    <li>migrasi isi database dengan data bawaan menuliskan perintah "php artisan migrate:fresh --seed" tanpa tanda kutip</li>
    <li>tunggu sampai selesai</li>
    <li>menjalankan sistem dengan menuliskan perintah "php artisan serve"</li>
    <li>Membuka browser dan menuliskan alamat "127.0.0.1:8000"</li>
    <li>Selesai</li>
</ol>

## Role Sistem Indekost
<ol>
    <li>Admin</li>
    - Email : admin@gmail.com
    - Password :  admin
        <ul>
            <li>Login</li>
            <li>Mengelola Akun User</li>
            <li>Mengelola Kosan</li>
            <li>Mengelola Kamar</li>
            <li>Mengelola Pengajuan</li>
            <li>Mengelola Kategori Kosan</li>
            <li>Melihat Penyewaan</li>
            <li>Melihat Pembayaran</li>
            <li>Melihat Pelaporan</li>
        </ul>
    <li>Pemilik</li>
    - Email : yeti@gmail.com
    - Password : yeti
        <ul>
            <li>Login</li>
            <li>Registasi</li>
            <li>Mengubah Profil</li>
            <li>Mengajukan Kos-kosan dan Kamar</li>
            <li>Mengelola Penyewaan</li>
            <li>Mengelola Pembayaran</li>
            <li>Mengelola Pelaporan</li>
        </ul>
    <li>Penyewa</li>
    - **Email : ** tedi@gmail.com
    - **Password : ** tedi
        <ul>
            <li>Login</li>
            <li>Registrasi</li>
            <li>Mengubah Profil</li>
            <li>Melakukan Penyewaan</li>
            <li>Melakukan Pembayaran</li>
            <li>Melakukan Pelaporan</li>
        </ul>
</ol>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
