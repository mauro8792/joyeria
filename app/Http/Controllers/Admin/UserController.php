<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with(compact('users')); // listado
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
    public function enableStatus(Request $request){
        $user = User::find($request->id);
        if($user->status == 1){
            $user->status = '0';
            $user->save();

        }else{
            $user->status = '1';
            $user->save();

            //$for = "mauroyini@hotmail.com.ar";
            $for = $user->email;
            $subject = "Consultas de la Web Hidroextincion.com.ar";
            //dd($subject);
            Mail::send('email.confirmRegister',$request->all(), function($msj) use($subject,$for){
            $msj->from("info@hidroextincion.com.ar","Consultas para Hidro extinción");
            $msj->subject($subject);
            $msj->to($for);
        });
        }
        return back();
    }
}
