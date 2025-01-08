@extends('layouts.template')

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Halo, apakabar!!!</h3>
    <div class="card-tools"></div>
  </div>
  <div class="card-body">
    Selamat Datang Semua, Ini adalah halaman user dari aplikasi ini
  </div>
</div>

<div class="bg-white p-2 rounded shadow-sm mt-2 text-center" style="width: 20%">
  <h3>Total Users</h3>
  <h2>{{$userCount}}</h2>
</div>

@endsection