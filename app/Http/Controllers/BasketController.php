<?php

namespace App\Http\Controllers;

use App\User;
use App\basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
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
        $row = DB::table('orders')->where([
            ['user_id', '=', $request->user_id],
            ['product_id', '=', $request->product_id]
        ])->get();

        if($row){
            return back()->with('alreadyRegistered', 'Produit déjà selectionné !');
        }

        DB::table('orders')->insert(
            ['user_id' => $request->user_id, 'product_id' => $request->product_id]
        );

        return back()->with('success', 'Produit ajouté au panier !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $orders = $user->order ;
        // $sum = 10;
        // $orders->each(function($order) use($sum) {
        //     $sum += $order->price;
        //     echo $sum;
        // });

        // dd($sum);

        return view("basket.show", compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(basket $basket)
    {
        //
    }
}
