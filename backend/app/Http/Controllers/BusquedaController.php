<?php

namespace App\Http\Controllers;

use App\Busqueda;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\getSearchRequest;
use App\Http\Services\BusquedaService;

class BusquedaController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $validated = $request->validated();

        $Busqueda = new BusquedaService();
        $response = $Busqueda->search($request);
        return $response;
    }

    public function getSearches(getSearchRequest $request)
    {
        $validated = $request->validated();

        $Busqueda = new BusquedaService();
        $response = $Busqueda->getSearches($request);
        return $response;
    }

   
}
