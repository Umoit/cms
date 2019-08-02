<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SpiderTarget;
use App\SpiderJob;
use QL\Ext\DImage;
use Illuminate\Support\Facades\Auth;
use QL\QueryList;
use Image;
use App\Article;
use File;




class SpiderController extends Controller
{
    public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index']]);
    }

    //采集目标管理
    public function index(){
        $spiderTargets = SpiderTarget::paginate(30);

    	return view('admin.spiderTargetList',compact('spiderTargets'));
    }


   
   //采集添加    
   public function store(Request $request){


        $data = $this->validate($request, [
            'name'=>'required',
            'url'=> 'required',
            'rule'=> 'required',
            'child_rule'=> 'required'
            
           
        ]);

         $spiderTarget = SpiderTarget::create($data);

        // return redirect('admin/category/')->with(['msg' => '添加成功!']);
        return redirect()->back()->with(['flash_success' => '创建成功!']);

    }

     //编辑采集目标
    public function edit(SpiderTarget $spiderTarget){
        return view('admin.spiderTargetEdit',compact('spiderTarget'));

    }

    //更新
    public function update(Request $request,$id){
        
         $data = $this->validate($request, [
            'name'=>'required',
            'url'=> 'required',
            'rule'=> 'required',
            'child_rule'=> 'required'
           
        ]);
      

        $spiderTarget = SpiderTarget::findOrFail($id);

        try {
            $spiderTarget->update($data);
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
        }

        return redirect()->back()->with(['flash_success' => '更新成功!']);
        

    }


     //删除赛事
    public function delete($id){
        $spiderTarget = SpiderTarget::findOrFail($id);
        $spiderTarget->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);

    }

    //生成任务
    public function createSpiderJob(Request $request,$id){


        $spiderTarget = SpiderTarget::findOrFail($id);

        $rule = json_decode($spiderTarget['rule'],true);
        $child_rule = json_decode($spiderTarget['child_rule'],true);

        //扩展一个图片下载功能
        //参数：$path 为图片本地保存路径
       

        $data = Querylist::get($spiderTarget['url'])->rules($rule)->query()->getData();

        //$rt = QueryList::rules($rule)->html($html)->query()->getData();


        //substr("Hello world",6);
        //dd($data_resoult);
        
        
        $create_num = 0;

        foreach ($data as $key => $value) {

            if (stripos($value['url'], 'http://')===0) {
               $url = $value['url'];
            }
            elseif(stripos($value['url'], '/')===0){
               $url = parse_url($spiderTarget['url'])['host'].$value['url'];
            }

            $aa = parse_url($value['image']);


            //dd($this->contentImg($aa));
            $img_link = "https://".$aa['host'].$aa['path'];
           

            // 修改指定图片的大小
        //    $img = Image::make($img_link);
             
            // 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素
            //$img->insert('images/watermark.png', 'bottom-right', 15, 10);
             
        //    $img->save('images/new_avatar.jpg');



         
            $jobData = Querylist::get($url)->rules($child_rule)->queryData();


            $path = public_path('/article/thum/');
            File::makeDirectory($path,0777, true, true);
            
                try {     

                    $item = SpiderJob::where('url', $url)->first();

                    if (!$item) {
                        $arr = [
                        'title' => $value['title'],
                        'url' => $url,
                        'img' => md5($key).'.jpg',
                        'content' =>$this->contentImg($jobData[0]['content']),
                        'target_id' =>$spiderTarget['id'],
                        ];


                        $create_rs = SpiderJob::create($arr);
                        
                        //$create_rs->tags()->sync($request['tags']);
                        if ($create_rs->wasRecentlyCreated === true) {
             
                        // 修改指定图片的大小
                        $img = Image::make($img_link);
                         
                        // 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素
                        //$img->insert('images/watermark.png', 'bottom-right', 15, 10);
                         
                        $img->save(public_path('article/thum/'.md5($key).'.jpg'));
                            $create_num++;
                            // item wasn't found and have been created in the database
                        } 
                    }

                   
                } catch (\Illuminate\Database\QueryException $e) {
                    // Do whatever you need if the query failed to execute
                    return redirect()->back()->with(['flash_error' => '生成失败!']);
                }

        }
        return redirect()->back()->with(['flash_success' => $create_num.'条采集生成成功!']);

        //$article = SpiderJob::create($data);


    }


    //采集任务
    public function jobIndex(){

        $spiderJobs = SpiderJob::paginate(30);
        return view('admin.spiderJobList',compact('spiderJobs'));

    }

    public function jobToArticle($id){
        $categories = \App\Category::all();
        $tags = \App\Tag::all();
        $spiderJob = SpiderJob::findOrFail($id);
        return view('admin.spiderJobToArticle',compact('spiderJob','categories','tags'));

    }

    public function jobPost(Request $request){
        $data = $this->validate($request, [
            'title'=>'required',
            'category_id'=> 'required',
            'content'=> 'required',
            'img'=> 'required'
        ]);
        $data['admin_id'] = Auth::guard('admin')->id(); 

        $article = Article::create($data);
        $article->tags()->sync($request['tags']);
        
        SpiderJob::where('id',$request->id)->update(['is_post'=>1]);

        return redirect('admin/article/')->with(['flash_success' => '添加成功!']);
        //return redirect()->back()->with(['flash_success' => '添加成功!']);
    }

        //删除赛事
    public function spiderJobDelete($id){
        $spiderJob = SpiderJob::findOrFail($id);
        $spiderJob->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);

    }


    public function tytest(){
          $data = QueryList::get('http://www.vpgame.com/news/article/193761')
              // 设置采集规则
              ->rules([ 
                  'title'=>array('.article-header>h1','text'),
                  'content'=>array('.article-content','text','p img')
              ])
              ->queryData();

          $aa = $this->contentImg($data[0]['content']);
          dd($aa);
    }

    public function contentImg($content)
    {
        $DImage = new DImage();  //QueryList4 不再支持扩展库，直接new使用。
        $rs = $DImage->run([
            'content' => $content,    //content为爬取的文章内容
            'image_path' =>'/article/',  //图片目标地址
            'www_root' => public_path()           //绝对路径
        ]);
        return $rs[0];
    }




    
    

    
}
