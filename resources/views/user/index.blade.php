@extends('layouts.app', ['title' => 'Manajemen User', 'page' => 'user'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Pages</a>
    </li>
    <li class="breadcrumb-item active">Manajemen User</li>
  </ol>
</nav>
@endsection


@section('content')
  <div class="card">
    <h5 class="card-header">List User <a href="{{ route('user.create') }}"><button class="btn rounded-pill btn-primary float-end mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 26 26" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg> User</button></a></h5>
    <div id="load-user"></div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      getUser()
    })

    async function getUser() {
      try {
        var sectionData = $('#load-user')
        url = "{{ route('user.index') }}"
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#user-table").DataTable({
          processing: true,
          order: [1, 'asc'],
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
        });
      } catch (error) {
          console.log(error)
      }
    }

    async function deleteUser(id) {
      try {
        var url = `/admin/user/${id}`
        const response = await HitData(url, null, "DELETE");
        notif('success', response.message)
        getUser()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }
  </script>
@endpush