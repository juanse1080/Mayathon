<?php

use Illuminate\Database\Seeder;
use App\Solicitud;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitud::create([
            'fk_usuario' => '1',
            'titulo' => 'Servidor',
            'descripcion' => 'Se necesita un buen servidor para redes',
            'categoria' => 'educacion',
            'monto_requerido' => 10000,
            'interes' => '1',
            'tiempo_recaudacion'=>'2018-11-20',
            'tiempo_devolucion'=>'12'
          ]);
    }
}
