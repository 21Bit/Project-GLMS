<?php
namespace App\Traits;

trait HasMultipleDelete {

    function deletemultiple(Request $request){
        if($request->item_checked){
            foreach($request->item_checked as $id){
                 $this->model->find($id)->delete();
             }
         }
 
         if(!$request->ajax()){
             return back();
         }
    }
    
}