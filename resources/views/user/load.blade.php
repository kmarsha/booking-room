<div class="table-responsive text-nowrap px-4 py-3">
  <table class="table" id="user-table">
    <thead class="table-light">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <div class="text-primary me-3">
                {{ $user->name }}
              </div> 
            </td>
            <td>
              <div class="me-3">
                {{ $user->username }}
              </div> 
            </td>
            <td>
              <div class="me-3">
                {{ $user->email }}
              </div> 
            </td>
            <td>
              <div class="text-info me-3">
                {{ $user->pass }}
              </div> 
            </td>
            <td class="text-wrap text-muted">{{ (isset($user->description)) ? $user->description : '-' }}</td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="#" onclick="openModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->username }}')"> <i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>