@extends('dashboard.layouts.app')

@section('container')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ $judul }}
        </h2>
    </div>

    <div class="px-4 lg:px-12">
        {{-- Action Buttons --}}
        <div class="flex justify-start items-center mb-5 space-x-3">
            <form action="{{ route('penilaian.hitung') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-primary text-white bg-purple-600 hover:bg-purple-700 dark:bg-purple-300 dark:hover:bg-purple-400">
                    <i class="ri-add-fill"></i> Hitung AHP Alternatif
                </button>
            </form>
            <form action="{{ route('penilaian.pdf_ahp') }}" method="POST" enctype="multipart/form-data" target="_blank">
                @csrf
                <button type="submit" class="btn text-white bg-rose-600 hover:bg-rose-700 dark:bg-rose-300 dark:hover:bg-rose-400">
                    <i class="ri-file-pdf-line"></i> Export PDF
                </button>
            </form>
        </div>

        {{-- Section: Penilaian Alternatif --}}
        @include('dashboard.penilaian.partials.tabel_alternatif', ['data' => $data, 'kriteria' => $kriteria])

        {{-- Section: Matriks Penilaian Alternatif terhadap Kriteria --}}
<div class="overflow-x-auto mt-8">
    <h4 class="mb-2 font-semibold text-gray-600 dark:text-gray-300">Matriks Penilaian Alternatif terhadap Kriteria</h4>
    <table class="table-auto w-full whitespace-no-wrap" id="tabel_matriks_penilaian">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th class="px-4 py-3">Alternatif</th>
                @foreach ($kriteria as $k)
                    <th class="px-4 py-3">{{ $k->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($alternatif as $alt)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm font-semibold">{{ $alt->nama }}</td>
                    @foreach ($kriteria as $k)
                        <td class="px-4 py-3 text-sm">
                            {{ $nilaiAlternatif[$alt->id][$k->id] ?? '-' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


        {{-- Section: Prioritas Kriteria --}}
        @include('dashboard.penilaian.partials.tabel_kriteria', ['matriksNilaiKriteria' => $matriksNilaiKriteria])

        {{-- Section: Prioritas Sub Kriteria --}}
        @include('dashboard.penilaian.partials.tabel_sub_kriteria', ['kriteria' => $kriteria, 'kategori' => $kategori, 'matriksNilaiSubKriteria' => $matriksNilaiSubKriteria])

        {{-- Section: Hasil AHP --}}
        @include('dashboard.penilaian.partials.tabel_hasil', ['hasil' => $hasil])
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        ['tabel_data_alternatif', 'tabel_data_kriteria', 'tabel_data_sub_kriteria', 'tabel_data_hasil'].forEach(function (id) {
            $('#' + id).DataTable({
                scrollX: true,
                order: []
            }).columns.adjust().responsive?.recalc();
        });
    });

    @if (session()->has('berhasil'))
        Swal.fire({
            title: 'Berhasil',
            html: `{!! session('berhasil')[0] !!} 
                @if (session('berhasil')[1] != 0)
                    <div class='divider'></div>
                    <b>Alternatif: {{ session('berhasil')[1] }}</b>
                @endif`,
            icon: 'success',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK',
        });
    @endif

    @if (session()->has('gagal'))
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('gagal') }}',
            icon: 'error',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK',
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            title: 'Gagal',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            icon: 'error',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK',
        });
    @endif
</script>
@endsection
