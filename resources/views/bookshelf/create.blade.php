@extends('layouts.layout')

@section('title')
    新しい書籍の追加
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">新しい書籍の追加</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookshelf.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="col-md-4 col-form-label text-md-right">タイトル：</label>
                                <div class="col-md-6">
                                    <input id="title" type="type" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="category" class="col-md-4 col-form-label text-md-right">カテゴリー：</label>
                                <div class="col-md-6">
                                    <input id="category" type="type" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex mt-3 mb-0">
                                <div class="col-md-10 col-12 d-flex justify-content-end">
                                    <a href="{{ route('bookshelf.index') }}" class="mr-3 btn btn-secondary">戻る</a>
                                    <button type="submit" class="btn btn-primary">追加</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection