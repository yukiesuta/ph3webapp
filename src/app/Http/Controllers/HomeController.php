<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Language;
use App\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ユーザー認証
        $user = User::find(\Auth::user()->id);

        // 今日の勉強時間
        $today_study_hours = $user->data()->whereDate('date', '2022-03-02')->sum('hour');

        // 今月の学習時間
        $month_study_hours = $user->data()->whereMonth('date', 3)->sum('hour');

        // 累計の学習時間
        $total_study_hours = $user->data()->sum('hour');

        // データ配列
        $study_datum_array = $user->data()->get();

        // 言語の凡例配列
        $study_languages_result_array = Language::get();

        // 教材の凡例配列

        $study_contents_result_array = Content::get();

        // 言語ごとの勉強時間配列
        $study_hour_datum = [];
        for ($i = 1; $i < 9; $i++) {
            $study_datum1 = $user->data()->where('language_id', $i)->sum('hour');
            if (!($study_datum1)) {
                $study_datum1 = '0';
            };
            array_push($study_hour_datum, $study_datum1);
        }
        $study_hour_datum_array = $study_hour_datum;

        // 教材ごとの勉強時間配列
        $study_contents_datum = [];
        for ($i = 1; $i < 4; $i++) {
            $study_datum1 = $user->data()->where('content_id', $i)->sum('hour');
            if (!($study_datum1)) {
                $study_datum1 = '0';
            };
            array_push($study_contents_datum, $study_datum1);
        }
        $study_contents_datum_array = $study_contents_datum;


        return view('home', compact(
            'today_study_hours',
            'month_study_hours',
            'total_study_hours',
            'study_datum_array',
            'study_languages_result_array',
            'study_contents_result_array',
            'study_hour_datum_array',
            'study_contents_datum_array',
        ));
    }
}
