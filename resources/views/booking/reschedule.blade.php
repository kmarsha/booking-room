@extends('layouts.app', ['title' => 'Reschedule List', 'page' => 'reschedule'])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pages</a>
    </li>
    <li class="breadcrumb-item active">Reschedule List</li>
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
    <h5 class="card-header">Reschedule List </h5>
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
        url = "{{ route('reschedule-view') }}"
        const response = await HitData(url, null, "GET");
        sectionData.html(response)
        
        $("#reschedule-table").DataTable({
          processing: true,
          order: [0, 'asc'],
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
        });
      } catch (error) {
          console.log(error)
      }
    }

    function openModal(id, msg, booking_id) {
      $('#title-modal').text('Konfirmasi Ubah Jadwal Penyewaan')
      $('#text-modal').html(`<div class="text-capitalize">
                              ${msg}
                              <br>
                              <div class="mt-2">
                                <div class="form-check form-check-inline">
                                  <input name="reschedule" class="form-check-input reschedule-input" type="radio" value="yes" id="defaultRadio1">
                                  <label class="form-check-label" for="defaultRadio1"> Ya </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input name="reschedule" class="form-check-input reschedule-input" type="radio" value="no" id="defaultRadio2">
                                  <label class="form-check-label" for="defaultRadio2"> Tidak </label>
                                </div>
                              </div>
                              </div>`)
      $('#btn-modal').text('Konfirmasi')
      $('#btn-modal').attr('onclick', `confirm(${id}, ${booking_id})`)
      $('#modalAction').modal('show')
    }
    
    async function confirm(id, booking_id) {
      try {
        var url = `/rescheduling/${id}`
        var reschedule = $('input[name=reschedule]:checked').val()
        data = {
          reschedule: reschedule,
          booking_id: booking_id,
        }
        console.log(booking_id)
        const response = await HitData(url, data, "GET");
        notif('success', response.message)
        $('#modalAction').modal('toggle')
        getList()
        if (reschedule == 'yes') {
          location.href = response.url
        }
      } catch (error) {
        console.log(error)
        notif('error', error)
      }
    }
  </script>
@endpush