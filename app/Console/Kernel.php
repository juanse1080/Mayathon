<?php

namespace App\Console;

use App\Solicitud;
use App\Notificacion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule){
        $schedule->call(function () {
            $solicitudes = new Solicitud;
            $solicitudes = $solicitudes->where('estado', true)->get();
            $dia = date('Y-m-d');
            foreach ($solicitudes as $value) {
                if($value->tiempo_recaudacion < $dia){
                    Notificacion::create([
                        'fk_usuario' => $value->fk_usuario,
                        'estado' => false,
                        'titulo' => '¡Su solicitud expiro!',
                        'url' => '/solicitudes/'.$value->pk_solicitud,
                        'descripcion' => 'Su solicitud ha expirado el tiempo especificado, por favor confirme el estado de su solicitud'
                    ]);
                }
            }
        })->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
