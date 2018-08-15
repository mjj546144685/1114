<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\admin\Models\Cates;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates()
    {
        $sql = "select *,concat(path,',',id) as paths from cates order by paths asc";
        $data = \DB::select($sql);
        foreach($data as $key => $value){
        $n=substr_count($value->path,',');//统计,出现的次数  
        $data[$key]->cname = str_repeat('|----',$n).$value->cname;
    }
        return $data;
    }   



       public function index(Request $request)
    {   
        $search=$request->input('search','');//搜索关键字
        $count=$request->input('count',2);//搜索条数
        $page = ['search'=>$search,'count'=>$count];
        //获取数据，并且分页
        $data=Cates::where('cname','like','%'.$search.'%')->paginate($count);
        return view('admin.cates.index',['data'=>$data,'title'=>'分类列表','page'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data=Cates::get();
        //添加页面
        return view('admin.cates.create',['title'=>'分类添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收父级的id
        $pid=$request->input('pid');
        $cates=new Cates;
        $cates->cname=$request->input('cname');
        $cates->pid=$pid;
        if($pid==0){
            //顶级分类
            $cates->path=$pid;
        }else{
            $parent_data=Cates::find($pid);//查询父级的数据
            $cates->path=$parent_data->path.','.$parent_data->id;
        }
        if($cates->save()){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
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
    public function edit($id)
    {
        //获取数据
        $cate=Cates::find($id);
        return view('admin.cates.edit',['title'=>'修改分类','cate'=>$cate,'data'=>self::getCates()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //当前类别下是否有子分类
        $parent=Cates::where('pid',$id)->first();
        if(!empty($parent)){
            return back()->with('error','当前类别下有子分类，不允许修改');
        }
        //接收父级的id
        $pid=$request->input('pid');
        $cates=Cates::find($id);
        $cates->cname=$request->input('cname');
        $cates->pid=$pid;
        if($pid==0){
            //顶级分类
            $cates->path=$pid;
        }else{
            $parent_data=Cates::find($pid);//查询父级的数据
            $cates->path=$parent_data->path.','.$parent_data->id;
        }
        if($cates->save()){
            return redirect('admin/cates')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $parent=Cates::where('pid',$id)->first();
        if(!empty($parent)){
            return back()->with('error','当前类别下有子分类,不允许删除');
        }
        if(Cates::destroy($id)){
            return redirect('admin/cates')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
