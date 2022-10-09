<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function manage_top(){
        $results = Contact::Paginate(5);
        return view('manage', ['results' => $results]);
    }

    public function manage_search_get(Request $request){
        $results = $request->session()->get('results');

        return view('manage', ['results' => $results]);
    }

    public function manage_search(ManageRequest $request){
        $query = Contact::query();
        $form = $request -> all();
        if ($form['search_name'] != null){
            $query->where('fullname', '=', $form['search_name']);
        }
        if ($form['search_gender'] != 0){
            $query->where('gender', '=', $form['search_gender']);
        }
        if (($form['date_forth'] != null) || ($form['date_back'] != null)){
            $query->wherebetween('created_at', [$form['date_forth'], $form['date_back']]);
        }
        if ($form['search_email'] != null){
            $query->where('email', '=', $form['search_email']);
        }
        
        $results = $query->Paginate(5);
        $request->session()->put('results', $results);

        return view('manage', ['results' => $results]);
    }

    public function manage_delete(Request $request){
        $form = $request->all();
        Contact::find($form['id'])->delete($form);
        return redirect('/manage');
    }
}
