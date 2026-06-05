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
                'nama_idol' => 'Freya Jayawardana',
                'grup' => 'JKT48',
                'foto' => 'freya.jpg',
                'deskripsi' => 'Member JKT48 generasi ke-7 yang sangat populer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_idol' => 'Minji',
                'grup' => 'NewJeans',
                'foto' => 'minji.jpg',
                'deskripsi' => 'Leader dan member dari grup K-Pop NewJeans.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}