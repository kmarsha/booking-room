<div class="table-responsive text-nowrap px-4 py-3">
  <table class="table" id="room-table">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th class="text-center">Foto</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Kapasitas</th>
        <th>Status</th>
        @admin <th>Actions</th> @endadmin
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($rooms as $room)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-center">
              @if(isset($room->photo)) <img src="{{ asset($room->photo) }}" style="object-fit: cover;" height="125" alt="Photo Ruangan {{ $room->name }}"> @else - @endif
            </td>
            <td>
              <div class="text-primary me-3">
                {{ $room->name }}
              </div> 
            </td>
            <td class="text-wrap">{{ $room->description }}</td>
            <td> {{ $room->capacity }} </td>
            <td> 
              @if ($room->status == 'able') <span class="badge bg-label-info me-1">Useable</span> 
              @elseif ($room->status == 'disable') <span class="badge bg-label-secondary me-1">Disable</span> 
              @endif 
            </td>
            
            @admin
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('room.edit', $room->id) }}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="#" onclick="openModal('{{ $room->id }}', '{{ $room->name }}')"> <i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            @endadmin
          </tr>
      @endforeach
    </tbody>
  </table>
</div>