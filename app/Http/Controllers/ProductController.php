<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use Auth;

class ProductController extends Controller
{
    
   function product_home(){
       $product_info=product::where('user_id',Auth::id())->get();
       $deleted_product = product::onlyTrashed()->get();
       $category_info = category::all();
    return view('product.index',compact('product_info','deleted_product','category_info'));
   }
    function product_post(Request $request){
   $random_photo_name =    Str::random(10).time().".".$request->product_photo->getClientOriginalExtension();
     
          // $original_productphoto_name = $request->product_photo->getClientOriginalName();
      $product_photo =   $request->file('product_photo');
     Image::make($product_photo)->save(base_path('public/uploads/product_photo/').$random_photo_name);

           product::insert($request->except('_token','product_photo')+[
                'user_id'=>Auth::id(),
                'product_photo'=>$random_photo_name,
                 'created_at'=> Carbon::now(),
           ]);
           return back();
          
    }

    // product delete + delete all

    function product_delete($product_id){
         product::find($product_id)->delete();
         return back();


    }

         function all_delete(){
           
            echo  product::whereNull('deleted_at')->delete();
           return back();
         }

    //   product edit
   function product_edit($product_id){
      $product_info = product::all();
     return view('product.edit');
   }


   function product_edit_post(Request $request){

         product::find($request->product_id)->update([
                'product_name' =>$request->product_name,
                'product_price'=>$request->product_price,
                'product_quantity'=>$request->product_quantity,
                'product_short_description'=>$request->product_short_description,
                'product_long_description'=>$request->product_long_description,
                'product_alert'=>$request->product_alert,
         ]);

     return redirect('product.index');

      
   }

   function product_restore($product_id){
        product::onlyTrashed()->where('id',$product_id)->restore();
        return back();
   }
   
   function product_forcedelete($product_id){
        product::onlyTrashed()->where('id',$product_id)->forceDelete();
        return back();
   }

   function product_all_restore(){
          product::whereNotNull('deleted_at')->restore();
          return back();
   }
    
   function checkdelete(Request $request){
            foreach($request->product_id as $product_id){
            product::find($product_id)->delete();
              
            
            return back();
          }
          
          
     }
    


   

   

}