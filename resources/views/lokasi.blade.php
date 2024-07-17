@extends('layout/layout')

@section('space-work')

<div class="container">


    <h1 class="text-center">
        Alamat Rumah Peserta Didik
    </h1>
    <form action="" class="form-horizontal">
        <div class="form-group">
            <label for="" class="from"> Alamat Peserta Didik:</label>
            <input type="text" class="from-control" name="" placeholder="Masukkan Alamat Rumah Anda" id="">
        </div>

        <div class="form-group">
            <button class="btn btn-info btn-lg" onclick="calcRoute()">
                Calculate
            </button>
        </div>
    </form>


</div>