<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin\Models\Lbt;
use DB;
use App\Http\Requests\UserStoreRequest;

class LbtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //查
    public function getIndex(Request $request)
    {
        // echo '1111';
        // $data = Lbt::get();
        // // // dump($data);
        // return view('admin.lbt.list',['data'=>$data]);

        $search=$request->input('search','');//搜索关键字
        $count=$request->input('count',2);//搜索条数
        $page = ['search'=>$search,'count'=>$count];
        //获取数据，并且分页
        $data=Lbt::where('id','like','%'.$search.'%')->paginate($count);
        return view('admin.lbt.list',['data'=>$data,'page'=>$page]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加
    public function getAdd()
    {
        // echo '111';
       return view('admin.lbt.add'); 
    }
    public function postCreate(Request $request)
    {     
        // echo '111';  
        // dd($request->hasfile('imgpath'));
        //检测文件是否存在
        if($request->hasfile('imgpath')){
            //创建文件上传对象
            $imgpath = $request -> file('imgpath');
            //创建文件名
            $temp_name = str_random(20);
            //获取后缀名
            $ext = $imgpath -> getClientOriginalExtension(); //后缀名
            //拼接文件名
            $name = $temp_name.'.'.$ext;
            //拼接路径
            $dir = './uploads/'.date('Ymd',time());
            //拼接向数据库存储的路径
            $imgs = ltrim($dir.'/'.$name,'.');
            //上传
            $imgpath -> move($dir,$name);
            //写入数据库
            $lbt = new Lbt;
            $lbt -> imgpath = $imgs;
            // $lbt -> status = $request -> status;
            $res = $lbt -> save();
            //跳转
                return redirect('/admin/lbt/index')->with('success','添加成功');
            }else{
                return back();
            }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //修改接收数据
    public function getEdit($id)
    {
        // // dump($id);
        // $data = Lbt::find($id);
        // // dump($data);
        // // echo '111';
        // return view('admin.lbt.update',['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改方法
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
       //  // echo $id;
       //  //删除
       // $res = Lbt::destroy($id);
       //  //返回模版
       // return back();

        //强制删除
        $res = Lbt::find($id);
        $res -> forceDelete();
        //返回模版
        return back()->with('success','删除成功');
    }
}
