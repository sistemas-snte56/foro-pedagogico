<?php

namespace Database\Seeders;

use App\Models\Mesa;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mesas = [
            // PREESCOLAR - 8 mesas
            ['nivel_educativo' => 'preescolar', 'numero' => 1, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 2, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 3, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 4, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 5, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 6, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 7, 'capacidad' => 17],
            ['nivel_educativo' => 'preescolar', 'numero' => 8, 'capacidad' => 18],

            // PRIMARIA - 15 mesas
            ['nivel_educativo' => 'primaria', 'numero' => 1,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 2,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 3,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 4,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 5,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 6,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 7,  'capacidad' => 16],
            ['nivel_educativo' => 'primaria', 'numero' => 8,  'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 9,  'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 10, 'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 11, 'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 12, 'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 13, 'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 14, 'capacidad' => 17],
            ['nivel_educativo' => 'primaria', 'numero' => 15, 'capacidad' => 17],

            // SECUNDARIA - 2 mesas
            ['nivel_educativo' => 'secundaria', 'numero' => 1, 'capacidad' => 20],
            ['nivel_educativo' => 'secundaria', 'numero' => 2, 'capacidad' => 20],
        ];

        foreach ($mesas as $mesa) {
            Mesa::create([
                'nivel_educativo'     => $mesa['nivel_educativo'],
                'numero'    => $mesa['numero'],
                'capacidad' => $mesa['capacidad'],
                'ocupados'  => 0,
            ]);
        }
    }
}
