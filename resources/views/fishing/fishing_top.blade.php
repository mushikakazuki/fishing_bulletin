@extends('layouts.fishing_template')

@section('main')
    <div style="margin-top: 250px;" class="d-inline-block mx-auto">
        <div class="mx-auto d-inline-block">
            <h1>釣り人の</h1>
            <h1 style="padding-left: 10vw">釣り人による</h1>
            <h1 style="padding-left: 25vw">釣り人のための交流所</h1>
        </div>

        <div style="margin-top: 300px;">
            <h1>このサイトは</h1>
            <h1 style="margin-left: 4vw;">釣り初心者や釣友を探したり</h1>
            <h1 style="margin-left: 8vw;">質問やイベント、情報収集など</h1>
            <h1 style="margin-left: 12vw;">釣りに関する多目的交流所です</h1>
        </div>

        <div style="margin: 200px 0px">
            <div class="card d-inline-block" style="width: 16rem;">
                <img class="card-img-top" src="/img/beginner.jpg" alt="釣り初心者">
                <div class="card-body">
                <h4 class="card-title">釣り初心者まとめ</h4>
                <p class="card-text">釣りを初めてする人や<br>まだまだやり始めた方に向け<br>情報をまとめています。</p>
                <a href="#" class="btn btn-outline-primary">詳細を見る</a>
                </div>
            </div>

            <div class="card d-inline-block" style="width: 16rem;">
                <img class="card-img-top" src="/img/fishing.jpg" alt="釣り初心者">
                <div class="card-body">
                <h4 class="card-title">交流所</h4>
                <p class="card-text">釣り友達や釣果、質問など<br>同じ趣味同士の人と<br>交流をすることができます。</p>
                <a href="{{ route('fishing.index') }}" class="btn btn-outline-primary">詳細を見る</a>
                </div>
            </div>

            <div class="card d-inline-block" style="width: 16rem;">
                <img class="card-img-top" src="/img/event.jpg" alt="釣り初心者">
                <div class="card-body">
                <h4 class="card-title">イベント</h4>
                <p class="card-text">同じ趣味同士で<br>BBQや釣りイベントに参加<br>してみたい方はこちら</p>
                <a href="#" class="btn btn-outline-primary">詳細を見る</a>
                </div>
            </div>
        </div>
    </div>



@endsection
