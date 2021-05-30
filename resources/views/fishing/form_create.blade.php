@extends('layouts.fishing_template')

@section('main')
<div class="container">
    <div class="row maincontent" style="padding-bottom: 40px; border-radius: 50px">
        <div class="col-12 d-flex justify-content-center">
            <form action="{{ route('Fishing.store') }}" method="POST" id="formBox" class="col-12 col-md-8">
                <h1 class="pt-1 pl-1 pt-md-3 pl-md-4">新規作成</h1>
                @csrf
                <div class="form_position">
                    <h2 class="form-title d-inline-block">タイトル</h2>
                    <div class="d-inline-block error_message">※必須</div>
                    <input class="form-control @error('title') is-invalid @enderror col-12 col-md-6" name="title" type="text" placeholder="タイトルを入力してください" value="{{ old('title') }}">
                    @error('title')
                        <strong class="error_message d-block">※{{ $message }}</strong>
                    @enderror

                    <h2 class="mt-4 form-title d-inline-block">タグ設定</h2>
                    <div class="d-inline-block error_message">※必須</div>

                    <select name="tag" class="form-control col-12 col-md-4 @error('tag') is-invalid @enderror">
                        <option value="">-- 選択してください --</option>
                        <option value="1" @if(old('tag') === "1") selected @endif>釣果</option>
                        <option value="2" @if(old('tag') === "2") selected @endif>釣友</option>
                        <option value="3" @if(old('tag') === "3") selected @endif>雑談</option>
                        <option value="4" @if(old('tag') === "4") selected @endif>質問</option>
                        <option value="5" @if(old('tag') === "5") selected @endif>その他</option>
                    </select>

                    <div>
                        @error('tag')
                            <strong class="error_message">※{{ $message }}</strong>
                        @enderror
                    </div>

                    <h2 class="mt-4 d-inline-block form-title">投稿内容</h2>
                    <div class="d-inline-block error_message">※必須</div>
                    <textarea class="form-control @error('content') is-invalid @enderror col-12 col-md-11 textarea" name="content" type="text">{{ old('content') }}</textarea>
                    @error('content')
                        <strong class="error_message">※{{ $message }}</strong>
                    @enderror
                    <div class="d-flex">
                        <button type="submit" class="btn btn-secondary" style="margin-top: 20px;" name='back'>戻る</button>
                        <button type="submit" class="btn btn-primary ml-auto mr-md-5 " style="margin-top: 20px;" name='create'>作成</button>
                    </div>
                </>
            </form>
        </div>
    </div>
</div>


@endsection
