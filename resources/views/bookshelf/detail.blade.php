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
                        <p class="mb-0 h5 flex-grow-1">書籍の詳細</p>
                        <a href="{{ route('bookshelf.edit', ['id'=>$book->id]) }}" class="btn btn-info" style="margin-right: 1rem;">編集</a>
                        <a href="{{ route('bookshelf.confirm', ['id'=>$book->id]) }}" class="btn btn-danger">削除</a>
                    </div>
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
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->category }}</td>
                                <td><span class="d-inline badge {{ $book->book_status_class }}">{{ $book->book_status_string }}</span></td>
                                <td>{{ $book->created_at->format('Y-m-d') }}</td>
                                <td>{{ $book->finished_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection