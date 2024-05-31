<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/province.csv');
        $file = fopen($path, 'r');
        $data = [];

        while(($row = fgetcsv($file, null, ',')) !== false) {
            $data[] = [
                'id' => (int)$row[0],
                'name' => $row[3],
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            Province::Insert($chunk);
        }
    }
}
