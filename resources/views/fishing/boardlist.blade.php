@extends('layouts.fishing_template')

@section('main')

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <div style="margin-bottom: 15px" class="mx-auto">
                <h1 class="mr-4">交流所</h1>
                <div style="text-align: right;" class="pd-2">
                    <button data-toggle="modal" data-target="#selectmodal" class="btn mr-2 @if(!empty($tag_ids)) btn-info @else btn-outline-info @endif">絞り込み</button>
                    <a href="create" class="btn btn-outline-primary ml-4">新規作成</a>
                </div>
            </div>

            <div class="modal fade" id="selectmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="selectmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="selectmodalLabel">タグの絞り込み</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" method="GET">
                            <div class="modal-body">
                                <input type="checkbox" value="1" name="tag_ids[]" @if(in_array(1,$tag_ids,false)) checked @endif>釣果
                                <input type="checkbox" value="2" name="tag_ids[]" @if(in_array(2,$tag_ids,false)) checked @endif>釣友
                                <input type="checkbox" value="3" name="tag_ids[]" @if(in_array(3,$tag_ids,false)) checked @endif>雑談
                                <input type="checkbox" value="4" name="tag_ids[]" @if(in_array(4,$tag_ids,false)) checked @endif>質問
                                <input type="checkbox" value="5" name="tag_ids[]" @if(in_array(5,$tag_ids,false)) checked @endif>その他
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">絞り込み</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mx-auto">
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
