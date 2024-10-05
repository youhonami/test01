<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($contact['category_id']);
        $contact['content'] = $category ? $category->content : '不明';
        if (!isset($contact['gender'])) {
            $contact['gender'] = null;
        }
        $request->session()->put('contact', $contact);

        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'address' => 'required',
            'building' => 'nullable',
            'category_id' => 'required|integer',
            'detail' => 'nullable',
        ]);


        $contact = new Contact();
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->gender = $request->input('gender');
        $contact->email = $request->input('email');
        $contact->tel = $request->input('tel');
        $contact->address = $request->input('address');
        $contact->building = $request->input('building');
        $contact->category_id = $request->input('category_id');
        $contact->detail = $request->input('detail');
        $contact->save();

        ob_end_clean();
        return redirect('/thanks');
    }

    public function confirmView(Request $request)
    {

        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    public function edit(ContactRequest $request)
    {
        $contact = $request->session()->get('contact');
        return view('index', ['contact' => $contact]);
    }
}
