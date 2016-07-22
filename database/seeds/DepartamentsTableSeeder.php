<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepartamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciam_departments') ->insert([
            [
                'departments'	=>	'Amazonas',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Antioquia',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Arauca',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Atlantico',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Bogota',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Bolívar',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Boyacá',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Caldas',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	'Caquetá',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Casanare',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Cauca',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Cesar',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Choco',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Córdoba',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Cundinamarca',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Guainía',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Guaviare',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Huila',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'La Guajira',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Magdalena',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Meta',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Nariño',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Norte de Santander',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Putumayo',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Quindio',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Risaralda',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'San Andrés y Providencia',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Santander',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Sucre',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Tolima',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Valle del Cauca',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Vaupés',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ],
            [
                'departments'	=>	 'Vichada',
                'created_at'	=> Carbon::now(),
                'updated_at'	=> Carbon::now()
            ]
        ]);
    }
}
