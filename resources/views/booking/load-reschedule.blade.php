<div class="table-responsive text-nowrap px-4 py-3">
  <table class="table" id="reschedule-table">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th class="text-center">Ruangan</th>
        <th>Waktu</th>
        <th>Pesan</th>
        <th>Ubah Jadwal</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($reschedules as $reschedule)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <div class="text-primary me-3">
                {{ $reschedule->room->name }}
              </div> 
            </td>
            <td>
              <div class="me-3 text-wrap">
                {{ $reschedule->bookingList->date->format('Y-m-d') }}
                <br>
                {{ $reschedule->bookingList->start->format('H:m A') }} - 
                {{ $reschedule->bookingList->end->format('H:m A') }}
              </div> 
            </td>
            <td class="text-wrap">
              {{ $reschedule->message }}
            </td>
            <td class="text-center">
              @switch($reschedule->reschedule)
                @case('yes')
                  @php $badge = 'success' @endphp
                  @break
                @case('no')
                  @php $badge = 'danger' @endphp
                  @break
              
                @default
                  @php $badge = 'secondary' @endphp
                  @break
                  
              @endswitch
              <span class="badge bg-label-{{ $badge }} me-1">{{ (isset($reschedule->reschedule)) ? (($reschedule->reschedule == 'yes') ? 'Ya' : 'Tidak') : '-' }}</span>
            </td>
            <td>
              <span class="badge bg-label-{{ ($reschedule->bookingList->status == 'rejected') ? 'danger' : 'info' }} me-1">{{ $reschedule->bookingList->status }}</span>
            </td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                @if($reschedule->reschedule == null)
                  @if($reschedule->bookingList->status == 'rejected')
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#" onclick="openModal('{{ $reschedule->id }}', '{{ $reschedule->message }}', '{{ $reschedule->bookingList->id }}')"
                        ><i class="bx bx-check me-1"></i> Konfirmasi</a
                      >
                    </div>
                  @endif
                @endif
              </div>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>