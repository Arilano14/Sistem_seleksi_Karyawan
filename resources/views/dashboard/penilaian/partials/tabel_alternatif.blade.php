<table class="table">
    <thead>
        <tr>
            <th>Alternatif</th>
            @isset($kriteria)
                @foreach ($kriteria as $k)
                    <th>{{ $k->nama }}</th>
                @endforeach
            @endisset
        </tr>
    </thead>
    <tbody>
        @isset($alternatif)
            @foreach ($alternatif as $alt)
                <tr>
                    <td>{{ $alt->nama }}</td>
                    @foreach ($kriteria as $k)
                        <td>{{ $nilaiAlternatif[$alt->id][$k->id] ?? '-' }}</td>
                    @endforeach
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="{{ isset($kriteria) ? count($kriteria) + 1 : 1 }}">Data alternatif tidak tersedia.</td>
            </tr>
        @endisset
    </tbody>
</table>
