<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Header;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index($id)
    {

        $client = new Client();
        $response = $client->get('https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news/'.$id);
        $data = $response->getBody()->getContents();
        $data = json_decode($data)[0];

        return view('news', compact('id', 'data'));
    }
}
