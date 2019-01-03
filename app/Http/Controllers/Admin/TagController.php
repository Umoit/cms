<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag;

class TagController extends Controller
{
	 public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index']]);
    }

    //分类
    public function index(){
        $tags = Tag::paginate(50);

        return view('admin.tagList',compact('tags'));
    }

    //添加
    public function store(Request $request){


        $data = $this->validate($request, [
            'name'=>'required',
            'slug'=>'required',
            'meta_description'=>'required'
           
        ]);

            try {     
                Tag::create($data);
            } catch (\Illuminate\Database\QueryException $e) {
                    // Do whatever you need if the query failed to execute
                    return redirect()->back()->with(['flash_error' => '生成失败!']);
                }

        // return redirect('admin/category/')->with(['msg' => '添加成功!']);
        return redirect()->back()->with(['flash_success' => '创建成功!']);

    }

    //编辑
    public function edit(Tag $tag){
        return view('admin.tagEdit',compact('tag'));

    }

    //更新
    public function update(Request $request,$id){
        
        //dd($request);
         $data = $this->validate($request, [
            'name'=>'required'
            
        ]);
      

        $tag = Tag::findOrFail($id);
        $tag->update($data);

        return redirect()->back()->with(['flash_success' => '更新成功!']);
        

    }

     //删除
    public function delete($id){
        $tag = Tag::findOrFail($id);
        $tag->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);

    }
}
