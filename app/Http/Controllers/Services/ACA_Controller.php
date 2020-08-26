<?php

namespace App\Http\Controllers\Services;

use App\Citizen;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ACA_Controller extends Controller
{
    function issueCredential(Request $request){

        $cred_def_id = $_ENV['CRED_ID'];
        $api_url = $_ENV['CRED_ID'];
        $my_did = $_ENV['CRED_ID'];
        $schemas_id = $_ENV['CRED_ID'];


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

//        $definitionId = "BcDwCLVVwck7tdjFTmGV7V:3:CL:85506:TAG1";

        if ($data->gender==1){
            $str_gender='Nam';
        }else {
            $str_gender = 'Nữ';
        };

       $json_string = `{
  "auto_issue": true,
 "credential_preview": {
    "@type": "did:sov:BzCbsNYhMrjHiqZDTUASHg;spec/issue-credential/1.0/credential-preview",
    "attributes": [
      {
        "name": "name",
        "value": $data->fullname,
      },
{
        "name": "gender",
        "value": $str_gender
      },
{
        "name": "dob",
        "value": $data->dob
      },
{
        "name": "address",
        "value": $data->address
      },{
        "name": "id_number",
        "value": $data->code
      }
    ]
  },
  "cred_def_id": $cred_def_id,
  "connection_id": $connectionId,
  "comment": "string"
}`;


        return response()->json([
            'error' => false,
            'data'  => $json_string,
        ],200);

        $client = new \GuzzleHttp\Client();

        $url = $api_url;
        $response = $client->request('POST',$url,  [
            'json'=>$json_string
        ]);
//        $response =  $client->send($request);
        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()->getContents()),
        ], $response->getStatusCode());
    }
}
