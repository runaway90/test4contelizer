<?php

namespace App\Http\Controllers;

use App\Beer;

class BeerPageController extends Controller
{
    public function get()
    {
        $beers = Beer::where('id', '<>', null)->get();
        $types = $beers->groupBy('type')->all();

        return view('main_page.beer')->with(['name'=>'jh',
            'beers' => $beers,
            'types' => array_keys($types)]);
    }

    public function beerInfo($beer_id = 1)
    {
        $beers = Beer::where('id', $beer_id)->first();
        $beer = json_decode($beers);
        $brewer = $beers->brewer->name;
        $id=$beer->id;

        return view('main_page.beer_info')->with([
            'name'=>$beer->name,
            'image' => $beer->image_url,
            'country'=>$beer->country,
            'price'=>$beer->price,
            'price_per_litre'=>$beer->price_per_litre,
            'volume'=>$beer->volume_of_unit,
            'brewer'=>$brewer,
            'quantity'=>$beer->quantity,
            'id' => $id,
            'next'=>++$id,
            'prev'=>0]);
    }

    public function post()
    {
        $beers = Beer::where('id', '<>', null)->get();

        return response()->json($beers);

    }

    public function postBeerInfo($beer_id = 1)
    {
        $beers = Beer::where('id', $beer_id)->first();

        return response()->json($beers);

    }

}
