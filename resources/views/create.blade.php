@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">新規メモ作成</div>
        <!-- route('store') と書くと→　/store　と書き換えてくれる -->
        <form class="card-body" action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-group" >
                <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
            </div>
        @foreach($tags as $t)
            <div class="form-check form-check-inline mb-3">
            <!-- name=tagsの後に[]をつけることによって配列になる -->
            <input class="form-check-input" type="checkbox" name="tags[]" id="{{$t['id']}}" value="{{ $t  ['id'] }}">
            <!-- forを記述すると文字自体がクリック対象になる -->
            <label class="form-check-label" for="{{ $t['id'] }}">{{ $t['name'] }}</label>
            </div>
        @endforeach
            <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="新しいタグを作成"/>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
    
@endsection