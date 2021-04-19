@extends('layouts.fishing_template')

@section('main')
<div class="container">
    <div class="row maincontent">
        <div class="col">
            <form action="{{ route('Fishing.store') }}" method="POST">
                @csrf
                <h2>title</h2>
                <input class="form-control" name="title" type="text">
                <br>
                <h2>tag</h2>
                <select name="tag" class="form-control" style="width: 15vw;">
                    <option>釣果</option>
                    <option>釣友</option>
                    <option>雑談</option>
                    <option>質問</option>
                    <option>その他</option>
                </select>
                <button type="submit" class="btn btn-primary"  style="margin-top: 20px;">新規作成</button>
            </form>
        </div>
    </div>
</div>


@endsection
