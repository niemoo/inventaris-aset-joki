<html>

<head>
    <title>Laporan Barang Keluar</title>
</head>

<body>
    <div align="center">
        {{-- <img src="{{ asset('assets/images/logo.png') }}" width="10%"> --}}

        <h3>Laporan Data Inventaris Barang</h3>
        <h3>Peternakan Sejahtera</h3>
        <hr>
        <br>
    </div>
    <table width="90%" border="0" align="center">
        <tr>
            <td>
                <h4>&nbsp;Hasil Laporan Data Inventaris Barang Keluar Tanggal {{ indonesian_date_format($start_date) }}
                    -
                    {{ indonesian_date_format($end_date) }}</h4>
            </td>
        </tr>
    </table>

    <table width="90%" border="1" align="center">
        <tbody>
            <tr>
                <td align="center">No</td>
                <td align="center">Nama Barang</td>
                <td align="center">Jenis Barang</td>
                <td align="center">Tempat</td>
                <td align="center">Jumlah</td>
                <td align="center">Kondisi</td>
                <td align="center">Tanggal Barang Keluar</td>
                <td align="center">Tanggal Update</td>
                <td align="center">User</td>
            </tr>
            @foreach ($commodities as $key => $commodityOut)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $commodityOut->commodity->name ?? '-' }}</td>
                    <td>{{ $commodityOut->commodity->commodity_categories->name ?? '-' }}</td>
                    <td>{{ $commodityOut->commodity->commodity_locations->name ?? '-' }}</td>
                    <td>{{ $commodityOut->amount }}</td>
                    <td>{{ $commodityOut->commodity->condition ?? '-' }}</td>
                    <td>{{ indonesian_date_format($commodityOut->commodity->register_date ?? $commodityOut->date_out) }}
                    </td>
                    <td>{{ indonesian_date_format($commodityOut->commodity->update_date ?? $commodityOut->updated_at) }}
                    </td>
                    <td>{{ $commodityOut->users->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table width="90%" border="0" align="center">
        <tbody>
            <tr>
                <td width="20%">Mengetahui</td>
                <td width="60%">&nbsp;</td>
                <td width="20%">Wonosobo, {{ indonesian_date_format(now()) }}</td>
            </tr>
            <tr>
                <td>Pemilik</td>
                <td>&nbsp;</td>
                <td>Pengguna</td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td>&nbsp;</td>
                <td>{{ auth()->user()->name }}</td>
            </tr>
        </tbody>
    </table>


</body>

</html>
