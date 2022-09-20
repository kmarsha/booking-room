<div class="table-responsive text-nowrap px-4 py-3">
  <table class="table" id="list-table">
    <thead class="table-light">
      <tr>
        <th>No</th>
        @admin <th>Pemesan</th> @endadmin
        <th class="text-center">Ruangan</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Keperluan</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($lists as $list)
          <tr>
            <td>{{ $loop->iteration }}</td>
            @admin
            <td>
              <div class="text-primary me-3">
                {{ $list->user->name }}
              </div> 
            </td>
            @endadmin
            <td class="text-center">
              @if(isset($list->room->photo)) <img src="{{ asset($list->room->photo) }}" style="object-fit: cover;" height="125" alt="Photo Ruangan {{ $list->room->name }}"> @else - @endif
              <br> <small class="text-muted mt-2 me-3">{{ $list->room->name }}</small>
            </td>
            <td>
              <div class="me-3 text-wrap">
                {{ $list->date->isoformat('dddd, D MMM Y') }}
              </div> 
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
            @admin 
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                @if($list->status == 'pending')
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" onclick="openModal('{{ $list->id }}', '{{ $list->room_id }}', 'setuju')"
                    ><i class="bx bx-check me-1"></i> Setujui</a
                  >
                  <a class="dropdown-item" href="#" onclick="openModal('{{ $list->id }}', '{{ $list->room_id }}', 'tolak')"> <i class="bx bx-x me-1"></i> Tolak</a>
                </div>
                @endif
              </div>
            </td>
            @else
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                @if($list->status == 'pending')
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('booking.edit', $list->id) }}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                  </div>
                @elseif($list->status == 'approved')
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" onclick="openModal('{{ $list->id }}', '{{ $list->room_id }}', 'batalkan')"
                      ><i class="bx bx-edit-alt me-1"></i> Batalkan</a
                    >
                  </div>
                @endif
              </div>
            </td>
            @endadmin
          </tr>
      @endforeach
    </tbody>
  </table>
</div>