<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(9);
        
        return view('welcome',[
            'users' => $users,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $movies = $user->movies()->orderBy('id','desc')->paginate(9);
        
        
        $data = [
            'user' => $user,
            'movies' => $movies,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show',$data);
        
    }
    public function rename(Request $request)
    {
        $this->validate($request,[
            'channel' => 'required|max:15',
            'name' => 'required|max:15'
        ]);
        
        $user=\Auth::user();
        $movies = $user->movies()->orderBy('id' ,'desc')->paginate(9);
        
        $user->channel = $request->channel;
        $user->name = $request->name;
        $user->save();
        
        $data=[
          'user' => $user,
          'movies' => $movies,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show',$data);
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
