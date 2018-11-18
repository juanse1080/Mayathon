<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\notificacionSolicitante;
use App\Notificacion;

class Kernel extends ConsoleKernel {
    
    protected $commands = [
        Commands\notificacionSolicitante::class,
    ];

    protected function schedule(Schedule $schedule){
        while(true){
            notificacionSolicitante::handle();
            sleep(86400);
        }
        // $schedule->command('notificacion:solicitante')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
