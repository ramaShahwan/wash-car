<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    { 
         $types = Type::orderBy('created_at','DESC')->paginate(50);
         $dataCount = Type::get()->count();
         $paginationLinks = $types->withQueryString()->links('pagination::bootstrap-4'); 
         
         return view('admin.type.show', [
          'types' => $types,
          'dataCount'=>$dataCount,
         'paginationLinks' => $paginationLinks
       ]);
    }

    public function create()
    {
       return view('admin.type.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $type= Type::create([
            'name'=>$request->name,
        ]);

        session()->flash('Add', 'تم إضافة النوع بنجاح');
        // return back();
        return redirect()->route('type.show');

    }

   
    
  public function edit( $id)
  {
    $type = Type::findOrFail($id);
    return view('admin.type.edit',compact('type'));
  }
 
   
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'name' => 'required',
    ]);
    $type = Type::findOrFail($id);

    $type->update([
        'name'=>$request->name,
    ]);


      session()->flash('Edit', 'تم تعديل النوع بنجاح');
     //   return back();
      return redirect()->route('type.show');
 
    }

    public function destroy( $id)
    {
      Type::findOrFail($id)->delete();
      session()->flash('delete', 'تم حذف النوع بنجاح');
      return back();
    }
}
