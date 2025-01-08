<a href="{{ url('/admin/users/' . $user->user_id) }}" class="btn btn-info btn-sm">Detail</a>
<a href="{{ url('/admin/users/' . $user->user_id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
<form class="d-inline-block" method="POST" action="{{ url('/admin/users/'.$user->user_id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">Hapus</button>
</form>