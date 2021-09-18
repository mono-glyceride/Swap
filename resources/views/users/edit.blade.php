@extends('layouts.app')

@section('content')
    <div class="exhibit_form">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary simple_header">
                
                <h2 sticky-top>
                    {{-- 戻るボタン --}}
                    {{ $user->name }}さんのプロフィール編集
                </h2>
                
            </div>
            
                
                
                {{-- 交換ボタン --}}
                    <div>
                     {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                   
                    {{--
                    {!! Form::label('icon_id', 'アイコン') !!}
                    {{Form::file('icon_id', null, ['id' => 'icon_id'])}}
                    --}}
                
                    {!! Form::label('name', '名前') !!}
                    {{Form::text('name', null, ['id' => 'name'])}}
                    
                    {!! Form::label('age', '年齢') !!}
                    {{Form::select('age', [1 => '18歳未満', 2=> '18歳以上',3=> '20歳以上',4=> '非公開'],null,  ['id' => 'age'])}}
           
                    
                    {!! Form::label('prefecture', '地域') !!}
                    {{Form::select('prefecture',  [
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
                        
                    {!! Form::label('gender', '性別') !!}
                    {{Form::select('gender', [1 => '女性', 2=> '男性',3=> 'その他',4=> '非公開'],  null, ['id' => 'gender'])}}
                    
                    {!! Form::label('introduce', '自己紹介') !!}
                    {{Form::textarea('introduce', null, ['id' => 'introduce'])}}

            {!! Form::submit('保存', ['class' => 'btn-block btn-primary']) !!}
                        
                        
                        
                        {!! Form::close() !!}
                        
                    </div>
            </div>
            
            
            
            
        </div>
        
    </div>
@endsection

