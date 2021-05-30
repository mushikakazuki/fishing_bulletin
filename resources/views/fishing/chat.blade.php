@extends('layouts.fishing_template')

@section('main')

<script>
    // モーダルにtextareaの情報を渡す
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

    // 返信設定
    function response(user_name, message, id)
    {
        document.getElementById('responseid').value = id;
        displayContent = '@' + user_name + '   ' + message;
        document.getElementById('responseArea').value = displayContent;
        document.getElementById('responsemessage').value = displayContent;
        document.getElementById('resCancel').removeAttribute('disabled');
    }

    function replace(content) {
        str = content.split('\n');
        return str.join(' ');
    }

    // アンカーリンク
    function pagelink(resid) {
        window.location.hash = resid;
    }

    // 送信取り消し時、宛先削除
    function responseCancel() {
        document.getElementById('resCancel').setAttribute('disabled', true);
        document.getElementById('responseArea').value = '';
        document.getElementById('responsemessage').value = '';
    }
</script>

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <p class="tag ml-3 mb-4">{{ $display_info->tag_name }}</p>
            <h1 style="word-break: break-word;" class="mb-3">{{ $display_info->title }}</h1>
            <div style="height:70vh">
                <div style="height: 40vh; background-color:#a8d8ea; overflow-x: auto">
                    <!-- チャット画面 -->
                    @foreach ($contents as $content)
                    <!-- アンカーリンク用 -->
                    <a name="{{ $content->id }}"></a>
                        @if(  Auth::id() === $content->user_id )
                            <div class="balloon_r mt-4">
                                <div class="says">
                                    @if(isset($content->rescontent))
                                        <div onclick="pagelink('{{$content->responseid}}')">
                                            <p>返信先 | 返信内容</p>
                                            <p class="chat_rescontent">{{ $content->rescontent }}</p>
                                        </div>
                                    @endif
                                    <p>{{ $content->content }}</p>
                                </div>
                            </div>
                        @else
                            <div class="balloon_l">
                                <div class="d-flex chat_user_name">{{$content->user_name}}<span class="ml-3 res-style" onclick="response( '{{ $content->user_name }}',replace(`{{ $content->content }}`) , '{{ $content->id }}' )">返信</span></div>
                                <div class="says">
                                    @if(isset($content->rescontent))
                                        <div onclick="pagelink('{{$content->responseid}}')">
                                            <p>返信先 | 返信内容</p>
                                            <p class="chat_rescontent">{{ $content->rescontent }}</p>
                                        </div>
                                    @endif
                                    <p>{{ $content->content }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- チャット画面 -->
                </div>

                <!-- 戻る専用フォーム　※textエリアの内容はmodalに値を渡している -->
                <form action="{{ route('fishing.index') }}" method="GET">
                    @csrf
                    <input  type="text" class="col-12 form-control" name="response" id="responseArea" style="text-overflow: ellipsis" readonly>
                    <textarea type="text" class="col-12 d-block" style="height: 15vh; resize: none;" oninput="contentText()" name="content" id="message"></textarea>

                    <div class="button_grop">
                        <button type="submit" class="btn btn-secondary mb-5 mt-3 mr-auto">戻る</button>
                        <button type="button" class="btn btn-primary mb-5 mt-3 mr-4" id="resCancel" disabled="true" data-toggle="modal" data-target="#resCancelModal">返信取消</button>
                        <button type="button" class="btn btn-primary mb-5 mt-3" data-toggle="modal" data-target="#sentModel" id="sent" disabled="true">送信</button>
                    </div>
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
                                    <!-- 送信内容 -->
                                    <input type="hidden" name="content" id="registerContent">

                                    <!-- 返信内容情報 -->
                                    <input type="hidden" name="resid" id="responseid">
                                    <input type="hidden" name="resmessage" id="responsemessage">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 送信確認&登録 -->
                <div class="modal fade" data-backdrop="static" id="resCancelModal" tabindex="-1" role="dialog" aria-labelledby="resCancelModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="resCancelModalLabel">削除確認</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                返信先を削除しますか？
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-danger ml-2" data-dismiss="modal" onclick="responseCancel()">削除</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
