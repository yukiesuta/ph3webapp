<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
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

        return view('home', [
            'today_study_hours' => $today_study_hours,
            'month_study_hours' => $month_study_hours,
            'total_study_hours' => $total_study_hours
        ]);
    }
}
