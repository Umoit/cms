<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
	

   

    //查看文章
    public function show(Article $article){
        
    	return view('frontend.articleShow',compact('article'));
		
    }

    public function findArticle($url_name){

    	$article = Article::where('url_name',$url_name)->first();

        return view('frontend.articleShow',compact('article'));
        

    }

}
