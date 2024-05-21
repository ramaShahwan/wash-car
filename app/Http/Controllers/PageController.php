<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class PageController extends Controller
{
   //  for secure
   public function __construct()
   {
       $this->middleware('admin');
   }

   public function index()
   {
       $pages = Page::orderBy('created_at','Asc')->get();
       return view('admin.pages.AllpinnedPage' , compact('pages'));
   }


   public function create(){
    
       return view('admin.pages.create');
   }

   public function store(Request $request)
   {

       $request->validate([
           'name'     => 'required',
           'href'          => 'required|unique:pages,href',
           'keyword'       => 'required',
           'content'       => 'required'
           // 'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=720,max_height=920'
       ]);

       $mydata= new Page();
       if($request->hasFile('photo')){
           $newImageName = 'photo'.time(). '.' . $request->photo->extension();
           $request->photo->move(public_path('site/img/pages/'), $newImageName);
           $mydata->photo =$newImageName;
       }

            $mydata->name  = $request->input('name');
            $mydata->href      = $request->input('href');
            $mydata->title    = $request->input('title');
            $mydata->keyword   = $request->input('keyword');
            $mydata->content   = $request->input('content');
            $mydata->save();

            session()->flash('Add', 'تم إضافة الصفحة بنجاح');
            return redirect()->route('page.show');
   }


   public function edit($id)
   {
       $page = Page::find($id);
       return view('admin.pages.editPage' , compact('page'));
   }


   public function update(Request $request,$id)
   {
       $page = Page::find($id);
       $request->validate([
           'name'     => 'required',
           'href'          => 'required',
           'keyword'       => 'required',
           'content'       => 'required'
           // 'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=720,max_height=920'
       ]);
       if($request->hasFile('photo')){
           $pathImg = str_replace('\\' , '/' ,public_path('site/img/pages/')).$page->photo;

           if(File::exists($pathImg)){
               File::delete($pathImg);
           }
           $newImageName = 'photo'.time() .'.'. $request->photo->extension();
           $request->photo->move(public_path('site/img/pages/') , $newImageName);
           $page->photo     = $newImageName;

       }

           $page->name      =  $request->name;
           $page->href      = $request->href;
           $page->title      = $request->title;
           $page->keyword   = $request->keyword;
           $page->content   = $request->content;
           $page->update();

           session()->flash('Edit', 'تم تعديل الصفحة بنجاح');
           return redirect()->route('page.show');
   }


   public function destroy($id)
   {
       $page = Page::find($id);
       $destination =  str_replace('\\' , '/' ,public_path('site/img/pages/')).$page->photo;
       if(File::exists($destination)){
           File::delete($destination);
           $page->delete();
           session()->flash('delete', 'تم حذف الصفحة بنجاح');
           return  redirect()->route('page.show');

       }
       $page->delete();
       session()->flash('delete', 'تم حذف الصفحة بنجاح');
       return  redirect()->route('page.show');
   }


    public function generation($href){
        $all_pinned_page = Page::all();
        $get_data = Page::select('id' , 'name', 'href' , 'content','title', 'keyword')->where('href' , $href)->get();

        return view('site.layouts.footer' , compact('all_pinned_page','get_data'));
   }

}
