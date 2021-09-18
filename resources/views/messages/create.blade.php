@extends('layouts.appsimple')

<link rel="stylesheet" href="css/talk.css">

@section('content')
    
    <div >
        
        <div class="d-none d-md-block">
        @include('../commons.navbar')
        </div>
        
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>{{-- 戻るボタン --}}
                    @include('../commons.back_button')相手ユーザー名</h1>
                
            </div>
        </div>
        
        <div class="talk">
            {{-- 表示している本人のコメントならmineクラス、相手のものならyoursクラスで生成 --}}
            
            <div class="yours">
                {{-- 求めるグッズのサムネイル --}}
                <img src="img.jpg" class="img-responsive img-rounded give_img"  width="100" height="100">
            </div>
            
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="img.jpg" class="img-responsive img-rounded give_img" alt="譲"  width="100" height="100">
            </div>
            
            {{-- 本人のコメント --}}
            <div class="mine">
                <p class="my_comment">よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 相手のコメント --}}
            <div class="yours">
                <p class="your_comment">丁寧な取引を心がけさせていただきます。よろしくお願いします</p>
            </div>
            
            {{-- 本人のコメント --}}
            <div class="mine">
                <p class="my_comment">よろしくお願いします</p>
            </div>
            
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="img.jpg" class="img-responsive img-rounded give_img" alt="譲"  width="100" height="100">
            </div>
            
        </div>
        
        <div class="talk_footer">
            <form action="form.php" method="post">
      <div>
        <label for="message">message:</label><br>
        <input type="text" / class="message_box"><button type="submit"><i class="fas fa-paper-plane"></i></button>
      </div>
    </form>
        </div>
        
        
    </div>
@endsection