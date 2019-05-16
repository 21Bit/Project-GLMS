<?php

namespace App\Http\Controllers\Api;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\SlotCollection as SlotCollectionFrontEnd;

class TeacherApiController extends Controller
{
    
    function getSlots(Request $request, $id){
        $slots = Slot::where('user_id', $id)
                ->whereBetween('date_time', [$request->start, $request->end])->get();
        
        return new SlotCollectionFrontEnd($slots);
    }
}
