<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    function category_home(){
             
$deleted_category =category::onlyTrashed()->get();

          return view('category.index',[
              'category_infos'=>category::all(),
          ],compact('deleted_category'));
    }
    function category_post(Request $request){
              $request->validate([
                     'category_name'=>'required|min:2|max:20',
              ]);

             category::create([
                'category_name'=>$request->category_name,
             ]);
             return back();

    }

    function category_edit($category_id){
      $category_id=category::find($category_id);
          return view('category.edit',compact('category_id'));
    }

    function category_edit_post(Request $request){
       
        category::find($request->category_id)->update([
              'category_name'=>$request->category_name,
        ]);
         return redirect('category/index');
    }

     function category_delete($category_id){
            $category_id =category::findOrFail($category_id)->delete();
            return back();
     }

      function category_all_delete(){
            category::whereNull('deleted_at')->delete();
       
            return back();
      }
      function category_restore($category_id){
         category::onlyTrashed($category_id)->where('id',$category_id)->restore();
         return back();

      }

      function category_forcedelete($category_id){
              category::onlyTrashed()->where('id',$category_id)->forceDelete();
              return back();
      }
    
      function category_all_restore (){
            category::whereNotNull('deleted_at')->restore();
            return back();
      }

      function check_delete(Request $request){
          
            foreach($request->category_id as $category_id){
            
                category::find($category_id)->delete();
            }
            return back();
          
          }

}
