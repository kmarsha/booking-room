@php
  $room_id = isset($bookingList) ? $bookingList->room_id : null;
  $date = isset($bookingList) ? $bookingList->date->format('Y-m-d') : null;
  $start = isset($bookingList) ? $bookingList->start->format('Y-m-d') : null;
  $end = isset($bookingList) ? $bookingList->end->format('Y-m-d') : null;
  $need = isset($bookingList) ? $bookingList->need : null;
 
  $url = isset($bookingList) ? "/booking/$bookingList->id" : '/booking';
  $method = isset($bookingList) ? 'PUT' : 'POST';
  $title = isset($bookingList) ? 'Ubah Data Booking' : 'Tambah Data Booking';
@endphp

@extends('layouts.app', ['title' => $title, 'page' => 'book'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pages</a>
    </li>
    <li class="breadcrumb-item">
      <a href="@admin {{ route('admin-booking-list') }} @else {{ route('book-list') }} @endadmin">List Data Booking</a>
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
          <label class="form-label" for="basic-icon-default-room">Ruangan</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-room2" class="input-group-text">Pilih Ruangan</span>
            <select class="form-select" name="room_id" id="basic-icon-default-room" required @if($method == 'PUT') disabled @endif>
              <option selected="">Choose...</option>
              @foreach ($rooms as $room)
                <option value="{{ $room->id }}" @if($room_id == $room->id) selected @endif>{{ $room->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-date">Tanggal</label>
          <div class="input-group input-group-merge">
            {{-- <span id="basic-icon-default-listname2" class="input-group-text"
              ><i class="bx bx-list-circle"></i
            ></span> --}}
            <input class="form-control" type="date" name="date" value="{{ $date }}" id="basic-icon-default-date" required />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-start">Waktu Mulai</label>
          <div class="input-group input-group-merge">
            <input class="form-control" type="time" name="start" value="{{ $start }}" id="basic-icon-default-start" required />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-end">Waktu Selesai</label>
          <div class="input-group input-group-merge">
            <input class="form-control" type="time" name="end" value="{{ $end }}" id="basic-icon-default-end" required />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="basic-icon-default-need">Keperluan</label>
          <div class="input-group input-group-merge">
            <span id="basic-icon-default-need2" class="input-group-text"
              ><i class="bx bx-comment"></i
            ></span>
            <textarea
              id="basic-icon-default-need"
              class="form-control"
              name="need"
              placeholder="..."
              aria-label="..."
              aria-describedby="basic-icon-default-need2"
              required
            >{{ $need }}</textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
@endsection