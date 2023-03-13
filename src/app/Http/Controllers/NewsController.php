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
        $response = Http::get('https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default');
        $data = $response->json();

        return view('news',compact('id','data'));
    }
}
