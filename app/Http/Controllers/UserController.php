<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Prefecture;



class UserController extends Controller
{
    /**
     * ユーザー情報と都道府県情報を取得して確認ページへ渡す
     */
    public function user_inf()
    {
        //Userモデルからユーザ情報の取得
        $user = new User();
        $user = $user->User_Data();
        return view('user_update.user_inf', $user);
    }

    //ユーザー名変更ページへ移動
    public function name_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->getName($request);

        return view('user_update.name_edit', $user);
    }

    //ユーザー名の変更を実行
    public function name_update(Request $request)
    {
        // /**バリデーションの実行 */
        $this->validate($request, User::$name_rules);

        $user = new User();
        $user = $user->getName($request);
        // dd($user);

        /**formの内容を全て取得 */
        $form = $request->all();

        /**更新内容の保存 */
        $user->fill($form)->save();
        /**ユーザ情報ページにリダイレクト */
        return redirect('/user_inf');
    }

    //パスワード変更ページへ移動
    public function pass_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->getName($request);

        return view('user_update.pass_edit', $user);
    }

    //ユーザー名の変更を実行
    // public function pass_update(Request $request)
    // {
    //     // /**バリデーションの実行 */
    //     $this->validate($request, User::$name_rules);

    //     $user = new User();
    //     $user = $user->getName($request);
    //     // dd($user);

    //     /**formの内容を全て取得 */
    //     $form = $request->all();

    //     /**更新内容の保存 */
    //     $user->fill($form)->save();
    //     /**ユーザ情報ページにリダイレクト */
    //     return redirect('/user_inf');
    // }

    //メールアドレス変更ページへ移動
    public function email_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->getName($request);

        return view('user_update.email_edit', $user);
    }
    // メールアドレスの変更を実行
    public function email_update(Request $request)
    {
        /**バリデーションの実行 */
        $this->validate($request, User::$email_rules);

        $user = new User();
        $user = $user->getName($request);
        // dd($user);

        /**formの内容を全て取得 */
        $form = $request->all();

        /**更新内容の保存 */
        $user->fill($form)->save();
        /**ユーザ情報ページにリダイレクト */
        return redirect('/user_inf');
    }

    //電話番号変更ページへ移動
    public function phone_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->getName($request);

        return view('user_update.phone_edit', $user);
    }

    //電話番号の変更を実行
    public function phone_update(Request $request)
    {
        // /**バリデーションの実行 */
        $this->validate($request, User::$phone_rules);

        $user = new User();
        $user = $user->getName($request);
        // dd($user);

        /**formの内容を全て取得 */
        $form = $request->all();

        /**更新内容の保存 */
        $user->fill($form)->save();
        /**ユーザ情報ページにリダイレクト */
        return redirect('/user_inf');
    }

    //住所変更ページへ移動
    public function address_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->getName($request);

        return view('user_update.address_edit', $user);
    }
    // //住所の変更を実行
    // public function address_update(Request $request)
    // {
    //     // /**バリデーションの実行 */
    //     $this->validate($request, User::$name_rules);

    //     $user = new User();
    //     $user = $user->getName($request);
    //     // dd($user);

    //     /**formの内容を全て取得 */
    //     $form = $request->all();

    //     /**更新内容の保存 */
    //     $user->fill($form)->save();
    //     /**ユーザ情報ページにリダイレクト */
    //     return redirect('/user_inf');
    // }

    /**
     * ユーザー情報変更ページ
     */
    public function user_edit(Request $request)
    {
        //ユーザー情報の取得
        $user = new User();
        $user = $user->User_Data();

        //都道府県情報の取得
        $prefectures = new Prefecture();
        $prefectures = $prefectures->getData();

        $data = [
            'user' => $user,
            'prefectures' => $prefectures,
        ];

        return view('login_EC.user_up', $data);
    }

    // /**
    //  * ユーザー情報変更処理
    //  */
    // public function user_up(Request $request)
    // {
    //     /**バリデーション */
    //     $this->validate($request, User::$rules, User::$messages);

    //     /**変更するユーザ情報の確定 */
    //     $auth = User::find(Auth::user()->id);
    //     // dd($auth);

    //     /**formの内容を全て取得 */
    //     $form = $request->all();

    //     /**更新内容の保存 */
    //     $auth->fill($form)->save();

    //     /**ユーザ情報ページにリダイレクト */
    //     return redirect('/login/main');
    // }
}
