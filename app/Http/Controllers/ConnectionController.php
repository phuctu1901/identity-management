<?php

namespace App\Http\Controllers;

use App\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    function list()
    {
        $data = Connection::paginate(20);
        return view('connection.list', compact('data'));
    }

    function getConnections(Request $request)
    {
        if($request->ajax())
        {
            $data = Connection::paginate(20);
            return view('connection.table', compact('data'))->render();
        }
    }

    # Create connection record to database
    protected function createConnectionRecord(array $data)
    {
        return Connection::create([
            'id' => $data['id'],
        ]);
    }

    # Update connection record to database
    protected function updateConnectionRecord(array $data)
    {
        $record = Connection::find($data['connection_id']);
        $record->update($data);

    }


    function createConnection(){

        $api_url = $_ENV['ACA_PY_URL'];

        $client = new \GuzzleHttp\Client();
        $url = $api_url.'/connections/create-invitation';
        $response = $client->request('POST',$url,  []);

        $data_response = \GuzzleHttp\json_decode($response->getBody());
//        dd($data_response);
        $data_array=[
            "id"=>$data_response->connection_id
        ];

        $this->createConnectionRecord($data_array);

        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()),
        ], $response->getStatusCode());
    }

    function getConnection($id){
        $client = new \GuzzleHttp\Client();
        $api_url = $_ENV['ACA_PY_URL'];
        $url = $api_url."/connections/".$id;
        $response = $client->request('GET',$url,  []);


        $data_response = \GuzzleHttp\json_decode($response->getBody(), true);
//        dd($data_response);
//        $data_array=[
//            "id"=>$data_response->connection_id
//        ];

        $this->updateConnectionRecord($data_response);

        return response()->json([
            'error' => false,
            'data'  => \GuzzleHttp\json_decode($response->getBody()),
        ], $response->getStatusCode());
    }

    function detail($id){
        try {
            $data = Connection::Where('id',$id)->firstOrFail();
            return view('connection.detail',['data'=>$data, 'error'=>false]);
        }catch (Throwable $e){

        }

        return view('connection.detail',['error'=>true]);

    }
}
