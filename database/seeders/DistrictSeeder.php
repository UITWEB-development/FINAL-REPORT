<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/district.csv');
        $file = fopen($path, 'r');
        $data = [];

        while(($row = fgetcsv($file, null, ',')) !== false) {
            $data[] = [
                'id' => (int)$row[0],
                'province_id' => (int)$row[1],
                'name' => $row[2],
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            District::Insert($chunk);
        }
    }
}
