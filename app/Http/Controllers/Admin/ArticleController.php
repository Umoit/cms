<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

class ArticleController extends Controller
{
	public function __construct(){
        $this->middleware('check.admin', ['except' => ['show','index','indexJson']]);
    }

    //文章管理
    public function index(){
        $articles = Article::orderBy('id', 'desc')->paginate(15);

    	return view('admin.articleList',compact('articles'));
    }

    //话题json
    // public function indexJson(Request $request){

    //     $limit = $request->input('limit', 'intval', 25);
    //     $products = Topic::latest('id')->paginate($limit);
    //     $count = Topic::all()->count();

    //     return response()->json(['code'=>0,   'count'=>$count,   'data' => $products->toArray()['data']]);
    // }




    public function show(Article $article){
       
    	return view('frontend.articleShow',compact('article'));
		
    }

    public function create(Article $article){
        $categories = Category::all();
    	$tags = Tag::all();
    	return view('admin.articleCreate',compact('categories','tags'));		
    }

    public function bulkCreate(){
        
    }

    public function store(Request $request){

        //dd($request['tags']);
        

        $img = Image::make($request->img);
        $filename = basename($request->img);
        // 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素
        //$img->insert('images/watermark.png', 'bottom-right', 15, 10);

        $path = public_path('article/thum');
        File::makeDirectory($path, $mode = 0777, true, true);
        $img->save(public_path('article/thum/'.md5($filename).'.jpg'));

        $data = $this->validate($request, [
            'title'=>'required',
            'category_id'=> 'required',
            'content'=> 'required',
            'img'=> 'required',
        ]);
        $data['img'] = 'article/thum/'.md5($filename).'.jpg';


        $data['admin_id'] = Auth::guard('admin')->id(); 

        $article = Article::create($data);
        $article->tags()->sync($request['tags']);


    	return redirect('admin/article/')->with(['flash_success' => '添加成功!']);
        //return redirect()->back()->with(['flash_success' => '添加成功!']);


    }

    //编辑话题
    public function edit(Article $article){
        $categories = Category::all();
        $tags = Tag::all();

        $tags_array = array();
        foreach ($article->tags as $tag) {
            $tags_array[]=$tag->id;
        }


        return view('admin.articleCreate',compact('article','categories','tags','tags_array'));

    }

    //更新话题
    public function update(Request $request,$id){
        $article = new Article();


        $img = Image::make($request->img);
        $filename = basename($request->img);
        // 插入水印, 水印位置在原图片的右下角, 距离下边距 10 像素, 距离右边距 15 像素
        //$img->insert('images/watermark.png', 'bottom-right', 15, 10);

        $path = public_path('article/thum');
        File::makeDirectory($path, $mode = 0777, true, true);
        $img->save(public_path('article/thum/'.md5($filename).'.jpg'));



        //dd($request);
        $data = $this->validate($request, [
            'title'=>'required',
            'category_id'=> 'required',
            'content'=> 'required',
            'img'=> 'required'
        ]);
        $data['admin_id'] = Auth::guard('admin')->id(); 
        $data['img'] = 'article/thum/'.md5($filename).'.jpg';
        

        //var_dump($data);exit();
        // $path = " ";
        // if ($request->file('image_data')!==null) {
        //     foreach ($request->file('image_data') as $value) {
        //         $path .=  $value->store('product').';';
        //      } 
        // }
        
        // $data['img'] = $path;


        $article = Article::findOrFail($id);
        $article->update($data);
        $article->tags()->sync($request['tags']);
        

        return redirect()->back()->with(['flash_success' => '更新成功!']);
        

    }

     //删除话题
    public function delete($id){
        $article = Article::findOrFail($id);
        $article->delete();
        //return redirect('admin/product')->with(['flash_success' => '删除产品成功!']);
        
        //return response()->json(['data'=>'删除成功！']);
        return redirect()->back()->with(['flash_success' => '删除成功!']);


    }
}
