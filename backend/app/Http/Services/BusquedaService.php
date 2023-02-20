<?php

namespace App\Http\Services;

use App\Busqueda;
use App\User;
use DB;
use Searchy;
use App\Diccionario;
use Symfony\Component\HttpFoundation\Response;


class BusquedaService
{

    function calLevenshtein($str1, $str2) {
        return (1 - levenshtein($str1, $str2)/max(strlen($str1), strlen($str2)))*100;
    }

    function removeAccent($str){
        $data1 = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $data2 = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        $str = utf8_decode($str);
        $str = strtr($str, utf8_decode($data1), $data2);
        return utf8_encode($str);
    }

    function formatString($str) {
        // $str = strtolower('Jorge Eliecer Coral Rivás');
        $accent = $this->removeAccent($str);
        $data = preg_replace('([^A-Za-z0-9])', '', $accent);
        return $format = strtolower($data);
    }
    

    public function search($request)
    {

        $array = [];

        $allData = Diccionario::get();

        $formatName = $this->formatString($request->name);

        foreach ($allData as $value)
        {
            $formatNameElement = $this->formatString($value['nombre']);

            $lev = $this->calLevenshtein($formatName, $formatNameElement);
            if($lev >= $request->percent){

                $response = [
                    'nombre' => $value['nombre'],
                    "porcentaje" => round($lev, 2)
                ];
                array_push($array, $response );
            }

        }

        $Search = new Busqueda();
        $Search->nombre_buscado = $request->name;
        $Search->porcentaje_buscado = $request->percent;
        if(sizeof($array) > 0){
           $Search->estado_ejecucion = $array;
        }else{
            $Search->estado_ejecucion = 'sin coincidencias';
        }
        $Search->save();

        return response()->json([
            'success' => true,
            'id' => $Search->id,
            'data' => $array
        ], Response::HTTP_OK);

    }

    public function getSearches($request)
    {
        $searches;

        if($request->id){ 
           $searches = Busqueda::find($request->id);
        }else{
            $searches = Busqueda::get();
        }

        return response()->json([
            'success' => true,
            'data' => $searches
        ], Response::HTTP_OK);


    }



}