<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\admin\Models\Mgc;
use DB;
use App\Http\Requests\MgcStoreRequest;

class MgcController extends Controller
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
        $data=Mgc::where('mgcname','like','%'.$search.'%')->paginate($count);
        return view('admin.mgc.list',['data'=>$data,'page'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        // echo "111";
        return view('admin.mgc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(MgcStoreRequest $request)
    {
        // echo '111';
        DB::beginTransaction();
        $mgc=new mgc;
        $mgc->mgcname=$request->input('mgcname');
        $res1 = $mgc -> save();
        if($res1){
            DB::commit();
            // echo 'ok';
            return redirect('admin/mgc/index')->with('success','添加成功');
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
    public function getEdit($id)
    {
        // echo '111';
        $data = Mgc::find($id);
        return view('admin/mgc/update',['data'=>$data]);
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
        // echo '111';
        $mgc = Mgc::find($id);
        $mgc -> mgcname = $request->mgcname;
        $res=$mgc -> save();
        if($res){
           return redirect('admin/mgc/index')->with('success','修改成功'); 
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
        //开启事务
        DB::beginTransaction();
        //删除
        $res = Mgc::destroy($id);
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
