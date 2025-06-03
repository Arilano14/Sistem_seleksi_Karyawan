<!-- resources/views/dashboard/penilaian/partials/tabel_kriteria.blade.php -->

<table class="table table-bordered">
    <thead>
        <tr>
            <th>KRITERIA</th>
            @foreach ($kriteria as $k)
                <th>{{ strtoupper($k->nama) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($kriteria as $row)
            <tr>
                <td>
                    {{ strtoupper($row->nama) }}
                    <a href="#" class="text-warning"><i class="fas fa-pen"></i></a>
                </td>
                @foreach ($kriteria as $col)
                    <td>
                        {{ number_format($matriks[$row->id][$col->id] ?? 0, 2) }}
                    </td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <td><strong>Jumlah</strong></td>
            @foreach ($totalKolom as $total)
                <td><strong>{{ number_format($total, 2) }}</strong></td>
            @endforeach
        </tr>
    </tbody>
</table>
