<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;
use App\Category;

class TopicController extends Controller
{
    public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index','indexJson']]);
    }

    //话题管理
    public function index(){
        $topics = Topic::paginate(15);

    	return view('admin.topicList',compact('topics'));
    }

    //话题json
    public function indexJson(Request $request){

        $limit = $request->input('limit', 'intval', 25);
        $products = Topic::latest('id')->paginate($limit);
        $count = Topic::all()->count();

        return response()->json(['code'=>0,   'count'=>$count,   'data' => $products->toArray()['data']]);
    }




    public function show(Topic $topic){
      //  $topic = Topic::findOrFail($id);
        
    	return view('frontend.topicShow',compact('topic'));
		
    }

    public function create(Topic $topic){
    	$categories = Category::all();
    	return view('admin.topicCreate',compact('categories'));		
    }

    public function store(Request $request){
   
        $topic = Topic::create($request->all());

    	//return redirect('admin/topic/')->with(['msg' => '添加成功!']);
        return redirect()->back()->with(['flash_success' => '添加成功!']);


    }

    //编辑话题
    public function edit(Topic $topic){
        $categories = Category::all();
        return view('admin.topicCreate',compact('topic','categories'));

    }

    //更新话题
    public function update(Request $request,$id){
        
        $topic = new Topic();
        $data = $this->validate($request, [
            'title'=>'required',
            'category_id'=> 'required',
            'content'=> 'required'
        ]);
        

        $topic = Topic::findOrFail($id);
        $topic->update($data);

        return redirect()->back()->with(['flash_success' => '添加成功!']);
        

    }

     //删除话题
    public function delete($id){
        $topic = Topic::findOrFail($id);
        $topic->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        return response()->json(['data'=>'删除成功！']);

    }
}
