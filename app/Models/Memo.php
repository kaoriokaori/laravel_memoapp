<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    // ===ベースのメソッド===
    public function getMyMemo(){
        $query_tag = \Request::query('tag');
        $query = Memo::query()->select('memos.*') 
            ->where('user_id', '=', \Auth::id() )
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC'); // ASC＝小さい順, DESC=大きい順（新しい順）
    // もしクエリパラメーターtagがあれば
    if(!empty($query_tag) ){
            $query->leftJoin('memo_tags', 'memo_tags.memo_id', '=', 'memos.id')
            ->where('memo_tags.tag_id', '=', $query_tag);
        }

        $memos = $query->get();


    return $memos;
    }
}
