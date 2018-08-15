<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Youqing;
use DB;
use App\Http\Requests\UserStoreRequest;
class YouqingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {

        $search=$request->input('search','');//搜索关键字
        $count=$request->input('count',2);//搜索条数
        $page = ['search'=>$search,'count'=>$count];
        //获取数据，并且分页
        $data=Youqing::where('username','like','%'.$search.'%')->paginate($count);
        return view('admin.youqing.list',['data'=>$data,'title'=>'用户列表','page'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.youqing.create');
    }


    public function postAdd(UserStoreRequest $request)
    {
        DB::beginTransaction();
        //插入到数据库
        $user=new Youqing;
        $user->username=$request->input('username');
        $user->url=$request->input('url');
        $res1=$user->save();
        if($res1){
            DB::commit();
            return redirect('admin/youqing/index')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSs(Request $request)
    {
        
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
    public function getEdit($id)
    {
        $data=Youqing::find($id);
        // dump($data);
        return view('admin/youqing/update',['data'=>$data]);
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
        $user = Youqing::find($id);
        $user -> username = $request->username;
        $user -> url = $request->url;
        $res=$user -> save();
        if($res>0){
           return redirect('admin/youqing/index')->with('success','修改成功'); 
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
    public function getDel($id)
    {
        Youqing::destroy($id);
        return back();
    }
}
