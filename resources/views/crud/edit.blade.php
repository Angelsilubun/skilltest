{{-- <input type="hidden" name="id" value="{{ $edit->id }}">

<div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="id"
        value="{{ old('name', $edit->name) }}" placeholder="Masukan Nama" required>

    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
            value="{{ old('email', $edit->email) }}" placeholder="Masukan Email" required>
    </div>
    @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-3">
        <label class="form-label">No Telepon</label>
        <input type="telepon" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
            value="{{ old('telepon', $edit->telepon) }}" placeholder="Masukan No Telepon" required>
    </div>
    @error('telepon')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-3">
        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" aria-label="Default select example" id="jenis_kelamin">
            <option selected>- Pilih Jenis Kelamin -</option>
            <option value="Perempuan" {{ $edit->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            <option value="Laki-laki" {{ $edit->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        </select>
    </div>
    @error('jenis_kelamin')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
            id="editor-edit-{{ $edit->id }}" rows="3" placeholder="Masukan Alamat">{!! old('alamat', $edit->alamat) !!}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <div class="col-md-12">

        <label class="form-label">Upload Gambar</label><br>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

        @error('image')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-2">
            @if ($edit->image)
                <img src="{{ Storage::url($edit->image) }}" alt="{{ $edit->id }}" style="max-width: 25%;">
            @else
                <p>No image available</p>
            @endif
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor-edit-{{ $edit->id }}'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}