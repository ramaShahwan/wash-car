<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Searchajax extends Controller
{
    public function liveAjaxSearch(Request $request){
        
        if($request->ajax()){
            $output = '';
            $req = $request->q;
            $areas = DB::table('locations')->select('id' , 'area')->where('area' , 'LIKE', $req.'%')
                        ->orWhere('description' , 'LIKE', '%'.$req.'%')
                        ->get();
            if(count($areas) > 0){
                return response()->json($areas);
                }
            }
            else
            {
                // $output ='
                // <tr>
                //     <td class="text-center" colspan="5">لا يوجد نتيجة مطابقة</td>
                // </tr>
                // ';
                $output='لا توجد نتيجة مطابقة';
             return response()->json($output);   
            }
            if(auth()->user()->role == "admin") {
        
        return view('admin.site.index');
            }
           elseif(auth()->user()->role == "user") {
        
                return view('site.index');
             }
        
    }
}
