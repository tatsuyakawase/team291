@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                                <div>   
                                    <form action="/items" method="get">
                                        <input type="text" name="key">
                                        <input type="submit" value="検索">
                                    </form>
                                </div>
                                <div class="input-group-append">
                                    <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@switch ($item->type)
                                            @case(1)
                                                <span>野菜</span>
                                                @break
                                            @case(2)
                                                <span>果物</span>
                                                @break
                                            @case(3)
                                                <span>お肉</span>
                                                @break
                                            @case(4)
                                                <span>魚</span>
                                                @break
                                            @case(5)
                                                <span>冷凍食品</span>
                                                @break
                                            @case(6)
                                                <span>米</span>
                                                @break
                                            @case(7)
                                                <span>パン</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('items/edit/'.$item->id) }}">編集</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('items/delete') }}" method="POST"
                                            onsubmit="return confirm('削除します。よろしいですか？');">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
