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
       return view('admin.before_after.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
            'afterImage' => 'required',
        ]);

    $images = new BeforAfter(); 
    $images->save();

    //store before image
    $newBeforeImage = $request->file('beforeImage');
    //for change image name
    $newBeforeImageName = 'beforeImage_' .$images->id. '.' . $newBeforeImage->getClientOriginalExtension();
    $newBeforeImage->move(public_path('site/img/gallery/'), $newBeforeImageName);
    $images->beforeImage = $newBeforeImageName;     

    //store after image
    $newAfterImage = $request->file('afterImage');
    //for change image name
    $newAfterImageName = 'afterImage_' .$images->id. '.' . $newAfterImage->getClientOriginalExtension();
    $newAfterImage->move(public_path('site/img/gallery/'), $newAfterImageName);
    $images->afterImage = $newAfterImageName;     
    $images->update();
    session()->flash('Add', 'تم إضافة الصور بنجاح');
    // return back();
    return redirect()->route('beforAfter.show');
    }
     
   
    public function editBefore( $id)
    {
        $data = BeforAfter::findOrFail($id);
        return view('admin.before_after.editBefore',compact('data'));
    }

    public function updateBefore(Request $request, $id)
    {
        $validated = $request->validate([
            'beforeImage' => 'required',
        ]);
  
       $before = BeforAfter::findOrFail($id);
       $oldImageName=$before->beforeImage;
       $oldAfter=$before->afterImage;
      // update newImage
       if ($request->hasFile('beforeImage')) {
      // Delete the old image from the server
      if ($oldImageName) {
           File::delete(public_path('site/img/gallery/') . $oldImageName);
      }
      // Upload new image
      $newImage = $request->file('beforeImage');
      $newImageName = 'beforeImage_'. $before->id . '.' . $newImage->getClientOriginalExtension();
      $newImage->move('site/img/gallery/', $newImageName);
  
      // Update the image record with the new image name
      $before->beforeImage = $newImageName;
      $before->afterImage=$oldAfter;
    }

        $before->update();
  
        session()->flash('Edit', 'تم تعديل صورة قبل التنظيف بنجاح');
        //   return back();
        return redirect()->route('beforAfter.show');
    }

    public function editAfter( $id)
    {
        $data = BeforAfter::findOrFail($id);
        return view('admin.before_after.editAfter',compact('data'));
    }

    public function updateAfter(Request $request, $id)
    {
        $validated = $request->validate([
            'afterImage' => 'required',
        ]);
  
       $after = BeforAfter::findOrFail($id);
       $oldImageName=$after->afterImage;
       $oldBefore=$after->beforeImage;
     // update newImage
       if ($request->hasFile('afterImage')) {
      // Delete the old image from the server
      if ($oldImageName) {
           File::delete(public_path('site/img/gallery/') . $oldImageName);
      }
      // Upload new image
      $newImage = $request->file('afterImage');
      $newImageName = 'afterImage_' . $after->id . '.' . $newImage->getClientOriginalExtension();
      $newImage->move('site/img/gallery/', $newImageName);
  
      // Update the image record with the new image name
        $after->afterImage = $newImageName;
        $after->beforeImage =$oldBefore;
        }

        $after->update();
  
        session()->flash('Edit', 'تم تعديل صورة بعد التنظيف بنجاح');
        //   return back();
        return redirect()->route('beforAfter.show');
    }
    
  
    public function destroyBefore($id)
    {
       $before=BeforAfter::findOrFail($id);
        $oldImageName =$before->beforeImage;
  
        if ($oldImageName) {
             File::delete(public_path('site/img/gallery/') . $oldImageName);
             $before->beforeImage = null;
        }
        if($before->afterImage)
        {
            $before->update();
            session()->flash('delete', 'تم حذف صورة قبل التنظيف بنجاح');
            return back();  
        }
        else{
            $before->delete();
            session()->flash('delete', 'تم حذف صورة قبل التنظيف بنجاح');
            return back();
        }
        
    }

    public function destroyAfter($id)
    {
       $after= BeforAfter::findOrFail($id);
       $oldImageName =$after->afterImage;
  
            if ($oldImageName) {
                 File::delete(public_path('site/img/gallery/') . $oldImageName);
                 $after->afterImage = null;
            }
            if($after->beforeImage)
            {
                $after->update();
                session()->flash('delete', 'تم حذف صورة بعد التنظيف بنجاح');
                 return back();
            }
            else{
                $after->delete();
                session()->flash('delete', 'تم حذف صورة بعد التنظيف بنجاح');
                 return back();
            }
    }

}
