<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    // getでreview/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        // exhibit一覧を取得
        $exhibits = Exhibit::where('exhibits.status',1)->paginate(10);
        
        // exhibit一覧ビューでそれを表示
        return view('exhibits.index', [
            'exhibits' => $exhibits,
        ]);
        
    }
}
