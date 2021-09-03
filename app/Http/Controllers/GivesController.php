<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Give;

class GivesController extends Controller
{
    // getでgive/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // give一覧を取得
        $gives = Give::all();

        // give一覧ビューでそれを表示
        return view('gives.index', [
            'gives' => $gives,
        ]);
    }

    // getでgives/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
    }

    // postでgives/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //
    }

    // getでgives/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //
    }

    // getでgives/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでgives/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
    }

    // deleteでgives/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //
    }
}