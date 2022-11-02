<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Level;

class CourseCategoryController extends Controller
{
    public function addCategory(){
        $levels = Level::all();
        return view('admin.category/add-category',compact('levels'));
    }
    public function saveCategory(request $request){
        $category = new CourseCategory;

        $image = $request->file;
    
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('coursecategoryimage',$imagename);
        $category->image=$imagename;

        $category->name=$request->name;

        $category->description=$request->description;

        $category->level_id=$request->level_id;

        if(!$category){
            return back()->with('message','About us details is not available'); 
        }
        try{
            
            $category->save();
          return back()->with('message','course category added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }
    public function manageCategory(){
        $categories = CourseCategory::latest()->get();
        return view('admin.category/manage-category',compact('categories'));
    }
}
