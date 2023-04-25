<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact_settings;
use Carbon\Carbon;

class ContactSettingsController extends Controller
{
    function contact_settings(){
         return view(('contact_settings'));
    }
    function contact_settings_post(Request $request){
       contact_settings::insert($request->except('_token')+[
                'created_at'=>Carbon::now(),
        ]);
          
         return view('contact_settings');
    }

    

}
