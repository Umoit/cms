<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index']]);
    }

    //分类
    public function index(){
        $categories = Category::paginate(10);

    	return view('admin.categoryList',compact('categories'));
    }

    //添加
    public function store(Request $request){


        $data = $this->validate($request, [
            'name'=>'required',
            'img'=> 'required',
            'url_name'=> 'required',
            'description'=> 'required',
            'parent_id'=> 'required'
           
        ]);

         $category = Category::create($data);

        // return redirect('admin/category/')->with(['msg' => '添加成功!']);
        return redirect()->back()->with(['flash_success' => '创建分类成功!']);

    }

    //编辑
    public function edit(Category $category){
         $categories = Category::paginate(10);
        return view('admin.categoryCreate',compact('category','categories'));

    }

    //更新
    public function update(Request $request,$id){
        
        //dd($request);
         $data = $this->validate($request, [
            'name'=>'required',
            'img'=> 'required',
            'url_name'=> 'required',
            'description'=> 'required',
            'parent_id'=> 'required'
            
        ]);
      

        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->back()->with(['flash_success' => '分类更新成功!']);
        

    }

     //删除
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);

    }

    
}
