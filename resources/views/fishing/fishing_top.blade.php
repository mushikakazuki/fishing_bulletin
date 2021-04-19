@extends('layouts.fishing_template')

@section('main')
    <div>
        <header class="mt-4">
            <div class="header-content">
                釣りを今まで以上に楽しいものに<br>
                新たな釣りコミュニティ
            </div>
        </header>
    </div>

    <div class="container">
        <div class="row maincontent">
            <div class="d-inline-block mx-auto">
                <div class="card-description">
                    <div class="card d-inline-block card-style">
                        <img class="card-img-top" src="/img/beginner.jpg" alt="釣り初心者">
                        <div class="card-body">
                        <h4 class="card-title">釣り初心者まとめ</h4>
                        <p class="card-text">釣りを初めてする人や<br>まだまだやり始めた方に向け<br>情報をまとめています。</p>
                        <a href="#" class="btn btn-outline-primary">詳細を見る</a>
                        </div>
                    </div>

                    <div class="card d-inline-block card-style" >
                        <img class="card-img-top" src="/img/fishing.jpg" alt="釣り初心者">
                        <div class="card-body">
                        <h4 class="card-title">交流所</h4>
                        <p class="card-text">釣り友達や釣果、質問など<br>同じ趣味同士の人と<br>交流をすることができます。</p>
                        <a href="{{ route('fishing.index') }}" class="btn btn-outline-primary">詳細を見る</a>
                        </div>
                    </div>

                    <div class="card d-inline-block card-style">
                        <img class="card-img-top" src="/img/event.jpg" alt="釣り初心者">
                        <div class="card-body">
                        <h4 class="card-title">イベント</h4>
                        <p class="card-text">同じ趣味同士で<br>BBQや釣りイベントに参加<br>してみたい方はこちら</p>
                        <a href="#" class="btn btn-outline-primary">詳細を見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
