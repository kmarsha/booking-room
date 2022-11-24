@php
  $name = isset($user) ? $user->name : null;
  $username = isset($user) ? $user->username : null;
  $email = isset($user) ? $user->email : null;
  $password = isset($user) ? $user->pass : null;
  $role = isset($user) ? $user->role : null;
  $description = isset($user) ? $user->description : null;

  $url = isset($user) ? "/admin/user/$user->id" : '/admin/user';
  $method = isset($user) ? 'PUT' : 'POST';
  $title = isset($user) ? 'Ubah Data User' : 'Tambah Data User';
@endphp

@extends('layouts.app', ['title' => $title, 'page' => 'user'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pages</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('user.index') }}">Manajemen User</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
  </ol>
</nav>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
      <form action="{{ $url }}" method="POST">
        @csrf
        @method($method)
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-name">Nama</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-name2" class="input-group-text"
              ><i class="bx bx-user"></i
            ></span>
            <input
              type="text"
              class="form-control"
              id="basic-icon-default-name"
              name="name"
              value="{{ $name }}"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-name2"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-username">Username</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-username2" class="input-group-text"
              ><i class="bx bx-user-circle"></i
            ></span>
            <input
              type="text"
              class="form-control"
              id="basic-icon-default-username"
              name="username"
              value="{{ $username }}"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-username2"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-email">Email</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-email2" class="input-group-text"
              ><i class="bx bx-envelope"></i
            ></span>
            <input
              type="email"
              class="form-control"
              id="basic-icon-default-email"
              name="email"
              value="{{ $email }}"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-email2"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-password">Password</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-password2" class="input-group-text"
              ><i class="bx bx-lock"></i
            ></span>
            <input
              type="text"
              class="form-control"
              id="basic-icon-default-password"
              name="password"
              value="{{ $password }}"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-password2"
              required
            />
          </div>
        </div>
        <div class="mb-3">
          <label for="role-input" class="form-label">Role</label>
          <select class="form-select" id="role-input" required aria-label="Pilih Role">
            <option selected="">Open this select menu</option>
            <option value="admin" {{ ($role == 'admin') ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ ($role == 'user') ? 'selected' : '' }}>User</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-description">Deskripsi User</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-description2" class="input-group-text"
              ><i class="bx bx-comment"></i
            ></span>
            <textarea
              id="basic-icon-default-description"
              class="form-control"
              name="description"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-description2"
            >{{ $description }}</textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
@endsection