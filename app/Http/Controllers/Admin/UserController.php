<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use App\Models\Userdetail;
use DB;
use App\Http\Requests\UserStoreRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
    }

    public function getList(Request $request)
    {   
       // echo '1111';
        $search=$request->input('search','');//搜索关键字
        $count=$request->input('count',2);//搜索条数
        $page = ['search'=>$search,'count'=>$count];
        //获取数据，并且分页
        $data=User::where('username','like','%'.$search.'%')->paginate($count);
        return view('admin.user.list',['data'=>$data,'page'=>$page]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        // echo '1111';
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(UserStoreRequest $request)
    {   
        // echo '111';
         DB::beginTransaction();

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
            //插入到数据库
            $user=new User;
            $user->username=$request->input('username');
            $user->phone=$request->input('phone');
            $user->email=$request->input('email');
            $user->password=hash::make($request->input('password'));
            $user -> imgpath = $imgs;
            $res1 = $user -> save();
            DB::commit();
            // echo 'ok';
            return redirect('admin/user/list')->with('success','添加成功');
        }else{
            DB::rollBack();
            // echo 'no';
            return back()->with('error','添加失败');
        }
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
    //跳到修改列表页
    public function getEdit($id)
    {
        $data = User::find($id);
        // dump($res);
        // echo '111';
        return view('admin/user/update',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改方法
    public function postUpdate(Request $request, $id)
    {
        // echo '111';
        $user = User::find($id);
        $user -> username = $request->username;
        $user -> phone = $request->phone;
        $user -> email = $request->email;
        $res=$user -> save();
        if($res){
           return redirect('admin/user/list')->with('success','修改成功'); 
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {   //开启事务
        DB::beginTransaction();
        //删除
        $res = User::destroy($id);
        if($res){
            //提交事务
            DB::commit();
            return back()->with('success','删除成功');
        }else{
            //回滚事务
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
