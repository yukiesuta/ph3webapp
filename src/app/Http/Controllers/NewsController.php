<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Header;

class NewsController extends Controller
{
    public function index()
    {
                // // ベースURL
                // $base_url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default';

                // // インスタンス作成
                // $client = new Client([
                //     'base_url' => $base_url,
                // ]);
        
                // // // API_KEY
                // // $api_key = 'hjfdksaJhjfkdw134fjdklsaKJ93JKL';
    
        
                // // // パス
                // // $path = '/v2/test';
        
                // // // リクエストするURL（openapi.test.api.jp/v2/test）
                // // $send_url = $base_url . $path;
        
                // $response = $client->request('POST', $base_url);
        
                // // JSONデータとして取得
                // $json = $response->getBody();
        
                // // JSONデータを連想配列にする
                // $api_token = json_decode($json, true);

        return view('news');
    }
}
