@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>編集画面</h1>
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

        <form action="{{ url('items/update') }}" method="POST"
            onsubmit="return confirm('更新します、よろしいですか？');">
            @csrf
            <div class="card card-primary">
                <div class="form-group">
                    <div>ID={{$items->id}}</div>
                        <input type="hidden" name="id" value="{{$items->id}}">
                        <label for="name">商品名</label><br>
                        <input type="text" class="form-controll col-md-8" id="name" name="name" value="{{old('name',$items->name)}}" placeholder="">
                </div>

                <div class="form-group">
                    <label for="type">商品種別</label><br>
                    <select class="form-controll col-md-8" name="type">
                        <option value="">選択してください</option>
                        <option value="1" @if(old('type',$items->type)==1) selected @endif>野菜</option>
                        <option value="2" @if(old('type',$items->type)==2) selected @endif>果物</option>
                        <option value="3" @if(old('type',$items->type)==3) selected @endif>お肉</option>
                        <option value="4" @if(old('type',$items->type)==4) selected @endif>魚</option>
                        <option value="5" @if(old('type',$items->type)==5) selected @endif>冷凍食品</option>
                        <option value="6" @if(old('type',$items->type)==6) selected @endif>米</option>
                        <option value="7" @if(old('type',$items->type)==7) selected @endif>パン</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="detail">詳細</label><br>
                    <textarea class="form-controll col-md-8" name="detail" id="">{{old('detail',$items->detail)}}</textarea>
                </div>

                <div class="card-footer">                                            
                        <input type="hidden" name="user_id" value="{{ $items->user_id }}">
                        <input type="submit" value="更新" class="btn btn-primary">
                        <button type="button" class="btn btn-default"><a href="{{ url('/items') }}">キャンセル</a></button>
                </div>
            </div>
        </form>       
    </div>
@stop
    
@section('css')
@stop

@section('js')
@stop
