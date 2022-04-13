<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole("estudante")) {
            $temas = Tema::all();
            return view("user_types.estudante", compact("temas"));
        }
        elseif($user->hasRole("catedratico") 
        || $user->hasRole("associado")
        || $user->hasRole("auxiliar")
        || $user->hasRole("assistente")
        ) {
            $temas = Tema::where("user_id", $user->id);
            return view("user_types.docente")->with("temas", $temas);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->hasRole("catedratico") 
        || $user->hasRole("associado")
        || $user->hasRole("auxiliar")
        || $user->hasRole("assistente")
        ) {
            return view("user_types.temas.create");
        } else{
            return abort(403);
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);
        $user = Auth::user();
        $temasQuant = Tema::where("user_id", $user->id)->get()->count();

        if($user->hasRole("catedratico")) {
            if($temasQuant <= 19) {
                Tema::create([
                    "name" => $data["name"],
                    "description" => $data["description"],
                    "user_id" => $user->id,
                ]);
            } else {
                return "Excedeste o número de temas disponível na tua categoria";
            }
        } elseif($user->hasRole("associado")) {
            if($temasQuant <= 14) {
                Tema::create([
                    "name" => $data["name"],
                    "description" => $data["description"],
                    "user_id" => $user->id,
                ]);
            } else {
                return "Excedeste o número de temas disponível na tua categoria";
            }
        } elseif($user->hasRole("auxiliar")) {
            if($temasQuant <= 9) {
                Tema::create([
                    "name" => $data["name"],
                    "description" => $data["description"],
                    "user_id" => $user->id,
                ]);
            } else {
                return "Excedeste o número de temas disponível na tua categoria";
            }
        } elseif($user->hasRole("assistente")) {
            if($temasQuant <= 4) {
                Tema::create([
                    "name" => $data["name"],
                    "description" => $data["description"],
                    "user_id" => $user->id,
                ]);
            } else {
                return "Excedeste o número de temas disponíveis na tua categoria";
            }
        }

        return redirect()->action([DashboardController::class, "index"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        $tema = Tema::findOrFail($tema->id);
        return view("user_types.temas.show", compact("tema"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        return view("user_types.temas.edit", compact("tema"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        $this->authorize("update", $tema);
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);
        $tema->name = $data["name"];
        $tema->description = $data["description"];
        $tema->save();
        return redirect()->action([DashboardController::class, "index"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        $this->authorize("delete", $tema);
        $tema->delete();
        return redirect()->action([DashboardController::class, "index"]);
    }
}
