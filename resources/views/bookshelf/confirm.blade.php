@extends('layouts.layout')

@section('title')
    書籍の詳細
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                        <p class="mb-0 h5">書籍の詳細</p>
                    </div>
                    <!-- <form method="POST" action="{{ route('bookshelf.delete', $book->id) }}"> -->
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="text-light" style="background-color: rgb(106, 106, 106)">
                                <tr class="text-center">
                                    <th scope="col" style="width: 50%">タイトル</th>
                                    <th scope="col" style="width: 15%">カテゴリー</th>
                                    <th scope="col" style="width:15%">ステータス</th>
                                    <th scope="col" style="width: 10%">登録日</th>
                                    <th scope="col" style="width: 10%">完了日</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                    <tr>
                                        <td>{{ $book->title }}</a></td>
                                        <td>{{ $book->category }}</td>
                                        <td><span class="d-inline badge {{ $book->book_status_class }}">{{ $book->book_status_string }}</span></td>
                                        <td>{{ $book->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $book->finished_date }}</td>
                                    </tr>
                            </tbody>
                        </table>
                        
                        <div class="text-center">
                            <p style="color: red">本当に削除しますか？</p>
                            <a href="{{ route('bookshelf.index') }}" class="mr-3 btn btn-secondary" role="button">戻る</a>
                            <!-- <button type="submit" class="btn btn-primary">削除する</button> -->
                            <a href="{{ route('bookshelf.delete', $book->id) }}" class="mr-3 btn btn-danger" role="button">削除する</a>
                        
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
@endsection