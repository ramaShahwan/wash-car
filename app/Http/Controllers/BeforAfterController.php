<?php

namespace App\Http\Controllers;

use App\Models\BeforAfter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class BeforAfterController extends Controller
{

    public function index()
    { 
         $data = BeforAfter::orderBy('created_at','Asc')->get();
         return view('admin.before_after.show',compact('data'));
    }

    public function show()
    { 
         $data = BeforAfter::orderBy('created_at','Asc')->get();
         return view('site.before_after',compact('data'));
    }

    public function create()
    {
       return view('admin.before_after.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
            'afterImage' => 'required',
        ]);

    $images = new BeforAfter(); 
        //store before image
    $newBeforeImage = $request->file('beforeImage');
    //for change image name
    $newBeforeImageName = 'beforeImage' .$images->id. '.' . $newBeforeImage->getClientOriginalExtension();
    $newBeforeImage->move(public_path('site/img/gallery/'), $newBeforeImageName);
    $images->beforeImage = $newBeforeImage;     

      //store after image
    $newAfterImage = $request->file('afterImage');
    //for change image name
    $newAfterImageName = 'afterImage' .$images->id. '.' . $newAfterImage->getClientOriginalExtension();
    $newAfterImage->move(public_path('site/img/gallery/'), $newAfterImageName);
    $images->afterImage = $newAfterImageName;     
    
        session()->flash('Add', 'تم إضافة الصور بنجاح');
        return back();
    }
     
    public function edit( $id)
    {
     $data = BeforAfter::findOrFail($id);
     return view('admin.before_after.edit',compact('data'));
    }

    public function updateBefore(Request $request, $id)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
        ]);
  
       $before = BeforAfter::findOrFail($id);
       $oldImageName=$before->beforeImage;
    
     // update newImage
       if ($request->hasFile('beforeImage')) {
      // Delete the old image from the server
      if ($oldImageName) {
           File::delete(public_path('site/img/gallery/') . $oldImageName);
      }
      // Upload new image
      $newImage = $request->file('beforeImage');
      $newImageName = 'beforeImage' . $before->id . '.' . $newImage->getClientOriginalExtension();
      $newImage->move('site/img/gallery/', $newImageName);
  
      // Update the image record with the new image name
         $before->beforeImage = $newImageName;
         }

         $before->update();
  
         session()->flash('Edit', 'تم تعديل صورة قبل التنظيف بنجاح');
        //   return back();
        return redirect()->route('beforAfter.show');
    }

    public function updateAfter(Request $request, $id)
    {
        $validated = $request->validate([
            'afterImage' => 'required',
        ]);
  
       $after = BeforAfter::findOrFail($id);
       $oldImageName=$after->afterImage;
    
     // update newImage
       if ($request->hasFile('afterImage')) {
      // Delete the old image from the server
      if ($oldImageName) {
           File::delete(public_path('site/img/gallery/') . $oldImageName);
      }
      // Upload new image
      $newImage = $request->file('afterImage');
      $newImageName = 'afterImage' . $after->id . '.' . $newImage->getClientOriginalExtension();
      $newImage->move('site/img/gallery/', $newImageName);
  
      // Update the image record with the new image name
         $after->afterImage = $newImageName;
         }

         $after->update();
  
         session()->flash('Edit', 'تم تعديل صورة بعد التنظيف بنجاح');
        //   return back();
        return redirect()->route('beforAfter.show');
    }
    
  
    public function destroyBefore( $id)
    {
       $before=BeforAfter::findOrFail($id);
        $oldImageName =$before->beforeImage;
  
        if ($oldImageName) {
             File::delete(public_path('site/img/gallery/') . $oldImageName);
             $before->beforeImage = null;
        }
           $before->update();
          session()->flash('delete', 'تم حذف صورة قبل التنظيف بنجاح');
          return back();
    }

    public function destroyAfter( $id)
    {
       $after= BeforAfter::findOrFail($id);
       $oldImageName =$after->afterImage;
  
            if ($oldImageName) {
                 File::delete(public_path('site/img/gallery/') . $oldImageName);
                 $after->afterImage = null;
            }
               $after->update();
              session()->flash('delete', 'تم حذف صورة بعد التنظيف بنجاح');
               return back();
    }

}
