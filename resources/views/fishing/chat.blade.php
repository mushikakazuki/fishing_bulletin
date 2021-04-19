@extends('layouts.fishing_template')

@section('main')

<div class="container">
    <div class="row maincontent">
        <div class="col">
            <h1 class="d-inline-block">{{ $display_info->title }}</h1>
            <p class="tag ml-5">{{ $display_info->tag_name }}</p>
            <div style="background-color: #ffffd2; height:70vh">
                <div style="height: 55vh; background-color:#a8d8ea;"></div>
                <form action="" method="POST">
                    @csrf
                    <input type="text" class="col-11" style="height: 15vh;" name="content">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
