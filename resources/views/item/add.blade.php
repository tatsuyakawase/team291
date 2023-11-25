@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="type">商品種別</label>
                            <select type="text" class="form-control" id="type" name="type" placeholder="種別">
                                        <option value="">選択してください</option>
                                        <option value="1" @if('1'=== old('type')) selected @endif>野菜</option>
                                        <option value="2" @if('2'=== old('type')) selected @endif>果物</option>
                                        <option value="3" @if('3'=== old('type')) selected @endif>お肉</option>
                                        <option value="4" @if('4'=== old('type')) selected @endif>魚</option>
                                        <option value="5" @if('5'=== old('type')) selected @endif>冷凍食品</option>
                                        <option value="6" @if('6'=== old('type')) selected @endif>米</option>
                                        <option value="7" @if('7'=== old('type')) selected @endif>パン</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
