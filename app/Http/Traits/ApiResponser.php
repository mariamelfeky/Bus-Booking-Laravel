<?php

namespace App\Http\Traits;
use Illuminate\Support\Collection;

/**
 * ApiResponser trail
 */
trait ApiResponser
{
    private function successResponse($data, $code){
        return response()->json($data, $code);
    }

    protected function errorResponse($message ,$code){
        return response()->json(['error' => $message , 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200){
        return response()->json(['data' => $collection , 'code' => $code], $code);
    }
}
