@extends('layouts.fishing_template')

@section('main')

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <p class="tag ml-3 mb-4">{{ $display_info->tag_name }}</p>
            <h1 style="word-break: break-word;" class="mb-3">{{ $display_info->title }}</h1>
            <div style="background-color: #ffffd2; height:70vh">
                <div style="height: 55vh; background-color:#a8d8ea; overflow-x: auto">
                    <!-- チャット画面 -->
                    @foreach ($contents as $content)
                        @if(  Auth::id() === $content->user_id )
                            <div class="balloon_r mt-4">
                                <div class="says"><p>{{$content->content}}</div>
                            </div>
                        @else
                            <div class="balloon_l">
                                <div class="d-flex chat_user_name">{{$content->user_name}}</div>
                                <p class="says">{{$content->content}}</p>
                            </div>
                        @endif
                    @endforeach
                    <!-- チャット画面 -->
                </div>
                <form action="{{ route('fishing.content_update', ['id' => $display_info->id]) }}" method="POST">
                    @csrf
                    <textarea type="text" class="col-12 d-inline-block" style="height: 15vh; resize: none;" name="content"></textarea>
                    <input type="submit" class="btn btn-primary mb-5 mt-3">
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
