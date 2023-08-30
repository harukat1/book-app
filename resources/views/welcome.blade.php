@extends('layouts.layout')

@section('title')
    学習管理
@endsection

@section('content')
    <div class="toppage d-flex flex-column justify-content-center align-items-center ">
        <div class="h1 text-center">
            <h1 class="text-light">学習管理</h1>
            <h2 class="text-light">学習管理とモチベーションアップに</h2>
        </div>
        <div class="d-flex">
            @auth
                <a href="{{ route('bookshelf.index') }}" class="btn btn-success">マイページへ</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-success">まずは無料で登録する</a>
            @endauth
        </div>
    </div>
@endsection