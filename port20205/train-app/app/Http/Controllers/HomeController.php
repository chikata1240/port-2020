<?php

namespace App\Http\Controllers;
// モデル
use App\User;

// リクエストクラス
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Http\Requests\ArchiveRequest;
use App\Http\Requests\InputBookRequest;
use App\Http\Requests\InputTrainingRquest;

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

  // main
  public function main(){
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    // レコード情報取得
    $user_records = app('App\Myclasses\UserRelation');
    $records = $user_records->record();
    return view('user.main',compact('user_information','records'));
  }

  // reply?id=
  public function reply(Request $request){
    if($request->isMethod('POST')){
      $reply_creates = app('App\Myclasses\UserReply');
      $reply_create = $reply_creates->reply_create($request);
    }
     // コンテンツのid取得
    $progress_id = $request->id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    // レコード情報取得
    $user_records = app('App\Myclasses\UserRelation');
    $records = $user_records->record();
    // リプライレコード取得
    list($reply_records,$replies) = $user_records->reply_record($records,$progress_id);
    return view('user.reply',compact('user_information','reply_records','replies'));
  }

  // reply_delete?id=
  public function reply_delete(Request $request){
    $reply_deletes = app('App\Myclasses\UserReply');
    $reply_delete = $reply_deletes->reply_delete($request->id);
    return redirect('/reply?id=' . $request->progress_id);
  }

  // user
  public function user()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    // コンテンツの取得
    $plan = app('App\Myclasses\UserPlan');
    $contents = $plan->contents();
    // 残り日数の取得
    $limit = $plan->limit();
    return view('user.user',compact('user_information','contents','limit'));
  }

  // details?id=
  public function details(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    // コンテンツ情報取得
    $plan = app('App\Myclasses\UserPlan');
    $detail_content = $plan->select_content($content_id);
    // アーカイブ情報取得
    $execution = app()->makeWith('App\Myclasses\UserExecution',['content_id' => $content_id]);
    $archives = $execution->archives();
    // type = bookのみページ表示
    $type = $plan->type();
    if($type == 'book'){
      // 進んだページ
      $reed_page = $execution->reed_pages();
      // ページ数計算
      $max_page = $plan->max_page($content_id);
      // 残ページ計算
      $remaining_page = $execution->remaining_pages($max_page);
      $remaining_pages = ['reed_page' => $reed_page, 'max_page' => $max_page, 'remaining_page' => $remaining_page];
    }
    // ナビゲーション
    $nav_content = "archive?id=" . $content_id;
    return view('user.details',compact('user_information','detail_content','remaining_pages','archives','nav_content'));
  }

  public function details_destroy(Request $request){
    // コンテンツのid取得
    $content_id = $request->id;
    // コンテンツ削除
    $plan_destroy = app('App\Myclasses\UseInputPlan');
    $plan_destroy->plan_destroy($content_id);
    return redirect('/user');
  }

  public function input_get(Request $request){
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    
    return view('user.input', compact('user_information'));
  }
  public function input_book(InputBookRequest $request){
    // Bookコンテンツ登録
    $plan_creates = app('App\Myclasses\UseInputPlan');
    $plan_creates->plan_create($request);
    return redirect('/input');
  }
  public function input_training(InputTrainingRquest $request){
    // Trainingコンテンツ登録
    $plan_creates = app('App\Myclasses\UseInputPlan');
    $plan_creates->plan_create($request);
    return redirect('/input');
  }

  // archive
  public function archive_get(Request $request){
    // コンテンツのid取得
    $content_id = $request->id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    // ナビゲーション
    $nav_content = "details?id=" . $content_id;
    return view('user.archive',compact('user_information','content_id','nav_content'));
  }

  public function archive_post(Request $request){
    // コンテンツのid取得
    $content_id = $request->content_id;
    $archives_creates = app()->makeWith('App\Myclasses\UserExecution',['content_id' => $content_id]);
    $archives_create = $archives_creates->archives_create($request);
    return redirect('/details?id=' . $content_id);
  }

  // reply_delete?id=
  public function archive_delete(Request $request){
    // コンテンツのid取得
    $content_id = $request->content_id;
    $archive_deletes = app()->makeWith('App\Myclasses\UserExecution',['content_id' => $content_id]);
    $archive_delete = $archive_deletes->archive_delete($request->id);
    return redirect('/details?id=' . $content_id);
  }


  // user_edit
  public function user_edit_get()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    return view('user.user_edit',compact('user_information'));
  }
  public function user_edit_post(FileRequest $request)
  {
    $updata_file_name = app('App\Myclasses\UserRegistration');
    $updata_file_name->file_update($request);
    return redirect('/user_edit');
  }

  public function test(){
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    $user_information = $user_registration_information->file_name();
    return view('user.test',compact('user_information'));
  }
}
