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
       return view('admin.pinned_pages.AllpinnedPage' , compact('pages'));
   }


   public function create(){
    
       return view('admin.pinned_pages.create');
   }

   public function store(Request $request)
   {

       $request->validate([
           'name'     => 'required',
           'href'          => 'required|unique:pinned_pages,href',
           'keyword'       => 'required',
           'content'       => 'required'
           // 'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=720,max_height=920'
       ]);

       if($request->hasFile('photo')){
           $newImageName = 'photo'.time(). '.' . $request->photo->extension();
           $request->photo->move(public_path('site/img/pages/'), $newImageName);
       }


       $mydata=Page::create([
           'name'       => $request->input('name'),
           'href'       => $request->input('href'),
           'title'      => $request->input('title'),
           'keyword'    => $request->input('keyword'),
           'content'    => $request->input('content'),
            'photo'      => $newImageName
       ]);

       return redirect()->route('page.show')
       ->with('success', 'added data');
   }


   public function edit($id)
   {
       $page = Page::find($id);
       return view('admin.pinned_pages.editPage' , compact('page'));
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
       }

           $page->name      =  $request->name;
           $page->href      = $request->href;
           $page->title      = $request->title;
           $page->keyword   = $request->keyword;
           $page->content   = $request->content;
           $page->photo     = $newImageName;
           $page->update();

       return redirect()->route('page.show')
           ->with('success' , 'Successfully updated Data');
   }


   public function destroy($id)
   {
       $page = Page::find($id);
       $destination =  str_replace('\\' , '/' ,public_path('site/img/pages/')).$page->photo;
       if(File::exists($destination)){
           File::delete($destination);
           $page->delete();
           return  redirect()->route('main.pages')
               ->with('success' , 'Successfully Deleted Data');
       }
       $page->delete();
       return  redirect()->route('page.show')
           ->with('success' , 'Successfully Deleted Data');
   }
}
