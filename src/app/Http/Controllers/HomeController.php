<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Language;
use App\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $admin = $user->admin;

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
            'admin',
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

    public function completeIndex()
    {
        return view('complete');
    }
    public function uncompleteIndex()
    {
        return view('uncomplete');
    }
    public function notadminIndex()
    {
        return view('notadmin');
    }

    public function post_data(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'study_hour' => 'required|numeric',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('uncomplete');
        }

        $study_hour = $request['study_hour'];

        $study_language_count = 0;
        $study_languages_result_array = Language::get();
        foreach ($study_languages_result_array as $item) {

            if (isset($request['language' . $item->id])) {
                $study_language_count++;
            }
        }
        if ($study_language_count !== 0) {
            $divide_study_language_hour = $study_hour / $study_language_count;
        }

        $date = $request['date'];
        foreach ($study_languages_result_array as $item) {
            if (isset($request['language' . $item->id])) {
                Data::create([
                    'user_id' => Auth::id(),
                    'language_id' => $item->id,
                    'content_id' => 0,
                    'hour' => $divide_study_language_hour,
                    'date' => $date
                ]);
                $request->timestamps = false;
            }
        }

        $study_content_count = 0;
        $study_contents_result_array = Content::get();
        foreach ($study_contents_result_array as $item) {
            if (isset($request['content' . $item->id])) {
                $study_content_count++;
            }
        }
        if ($study_content_count !== 0) {
            $divide_study_content_hour = $study_hour / $study_content_count;
        }

        $date = $request['date'];
        foreach ($study_contents_result_array as $item) {
            // $i=$i++;
            if (isset($request['content' . $item->id])) {
                Data::create([
                    'user_id' => Auth::id(),
                    'language_id' => 0,
                    'content_id' => $item->id,
                    'hour' => $divide_study_content_hour,
                    'date' => $date
                ]);
                $request->timestamps = false;
            }
        }
        return redirect(route('complete'));
    }
}
