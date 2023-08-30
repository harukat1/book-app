<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        // ログインユーザーが登録した全ての書籍を取得
        $bookshelf = Auth::user()->bookshelf->all();

        return view('bookshelf.index', compact('bookshelf'));
    }


    /**
     * 合計冊数をカウント
     */
    // public function count()
    // {
    //     Book::selectRaw('COUNT(id) as count_book')->get();
    // }


    /**
     * 書籍の追加画面
     */
    public function create()
    {
        return view('bookshelf.create');
    }

    /**
     * 書籍の追加処理
     */
    public function store(StoreBookRequest $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 書籍の追加処理
            $book = Book::create([
            'title' => $request->title,
            'category' => $request->category,
            'user_id' => Auth::id(),
            ]);

            // トランザクションコミット
            DB::commit();
        } catch(\Exception $e) {
            // トランザクションロールバック
            DB::rollBack();

            // ログ出力
            Log::debug($e);

            // エラー画面遷移
            abort(500);
        }
        

        return redirect()->route('bookshelf.index');
    }

    /**
     * 詳細画面
     */
    public function detail($id)
    {
        $book = Book::find($id);

        return view('bookshelf.detail', compact('book'));
    }

    /**
     * 編集画面
     */
    public function edit($id)
    {
        // 書籍を取得
        $book = Book::find($id);

        // 進捗のテキスト（Bookモデルの定数取得）
        $bookStatusStrings = Book::BOOK_STATUS_STRING;

        // 進捗のクラス（Bookモデルの定数取得）
        $bookStatusClasses = Book::BOOK_STATUS_CLASS;

        return view('bookshelf.edit', compact(
            'book',
            'bookStatusStrings',
            'bookStatusClasses',
        ));
    }

    /**
     * 編集処理
     */
    public function update(UpdateBookRequest $request, $id)
    {
        // 書籍を取得
        $book = Book::find($id);

        // 書籍の編集処理(fill)
        $book->fill([
            'title' => $request->title,
            'category' => $request->category,
            'book_status' => $request->book_status,
            'created_at' => $request->created_at,
            'finished_date' => $request->finished_date,
        ]);

        // 書籍の編集処理(save)
        $book->save();

        return redirect()->route('bookshelf.index');
    }

    /**
     * 削除の確認画面
     */
    public function confirm($id)
    {
        $book = Book::find($id);

        return view('bookshelf.confirm', compact(
            'book',
            // 'bookStatusStrings',
            // 'bookStatusClasses',
        ));
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // return view('bookshelf.index', compact('book'));

        $bookshelf = Auth::user()->bookshelf->all();

        return view('bookshelf.index', compact('bookshelf'));
    }

    //     /**
    //      * 削除画面
    //      */
    //     public function confirm($id)
    //     {
    //         $book = Book::find($id);
            

    //         // Book::find($id)->delete();

    //         return redirect()->route('bookshelf.index');
    //     }

    public static function complete()
    {

        // $bookshelf = Auth::user()->bookshelf->all();
        // $bookshelf = Auth::user()->bookshelf->all();

        // $bookshelf = Auth::user()->bookshelf::where('book_status', 1)->all();

        $auth = new Auth();
        $user = $auth::user();
        $books = $user->bookshelf;
        $bookshelf = $books->where('book_status', 2);
        

        // $user = Auth::user();
        // $bookshelf = $user->bookshelf::where('book_status', 1)->get();

        // $user = Auth::user()->bookshelf;
        // $bookshelf = $user::where('book_status', 1)->get();

        return view('bookshelf.completed-book', compact('bookshelf'));

    }
    public static function reading()
    {
        $auth = new Auth();
        $user = $auth::user();
        $books = $user->bookshelf;
        $bookshelf = $books->where('book_status', 0);

        return view('bookshelf.completed-book', compact('bookshelf'));
    }
    public static function standby()
    {
        $auth = new Auth();
        $user = $auth::user();
        $books = $user->bookshelf;
        $bookshelf = $books->where('book_status', 1);

        return view('bookshelf.completed-book', compact('bookshelf'));
    }


}
