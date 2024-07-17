<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <style>
        .material-symbols-rounded {
        font-variation-settings:
            'FILL' 1,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
    </style>
</head>
<body>
    <div class="img-latar">
        <img src="{{asset('img/loginbiru.png')}}" alt="" width="100%" style="z-index: -999;">
    </div>

    <div class="all" style="z-index: 999;">
        <div class="nav">
            <div class="kiri">
                <img src="{{asset('img/logoppdb.png')}}" alt="" class="logo-ppdbb">
                <img src="{{asset('img/logo_smk1.png')}}" alt="" class="logo-smk1">
            </div>
            <div class="kanan">
                <ul>
                    <li><a href="#" class="beranda">Beranda</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>

        <div class="tengah">
            <div class="kiri">
                <div class="judul">
                    <p class="masuk">Masuk.</p>
                    <p class="sub-judul">Selamat datang di i-PPDB SMK Negeri 1 Cimahi</p>
                </div>
                <div class="form">

      
                <br>

                    
                <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="form-group">

                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <p style="color:red;">{{ $error }}</p>
                        @endforeach
                        @endif

                        @if(Session::has('error'))
                            <p style="color:red;">{{ Session::get('error') }}</p>
                        @endif

                        <img src="{{asset('img/person.png')}}" alt="">

                            <input type="text" class="form-control" name="name" placeholder="Username">
                        
                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">

                        <img src="{{asset('img/password.png')}}" alt="">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        
                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- <p>Masuk sebagai pendaftar?<p class="unduh" style="color: blue;">Unduh aplikasi i-PPDB sekarang.</p></p> -->
                        <p><span class="biru">Masuk sebagai pendaftar?</span> <span class="hitam">Unduh aplikasi i-PPDB sekarang.</span></p>

                        <br>

                        <button type="submit" class="btn btn-md btn-primary">LOGIN</button>

                    </form> 
                
                </div>
            </div>

            <div class="kanan">
                <img src="{{asset('img/bukulogin.png')}}" alt="" width="60%">
            </div>
        </div>

        <footer>
            <div class="kiri">
                <p class="ppdb">
                    i-PPDB
                </p>
                <p class="text">
                    Versi 1.2.0.5
                </p>
            </div>

            <div class="tengah">
                <p class="atas">
                    All rights reserved.
                </p>
                <p class="bawah">
                    Copyright ©2023 i-PPDB
                </p>
            </div>

            <div class="kanan">
                <img src="{{asset('img/socialmedia.png')}}" alt="" width="45%">
                <p>i-PPDB@gmail.com</p>
            </div>
        </footer>

    </div>
</body>
</html>