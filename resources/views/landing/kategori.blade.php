@extends('layouts.layout-landing')
@section('content')
<a class="logo logo--stuck" href="{{url('/')}}">
    <img src="{{asset('images/LOGO KP -02.png')}}"/>
</a>
<div class="container-fluid">
    <div class="row frame frame2">
        <div class="container">
            <p class="kategori-title text-left wow fadeInUp">
                KATEGORI KIDSPRENEURSHIP
            </p>
        </div>
        <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row">
                <hr class="hr-bold">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category wow fadeInUp" data-wow-delay="1s">
                        <div class="category-image-frame">
                            <img src="{{asset('images/kategori/h-aplikasi.png')}}" alt="" class="category-image">
                        </div>
                        <div class="category-content">
                            <p class="category-name">Kategori Aplikasi dan Game</p>
                            <p class="category-teks">
                                Bidang wirausaha aplikasi dan permainan interaktif digital hadir sebagai hasil dari kolaborasi antara bidang rekayasa (teknologi komputer, telekomunikasi, dan informasi digital) dan bidang desain (desain grafis, user interface, dan desain interaksi) sebagai salah satu bidang yang berkembang pesat seiring fenomena global yang terjadi saat ini yaitu revolusi industri 4.0.
                            </p>
                            @if (Auth::user()->role == 'peserta')
                                <a target="_blank" href="{{asset('ketentuan/Ketentuan-Lomba-Kategori-Aplikasi-dan-Game.pdf')}}" class="category-link">Download <i class="icofont-download"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="category wow fadeInUp" data-wow-delay="1s">
                        <div class="category-image-frame">
                            <img src="{{asset('images/kategori/h-desain.png')}}" alt="" class="category-image">
                        </div>
                        <div class="category-content">
                            <p class="category-name">Kategori Desain</p>
                            <p class="category-teks">
                                Bidang wirausaha Desain Grafis adalah jasa dan produk komunikasi visual mencakup aktivitas perancangan (desain), pengembangan purwarupa (prototyping), dan wirausaha berbasis teknologi cetak dan digital dengan kriteria pada media antara lain, Graphic Design on surface (berbasis cetak/printed matter) seperti majalah, surat kabar, Desain Karakter: toys character, mascot event (stationary character), untuk buku cerita atau komik (story character). Graphic Design on screen (media digital) meliputi: e-magazine, e-book, webtoon, web design, multimedia interaktif, desain karakter, sticker untuk apps, digital imaging, komik digital, dll.
                            </p>
                            @if (Auth::user()->role == 'peserta')
                                <a target="_blank" href="{{asset('ketentuan/Ketentuan-Lomba-Kategori-Desain-Grafis.pdf')}}" class="category-link">Download <i class="icofont-download"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="category wow fadeInUp" data-wow-delay="1s">
                        <div class="category-image-frame">
                            <img src="{{asset('images/kategori/h-fashion.png')}}" alt="" class="category-image">
                        </div>
                        <div class="category-content">
                            <p class="category-name">Kategori Fashion</p>
                            <p class="category-teks">
                                Secara sederhana pengkategorian produk fashion dapat dikelompokan menjadi, Kategori produk busana seperti produk busana pria, wanita dan anak. Busana meliputi busana atasan (jaket, kemeja, kaos, rompi) dan busana bawahan (celana, rok, sarung). Kategori produk aksesoris merupakan produk yang dikenakan untuk melengkapi produk busana agar seseorang dapat tampil lebih maksimal. Aksesoris meliputi produk alas kaki, tas, aksesoris kepala (kacamata, topi, kerudung, hairpiece), syal, dasi, perhiasan (seperti anting, kalung, gelang), sarung tangan, sapu tangan.
                            </p>
                            @if (Auth::user()->role == 'peserta')
                                <a target="_blank" href="{{asset('ketentuan/Ketentuan-Lomba-Kategori-Fashion.pdf')}}" class="category-link">Download <i class="icofont-download"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="category wow fadeInUp" data-wow-delay="1s">
                        <div class="category-image-frame">
                            <img src="{{asset('images/kategori/h-fnb.png')}}" alt="" class="category-image">
                        </div>
                        <div class="category-content">
                            <p class="category-name">Kategori Food and Beverage</p>
                            <p class="category-teks">
                                Kegiatan usaha dibidang boga adalah kegiatan yang terkait dengan produksi, pemasaran dan penjualan produk makanan serta minuman. Produk yang dikompetisikan merupakan pengolahan makanan atau minuman Siap Masak (Ready to Cook) seperti aneka roti, aneka kudapan kering dan kue basah dan makanan atau minuman Siap Saji (Ready to Eat & Drink).
                            </p>
                            @if (Auth::user()->role == 'peserta')
                                <a target="_blank" href="{{asset('ketentuan/Ketentuan-Lomba-Kategori-F&B.pdf')}}" class="category-link">Download <i class="icofont-download"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="category wow fadeInUp" data-wow-delay="1s">
                        <div class="category-image-frame">
                            <img src="{{asset('images/kategori/h-kriya.png')}}" alt="" class="category-image">
                        </div>
                        <div class="category-content">
                            <p class="category-name">Kategori Kriya</p>
                            <p class="category-teks">
                                Kompetisi kriya berkaitan dengan kreasi, produksi, distribusi, dan pemasaran produk yang terbuat dari material alam atau sintetis seperti tekstil, serat alam, tanah liat, plastik, kulit, kayu, logam, batu, dll yang dihasilkan oleh individu ataupun kelompok secara manual atau dengan alat bantu produksi.
                            </p>
                            @if (Auth::user()->role == 'peserta')
                                <a target="_blank" href="{{asset('ketentuan/Ketentuan-Lomba-Kategori-Kriya.pdf')}}" class="category-link">Download <i class="icofont-download"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
