@extends('layouts.app', ['title' => 'Manajemen User', 'page' => 'user'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pages</a>
    </li>
    <li class="breadcrumb-item active">Manajemen User</li>
  </ol>
</nav>
@endsection

@section('modal')
    <!-- Small Modal -->
    <div class="modal fade" id="modalAction" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-capitalize" id="title-modal">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div id="text-modal"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-primary text-capitalize" id="btn-modal">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
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

    function openModal(user_id, name, username) {
      $('#title-modal').text('Delete Modal')
      $('#text-modal').html(`<div class="text-capitalize">
                              <br>
                              <div class="mt-2">
                                Yakin Hapus Data User ${name} <span class="text-lowercase">[${username}]</span>?
                              </div>
                              </div>`)
      $('#btn-modal').text('Ya')
      $('#btn-modal').attr('onclick', `deleteUser(${user_id})`)
      $('#modalAction').modal('show')
    }

    async function deleteUser(id) {
      try {
        var url = `/admin/user/${id}`
        const response = await HitData(url, null, "DELETE");
        if (response.message) {
          notif('success', response.message)
        } else if (response.includes('Integrity constraint violation')) {
          notif('error', "Tidak bisa hapus User \n User sudah pernah memesan ruangan")
        } 
        console.log(response)
        $('#modalAction').modal('toggle')
        getUser()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }
  </script>
@endpush