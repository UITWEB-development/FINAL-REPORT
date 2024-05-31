<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/ward.csv');
        $file = fopen($path, 'r');
        $data = [];

        while(($row = fgetcsv($file, null, ',')) !== false) {
            $data[] = [
                'id' => (int)$row[0],
                'district_id' => (int)$row[1],
                'name' => $row[2],
                'longitude' => $row[3] ? (float)$row[3] : null,
                'latitude' => $row[4] ? (float)$row[4] : null,
                
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            Ward::Insert($chunk);
        }
    }
}
