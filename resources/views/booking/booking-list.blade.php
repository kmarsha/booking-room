@extends('layouts.app', ['title' => 'Booking List', 'page' => 'book'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pages</a>
    </li>
    <li class="breadcrumb-item active">List Data Booking</li>
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
    <h5 class="card-header">Booking List 
      @admin @else 
        <a href="{{ route('booking.create') }}"><button class="btn rounded-pill btn-primary float-end mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 26 26" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg> Booking List</button></a>
      @endadmin
    </h5>
    <div id="load-table"></div>
  </div>
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

    function openModal(id, room, action) {
      $('#title-modal').text('Konfirmasi Penyewaan')
      if (action == 'setuju') {
        var text = 'setujui'
      } else if (action == 'tolak') {
        var text = action
      } else if (action == 'batalkan') {
        var text = action
      }
      $('#text-modal').html(`Yakin <em>${text}</em> Penyewaan?`)
      $('#btn-modal').text(`${action}`)
      if (action == 'setuju') {
        var onclick = `approving(${id}, ${room})`
      } else if (action == 'tolak') {
        var onclick = `modalReject(${id}, ${room})`
      } else if (action == 'batalkan') {
        var onclick = `canceling(${id})`
      }
      $('#btn-modal').attr('onclick', onclick)
      $('#modalAction').modal('toggle')
    }

    async function approving(id, room) {
      try {
        var url = `/admin/booking/approved/${id}`
        data = {
          room_id: room
        }
        const response = await HitData(url, data, "GET");
        notif('success', response.message)
        $('#modalAction').modal('toggle')
        getList()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }

    function modalReject(id, room) {
      $('#title-modal').text('Penawaran Ubah Jadwal Penyewaan')
      $('#text-modal').html(`<div class="mb-3">
                        <label for="msg-input" class="form-label">Catatan Rescheduled</label>
                        <textarea class="form-control" name="message" id="msg-input" placeholder="Pesan..." required></textarea>
                      </div>`)
      $('#btn-modal').text('Kirim')
      $('#btn-modal').attr('onclick', `rejecting(${id}, ${room})`)
      $('#modalAction').modal('show')
    }

    async function rejecting(id, room) {
      try {
        var url = `/admin/booking/rejected/${id}`
        var msg = $('#msg-input').val()
        data = {
          message: msg,
          room_id: room,
        }
        const response = await HitData(url, data, "GET");
        notif('success', response.message)
        $('#modalAction').modal('toggle')
        getList()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }

    async function canceling(id) {
      try {
        var url = `/cancel-booking/${id}`
        const response = await HitData(url, null, "GET");
        notif('success', response.message)
        $('#modalAction').modal('toggle')
        getList()
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }
  </script>
@endpush