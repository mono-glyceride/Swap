<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //下記を追加
    public function input()
    {
        return view('images.input');
    }

    public function upload(Request $request)
    {        
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {

            Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
            return redirect('/');
        }else{
            return redirect('/upload/image');
        }
    }
    //上記までを追記
}
