@extends('layouts.layout')

@section('title')
    書籍の詳細
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-light d-flex align-items-center">
                        <p class="mb-0 h5 flex-grow-1">書籍情報の編集</p>
                    </div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('bookshelf.update', $book->id) }}">
                        @csrf

                        <table class="table table-hover table-bordered mb-0">
                            <thead class="text-light" style="background-color: rgb(106, 106, 106)">
                                <tr class="text-center">
                                    <th scope="col" style="width: 50%">タイトル</th>
                                    <th scope="col" style="width: 15%">カテゴリー</th>
                                    <th scope="col" style="width:15%">ステータス</th>
                                    <th scope="col" style="width: 10%;">登録日</th>
                                    <th scope="col" style="width: 10%;">完了日</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>
                                        <input id="title" type="type" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $book->title) }}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="category" type="type" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $book->category) }}" required autocomplete="category" autofocus>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <select name="book_status" id="book_status" class="form-select @error('book_status') is-invalid @enderror">
                                            @foreach ($bookStatusStrings as $key => $bookStatusString)
                                            <option @if ($key == old('book_status', $book->book_status)) selected @endif value="{{ $key }}">{{ $bookStatusString }}</option>
                                            @endforeach
                                        </select>
                                        @error('book_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="created_at" name="created_at" type="date" class="form-control @error('created_at') is-invalid @enderror" value="{{old('created_at', $book->created_at)}}" autocomplete="created_at" autofocus>
                                        @error('created_at')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input id="finished_date" name="finished_date" type="date" class="form-control @error('finished_date') is-invalid @enderror" value="{{old('finished_date', $book->finished_date)}}" autocomplete="finished_date" autofocus>
                                        @error('finished_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group d-flex mt-3 mb-0">
                            <div class="col-md-10 col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info">更新</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




{--  @section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">書籍情報の編集</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookshelf.update', $book->id) }}">
                            @csrf

                            <div class="form-group d-flex flex-column flex-md-row">
                                <label for="title" class="cok-md-4 col-form-label text-md-right">タイトル：</label>
                                <div class="col-md-6">
                                    <input id="title" type="type" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $book->title) }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column flex-md-row xmt-3">
                                <label for="category" class="col-md-4 col-form-label text-md-right">カテゴリー：</label>
                                <div class="col-md-6">
                                    <input id="category" type="type" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $book->category) }}" required autocomplete="category" autofocus>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex flex-column flex-md-row xmt-3">
                                <label for="book_status" class="col-md-4 col-form-label text-md-right">ステータス：</label>
                                <div class="col-md-6">
                                    <select name="book_status" id="book_status" class="form-select @error('book_status') is-invalid @enderror">
                                        @foreach ($bookStatusStrings as $key => $bookStatusString)
                                            <option @if ($key == old('book_status', $book->book_status)) selected @endif value="{{ $key }}">{{ $bookStatusString }}</option>
                                        @endforeach
                                    </select>
                                    @error('book_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group d-flex mt-3 mb-0">
                                <div class="col-md-10 col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">更新</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  --}