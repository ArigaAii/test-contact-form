<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    // 入力画面を表示
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    
    // 確認画面に進む（バリデーションを実行）
    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $category = Category::find($request->category_id);
        return view('confirm', compact('contacts', 'category'));
    }

    //データ保存
    public function store(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
        }
        
        $request['tell'] = $request->tel_1 . $request->tel_2 . $request->tel_3;
        Contact::create(
            $request->only([
                'category_id',
                'name_sei',
                'name_mei',
                'gender',
                'email',
                'tell',
                'address',
                'building',
                'detail'
            ])
        );

        return view('thanks');
    }
}
