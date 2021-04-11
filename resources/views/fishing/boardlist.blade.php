@extends('layouts.fishing_template')

@section('main')

    <div style="margin-bottom: 20px ">
        <h1 style="display: inline-block;">掲示板</h1>
        <a href="create" class="btn btn-outline-primary">新規作成</a>
    </div>

    <table class="table table-responsive-md btn-table">
        <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col">tag</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_all as $data)
                <tr>
                    <!-- 削除フラグが有効なとき非表示 -->
                    @if($data->isDeleted == FALSE)
                        <td>{{$data->title}}</td>
                        <td>{{$data->tag_id}}</td>
                        <td>
                            <form method="POST" action="{{route('fishing.destroy',['id' => $data->id])}}">
                                @csrf
                                <input type="submit" value="削除" class="btn btn-danger" >
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
