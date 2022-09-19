@extends('layouts.app', ['title' => 'Dashboard', 'page' => 'home'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Pages</a>
    </li>
    {{-- <li class="breadcrumb-item">
      <a href="javascript:void(0);">Dashboard</a>
    </li> --}}
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
</nav>
@endsection

@section('content')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-primary">Selamat Datang! 🎉</h5>
      </div>
    </div>
@endsection