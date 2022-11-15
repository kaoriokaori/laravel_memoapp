@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
        メモ編集
        <form class="card-body" action="{{ route('destory') }}" method="POST">
                @csrf
                <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}" />
                <button type="submit">削除</button>
            </form>
        </div>
        <!-- route('store') と書くと→　/store　と書き換えてくれる -->
        <form class="card-body" action="{{ route('update') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}" />
                <div class="form-group">
                    <textarea class="form-control mb-3" name="content" rows="3" placeholder="ここにメモを入力">
                    {{ $edit_memo[0]['content'] }}</textarea>
                </div>

        @foreach($tags as $t)
            <div class="form-check form-check-inline mb-3">
            <!-- name=tagsの後に角カッコをつけることによって配列になる -->
            <!-- 三項演算子　→　if文を1行で各方法  条件　？　trueだったら　：　falseだったら　 -->
            <!-- もし$include_tagにループで回ってるタグのidが含まれれば、checkedをかく -->
            <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t['id'] }}" 
            value="{{ $t['id'] }}" {{ in_array($t['id'], $include_tags) ? 'checked' : '' }}>
            <!-- forを記述すると文字自体がクリック対象になる -->
            <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name'] }}</label>
            </div>
        @endforeach
        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="新しいタグを作成"/>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
    
@endsection
