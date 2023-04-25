<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\contact;
use App\Models\contact_settings;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmessage;

use Carbon\Carbon;

class FrontendController extends Controller
{
    function welcome()
    {
        $all_products = product::all();
        
        $all_category = category::all();
        
        return view('welcome', compact('all_products', 'all_category'));
    }

    function contact(){
        $contact_settings=contact_settings::all();
     return   view('contact',compact('contact_settings'));
    }


    function contact_post(Request $request){

     Mail::to('kasad5303@gmail.com')->send(new sendmessage($request->all()));
   contact::insert($request->except('_token')+[
   'created_at'=>Carbon::now(),
   ]);
   return back();
    }

    function about(){
        return view('about');
    }
    function blog(){
         return view('blog');
    }
    function blog_detail(){
         return view('blog_detail');
    }
    function product(){
        return view('product');
    }
    function productdetail($product_id){
       $product_category_id=product::find($product_id)->category_id;
          $product = product::find($product_id);
      $all_category = category::all();
       $related_product = product::where('category_id',$product_category_id)->where('id','!=',$product_id)->get();
         return view('productdetail',compact('product','all_category','related_product'));
    }
     function productdetail_color_id (Request $request,$product_id){
 


if(product::find($product_id)->product_color!=$request->product_color ){
    
    echo "color nai";    
    
    
    }
     
      else{
       echo  'color ase';
      }

         
      

     }

   
}
