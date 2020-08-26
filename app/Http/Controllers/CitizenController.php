<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    function getById(Request $request){
        $code = $request->input( 'code' );
//       $code = ($request->getContent(), true);
//        $code = json_decode($request);
        try {
            $data = Citizen::Where('code', $code)->firstOrFail();
            return response()->json([
                'error' => false,
                'data'  => $data,
            ], 200);
        } catch (ModelNotFoundException $exception){
            return response()->json([
                'error' => true,
                'data' => $code
            ], 404);
        }

    }
}
