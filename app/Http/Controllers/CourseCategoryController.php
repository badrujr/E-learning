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
    public function editCategory($id){
        $edit_category = CourseCategory::find($id);
        $levels = Level::all();
        return view('admin.category/edit-category',compact('edit_category','levels'));
    }
    public function update(Request $request,$id){
        $editcategory = CourseCategory::find($id);
       
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('coursecategoryimage',$imagename);
            $editcategory->image=$imagename;
        }

        $editcategory->name=$request->name;

        $editcategory->description=$request->description;

        $editcategory->level_id=$request->level_id;

        if(!$editcategory){
            return back()->with('message','category details is not available'); 
        }
        try{
            
            $editcategory->save();
          return back()->with('message','course category updated succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','An error occured'); 

        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = CourseCategory::find($id);
        if(!$delete){
            return back()->with('message','course category details is not available'); 
        }
        try{
            
          $delete->delete();
          return back()->with('message','course category removed succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','You can not remove this information due to the relationship'); 

        }

    }
}
