<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Subkriteria;

class PenilaianController extends Controller
{
    public function index()
    {
        $title = 'Data Penilaian';
        $addLocation = route('admin.management.penilaian.create');
        $editLocation = 'admin.management.penilaian.edit';
        $deleteLocation = 'admin.management.penilaian.delete';

        $kriteria = Kriteria::all();
        $subkriteria = Subkriteria::with('kriteria')->get();


        $periode = request()->date;
        $tanggalAwal = null ?? now()->startOfMonth();
        $tanggalAkhir = null ?? now()->endOfMonth();

        $initPenilaian = [];

        if ($periode) {
            $bulanTahun = explode('-', $periode);

            $tahun = (int) $bulanTahun[0];
            $bulan = (int) $bulanTahun[1];
            $tanggalAwal = now()->setYear($tahun)->setMonth($bulan)->startOfMonth();
            $tanggalAkhir = now()->setYear($tahun)->setMonth($bulan)->endOfMonth();
        }


        $penilaian = Penilaian::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();

        $alternatif = Alternatif::whereHas('penilaian', function ($query) use ($tanggalAwal, $tanggalAkhir) {
            $query->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
        })->get();




        $data = [
            'title' => $title,
            'addLocation' => $addLocation,
            'editLocation' => $editLocation,
            'deleteLocation' => $deleteLocation,
            'kriteria' => $kriteria,
            'subkriteria' => $subkriteria,
            'alternatif' => $alternatif,
            'penilaian' => $penilaian,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
        ];

        // dd($data);
        return view('pages.admin.management.penilaian.index', $data);
    }

    public function create()
    {
        $title = 'Tambah Data Penilaian';
        $storeLocation = route('admin.management.penilaian.store');
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::with('subkriteria')->get();



        $data = [
            'title' => $title,
            'storeLocation' => $storeLocation,
            'kriteria' => $kriteria,
            'alternatif' => $alternatif
        ];

        return view('pages.admin.management.penilaian.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatif,id',
            'value' => 'required|array',
            'value.*' => 'required|numeric|min:0',
            'created_at' => 'required',
        ]);


        $alternatif_id = $request->alternatif_id;
        $criteria_value = $request->value;

        // format periode (YYYY-MM)
        $created_at = $request->created_at;
        $created_at = substr($created_at, 0, 7);

        // split year and month
        $month = (int) substr($created_at, 5);
        $year = (int) substr($created_at, 0, 4);

        if (
            Penilaian::where('created_at', now()->setYear($year)->setMonth($month)->startOfMonth())
                ->where('alternatif_id', $alternatif_id)
                ->exists()
        ) {
            return redirect()->back();
        }

        foreach ($criteria_value as $criteria_id => $value) {
            $created_at = now()->setYear($year)->setMonth($month)->startOfMonth();

            Penilaian::create([
                'alternatif_id' => $alternatif_id,
                'kriteria_id' => $criteria_id,
                'nilai' => $value,
                'created_at' => $created_at,
            ]);
        }

        return redirect()->route('admin.management.penilaian.index');
    }

    public function edit($date, $id)
    {
        $title = 'Edit Data Penilaian';
        $updateLocation = route('admin.management.penilaian.update', $id);

        $year = (int) substr($date, 0, 4);
        $month = (int) substr($date, 5);

        $penilaian = Penilaian::where('penilaian.created_at', now()->setYear($year)->setMonth($month)->startOfMonth())
            ->where('penilaian.alternatif_id', $id)->get();

        $alternatif = Alternatif::find($id);
        $kriteria = Kriteria::with('subkriteria')->get();


        $data = [
            'title' => $title,
            'updateLocation' => $updateLocation,
            'penilaian' => $penilaian,
            'kriteria' => $kriteria,
            'date' => $date,
            'alternatif_nama' => $alternatif->nama,
            'alternatif_id' => $id
        ];

        return view('pages.admin.management.penilaian.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatif,id',
            'value' => 'required|array',
            'value.*' => 'required|numeric|min:0',
            'created_at' => 'required',
        ]);

        $alternatif_id = $request->alternatif_id;
        $criteria_value = $request->value;

        // format periode (YYYY-MM)
        $created_at = $request->created_at;
        $created_at = substr($created_at, 0, 7);

        // split year and month
        $month = (int) substr($created_at, 5);
        $year = (int) substr($created_at, 0, 4);

        $penilaian = Penilaian::where('created_at', now()->setYear($year)->setMonth($month)->startOfMonth())
            ->where('alternatif_id', (int) $alternatif_id);


        if ($penilaian->exists()) {
            foreach ($criteria_value as $criteria_id => $value) {
                $penilaianInstance = Penilaian::where('created_at', now()->setYear($year)->setMonth($month)->startOfMonth())
                    ->where('alternatif_id', (int) $alternatif_id);
                $penilaianKriteria = $penilaianInstance->where('kriteria_id', $criteria_id)->first();
                if ($penilaianKriteria) {
                    $penilaianKriteria->update(['nilai' => $value]);
                }

            }

            return redirect()->route('admin.management.penilaian.index');
        } else {
            return redirect()->back();
        }
    }

    public function destroy($date, $id)
    {
        $year = (int) substr($date, 0, 4);
        $month = (int) substr($date, 5);

        $penilaian = Penilaian::where('created_at', now()->setYear($year)->setMonth($month)->startOfMonth())
            ->where('alternatif_id', (int) $id);

        if ($penilaian->exists()) {
            $penilaian->delete();
        }

        return redirect()->route('admin.management.penilaian.index');
    }
}
