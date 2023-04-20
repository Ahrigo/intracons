<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proyectos;
use App\Models\Incidencias;
use App\Models\estadoincidencias;
use App\Models\Supervisor;
use Illuminate\Support\Facades\DB;

class HighchartController extends Controller
{
    /*public function handleChart()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
            
        return view('home', compact('users'));
        
    }

    public function proyectosChart()
    {
        $proyectos = Proyectos::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
            
        return view('home', compact('proyectos'));
    }

    public function combinedChart() {
        return $this->handleChart() . $this->proyectosChart();
    }*/

    public function combinedChart() {
        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
                
        $proyectos = Proyectos::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        $count_estado_1 = DB::table('incidencias')->where('idEstadoIncidencia', 1)->count();
        $count_estado_2 = DB::table('incidencias')->where('idEstadoIncidencia', 2)->count();

                
        return view('home', compact('users', 'proyectos', 'count_estado_1', 'count_estado_2'));
    }

}