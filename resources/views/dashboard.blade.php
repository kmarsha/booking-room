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
  @admin 
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-primary mb-4">Statistik Booking</h4>
          <div class="row">
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Pending</span>
              <h3 class="card-title mb-3">{{ $pending }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Disetujui</span>
              <h3 class="card-title mb-3">{{ $approved }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Ditolak</span>
              <h3 class="card-title mb-3">{{ $rejected }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Digunakan</span>
              <h3 class="card-title mb-3">{{ $used }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Dibatalkan</span>
              <h3 class="card-title mb-3">{{ $canceled }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Selesai</span>
              <h3 class="card-title mb-3">{{ $done }}</h3>
            </div>
            <div class="col-4 text-center">
              <span class="fw-semibold d-block mb-1 text-capitalize">Expired</span>
              <h3 class="card-title mb-3">{{ $expired }}</h3>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card mt-4">
        <div class="card-body">
          <div class="card-title d-flex align-items-start">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('/') }}assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
            </div>
            
            <div class="mx-4">
              <a href="{{ route('admin-booking-list') }}">
                <span class="fw-semibold d-block mb-1">Total Permintaan Booking</span>
                <h3 class="card-title mb-2">{{ $total }}</h3>
              </a>
            </div>
          </div>
          {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <a href="{{ route('room.index') }}">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class='bx bx-buildings'></i>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Ruangan</span>
            <h3 class="card-title text-center mb-2">{{ $room }}</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-2">
      <a href="{{ route('user.index') }}">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <i class='bx bx-group'></i>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total User</span>
            <h3 class="card-title text-center mb-2">{{ $user }}</h3>
          </div>
        </div>
      </a>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <div class="m-5">
              <i class='bx bx-time' style="font-size: 2.5rem"></i>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h6>Bookingan Hari Ini</h6>
              <h3 class="card-title">
                {{ $today }}
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <div class="m-5">
              <i class='bx bx-list-ul' style="font-size: 2.5rem"></i>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h6>Total Semua Bookingan</h6>
              <h3 class="card-title">
                {{ $myList }}
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <h5 class="card-header">Data Bookingan Hari Ini</h5>
    <div class="table-responsive text-nowrap">
      <table class="table" id="list-table">
        <thead>
          <tr>
            <th>Ruangan</th>
            <th>Waktu</th>
            <th>Keperluan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($today_lists as $list)
          <tr>
            <td class="text-center">
              @if(isset($list->room->photo)) <img src="{{ asset($list->room->photo) }}" style="object-fit: cover;" height="125" alt="Photo Ruangan {{ $list->room->name }}"> @else - @endif
              <br> <small class="text-muted mt-2 me-3">{{ $list->room->name }}</small>
            </td>
            <td>
              <small class="me-3 text- text-wrap">
                {{ $list->start->format('h:i A') }} - {{ $list->end->format('h:i A') }}
              </small> 
            </td>
            <td class="text-wrap">{{ $list->need }}</td>
            <td>
              @switch($list->status)
                @case('pending')
                  @php $badge = 'info' @endphp
                  @break
                @case('approved')
                  @php $badge = 'success' @endphp
                  @break
                @case('rejected')
                  @php $badge = 'danger' @endphp
                  @break
                @case('used')
                  @php $badge = 'warning' @endphp
                  @break
                @case('canceled')
                  @php $badge = 'dark' @endphp
                  @break
                @case('done')
                  @php $badge = 'primary' @endphp
                  @break
                @case('expired')
                  @php $badge = 'secondary' @endphp
                  @break
              
                @default
                  
              @endswitch
              <span class="badge bg-label-{{ $badge }} me-1">{{ $list->status }}</span>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot class="table-border-bottom-0">
          <tr>
            <th>Ruangan</th>
            <th>Waktu</th>
            <th>Keperluan</th>
            <th>Status</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  @endadmin
@endsection

@push('js')
  <script>
    
    $(function() {
      getList()
    })

    async function getList() {
      try {
        var sectionData = $('#load-table')
        role = "{{ Auth::user()->role }}"
        url = (role == 'admin' ? "{{ route('admin-booking-list') }}" : "{{ route('book-list') }}") 
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#list-table").DataTable({
          processing: true,
          order: [0, 'asc'],
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
        });
      } catch (error) {
          console.log(error)
      }
    }

  </script>
@endpush