<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class MidicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $path = storage_path('app/ya1.csv');

        if (!file_exists($path)) {
            $this->command->error('CSV file not found.');
            return;
        }

        $file = fopen($path, 'r');

        // อ่าน header แถวแรก
        $header = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            DB::table('medicines')->insert([
                'code'  => $row[0],
                'name'  => $row[1],
                'unit'  => $row[2],
                'dose'  => $row[3],
                'price' => $row[4],
            ]);
        }

        fclose($file);
    }
}

