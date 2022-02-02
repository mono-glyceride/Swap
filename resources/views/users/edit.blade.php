@extends('layouts.app')

@section('content')
{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) }}
<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        {{$user->name}}さんのプロフィール編集
    </h1>
</header>

<main>
<div class="goods_form">
                    {{--
                    {{ Form::label('icon_id', 'アイコン') }}
                    {{Form::file('icon_id', null, ['id' => 'icon_id'])}}
                    --}}
                
    <div class="form_items">
        {{ Form::label('name', '名前') }}
        {{Form::text('name', null, ['id' => 'name'])}}
    </div>
          
    <div class="form_items">          
        {{ Form::label('age', '年齢') }}
        {{Form::select('age', [null,1 => '18歳未満', 2=> '18歳以上',3=> '20歳以上',4=> '非公開'],null,  ['id' => 'age'])}}
    </div>
           
    <div class="form_items">                
        {{ Form::label('prefecture', '地域') }}
        {{Form::select('prefecture',  [null,
                        '1' => '北海道',
                        '2' => '青森県',
                        '3' => '岩手県',
                        '4' => '宮城県',
                        '5' => '秋田県',
                        '6' => '山形県',
                        '7' => '福島県',
                        '8' => '茨城県',
                        '9' => '栃木県',
                        '10' => '群馬県',
                        '11' => '埼玉県',
                        '12' => '千葉県',
                        '13' => '東京都',
                        '14' => '神奈川県',
                        '15' => '新潟県',
                        '16' => '富山県',
                        '17' => '石川県',
                        '18' => '福井県',
                        '19' => '山梨県',
                        '20' => '長野県',
                        '21' => '岐阜県',
                        '22' => '静岡県',
                        '23' => '愛知県',
                        '24' => '三重県',
                        '25' => '滋賀県',
                        '26' => '京都府',
                        '27' => '大阪府',
                        '28' => '兵庫県',
                        '29' => '奈良県',
                        '30' => '和歌山県',
                        '31' => '鳥取県',
                        '32' => '島根県',
                        '33' => '岡山県',
                        '34' => '広島県',
                        '35' => '山口県',
                        '36' => '徳島県',
                        '37' => '香川県',
                        '38' => '愛媛県',
                        '39' => '高知県',
                        '40' => '福岡県',
                        '41' => '佐賀県',
                        '42' => '長崎県',
                        '43' => '熊本県',
                        '44' => '大分県',
                        '45' => '宮崎県',
                        '46' => '鹿児島県',
                        '47' => '沖縄県',
                        ],  
                        null,
        ['id' => 'prefecture'])}}
    </div>
        
    <div class="form_items">                    
        {{ Form::label('gender', '性別') }}
        {{Form::select('gender', [null,1 => '女性', 2=> '男性',3=> 'その他',4=> '非公開'],  null, ['id' => 'gender'])}}
    </div>
    
    <div class="form_items">                
        {{ Form::label('introduce', '自己紹介') }}
        {{Form::textarea('introduce', null, ['id' => 'introduce'])}}
    </div>
    
    <div class="form_items">
        {{ Form::submit('保存', ['class' => 'btn-block btn-primary']) }}
    </div>    
{{ Form::close() }}
</div>
</main>
@include('commons.footer')
@endsection

