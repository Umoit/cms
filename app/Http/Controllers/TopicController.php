<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Category;

class TopicController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['show','index','indexJson']]);
    }

    //话题列表
    public function index(){
        $topics = Topic::all();

        echo "string";exit();
    	//return view('admin.topicList',compact('topics'));
    }




    public function show(Topic $topic){
    	return view('frontend.topicShow',compact('topic'));
		
    }

    public function create(Topic $topic){
    	$categories = Category::all();
    	return view('frontend.topicCreate',compact('categories'));		
    }

    public function store(Request $request){
    		//dd($request->all());exit();
    		$this->validate($request,
    	[
            'captcha' => 'required|captcha',
        ],
     	[
     	    'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码不正确',
        ]);

  

        $topic = Topic::create($request->all());

    	return redirect('topic/'.$topic->id)->with(['success' => '提交成功!']);


    }

     //删除话题
    public function delete($id){
        return response()->json(['data'=>'删除成功！']);
        //$topic = Topic::findOrFail($id);
        //$topic->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        return response()->json(['data'=>'删除成功！']);

    }
}
