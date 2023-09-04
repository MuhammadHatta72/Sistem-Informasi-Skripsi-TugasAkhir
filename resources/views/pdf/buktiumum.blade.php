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
    <title>Unduh Bukti Peminjaman - SIMSARPRAS</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/stylepdf.css') }}"> --}}
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin-right: 1.5cm;
            margin-left: 1.5cm;
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

        .tempat, .waktuKegiatan {
            margin-left: 32px;
        }

        .ttd {
            /* display: inline; */
        }

        .kanan {
            position: fixed;
            margin-left: 9.5cm;
        }

        .kiri {
            position: fixed;
        }

        .namakiri {
            position: fixed;
            margin-top: 120px;
        }

        .namakanan {
            position: fixed;
            margin-top: 2.5cm;
            margin-left: 9.5cm;
        }

        .text-center {
            margin-top: 3.5cm;
            text-align: center;
        }

        .ttd2 {
            margin-top: 0.5cm;
        }

        .nama {
            margin-top: 3.2cm;
        }
        .gambar{
            margin-right: 140px;
            /*position: fixed;*/
        }
        .gambar2{
            float: left;
        }


    </style>
    <title>Document</title>
</head>

<body>
@foreach ($peminjamanPdf as $object)
    @foreach($peminjamanPdf2 as $object2)

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
                    Malang, @php $created_at = Carbon::parse($object->created_at)->locale('id')->isoFormat('dddd D MMMM Y');
                        echo $created_at;
                    @endphp
                </div>
                <div class="lampiran">
                    @php
                        $created_id = Carbon::parse($object->created_at)->locale('id')->isoFormat('Y');
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

        $initials = generateInitials($object->wewenang->name);

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
                foreach ($romans as $key => $value) {
                    if ($number >= $key) {
                        $result .= $value;
                        $number -= $key;
                    }
                }
                return $result;
            }
            $currentMonth = date('m');
            $romanMonth = romanNumerals($currentMonth);
                                $id = $object->id;
                                $databaseDate = $object->tanggal;
                                $month = date('m', strtotime($databaseDate));
                                $romanMonth = romanNumerals($month);
                    @endphp
                    Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $id }}/{{ $romanMonth }}/{{$created_id}}/{{$initials}}<br>
                    Lampiran &nbsp;&nbsp;&nbsp;: 1 (satu) Lembar <br>
                    Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Peminjaman Gedung <br>
                </div>
                <br>
                <div class="penerima">
                    Yth. {{ str_replace('Sekretaris', 'Ketua', $object->wewenang->jabatan) }}<br>
                    <div class="tempat">
                        Politeknik Negeri Malang <br>
                        Malang
                    </div>
                </div>
            </div>

            <div class="isi">
                <p>Dengan Hormat,</p>
                <p>Sehubungan dengan adanya kegiatan
                    {{ $object->kegiatan }},
                    kami mohon bantuan peminjaman Sarana
                    Prasarana {{ $object->saranaPrasarana->nama }} {{ $object->wewenang->name }} beserta fasilitas yang
                    ada didalamnya
                    @if ($object->daya_listrik == 'Ya')
                        dan daya listrik di gedung tersebut.
                @else
                    tanpa daya listrik di gedung tersebut.
                @endif
                </p>
                Kegiatan tersebut akan diselenggarakan pada:
                <div class="waktuKegiatan">
                    @php
                        $tanggal_mulai = Carbon::parse($object->tanggal_mulai)->locale('id')->isoFormat('dddd D MMMM Y');
                        $tanggal_selesai = Carbon::parse($object->tanggal_selesai)->locale('id')->isoFormat('dddd D MMMM Y');
                        echo "hari, tanggal  &nbsp;&nbsp;: " . $tanggal_mulai . " - " . $tanggal_selesai . "<br>";
                        $jam_selesai = substr($object->jam_selesai, 0, 5);
                        $jam_mulai = substr($object->jam_mulai, 0, 5);
                        echo "pukul  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . $jam_mulai . " - ". $jam_selesai . "<br>";
                    @endphp
                    tempat
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $object->saranaPrasarana->nama }}
                    @if ($object->wewenang->name != 'Sarana-Prasarana Pusat')
                        {{ $object->wewenang->name }}
                    @endif Politeknik Negeri Malang
                    <br>
                </div>
                <p>Demikian surat peminjaman ini kami buat, atas izin dan bantuan yang diberikan kami sampaikan terima
                    kasih
                </p>
            </div>

            <div class="ttd1">
                <div class="kanan">Hormat kami,</div>
                <br>
                <div class="kiri">{{ $object->user->name }},</div>
                <div class="kanan">Penanggung Jawab,</div>
{{--                <div class="gambar">--}}
{{--                <img src="assets/img/logo_iso.png" width="80" height="100" alt="logo" class="d-inline logo2">--}}
{{--                </div>--}}
                <div class="namakiri">{{ $object->user->nama_pj }}</div>
                <div class="gambar2">
                <img src="storage/<?= $object->user->ttd_pj; ?>>" width="80" height="100" alt="logo" class="d-inline logo2">
                </div>
                <br>
                <div class="namakiri">NIP. {{ $object->user->ninduk_pj }}</div>
                <div class="namakanan">{{ $object->penanggung_jawab }}</div>
                <br>
                <div class="namakanan">NIP. {{ $object->nim }}</div>
            </div>

            <div class="text-center">Mengetahui dan menyetujui,</div>

            <div class="ttd2">
                <div class="kiri">{{ $object2->jabatan }}</div>
                <div class="gambar">
                    <img src="storage/<?= $object->wewenang->ttd; ?>>" width="80" height="100" alt="logo" class="d-inline logo2">
                </div>
                <div class="kanan">{{ $object->wewenang->jabatan }}</div>
                <div class="kiri nama">{{ $object2->pj }}</div>
                <div class="kanan nama">{{ $object->wewenang->pj }}</div>
                <div class="gambar2">
                    <img src="storage/<?= $object2->ttd; ?>>" width="80" height="100" alt="logo" class="d-inline logo2">
                </div>
                <br>
                <div class="kiri nama">NIP. {{ $object2->nip }} </div>
                <div class="kanan nama">NIP. {{ $object->wewenang->nip }}</div>
            </div>

        </section>
    @endforeach
@endforeach
</body>

</html>
