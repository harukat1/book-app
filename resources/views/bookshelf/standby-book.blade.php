@extends('layouts.layout')


@section('title')
    書籍一覧
@endsection

@section('content')



    <ul class="nav nav-pills nav-justified">
        <li class="nav-item"><a class="nav-link" href="{{ route('bookshelf.index') }}">トップページ</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('bookshelf.completed-book') }}">読み終わった本</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('bookshelf.reading-book') }}">学習中の本</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('bookshelf.standby-book') }}">これから学習する本</a></li>
    </ul>

    <div class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-12 col-lg-12">
            <!-- <div class="col col-md-6 offset-md-3"> -->
                <div class="card">
                    <div class="card-header bg-dark text-light d-flex align-items-center">
                        <p class="mb-0 h5 flex-grow-1">本棚</p>
                        <a href="{{ route('bookshelf.create') }}" class="btn btn-primary">追加</a>
                    </div>
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="text-light" style="background-color: rgb(106, 106, 106)">
                            <tr class="text-center">
                                <th scope="col" style="width: 50%">タイトル</th>
                                <th scope="col" style="width: 15%">カテゴリー</th>
                                <th scope="col" style="width:15%">ステータス</th>
                                <th scope="col" style="width: 10%;">登録日</th>
                                <th scope="col" style="width: 10%">完了日</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($bookshelf as $book)
                                <tr>
                                    
                                    <td><a href="{{ route('bookshelf.detail', ['id'=>$book->id]) }}">{{ $book->title }}</a></td>
                                    <td>{{ $book->category }}</td>
                                    <td><span class="d-inline badge {{ $book->book_status_class }}">{{ $book->book_status_string }}</span></td>
                                    <td>{{ $book->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $book->finished_date }}</td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection