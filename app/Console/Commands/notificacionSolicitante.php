<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Solicitud;
use App\Notificacion;

class notificacionSolicitante extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacion:solicitante';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creacion de la notificacion en caso de expiracion';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
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
    }
}
