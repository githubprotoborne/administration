<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $users =DB::table('users')
        ->where('id','!=',$userId)
        ->get();

        return view('user/afficher',['users'=>$users]);
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
    public function store(Request $request,$id)
    {
        //

    }

    public function storeForm($id)
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
        DB::table('users')
        ->where('id', $id)  
       
        ->update(array('name' => $request->nom,'role'=>$request->role,'email'=>$request->email));  // update the record in the DB. 
        
        $userId = Auth::id();
        $users =DB::table('users')
        ->where('id','!=',$userId)
        ->get();
        return view('user/afficher',['users'=>$users]);
     
    }

    public function updateForm(Request $request, $id)
    {
        //
        $users=DB::table('users')
        ->where('id',$id)
        ->get();
        return view("user/modifier",['user'=>$users[0]]);
    }

    public function compte()
    {
        //
        $id= Auth::id();
        $users=DB::table('users')
        ->where('id',$id)
        ->get();
        return view("user/compte",['users'=>$users]);
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
        DB::table('users')
        ->where('id',$id)
        ->delete();

        $userId = Auth::id();
        $users =DB::table('users')
        ->where('id','!=',$userId)
        ->get();
        return view('user/afficher',['users'=>$users]);
    }
}
