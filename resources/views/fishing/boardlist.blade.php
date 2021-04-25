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

                @foreach($data_all as $data)
                    <div class="card mb-1">
                        <div class="card-body" style="background-color: #f0ffff;">
                            <p class="tag">{{$data->tag_id}}</p><br>
                            <a href="show/<?php echo $data->id?>">{{$data->title}}</a>
                            <!-- <h6 class="d-inline-block">{{$data->title}}</h6> -->
                        </div>
                    </div>
                @endforeach

                <div class="mt-3">
                    {{ $data_all->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
