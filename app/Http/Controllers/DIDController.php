<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\DID;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class DIDController extends Controller
{

    function add()
    {
        return view('did.add');
    }

    function list()
    {
        $data = DID::paginate(20);
        return view('did.list', compact('data'));
    }

    function getDids(Request $request)
    {
        if($request->ajax())
        {
            $data = DID::paginate(20);
            return view('did.table', compact('data'))->render();
        }
    }



    function getCredential($id){
        $client = new \GuzzleHttp\Client();
        $api_url = $_ENV['ACA_PY_URL'];
        $url = $api_url."/issue-credential/records/".$id;
        $response = $client->request('GET',$url,  []);
        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()->getContents()),
        ], $response->getStatusCode());
    }
    # Create did to database
    protected function createDidRecord(array $data)
    {
        return DID::create([
            'code' => $data['code'],
            'isIssued' => $data['isIssued'],
            'isRevoked' =>$data['isRevoked'],
            'their_did'=>$data['their_did'],
            'cred_ex_id'=>$data['cred_ex_id'],
        ]);
    }


    function issueCredential(Request $request){

        $cred_def_id = $_ENV['CRED_ID'];
        $api_url = $_ENV['ACA_PY_URL'];
        $code = $request->input( 'code' );
        $connectionId = $request->input( 'connectionId' );
        try {
            $data = Citizen::Where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $exception){
            return response()->json([
                'error' => true,
                'data' => $code
            ], 404);
        }


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


    public function detail($uuid){
        $info = DID::Where('uuid', $uuid)->firstOrFail();
        $pii = Citizen::Where('code', $info->code)->firstOrFail();
        return view('did.detail', ['info'=>$info,'pii'=>$pii]);
    }

}
