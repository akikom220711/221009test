<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contact_index(){
        $form = [
            'last_name' => '',
            'first_name' => '',
            'gender' => '',
            'email' => '',
            'postcode' => '',
            'address' => '',
            'building_name' => '',
            'opinion' => ''
        ];
        return view('contact', compact('form'));
    }

    public function contact_confirm(ContactRequest $request){
        $form = $request->all();
        unset($form['_token']);
        $param = [
            'fullname' => $form['last_name'] . ' ' . $form['first_name'],
            'gender' => $form['gender'],
            'email' => $form['email'],
            'postcode' => $form['postcode'],
            'address' => $form['address'],
            'building_name' => $form['building_name'],
            'opinion' => $form['opinion']
        ];
        $request->session()->put('form', $form);
        $request->session()->put('param', $param);
        return view('confirm', compact('param'));
    }

    public function contact_modify(Request $request)
    {
        $form = $request->session()->get('form');
        return view('contact', compact('form'));
    }

    public function contact_thank(Request $request){
        $data = $request->session()->get('param');
        Contact::create($data);
        return view('thank');
    }
}
