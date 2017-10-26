<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use App\Models\Userinfo;
use DB;
use App\Models\Article;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $count = $request -> input('count',3);
        $req = $request -> all();
        $data = User::all();
        //dd($data[7]->userinfo);



        // $data = DB::table('user')
        //         ->join('userinfos','user.id','=','userinfos.uid')
        //         ->select('user.id','user.name','user.age','userinfos.email','userinfos.phone')
        //         ->where('name','like','%'.$search.'%')
        //         ->paginate($count);
        return view('Admin.User.list',['title'=>'用户列表','data'=>$data,'req'=>$req]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.User.create',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = new User;
        $user -> name = $data['name'];
        $user -> age = $data['age'];
        $user -> save();
        $userinfo = new Userinfo();
        $userinfo -> email = $data['email'];
        $userinfo -> phone = $data['phone'];
        $userinfo -> uid = $user->max('id');
        $userinfo -> save();
        return redirect('/Admin/User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('uid','=','4')->get();
        return view('Admin.User.article',['title'=>'文章列表','data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('user')
                ->join('userinfos','user.id','=','userinfos.uid')
                ->select('user.id','user.name','user.age','userinfos.email','userinfos.phone')
                ->where('user.id','=',$id)
                ->first();
        return view('Admin.User.edit',['title'=>'修改用户','data'=>$data]);
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
        DB::table('user')->where('id','=',$id)->update(['age'=>$request->input('age')]);
        DB::table('userinfos')->where('uid','=',$id)->update(['email'=>$request->input('email'),'phone'=>$request->input('phone')]);
        return redirect('\Admin\User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user')->where('id','=',$id)->delete();
        DB::table('userinfos')->where('uid','=',$id)->delete();
        return redirect('\Admin\User');
    }
}
