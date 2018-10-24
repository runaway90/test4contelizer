<?php

namespace App\Http\Controllers;

use App\Brewer;

class BrewerPageController extends Controller
{
    public function get()
    {

        $brewers = Brewer::where('id', '<>', null)->get();

        return view('main_page.brewer')->with(['name'=>'jh',
            'brewers' => $brewers]);
    }

    public function showBrewerBeer($id)
    {
        $brewers = Brewer::where('id', '<>', null)->first();
        $beer = $brewers->beer()->get();
        return view('main_page.brewer_beer')->with(['id'=>$id,
            'brewers' => $brewers,
            'beers' => $beer]);
    }

    public function post()
    {
        $brewers = Brewer::where('id', '<>', null)->get();

        return response()->json($brewers);

    }

    public function postShowBrewerBeer($id)
    {
        $brewers = Brewer::where('id', '<>', null)->first();
        $beer = $brewers->beer()->get();

        return response()->json(['brewer' => $brewers, 'beers' => $beer]);

    }

}
