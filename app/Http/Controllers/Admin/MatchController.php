<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Match;
use App\Game;

class MatchController extends Controller
{
    public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index','indexJson']]);
    }

    //赛事首页
    public function index(){
        $matches = Match::orderBy('id', 'desc')->paginate(15);

    	return view('admin.matchList',compact('matches'));
    }

    //展示赛事
    public function show(Match $match){
       
    	return view('frontend.articleShow',compact('article'));
		
    }

    //添加赛事页面
    public function create(Match $match){
    	$games = Game::all();
    	return view('admin.matchCreate',compact('games'));		
    }

    //添加赛事
    public function store(Request $request){
        
        $data = $this->validate($request, [
            'title'=>'required',
            'content'=> 'required',
            'host'=> 'required',
            'duration'=> 'required',
            'status'=> 'required',
            'img'=>'required'
        ]);

        $match = Match::create($data);

    	//return redirect('admin/topic/')->with(['msg' => '添加成功!']);
        return redirect('admin/match/')->with(['flash_success' => '添加成功!']);


    }

    //编辑赛事
    public function edit(Match $match){
        $games = Game::all();
        return view('admin.matchCreate',compact('match','games'));

    }

    //更新赛事
    public function update(Request $request,$id){
        
        //dd($request);
         $data = $this->validate($request, [
            'title'=>'required',
            'content'=> 'required',
            'host'=> 'required',
            'duration'=> 'required',
            'status'=> 'required',
            'img'=>'required'
        ]);
      

        //var_dump($data);exit();
        // $path = " ";
        // if ($request->file('image_data')!==null) {
        //     foreach ($request->file('image_data') as $value) {
        //         $path .=  $value->store('product').';';
        //      } 
        // }
        
        // $data['img'] = $path;


        $match = Match::findOrFail($id);
        $match->update($data);

        return redirect()->back()->with(['flash_success' => '更新成功!']);
        

    }

         //删除话题
    public function delete($id){
        $match = Match::findOrFail($id);
        $match->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);


    }
}
