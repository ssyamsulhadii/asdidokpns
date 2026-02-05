<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class DataPns extends Model
{
    public static function list(): array
    {
        $path = public_path('data-pns/ekspor-asdidokpns.csv');

        if (!File::exists($path)) {
            return [];
        }
        $handle = fopen($path, 'r');
        // Ambil header
        $headers = array_map(function ($h) {
            return Str::snake(strtolower($h));
        }, fgetcsv($handle));
        $data = [];
        while (($row = fgetcsv($handle)) !== false) {
            // Gabungkan header + value
            $item = array_combine($headers, $row);
            $data[] = (object) $item;
        }
        fclose($handle);
        return $data;
    }

    public static function findByNipAndNik(string $nip, string $nik): ?object
    {
        $list = self::list();

        foreach ($list as $item) {
            if (
                isset($item->nip, $item->nik) &&
                $item->nip === $nip
            ) {
                return $item;
            }
        }

        return null;
    }
}