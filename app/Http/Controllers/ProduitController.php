<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $collection1 = collect([1,2,3,4,5,6,7,8,9,10]);
       $produits = Produit::all();

       $collection2 = collect(
       [[ "title" => "Le titre du livre","Date" => "01/04/2021","nbPages" => "100"],
       [ "title" => "Le titre du livre","Date" => "01/04/2018","nbPages" => "200"],
       [ "title" => "Le titre du livre","Date" => "01/04/2019","nbPages" => "300"],
       [ "title" => "Le titre du livre","Date" => "01/04/2020","nbPages" => "400"],]
    );

    // dd($collection2->count());
    $collectionfilter = $collection2->filter(function($livre, $key){
        // if($livre["nbPages"] >= 300)
        //     return true;
        // else
        //     return false;

        return $livre["nbPages"] > 300;


    });
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
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        // dd($produit);
        $produit = Produit::findOrfail($produit->id);
        // dd($produit);
        return view("pages.front-office.edit-produit", [
            "produit" =>$produit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
