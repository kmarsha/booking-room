@extends('layouts.app', ['title' => 'List Ruangan', 'page' => 'room'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Pages</a>
    </li>
    <li class="breadcrumb-item active">List Ruangan</li>
  </ol>
</nav>
@endsection

@section('content')
  <div class="card">
    <h5 class="card-header">List Ruangan 
    @admin
      <a href="{{ route('room.create') }}"><button class="btn rounded-pill btn-primary float-end mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 26 26" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg> Ruangan</button></a> 
    @endadmin
    </h5>
    <div id="load-room"></div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      getRoom()
    })

    async function getRoom() {
      try {
        var sectionData = $('#load-room')
        url = "{{ route('view-room') }}"
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#room-table").DataTable({
          processing: true,
          order: [2, 'asc'],
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
        });
      } catch (error) {
          console.log(error)
      }
    }

    async function deleteRoom(id) {
      try {
        var url = `/admin/room/${id}`
        const response = await HitData(url, null, "DELETE");
        notif('success', response.message)
        getRoom()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }
  </script>
@endpush