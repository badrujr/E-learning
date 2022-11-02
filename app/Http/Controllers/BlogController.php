<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function addBlog(){
        return view('admin.blog/add-blog-info');
    }
    public function saveBlog(request $request){
        $blog = new Blog;

        $image = $request->file;
    
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('blogimage',$imagename);
        $blog->image=$imagename;

        $blog->title=$request->title;

        $blog->content=$request->content;

        if(!$blog){
            return back()->with('message','blog details is not available'); 
        }
        try{
            
          $blog->save();
          return back()->with('message','blog details added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageBlog(){
        $blogs = Blog::latest()->get();
        return view('admin.blog/manage-blog-info',compact('blogs'));
    }

    public function editBlog($id){
        $edit_blog = Blog::find($id);
        return view('admin.blog/edit-blog-info',compact('edit_blog'));
    }
    public function update(Request $request,$id){
        $editblog = Blog::find($id);
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('blogimage',$imagename);
            $editblog->image=$imagename;
        }
       
        $editblog->title=$request->title;
        $editblog->content=$request->content;

        if(!$editblog){
            return back()->with('message','blog details is not available'); 
        }
        try{
            
            $editblog->save();
          return back()->with('message','blog updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = Blog::find($id);
        $delete->delete();
        return redirect()->back()->with('message','blog removed succesfully');

    }
}
