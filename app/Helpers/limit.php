<?php
use App\Models\Dosen;
use Illuminate\Support\Facades\DB;

/**
 * @return array[] of limit
 */
function limit(): array
{
    $dosens = Dosen::join('users', 'dosens.id', '=', 'users.id_dosen')
        ->where('users.role', '<>', 'kps')
        ->get();

    $listDosen = [];
    $slots = [];

    foreach ($dosens as $dosen) {
        $countPenilaiOutline = DB::table('outlines')
            ->where('status', '!=', 'Lulus')
            ->where(function($query) use ($dosen) {
                $query->where('id_dosen_penilai_1', $dosen->id_dosen)
                    ->orWhere('id_dosen_penilai_2', $dosen->id_dosen);
            })
            ->count();

        $countPenilaiProposal = DB::table('proposals')
            ->where('status', '!=', 'Lulus')
            ->where(function($query) use ($dosen) {
                $query->where('id_dosen_penguji_proposal_1', $dosen->id_dosen)
                    ->orWhere('id_dosen_penguji_proposal_2', $dosen->id_dosen);
            })
            ->count();

        $countPembimbingSkripsi = DB::table('bimbingans')
            ->where('status', '!=', 'Lulus')
            ->where(function($query) use ($dosen) {
                $query->where('id_dosen_pembimbing_1', $dosen->id_dosen)
                    ->orWhere('id_dosen_pembimbing_2', $dosen->id_dosen);
            })
            ->count();

        $countPengujiSkripsi = DB::table('skripsis')
            ->where('id_dosen_penguji_skripsi', $dosen->id_dosen)
            ->count();

        $total = $countPenilaiOutline + $countPenilaiProposal + $countPembimbingSkripsi + $countPengujiSkripsi;

        if ($total <= $dosen->limit) {
            $listDosen[] = $dosen;
            $slots[] = $dosen->limit - $total;
        }
    }

    return [$listDosen, $slots];
}
