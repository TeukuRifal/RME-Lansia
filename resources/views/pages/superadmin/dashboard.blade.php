@extends('layouts.super')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Super Admin Dashboard</h1>
    <p class=" text-lg font-medium">Selamat Datang  {{ auth()->user()->name }},  Gunakan sidebar untuk memanage aplikasi.</p>
</div>
@endsection 
