<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Publikasi BPS Sulawesi Tengah</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="container py-5">

    <h2 class="mb-4">
        Daftar Publikasi BPS Provinsi Sulawesi Tengah
    </h2>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- FORM INPUT PUBLIKASI --}}
    <div class="card mb-5 shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Publikasi</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('publikasi.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Nomor</label>

                        <input
                            type="text"
                            name="nomor"
                            class="form-control"
                            value="{{ old('nomor') }}"
                            required
                        >
                    </div>

                    <div class="col-md-10 mb-3">
                        <label class="form-label">Judul</label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul') }}"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kategori</label>

                        <input
                            type="text"
                            name="kategori"
                            class="form-control"
                            value="{{ old('kategori') }}"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Ukuran File</label>

                        <input
                            type="text"
                            name="ukuran_file"
                            class="form-control"
                            placeholder="Contoh: 7.15 MB"
                            value="{{ old('ukuran_file') }}"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tanggal Rilis</label>

                        <input
                            type="date"
                            name="tanggal_rilis"
                            class="form-control"
                            value="{{ old('tanggal_rilis') }}"
                            required
                        >
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label">Link Download</label>

                        <input
                            type="text"
                            name="link_download"
                            class="form-control"
                            placeholder="https://..."
                            value="{{ old('link_download') }}"
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Sampul</label>

                        <input
                            type="text"
                            name="sampul"
                            class="form-control"
                            placeholder="contoh: bps1.jpg"
                            value="{{ old('sampul') }}"
                        >
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Publikasi
                </button>

            </form>

        </div>
    </div>


    {{-- TABEL PUBLIKASI --}}
    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Data Publikasi</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover align-middle">

                    <thead class="table-primary">

                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Ukuran File</th>
                            <th>Link Download</th>
                            <th>Tanggal Rilis</th>
                            <th>Sampul</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($publikasi as $item)

                            <tr>

                                <td>
                                    {{ $item->nomor }}
                                </td>

                                <td>
                                    {{ $item->judul }}
                                </td>

                                <td>
                                    {{ $item->kategori }}
                                </td>

                                <td>
                                    {{ $item->ukuran_file }}
                                </td>

                                <td>

                                    @if ($item->link_download)

                                        <a
                                            href="{{ $item->link_download }}"
                                            target="_blank"
                                            class="btn btn-sm btn-success"
                                        >
                                            Download
                                        </a>

                                    @else

                                        <span class="text-muted">
                                            Belum tersedia
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $item->tanggal_rilis }}
                                </td>

                                <td>

                                    @if ($item->sampul)

                                        <img
                                            src="{{ asset('images/' . $item->sampul) }}"
                                            alt="{{ $item->judul }}"
                                            width="80"
                                            class="img-thumbnail"
                                        >

                                    @else

                                        <span class="text-muted">
                                            Tidak ada
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    

                                    
          

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data publikasi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

</body>
</html>