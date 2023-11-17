<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/notyf/notyf.min.css') }}">
    <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/tagify/dist/tagify.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}" />

</head>

<body>
    <div class="container mt-5">
        @include('layouts.navbar')
        <div class="row">
            <div class="col-md-12">
                @yield('container')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/notyf/notyf.min.js') }}" type="application/javascript"></script>
    <script src="{{ asset('assets/tagify/dist/tagify.min.js') }}"></script>
    {{-- <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>

    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>

    <!-- Memuat jQuery dari CDN -->
    <script src="{{ url('https://code.jquery.com/jquery-3.6.4.min.js') }}"></script>

    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    
    @yield('js')
</body>

</html>
