<?php

namespace App\Http\Controllers;

use App\Models\DataPns;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nip' => 'required|digits:18',
            'nik' => 'required|digits:16',
        ], [
            'nip.required' => 'Kolom NIP wajib diisi.',
            'nip.digits' => 'NIP harus berjumlah 18 digit angka.',
            'nik.required' => 'Kolom NIK wajib diisi.',
            'nik.digits' => 'NIK harus berjumlah 16 digit angka.',
        ]);

        $result = DataPns::findByNipAndNik($request->nip, $request->nik);
        if ($result) {
            $result = User::firstWhere('nip', $request->nip);
        }
        return view('welcome', [
            'result' => $result,
            'has_search' => true,
        ]);
    }

    public function uploadDokumen(Request $request, $nip)
    {
         // cek data user
        $user = User::where('nip', $nip)->first();

        // tentukan rule (awal wajib, update optional)
        $ruleType = (!$user || !$user->is_done) ? 'required' : 'sometimes';

        $rules = [
            'skcpns' => "{$ruleType}|file|mimes:pdf|max:1200",
            'skpns'  => "{$ruleType}|file|mimes:pdf|max:1200",
            'd2'     => "sometimes|file|mimes:pdf|max:1200", // tetap opsional
            'drh'    => "{$ruleType}|file|mimes:pdf|max:1200",
            'spmt'   => "{$ruleType}|file|mimes:pdf|max:1200",
        ];

        $messages = [
            'required' => 'Dokumen :attribute wajib diunggah.',
            'mimes'    => 'Dokumen :attribute harus PDF.',
            'max'      => 'Ukuran dokumen :attribute maksimal 2MB.',
        ];

        $request->validate($rules, $messages);

        $dokumenMap = [
                'skcpns' => 'SKCPNS',
                'skpns'  => 'SKPNS',
                'd2'     => 'D2',
                'drh'    => 'DRH',
                'spmt'   => 'SPMT',
            ];
            foreach ($dokumenMap as $input => $folder) {

                if ($request->hasFile($input)) {

                    $file = $request->file($input);

                    // path tujuan
                    $path = public_path("dokumen-dms/{$folder}");

                    // buat folder kalau belum ada
                    if (!File::exists($path)) {
                        File::makeDirectory($path, 0755, true);
                    }

                    // nama file
                    $filename = "{$nip}_{$folder}.pdf";

                    // simpan file
                    $file->move($path, $filename);
                }
            }

            // update status user
            User::updateOrCreate(
                ['nip' => $nip],
                ['is_done' => true]
            );

            return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
    }
}