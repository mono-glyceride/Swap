@extends('layouts.app')

@section('content')
    <div class="exhibit_form">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary simple_header">
                
                <h2 sticky-top>
                    出品情報を入力
                </h2>
                
            </div>
        </div>    
         
        
        
        
        <h2 class="border border-primary">
                あなたの譲るグッズ
        </h2>
            <div class="exhibit_form">

                    {!! Form::open(['route' => 'exhibits.store', 'files' => true]) !!}
                    {!! Form::label('pic', '画像 【必須】') !!}
                    {{Form::file('pic_id', null, ['id' => 'pic'])}}
                
                
                    {!! Form::label('origin', '作品') !!}
                    {{Form::text('origin', null, ['id' => 'origin'])}}
                    
                
                    {!! Form::label('character', 'キャラクター　【必須】') !!}
                    {{Form::text('character', null, ['id' => 'character'])}}
                
                
                
                    {!! Form::label('goods_type', 'グッズタイプ') !!}
                    {{Form::text('goods_type', null, ['id' => 'goods_type'])}}
                
          
                    {!! Form::label('key_wprd', 'キーワード') !!}
                    {{Form::text('key_wprd', null, ['id' => 'key_wprd'])}}
                
                
                    {!! Form::label('condition', '状態') !!}
                    {{Form::select('condition', [1 => '未開封', 2=> '確認のため開封',3=> 'その他',],  ['id' => 'condition'])}}
                
                
                    {!! Form::label('notes', '備考') !!}
                    {{Form::text('notes', null, ['id' => 'notes'])}}
            </div>
            
        <h2 class="border border-primary">
        　あなたが求めるグッズ            
        </h2>
            <div class="exhibit_form">        
                    {!! Form::label('user_pic', '画像') !!}
                    {{Form::file('want_pic_id', null, ['id' => 'want_pic'])}}
                
                
                    {!! Form::label('want_origin', '作品') !!}
                    {{Form::text('want_origin', null, ['id' => 'want_origin'])}}
                    
                
                    {!! Form::label('want_character', 'キャラクター【必須】') !!}
                    {{Form::text('want_character', null, ['id' => 'want_character'])}}
                
                
                    {!! Form::label('want_goods_type', 'グッズタイプ') !!}
                    {{Form::text('want_goods_type', null, ['id' => 'want_goods_type'])}}
                
          
                    {!! Form::label('want_key_wprd', 'キーワード') !!}
                    {{Form::text('want_key_word', null, ['id' => 'want_key_wprd'])}}
                
                
                    {!! Form::label('want_notes', '備考') !!}
                    {{Form::text('want_notes', null, ['id' => 'want_notes'])}}
            </div>
                
        <h2 class="border border-primary">
        　交換方法            
        </h2>       
            <div class="exhibit_form">
                    {!! Form::label('mail', '郵送　【必須】') !!}
                    {{Form::select('mail_flag', [true => '対応する', false => '対応しない'],  ['id' => 'mail'])}}
                    
                    {!! Form::label('ship_from', '発送元') !!}
                    {{Form::select('ship_from',  [
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
                        ['id' => 'ship_from'])}}
                        
                    {!! Form::label('days', '発送までの日数') !!}
                    {{Form::select('days', [1 => '1~2日', 2=> '2~3日',3=> '4~7日',],  ['id' => 'days'])}}

                    {!! Form::label('handing', '手渡し　【必須】') !!}
                    {{Form::select('handing_flag',[true => '対応する', false => '対応しない'],  ['id' => 'handing'])}}
                
                    {!! Form::label('place', '手渡し対応地域') !!}
                    {{Form::text('place', null, ['id' => 'place'])}}
                    
                
                    
            </div>   
            {!! Form::submit('出品', ['class' => 'btn-block btn-primary']) !!}
            {!! Form::close() !!}
        
            
    
        
        
    </div>
@endsection

<style>
.exhibit_form h2{
    width: 100%; 
    
}

.exhibit_form form{
    display: grid; 
    
}

.exhibit_form div{
    display: grid; 
    
}

.form-group {
    display: grid; 
    
}

.exhibit_form label{
    grid-column: 1;
    
}

.exhibit_form input{
    grid-column: 2;
    margin-bottom:1em;
    margin-top:1em;
    
}

.exhibit_form serect{
    grid-column: 2;
    
}

.exhibit_form div{
    margin-bottom:2em;
}

</style>