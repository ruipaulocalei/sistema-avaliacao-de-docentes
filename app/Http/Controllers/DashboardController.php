<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public static function isAvaliado($estudante_id, $docente_id)
    {
        return Resultado::where('estudante_id', $estudante_id)
            ->where('docente_id', $docente_id)->count();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('estudante')) {
            $docentes = User::whereHas('roles', function ($q) {
                $q->where('name', 'professor');
            })->get();
            // if(auth()->user()->){}
            //dd($users);
            return view('user_types.estudante', compact('docentes'));
        } elseif (auth()->user()->hasRole('professor')) {
            $pontuacao = Resultado::where('docente_id', auth()->user()->id)->avg('pontuacao');
            //dd(round($pontuacao));
            return view('user_types.docente', compact('pontuacao'));
        } elseif (auth()->user()->hasRole('admin')) {
            //$users = User::with('roles')->get();
            /*  $docentes = User::whereHas('roles', function ($q) {
                $q->where('name', 'professor');
            })->join('resultados', 'users.id', '=', 'resultados.docente_id')->avg('pontuacao'); */
            //$va = $docentes->join('resultados', 'users.id', '=', 'resultados.id_docente')->get();
            $docentes = User::select(
                'users.name',
                'users.email',
                'users.id',
                DB::raw('avg(resultados.pontuacao) as media')
            )
                ->whereHas('roles', function ($q) {
                    $q->where('name', 'professor');
                })
                ->join('resultados', 'users.id', '=', 'resultados.docente_id')
                ->groupBy('users.id')
                ->orderBy('media', 'DESC')
                ->get();

            //dd($docentes);
            //$pontuacao = 0;
            /* foreach ($docentes as $docente) {
                $pontuacao = Resultado::where('docente_id', $docente->id)->get();
                dd($pontuacao->pontuacao);
            } */
            //dd($pontuacao);
            return view('dashboard', compact('docentes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
