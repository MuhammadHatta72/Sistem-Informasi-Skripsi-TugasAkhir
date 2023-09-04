@php
    use Carbon\Carbon;
@endphp

    <!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_polinema.png') }}">
    <title>Unduh Laporan Peminjaman - SIMSARPRAS</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/stylepdf.css') }}"> --}}
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin-right: 1cm;
            margin-left: 1cm;
            margin-bottom: 0.5cm;
        }

        .judul {
            font-size: 14;
            /* font-weight: bold; */
        }

        .logo {
            float: left;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
        }

        .logo2 {
            float: right;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
        }

        .isi {
            text-align: justify;
        }

        .hmj {
            text-transform: uppercase;
            font-weight: bold;
        }

        .alamat, .surat {
            font-size: 12;
        }

        .tanggal {
            text-align: right;
        }

        h3 {
            text-align: center;
        }
        .ttd {
            /* display: inline; */
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .kanan {
            position: fixed;
            margin-left: 9.5cm;
        }
        .table th, .table td {
            border: 1px solid black;
            font-size: 10pt;
            text-align: justify;
            padding: 1mm 1mm 1mm 1mm;
        }
        .table th {
            background-color: #f2f2f2;
        }
        table .tgl{
            text-align: center;
        }
        .kiri {
            position: fixed;
        }

        .namakiri {
            position: fixed;
            margin-top: 3.2cm;
        }

        .namakanan {
            position: fixed;
            margin-top: 2.65cm;
            margin-left: 9.5cm;
        }

        .text-center {
            margin-top: 2.5cm;
            text-align: center;
        }
        .gambar{
            margin-right: 190px;
        }
        .gambar2{
            float: left;
        }

    </style>
    <title>Document</title>
</head>

<body>

<header>
    <div style="text-align: center;">
        <img src="assets/img/logo_polinema.png" width="100" height="100" alt="logo" class="d-inline logo">
        <img src="assets/img/logo_iso.png" width="80" height="100" alt="logo" class="d-inline logo2">
        <div class="judul">
            KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>
            RISET, DAN TEKNOLOGI <br>
            POLITEKNIK NEGERI MALANG <br>
            <span class="hmj">{{ auth()->user()->wewenang->name}}</span><br>
        </div>
        <div class="alamat">
            Jalan Soekarno Hatta No.9 Malang 65141<br>
            Telepon (0341) 404424 – 404425 Fax (0341) 404420<br>
            https://www.polinema.ac.id
        </div>
    </div>
    <hr>
</header>
<section class="surat">
    <div class="header">
        <div class="tanggal">
            Malang, @php
                $created_at = \Carbon\Carbon::now()->locale('id')->isoFormat('dddd D MMMM Y');
                echo $created_at;
            @endphp
        </div>

        <div class="lampiran">
            @php
                $created_id = \Carbon\Carbon::now()->locale('id')->isoFormat('Y');
                    function generateInitials($name)
{
    $initials = '';
    $words = strtok($name, ' ');

    while ($words !== false) {
        $initials .= strtoupper(substr($words, 0, 1));
        $words = strtok(' ');
    }

    return $initials;
}

$initials = generateInitials(auth()->user()->wewenang->name);

                        function romanNumerals($number)
        {
        $romans = array(
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII'
        );
        $result = '';
        while ($number > 0) {
        $maxValue = 0;
        foreach ($romans as $key => $value) {
            if ($number >= $key && $key > $maxValue) {
                $maxValue = $key;
            }
        }
        $result .= $romans[$maxValue];
        $number -= $maxValue;
    }
    return $result;
        }
        $currentMonth = date('m');
        $romanMonth = romanNumerals($currentMonth);
        $month = date('m');
        $romanMonth = romanNumerals($month);
            @endphp
            Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{auth()->user()->wewenang->id}}/{{ $romanMonth }}/{{$created_id}}/{{$initials}}<br>
            Lampiran &nbsp;&nbsp;&nbsp;: 1 (satu) Lembar <br>
            Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Pelaporan <br>
        </div>
    </div>

    <div class="isi">
            <h3>Laporan Pemanfaatan Sarana Prasarana {{auth()->user()->wewenang->name}}
                <br> {{ $startDateFormatted }} - {{ $endDateFormatted }}</h3>

            <table class="table table-bordered">
                <tr>
                    <th>Peminjam</th>
                    <th>Kegiatan</th>
                    <th>Penanggung Jawab</th>
                    <th>NIM</th>
                    <th>Ruangan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Berakhir</th>
                </tr>
                @forelse($peminjamanPdf as $object)
                    <tr>
                        <td>{{ $object->user->name }}</td>
                        <td>{{ $object->kegiatan }}</td>
                        <td>{{ $object->penanggung_jawab }}</td>
                        <td>{{ $object->nim }}</td>
                        <td>{{ $object->saranaPrasarana->nama }}</td>
                        <td class="tgl">{{ \Carbon\Carbon::parse($object->tanggal_mulai)->locale('id')->isoformat('D MMMM Y') }}</td>
                        <td class="tgl">{{ \Carbon\Carbon::parse($object->tanggal_selesai)->locale('id')->isoformat('D MMMM Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
            </table>
        </div>
    <br>
    <br>
    <div class="ttd1">
        <div class="kanan">Hormat kami,</div>
        <div class="kiri">Mengetahui,</div>
        <br>
        <div class="kiri">{{ auth()->user()->wewenang->jabatan }},</div>
        <div class="kanan">{{ auth()->user()->name }},</div>
        <div class="gambar">
            <img src="storage/<?= auth()->user()->ttd_pj; ?>>" width="80" height="100" alt="logo" class="d-inline logo2">
        </div>
        <div class="namakiri">{{ auth()->user()->wewenang->pj }}</div>
        <div class="gambar2">
            <img src="storage/<?= auth()->user()->wewenang->ttd; ?>>" width="80" height="100" alt="logo" class="d-inline logo2">
        </div>
        <br>
        <div class="namakiri">NIP. {{ auth()->user()->ninduk_pj }}</div>
        <div class="namakanan">{{ auth()->user()->nama_pj }}</div>
        <br>
        <div class="namakanan">{{ auth()->user()->wewenang->nip }}</div>
    </div>

</section>
</body>

</html>
