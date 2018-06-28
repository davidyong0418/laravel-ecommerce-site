<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        if($request->isMethod('post')){
               $name      = $request->input('fname')!=''? $request->input("fname"):'';
               $email     = $request->input('email')!=''?$request->input("email"):'';
               $address   = $request->input('address')!=''?$request->input('address'):"";
               $city      = $request->input('city')!=''?$request->input('city'):"";
               $state     = $request->input('state')!=''?$request->input('state'):"";
               $country   = $request->input('country')!=''?$request->input('country'):"";
               $telephone = $request->input('phone')!=''?$request->input('phone'):"";
               $zip       = $request->input('zip')!=''?$request->input('zip'):"";

           $updateArray = array('name'      =>$name,
                                'email'     =>$email,
                                'telephone' =>$telephone,
                                'country'   =>$country,
                                'state'     =>$state,
                                'city'      =>$city,
                                'zip'       =>$zip,
                                'address'   =>$address
                          );  
        $update = DB::table('users')->where('id',$id)->update($updateArray);
        if($update){
            $message = 'Data successfully updated';
            Session::flash('message',$message);
            return redirect('/user-detail/'.$id);
        }else{
         $message = 'Server not responding! Please Try again';
            Session::flash('message',$message);
            return redirect('/user-detail/'.$id); 
        }
        }else{
        $detail = DB::table('users')->where('id',$id)->first();
        return view('layouts/user_detail',array('data'=>$detail));
    }
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
}
