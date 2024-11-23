<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::Paginate(8);
        $select_gender = [1 => '男性', 2 => '女性', 3 => 'その他'];
        return view('admin', compact('categories','select_gender'), ['contacts' => $contacts]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin')->with('message', '削除しました');
    }

    public function search(Request $request)
    {
        $contacts = Contact::CategorySearch($request->category)
            ->GenderSearch($request->gender)
            ->NameSearch($request->name)
            ->DaySearch($request->day)->Paginate(8);
        $categories = Category::all();
        $select_gender = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('admin', compact('categories','select_gender'), ['contacts' => $contacts]);
    }

    public function reset()
    {
        return redirect('/admin');
    }
}
