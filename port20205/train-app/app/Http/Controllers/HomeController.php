<?php

namespace App\Http\Controllers;
// モデル
use App\User;

// リクエストクラス
use Illuminate\Http\Request;
use App\Http\Requests\InputBookRequest;
use App\Http\Requests\InputTrainingRquest;
use App\Http\Requests\ArchiveBookRequest;
use App\Http\Requests\ArchiveTrainingRequest;
use App\Http\Requests\RepliesRequest;
use App\Http\Requests\ImageRequest;

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
  public function main()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    // レコード情報取得
    $user_records = app('App\Myclasses\UserRelation');
    $records = $user_records->record();
    return view('user.main',compact('user_information','arrival','records'));
  }

  // reply?id=
  public function reply(Request $request)
  {
     // コンテンツのid取得
    $progress_id = $request->id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    // リプライレコード取得
    $user_records = app('App\Myclasses\UserRelation');
    list($reply_records,$replies) = $user_records->reply_record($progress_id);
    // ログインユーザーのid保存
    $auth_id = Auth::id();
    return view('user.reply',compact('user_information','arrival','reply_records','replies','progress_id','auth_id'));
  }

  // reply_post?id=
  public function reply_post(RepliesRequest $request)
  {
    // リプライの登録
    $reply_creates = app('App\Myclasses\UserReply');
    $reply_create = $reply_creates->reply_create($request);
    return redirect('/reply?id=' . $request->progress_id);
  }

  // reply_delete?id=
  public function reply_delete(Request $request)
  {
    // リプライの削除
    $reply_deletes = app('App\Myclasses\UserReply');
    $reply_delete = $reply_deletes->reply_delete($request->id);
    return redirect('/reply?id=' . $request->progress_id);
  }

  // user
  public function user()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    // コンテンツの取得
    $plan = app('App\Myclasses\UserPlan');
    // 残り日数の取得
    $contents = $plan->limit();
    return view('user.user',compact('user_information','arrival','contents'));
  }

  // details?id=
  public function details(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // コンテンツ情報取得
    $plan = app('App\Myclasses\UserPlan');
    $detail_content = $plan->select_content($content_id);
    // アーカイブ情報取得
    $execution = app('App\Myclasses\UserExecution');
    $archives = $execution->archives($content_id);
    // type = bookのみページ表示
    $type = $plan->type($content_id);
    if($type == 'book'){
      // 進んだページ
      $reed_page = $execution->reed_pages($content_id);
      // ページ数計算
      $max_page = $plan->max_page($content_id);
      // 残ページ計算
      $remaining_page = $execution->remaining_pages($content_id,$max_page);
      $remaining_pages = ['reed_page' => $reed_page, 'max_page' => $max_page, 'remaining_page' => $remaining_page];
      if($remaining_page >= 100){
        // arrivalの登録
        $arrival_update = app('App\Myclasses\UserPlan');
        $arrival_update->arrival($content_id);
      }else{
        // arrivalの解除
        $arrival_update = app('App\Myclasses\UserPlan');
        $arrival_update->release($content_id);
      }
    }
    $check_arrival = $plan->check_arrival($content_id);
    // ナビゲーション
    $nav_content = "archive?id=" . $content_id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    return view('user.details',compact('user_information','arrival','detail_content','check_arrival','remaining_pages','archives','nav_content','content_id'));
  }

  // details_destroy
  public function details_destroy(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // コンテンツ削除
    $plan_destroy = app('App\Myclasses\UseInputPlan');
    $plan_destroy->plan_destroy($content_id);
    return redirect('/user');
  }

  // details_arrival
  public function details_arrival(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // arrivalの登録
    $arrival = app('App\Myclasses\UserPlan');
    $arrival->arrival($content_id);
    return redirect('/user');
  }

  // details_release
  public function details_release(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // arrivalの解除
    $arrival = app('App\Myclasses\UserPlan');
    $arrival->release($content_id);
    return redirect('/details?id=' . $content_id);
  }

  // input
  public function input_get(Request $request)
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    return view('user.input', compact('user_information','arrival'));
  }

  // input_book
  public function input_book(InputBookRequest $request)
  {
    // Bookコンテンツ登録
    $plan_creates = app('App\Myclasses\UseInputPlan');
    $plan_creates->plan_book_create($request);
    return redirect('/input');
  }

  // input_training
  public function input_training(InputTrainingRquest $request)
  {
    // Trainingコンテンツ登録
    $plan_creates = app('App\Myclasses\UseInputPlan');
    $plan_creates->plan_training_create($request);
    return redirect('/input');
  }

  // archive
  public function archive_get(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->id;
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    // ナビゲーション
    $nav_content = "details?id=" . $content_id;
    $plans = app('App\Myclasses\UserPlan');
    $plan = $plans->plan_record($content_id);
    return view('user.archive',compact('user_information','arrival','content_id','nav_content','plan'));
  }

  // archive_trainin
  public function archive_training(ArchiveTrainingRequest $request)
  {
    // コンテンツのid取得
    $content_id = $request->content_id;
    $archives_creates = app('App\Myclasses\UserExecution');
    $archives_creates->archives_create($request);
    return redirect('/details?id=' . $content_id);
  }

  // archive_book
  public function archive_book(ArchiveBookRequest $request)
  {
    // コンテンツのid取得
    $content_id = $request->content_id;
    $archives_creates = app('App\Myclasses\UserExecution');
    $archives_creates->archives_create($request);
    return redirect('/details?id=' . $content_id);
  }

  // reply_delete?id=
  public function archive_delete(Request $request)
  {
    // コンテンツのid取得
    $content_id = $request->content_id;
    $archive_deletes = app('App\Myclasses\UserExecution');
    $archive_deletes->archive_delete($request->id);
    return redirect('/details?id=' . $content_id);
  }


  // user_edit
  public function user_edit_get()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    return view('user.user_edit',compact('user_information','arrival'));
  }
  public function user_edit_post(ImageRequest $request)
  {
    $updata_file_name = app('App\Myclasses\UserRegistration');
    $updata_file_name->file_update($request);
    return redirect('/user_edit');
  }

  public function test()
  {
    // ユーザー情報取得
    $user_registration_information = app('App\Myclasses\UserRegistration');
    list($user_information,$arrival) = $user_registration_information->file_name();
    return view('user.test',compact('user_information','arrival'));
  }
}
