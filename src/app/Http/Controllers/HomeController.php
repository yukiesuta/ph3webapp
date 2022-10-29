<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Language;
use App\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $date = Carbon::now();

        // 今日の勉強時間
        $today_study_hours = $user->data()->whereDate('date', $date->format('Y-m-d'))->sum('hour');
        $today_study_hours = $today_study_hours / 2;

        // 今月の学習時間
        $month_study_hours = $user->data()->whereMonth('date', $date->month)->sum('hour');
        $month_study_hours = $month_study_hours / 2;

        // 累計の学習時間
        $total_study_hours = $user->data()->sum('hour');
        $total_study_hours = $total_study_hours / 2;

        // データ配列
        $study_datum_array =
            $user->data()
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->orderBy('date')
            ->selectRaw('DATE_FORMAT(date, "%d") AS date')
            ->selectRaw('SUM(hour) AS hour')
            ->groupBy('date')
            ->get();

        // 言語の凡例配列
        $study_languages_result_array = Language::get();

        // 教材の凡例配列

        $study_contents_result_array = Content::get();

        // 言語ごとの勉強時間配列
        $study_hour_datum = [];
        for ($i = 1; $i < count($study_languages_result_array) + 1; $i++) {
            $study_datum1 = $user->data()->where('language_id', $i)->sum('hour');
            if (!($study_datum1)) {
                $study_datum1 = '0';
            };
            array_push($study_hour_datum, (float)$study_datum1);
        }
        $study_hour_datum_array = $study_hour_datum;

        // 教材ごとの勉強時間配列
        $study_contents_datum = [];
        for ($i = 1; $i < count($study_contents_result_array) + 1; $i++) {
            $study_datum1 = $user->data()->where('content_id', $i)->sum('hour');
            if (!($study_datum1)) {
                $study_datum1 = '0';
            };
            array_push($study_contents_datum, (float)$study_datum1);
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

    public function post_data(Request $request)
    {
        $study_hour = $request['study_hour'];

        $study_content_count = 0;
        if (isset($request['content1'])) {
            $study_content_count++;
        }
        if (isset($request['content2'])) {
            $study_content_count++;
        }
        if (isset($request['content3'])) {
            $study_content_count++;
        }
        if ($study_content_count !== 0) {
            $divide_study_content_hour = $study_hour / $study_content_count;
        }

        $date = $request['date'];

        if (isset($request['content1'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 0,
                'content_id' => 1,
                'hour' => $divide_study_content_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['content2'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 0,
                'content_id' => 2,
                'hour' => $divide_study_content_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['content3'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 0,
                'content_id' => 3,
                'hour' => $divide_study_content_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }



        $study_language_count = 0;
        if (isset($request['language1'])) {
            $study_language_count++;
        }
        if (isset($request['language2'])) {
            $study_language_count++;
        }
        if (isset($request['language3'])) {
            $study_language_count++;
        }
        if (isset($request['language4'])) {
            $study_language_count++;
        }
        if (isset($request['language5'])) {
            $study_language_count++;
        }
        if (isset($request['language6'])) {
            $study_language_count++;
        }
        if (isset($request['language7'])) {
            $study_language_count++;
        }
        if (isset($request['language8'])) {
            $study_language_count++;
        }
        if ($study_language_count !== 0) {
            $divide_study_language_hour = $study_hour / $study_language_count;
        }

        $date = $request['date'];

        if (isset($request['language1'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 1,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language2'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 2,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language3'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 3,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language4'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 4,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language5'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 5,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language6'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 6,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language7'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 7,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        if (isset($request['language8'])) {
            Data::create([
                'user_id' => Auth::id(),
                'language_id' => 8,
                'content_id' => 0,
                'hour' => $divide_study_language_hour,
                'date' => $date
            ]);
            $request->timestamps = false;
        }
        return back();
    }
}
