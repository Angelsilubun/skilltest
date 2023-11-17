@extends('layouts.main')

@section('title', 'CRUD PELANGGAN')

@section('container')

    <div class="card border-0 shadow-sm rounded">
        @if (session('success'))
            <script>
                showSuccessToast("{{ session('success') }}");
            </script>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('gagal'))
            <script>
                showErrorToast("{{ session('gagal') }}");
            </script>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('gagal') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        <script>
                            showErrorToast("{{ $error }}");
                        </script>
                    @endforeach

                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pelanggan as $pelanggan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pelanggan->name }}</td>
                                <td><img src="{{ Storage::url($pelanggan->image) }}" alt="{{ $pelanggan->id }}"
                                        width="50" class="rounded"></td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>{{ $pelanggan->telepon }}</td>
                                <td>{!! $pelanggan->alamat !!}</td>
                                <td>{{ $pelanggan->jenis_kelamin }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        {{-- <button onclick="editPelanggan({{ $pelanggan->id }})"
                                            class="btn text-light me-md-2" type="button" style="background-color: #009999"
                                            data-bs-toggle="modal" data-bs-target="#editPelanggan">Edit</button> --}}
                                        <button class="edit-btn" data-id="{{ $pelanggan->id }}">Edit</button>

                                        <button class="btn btn-danger" type="button">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- @include('crud.edit') --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" action="{{ route('crud.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="id"
                                    value="{{ old('name') }}" placeholder="Masukan Nama" required>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') }}" placeholder="Masukan Email" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="telepon" name="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    value="{{ old('telepon') }}" placeholder="Masukan No Telepon" required>
                            </div>
                            @error('telepon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" aria-label="Default select example"
                                    id="jenis_kelamin">
                                    <option selected>- Pilih Jenis Kelamin -</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                </select>
                            </div>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="editor" rows="3"
                                    placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Upload Foto</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Tambahkan formulir edit di dalam modal -->
                        <form id="editForm">
                            @csrf
                            @method('PUT')
                            <input type="text" id="editUserId" name="id">

                            <label for="editName">Name:</label>
                            <input type="text" id="editName" name="name">

                            <label for="editEmail">Email:</label>
                            <input type="email" id="editEmail" name="email">
                            <!-- Tambahkan input fields lainnya -->

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="editPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('crud.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body" id="modal-content-edit">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>

@endsection

@section('js')

    {{-- <script type="text/javascript">
        function editPelanggan(id) {
            $.ajax({
                url: "{{ url('crud') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#modal-content-edit').html(data);
                    return true;
                },
            });
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            // Tangkap event klik tombol edit
            $('.edit-btn').click(function() {
                var userId = $(this).data('id');

                // Muat data user melalui AJAX
                $.ajax({
                    type: 'GET',
                    url: '/crud/' + userId + '/edit',
                    success: function(data) {
                        // Isi formulir edit dengan data user
                        $('#editUserId').val(data.id);
                        $('#editName').val(data.name);
                        $('#editEmail').val(data.email);
                        // Isi input fields lainnya

                        // Tampilkan modal edit
                        $('#editModal').modal('show');
                    },
                    error: function(error) {
                        console.log('Failed to load user data');
                        // Tampilkan pesan error atau lakukan tindakan lain yang diinginkan
                    }
                });
            });

            // Tangkap event submit form menggunakan AJAX
            $('#editForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'PUT',
                    url: '/users/' + $('#editUserId').val(),
                    data: formData,
                    success: function(data) {
                        console.log('Update successful');
                        // Tutup modal setelah pembaruan berhasil
                        $('#editModal').modal('hide');
                    },
                    error: function(error) {
                        console.log('Update failed');
                        // Tampilkan pesan error atau lakukan tindakan lain yang diinginkan
                    }
                });
            });
        });
    </script>

    <script>
        function showSuccessToast(message) {
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'success',
                    background: '#4caf50',
                    icon: {
                        className: 'bi bi-check',
                        tagName: 'i',
                        color: '#ffffff'
                    },
                    dismissible: true,
                    duration: 3000,
                    ripple: true
                }]
            });
            notyf.success(message);
        }

        function showErrorToast(message) {
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'error',
                    background: '#f44336',
                    icon: {
                        className: 'bi bi-x',
                        tagName: 'i',
                        color: '#ffffff'
                    },
                    dismissible: true,
                    duration: 3000,
                    ripple: true
                }]
            });
            notyf.error(message);
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.alert-success')) {
                const successMessage = document.querySelector('.alert-success strong').textContent;
                showSuccessToast(successMessage);
            }

            if (document.querySelector('.alert-danger')) {
                const errorMessage = document.querySelector('.alert-danger strong').textContent;
                showErrorToast(errorMessage);
            }
        });
    </script>


    {{-- <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "lengthMenu": [5, 10, 25, 50] // Menampilkan opsi untuk menampilkan 5, 10, 25, atau 50 data
            });
        });
    </script> --}}
@endsection
