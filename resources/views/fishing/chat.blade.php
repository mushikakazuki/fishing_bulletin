@extends('layouts.fishing_template')

@section('main')

<script>
    function contentText() {
        message = document.getElementById("message").value;
        document.getElementById('displayMessage').textContent = message;
        document.getElementById('registerContent').value = message;
        if(message.length == 0) {
            document.getElementById('sent').setAttribute('disabled', true);
        }
        else {
            document.getElementById('sent').removeAttribute('disabled');
        }
}
</script>

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
                <!-- 戻る専用フォーム　※textエリアの内容はmodalに値を渡している -->
                <form action="{{ route('fishing.index') }}" method="GET">
                    @csrf
                    <textarea type="text" class="col-12 d-inline-block" style="height: 15vh; resize: none;" onchange="contentText()" name="content" id="message"></textarea>
                    <button type="submit" class="btn btn-secondary mb-5 mt-3">戻る</button>
                    <button type="button" class="btn btn-primary mb-5 mt-3" style="float: right;" data-toggle="modal" data-target="#sentModel" id="sent" disabled="true">送信</button>
                </form>

                <!-- モーダル画面 -->
                <!-- 送信確認&登録 -->
                <div class="modal fade" data-backdrop="static" id="sentModel" tabindex="-1" role="dialog" aria-labelledby="sentModelLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sentModelLabel">内容確認</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                下記の内容を登録しますか？
                                <div id="displayMessage"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <form action="{{ route('fishing.content_update', ['id' => $display_info->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="content" id="registerContent">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
