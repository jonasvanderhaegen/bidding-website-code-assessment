<?php

namespace Database\Seeders;

use App\Imports\ImageImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class LotImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new ImageImport, database_path('csv/lotimages.csv'));
    }
}
