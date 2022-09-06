<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mypage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'Password::min(8)|letters()|mixedCase()|numbers()|symbols()|uncompromised()' ,
            'age' => 'nullable',
            'gender' => 'nullable',
            'address' => 'required|string|max:200|unique:users',
            'thanks_point' => 'nullable|integer'
        ]);
        // バリデーションエラー
        if ($validator->fails()){
            return redirect()
            ->route('user.create')
            ->withInput()
            ->withErrors($validator);
        };


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


  public function myposts()
  {
    // Userモデルに定義したリレーションを使用してデータを取得する．
    $myposts = User::query()
      ->find(Auth::user()->id)
      ->userPosts()
      ->orderBy('created_at','desc')
      ->get();

    // dd($myposts);
    return view('mypage.index', compact('myposts'));
  }
}
