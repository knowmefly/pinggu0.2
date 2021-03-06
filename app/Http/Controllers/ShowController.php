<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{

    //首页展示
    public function indexshow(){
        $table = 'recent_news';
        $data = DB::table($table)->orderBy('date','desc')->limit(7)->get();
        return view('show.index',compact('data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #$rout = $request->input('rout');
        #$table = $request->input('table');
        $table = 'recent_news';
        $data = DB::table($table)->orderBy('date','desc')->get();
//        $data->created_at = new date('Y-m-d',strtotime($data->created_at));
        return view('show.news',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Request $request)
    {
        $table = $request->input('table');
        $id = $request->input('id');
        $data = DB::table($table)->where('id',$id)->first();
        #dd($data);
        return view('show.connect',compact('data'));
    }

    public function submenushow(Request $request)
    {
        $table = $request->input('table');
        $data = DB::table($table)->orderBy('id','desc')->limit(1)->first();
        if ($data==null){
            echo "<script>alert('该页为空，请联系管理员上传');history.back()</script>";
        }else{
            return view('show.connect',compact('data'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
