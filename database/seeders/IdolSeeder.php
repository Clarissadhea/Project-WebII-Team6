<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('idols')->insert([
            [
                'nama_idol' => 'Makoto Hasegawa',
                'grup' => 'THE RAMPAGE',
                'foto' => 'images/idols/makoto.jpg',
                'deskripsi' => 'Main Dancer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_idol' => 'Minji',
                'grup' => 'NewJeans',
                'foto' => 'images/idols/minji.jpg',
                'deskripsi' => 'Leader',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_idol' => 'LISA',
                'grup' => 'BLACKPINK',
                'foto' => 'images/idols/lisa.jpg',
                'deskripsi' => 'Main Rapper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}