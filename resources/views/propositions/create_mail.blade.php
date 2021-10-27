@extends('layouts.app')

@section('content')
    <div class="exhibit_form">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary simple_header">
                
                <h2 sticky-top>
                    交換リクエストを入力
                </h2>
                
            </div>
        </div>    
                    
            <div class="exhibit_form">
                {!! Form::open(['route' => 'propositions.store', 'files' => true]) !!}
                
                    
                    {{Form::hidden('exhibit_id',$exhibit_id)}}
                    {{Form::hidden('mail_flag',1)}}
                    {{Form::hidden('handing_flag',2)}}
                        
                    {!! Form::label('pic', '画像　【必須】') !!}
                    {{Form::file('pic_id', null, ['id' => 'pic'])}}
                    
                    
                    {!! Form::label('ship_from', '発送元') !!}
                    {{Form::select('ship_from',  [
                    '0' => '--',
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
                    {{Form::select('days', [0 => '--',1 => '1~2日', 2=> '2~3日',3=> '4~7日',],  ['id' => 'days'])}}
                    
                    {!! Form::label('condition', '状態　【必須】') !!}
                    {{Form::select('condition', [1 => '未開封', 2=> '確認のため開封',3=> 'その他',],  ['id' => 'condition'])}}
                
                
                    {!! Form::label('notes', '備考') !!}
                    {{Form::text('notes', null, ['id' => 'notes'])}}
            </div>    
                
            {!! Form::submit('交換リクエストを送信', ['class' => 'btn-block btn-primary']) !!}
            {!! Form::close() !!}
        
            
    
        
        
    </div>
@endsection

