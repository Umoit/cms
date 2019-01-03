<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;

use App\Article;


class ExcelController extends Controller
{
    

    public function export(){
       $cellData = [
        ['编号','姓名','绩效','电话号码'],
        ['10001','AAAAA','99','150-xxxx-xxxx'],
        ['10002','BBBBB','92','137-xxxx-xxxx'],
        ['10003','CCCCC','95','157-xxxx-xxxx'],
        ['10004','DDDDD','89','177-xxxx-xxxx'],
        ['10005','EEEEE','96','188-xxxx-xxxx'],
        ['10006','FFFFF','96','180-xxxx-xxxx'],
        ['10007','ggggg','96','181-xxxx-xxxx'],
        ['10008','HHHHH','96','182-xxxx-xxxx'],
    	];
 
	 
	    Excel::create(iconv('UTF-8', 'GBK', '模板文件'),function($excel) use ($cellData){
	        $excel->sheet('score', function($sheet) use ($cellData){
	            $sheet->rows($cellData);
	        });
	    })->store('xls')->export('xls');

	}


    public function articleImport(Request $request){


 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
 
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                'title' => $value->title, 
                'category_id'=> $value->category_id,
                'content'=> $value->content,
                'img'=> $value->img,
                'admin_id' => $value->admin_id
                ];
            }
 
            if(!empty($arr)){
                Article::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');



    
    }
}
