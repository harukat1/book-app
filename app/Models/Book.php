<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const BOOK_STATUS_STRING = [
        '学習中',
        'スタンバイ',
        '完了',
    ];

    const BOOK_STATUS_CLASS = [
        'bg-primary',
        'bg-info',
        'bg-secondary',
    ];

    // protected $table = 'bookshelf';

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'book_status',
    ];

    /**
     * Users テーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ステータスのテキスト用アクセサ
     */
    public function getBookStatusStringAttribute()
    {
        $bookStatus = $this->book_status;

        if (!isset(self::BOOK_STATUS_STRING[$bookStatus])) {
            return '';
        }

        return self::BOOK_STATUS_STRING[$bookStatus];
    }

    /**
     * ステータスのBootstrapクラス用アクセサ
     */
    public function getBookStatusClassAttribute()
    {
        $bookStatus = $this->book_status;

        if (!isset(self::BOOK_STATUS_CLASS[$bookStatus])) {
            return '';
        }

        return self::BOOK_STATUS_CLASS[$bookStatus];
    }
}
