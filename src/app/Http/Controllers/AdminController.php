<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Content;
use App\Language;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $all_users = User::get();
        $all_contents = Content::get();
        $all_languages = language::get();
        return view('admin', compact(
            'all_users',
            'all_contents',
            'all_languages'
        ));
    }

    public function newuser()
    {
        return view('newuser');
    }
    public function newuserpost(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => $request->admin,
        ]);
        return redirect('/admin');
    }
    public function deleteuser($id)
    {
        $user = User::find($id);
        return view('deleteuser', compact('user'));
    }
    public function deleteuserpost($id) {
        $user = User::find($id);
        // リレーションのテーブルのレコード削除
        // foreach($questions as $question){
        //     $choices = $question->choices;
        //     foreach($choices as $choice){
        //         $choice->delete();
        //     }
        //     $question->delete();
        // }
        $user->delete();
        return redirect('/home');
    }

    public function newlanguage()
    {
        return view('newlanguage');
    }
    public function newlanguagepost(Request $request)
    {
        Language::create([
            'language' => $request->language,
            'color' => $request->color,
        ]);
        return redirect('/admin');
    }
    public function newcontent()
    {
        return view('newcontent');
    }
    public function newcontentpost(Request $request)
    {
        Content::create([
            'content' => $request->content,
            'color' => $request->color,
        ]);
        return redirect('/admin');
    }
    public function post_data(Request $request)
    {
        return back();
    }
}
