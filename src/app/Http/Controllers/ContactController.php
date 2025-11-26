<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // 入力画面を表示
    public function index(Request $request)
    {
        $categories = \App\Models\Category::all();

        // POSTで戻ってきた場合は、入力値を old() にフラッシュ
        if ($request->isMethod('post')) {
            $request->flash();
        }

        return view('index', compact('categories'));
    }

    // 確認画面に進む（バリデーションを実行）
    public function confirm(ContactRequest $request)
    {
        // 両方空欄なら「お名前を入力してください」と追加
        if (empty($request->name_sei) && empty($request->name_mei)) {
            return back()
                ->withErrors(['name' => '1.お名前を入力してください'])
                ->withInput();
        }
        
        $inputs = $request->only([
            'name_sei',
            'name_mei',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building-name',
            'category',
            'content'
        ]);
        
        // カテゴリー名を取得して追加
        $category = Category::find($request->category);
        $inputs['category_name'] = $category ? $category->content :'';

        return view('confirm', compact('inputs'));
    }

    //データ保存
    public function store(ContactRequest $request)
    {
        Contact::create([
            'name_sei' => $request->name_sei,
            'name_mei' => $request->name_mei,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'tel3' => $request->tel3,
            'address' => $request->address,
            'building_name' => $request->{'building-name'}, // 注意: name属性がハイフンなのでこう書く
            'category_id' => $request->category,
            'content' => $request->content,
        ]);

        return view('thanks');
    }

}
