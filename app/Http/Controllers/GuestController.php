<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.index');
    }


    function issueCredential(Request $request){

        $cred_def_id = $_ENV['CRED_ID'];
        $api_url = $_ENV['ACA_PY_URL'];
        $connectionId = $request->input( 'connectionId' );

        $code = $request->input( 'code' );
        $name = $request->input( 'name' );
        $gender = $request->input( 'code' );
        $dob = $request->input( 'dob' );
        $address = $request->input( 'address' );

        if ($data->gender==1){
            $str_gender='Nam';
        }else {
            $str_gender = 'Nữ';
        }

        $json_string = '{
                  "auto_issue": true,
                 "credential_preview": {
                    "@type": "did:sov:BzCbsNYhMrjHiqZDTUASHg;spec/issue-credential/1.0/credential-preview",
                    "attributes": [
                      {
                        "name": "name",
                        "value":"'.$data->fullname.'"
                      },
                {
                        "name": "gender",
                        "value": "'.$str_gender.'"
                      },
                {
                        "name": "dob",
                        "value": "'.$data->dob.'"
                      },
                {
                        "name": "address",
                        "value": "'.$data->address.'"
                      },{
                        "name": "id",
                        "value": "'.$data->code.'"
                      }
                    ]
                  },
                  "cred_def_id": "'.$cred_def_id.'",
                  "connection_id": "'.$connectionId.'",
                  "comment": "Null"
                }';
//        return ['json'=>json_decode($json_string, true)];
        $client = new \GuzzleHttp\Client();

        $url = $api_url.'/issue-credential/send-offer';
        $response = $client->request('POST',$url,  [
            'json'=>json_decode($json_string, true)
        ]);

//        dd($response->getBody()->getContents());
        $data_response = \GuzzleHttp\json_decode($response->getBody());
//        dd($data_response);
        $data_array=[
            "code"=>$code,
            "isIssued"=>1,
            "isRevoked"=>1,
            "cred_ex_id"=>$data_response->credential_exchange_id,
            "their_did"=>$data_response->thread_id
        ];
        $this->createDidRecord($data_array);
//        dd($data_response);


        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()),
        ], $response->getStatusCode());
    }


}
