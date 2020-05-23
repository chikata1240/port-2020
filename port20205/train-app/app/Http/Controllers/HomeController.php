<?php

namespace App\Http\Controllers;
// モデル
use App\Result;
use App\User;

// リクエストクラス
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

// Auth
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
        return view('top.home');
    }

    public function main()
    {
        $items = User::all();
        return view('user.main',['items' => $items]);
    }

    public function user_edit_get()
    {
        $user = Result::where('user_id',Auth::id())->first();
        $file_name = $user->file_name;
        // var_dump($file_name);
        return view('user.user_edit',compact('file_name'));
    }
    public function user_edit_post(FileRequest $request)
    {
        $path = $request->file('file_name')->store('public/img');
        $file_name = basename($path);
        Result::updateOrCreate(['user_id' => Auth::id()],['file_name' => $file_name]);
        return redirect('/user_edit');
    }
}
