<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class DIDController extends Controller
{
    function add()
    {
//        $data = Bot::paginate(10);
        return view('did.add');
    }

    function createConnection(){
        $client = new \GuzzleHttp\Client();
        $data = ["multiParty"=> false,
	            "name"=> "Hệ thống quản lý định danh số Thành phố Hà Nội"];
        $url = "https://api.streetcred.id/agency/v1/connections";
        $token = 'WW1l75JhPpWJ0TddnwhGcuuxO29tmbmSEZG9HLx4Pg0';
        $response = $client->request('POST',$url,  [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'json'=>$data
        ]);
//        $response =  $client->send($request);
        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()->getContents()),
        ], $response->getStatusCode());

    }

    function getConnection($id){
        $client = new \GuzzleHttp\Client();

        $url = "https://api.streetcred.id/agency/v1/connections/".$id;
        $token = 'WW1l75JhPpWJ0TddnwhGcuuxO29tmbmSEZG9HLx4Pg0';
        $response = $client->request('GET',$url,  [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
        ]);
//        $response =  $client->send($request);
        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()->getContents()),
        ], $response->getStatusCode());

    }

    function issueCredential(Request $request){
        $code = $request->input( 'code' );
        $connectionId = $request->input( 'connectionId' );
//        $data=null;
        try {
            $data = Citizen::Where('code', $code)->firstOrFail();
//            return response()->json([
//                'error' => false,
//                'data'  => $data,
//            ], 200);
        } catch (ModelNotFoundException $exception){
            return response()->json([
                'error' => true,
                'data' => $code
            ], 404);
        }

        $definitionId = "BcDwCLVVwck7tdjFTmGV7V:3:CL:85506:TAG1";

        if ($data->gender==1){
            $str_gender='Nam';
        }else{
            $str_gender='Nữ';
        }
        $credentialData=[
            "definitionId"=>$definitionId,
            "connectionId"=>$connectionId,
            "automaticIssuance"=> true,
            "credentialValues"=>[
                "name"=>$data->fullname,
                "gender"=>$str_gender,
                "dob"=>$data->dob,
                "address"=>$data->address,
                "id_number"=>$data->code
            ]
        ];

//        return response()->json([
//            'error' => false,
//            'data'  => $credentialData,
//        ],200);

        $client = new \GuzzleHttp\Client();

        $url = "https://api.streetcred.id/agency/v1/credentials";
        $token = 'WW1l75JhPpWJ0TddnwhGcuuxO29tmbmSEZG9HLx4Pg0';
        $response = $client->request('POST',$url,  [
            'headers' => [
                'Authorization' => 'Bearer '.$token
            ],
            'json'=>$credentialData
        ]);
//        $response =  $client->send($request);
        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()->getContents()),
        ], $response->getStatusCode());
    }
}
