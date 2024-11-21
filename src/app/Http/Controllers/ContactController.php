<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->session()->has('session')) {
            $data = $request->session()->get('session');
            return view('index', compact('data', 'categories'));
        }

        return view('index', compact( 'categories'));

    }

    public function confirm(ContactRequest $request)
    {
        $categories = Category::all();
        $request->session()->put('session', $request->all());
        $select_gender = [1 => '男性', 2 => '女性', 3 => 'その他'];
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel_0', 'tel_1', 'tel_2', 'address', 'building', 'category_id', 'detail']);

        return view('confirm', compact('contact', 'categories', 'select_gender'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);

        Contact::create($contact);
        $request->session()->forget('session');
        return view('thanks');
    }
}
