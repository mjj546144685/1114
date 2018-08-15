<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\admin\Models\Usersdetail;
use App\User;
use App\Http\Requests\UserStoreRequest;
use Hash;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        
        // dump($users);
        //加载模板
        return view('admin.user.index');
    }

    public function getList()
    {
        $data = User::get();
        // dump($users);
        //加载模板
        return view('admin.user.list',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postSs(Request $request)
    {   
        $search=$request->input('search','');//搜索关键字
        $count=$request->input('count',2);//搜索条数
        //获取数据，并且分页
        $data=User::where('username','like','%'.$search.'%')->simplePaginate($count);
        return view('admin.user.list',['data'=>$data,'title'=>'用户列表','request'=>$request->all()]);
    }

    /**
     * Store a newly created resource in storage.     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.user.create');
    }

    public function postAdd(UserStoreRequest $request)
    {   
            
        DB::beginTransaction();

        //插入到数据库
        $user=new User;
        $user->username=$request->input('username');
        $user->phone=$request->input('phone');
        $user->email=$request->input('email');
        $user->password=hash::make($request->input('password'));
        $res1=$user->save();
        if($res1){
            DB::commit();
            return redirect('admin/index/index')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postShow()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {   
        // $res=User::update();
        $data = User::find($id);
        // dump($res);
        // echo '111';
        return view('admin.user.update',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user -> username = $request->username;
        $user -> phone = $request->phone;
        $user -> email = $request->email;
        $res=$user -> save();
        if($res>0){
           return redirect('admin/index/index')->with('success','修改成功'); 
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
    {
        //删除
       $res = User::destroy($id);
        //返回模版
       return back();
    }



    

}
