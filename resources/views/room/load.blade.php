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
        <th>Actions</th>
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
            <td><span class="badge bg-label-primary me-1">{{ $room->status }}</span></td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('room.edit', $room->id) }}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="#" onclick="return (confirm('Yakin Hapus Data Ruangan {{ $room->name }}')) ? deleteRoom({{ $room->id }}) : '' "> <i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>