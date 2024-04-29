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
       $getAllPinnedPage = Page::orderBy('created_at','Asc')->get();
       return view('admin.pinned_page.AllpinnedPage' , compact('getAllPinnedPage'));
   }


   public function create(){
    
       return view('admin.pinned_page.create',compact('countries','DataSittings'));
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
           'page_name'  => $request->input('page_name'),
           'href'       => $request->input('href'),
           'title'      => $request->input('title'),
           'keyword'    => $request->input('keyword'),
           'content'    => $request->input('content'),
            'photo'      => $newImageName
       ]);

       return redirect()->route('createPage')
       ->with('success', 'added data');
   }





   public function edit($id)
   {
       $findId = Page::find($id);
       return view('admin.pinned_page.editPage' , compact('findId'));
   }


   public function update(Request $request,$id)
   {
       $findId = Page::find($id);
       $request->validate([
           'page_name'     => 'required',
           'href'          => 'required',
           'keyword'       => 'required',
           'content'       => 'required'
           // 'photo'         => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=720,max_height=920'
       ]);
       if($request->hasFile('photo')){
           $pathImg = str_replace('\\' , '/' ,public_path('site/img/pages/')).$findId->photo;

           if(File::exists($pathImg)){
               File::delete($pathImg);
           }
           $newImageName = 'photo'.time() .'.'. $request->photo->extension();
           $request->photo->move(public_path('site/img/pages/') , $newImageName);
       }

           $findId->page_name = $request->page_name;
           $findId->href      = $request->href;
           $findId->title      = $request->title;
           $findId->keyword   = $request->keyword;
           $findId->content   = $request->content;
           $findId->photo     = $newImageName;
           $findId->update();

       return redirect()->route('main.pages')
           ->with('success' , 'Successfully updated Data');
   }


   public function destroy($id)
   {
       $findId = Page::find($id);
       $destination =  str_replace('\\' , '/' ,public_path('site/img/pages/')).$findId->photo;
       if(File::exists($destination)){
           File::delete($destination);
           $findId->delete();
           return  redirect()->route('main.pages')
               ->with('success' , 'Successfully Deleted Data');
       }
       $findId->delete();
       return  redirect()->route('main.pages')
           ->with('success' , 'Successfully Deleted Data');
   }
}
