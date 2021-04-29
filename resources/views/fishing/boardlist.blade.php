@extends('layouts.fishing_template')

@section('main')

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <div style="margin-bottom: 15px" class="mx-auto">
                <h1 class="mr-4">交流所</h1>
                <div style="text-align: right;" class="pd-2">
                    <form action="" method="GET" class="d-inline-block">
                        <select name="tag" class="form-control d-inline-block" style="width: 15vw;">
                            <option value="">選択してください</option>
                            <option value="1" @if($tag === '1') selected @endif>釣果</option>
                            <option value="2" @if($tag === '2') selected @endif>釣友</option>
                            <option value="3" @if($tag === '3') selected @endif>雑談</option>
                            <option value="4" @if($tag === '4') selected @endif>質問</option>
                            <option value="5" @if($tag === '5') selected @endif>その他</option>
                        </select>

                        <input type="submit" value="絞り込み" class="btn btn-outline-info mr-2"></input>
                    </form>
                    <a href="create" class="btn btn-outline-primary  ml-4">新規作成</a>
                </div>
            </div>


            <div class="mx-auto">
                @if(!empty($tag_name))
                    <div class="mb-2">※現在{{$tag_name}}で絞り込みを行っています。<br>解除する際は選択してくださいの状態で絞り込みをしてください。</div>
                @endif

                <!-- hoverあり -->
                @foreach($data_all as $index => $data)
                <!-- <a href="{{ route('Fishing.show',['id' => $data->id]) }}"> -->
                <a href="{{ route('Fishing.show',['id' => $data->id ]) }}">
                <div class="card mb-3 d-inline-block @if($index % 2 === 0) mr-4 @endif" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset($data->img)}}" alt="img" class="card-img" style="height: 126.667px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body button-4">
                                    <div class="eff-4"></div>
                                    <p class="tag">{{$data->tag_name}}</p>
                                    <h5 class="card-title d-inline-block mr-2 pt-2">{{$data->title}}</h5>
                                    <p class="card-text initcontent">{{$data->init_content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

                <div class="mt-3">
                    {{ $data_all->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
