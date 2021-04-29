@extends('layouts.fishing_template')

@section('main')

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <p class="tag ml-3 mb-4">{{ $display_info->tag_name }}</p>
            <h1 style="word-break: break-word;" class="mb-3">{{ $display_info->title }}</h1>
            <div style="background-color: #ffffd2; height:70vh">
                <div style="height: 55vh; background-color:#a8d8ea;"></div>
                <form action="" method="POST">
                    @csrf
                    <textarea type="text" class="col-12 d-inline-block" style="height: 15vh; resize: none;" name="content"></textarea>
                    <input type="submit" class="btn btn-primary mb-5 mt-3">
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
