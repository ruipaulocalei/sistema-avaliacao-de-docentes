<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    $data = $request->all();
       $user = Auth::user();
       $orderByMe = Order::where([["estudante_id", $user->id],
       ["tema_id", $data["tema_id"]]
       ])->get()->count();
       $orderByOther = Order::where([["estudante_id","!=", $user->id],
       ["tema_id", $data["tema_id"]]
       ])->get()->count();
       /* $data = $request->only([
        "estudante_id" => $user->id,
        "professor_id" => $tema->user->id,
        "tema_id" => $tema->id,
       ]); */
       // dd($data);
       if($orderByMe){
           return "Este já é teu tema";
       }elseif($orderByOther){
        return "Este tema já foi escolhido por outro estudante";
       }
       Order::create([
        "estudante_id" => $data["estudante_id"],
        "professor_id" => $data["professor_id"],
        "tema_id" => $data["tema_id"],
       ]);
       return redirect()->action([DashboardController::class, "index"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
