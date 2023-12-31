<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LangRequest;
use App\Models\Language;

class LanguagesController extends Controller
{
    public function ShowAllLangs(){
        $langs=Language::select()->get();
        return view ('admin.allLanguages',compact('langs'));
    }

    public function addAllLangs(){
        return view ('admin.addLanguage');
    }

    public function stroeLanguage(LangRequest $request){
        Language::create($request->validated());
        return redirect()->route('addAllLangs')->with(['success'=>'The New Language Add Successfuly']);
    }

    
}
