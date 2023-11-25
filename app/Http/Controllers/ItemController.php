<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        if($request->key){
            $items=Item::where('name','like','%'.$request->key.'%')->get(); 
         }else{
             $items=Item::all();
         }

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    /**
     * 編集画面
     */
    public function edit(Request $request)
    {
        $items =Item::find($request->id);
        return view('item.edit', compact('items'));
    }

    /**
     * 更新
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type'=> 'required',
            'detail' => 'required|max:500',
            ],
            [
                'name.required' => '名前は必須です',
                'name.max:100' => '名前は最大100文字までです',
                'type.required' => '商品種別は必須です',
                'detail.required' => '詳細は必須です',
                'detail.max:500' => '詳細は最大500文字までです',
        ]);
       
        $items=Item::find($request->id);
        $items->update([
        'user_id' => Auth::user()->id,
        'name' => $request->name,
        'detail' => $request->detail,
        'type' => $request->type,
        ]);                      
        return redirect('/items');
    }

    /**
     * 商品削除
     */
    public function destroy(Request $request)
    {
        $items = Item::find($request->id)->delete();
        return redirect('/items');
    }
}
