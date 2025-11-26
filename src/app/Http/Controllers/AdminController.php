<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        // 全問合せデータを取得（後で検索・ページネーション追加）
        $contacts = Contact::all();

        return view('admin.admin', compact('contacts'));
    }
}
