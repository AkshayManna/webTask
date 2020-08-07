<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Redirect;
use Illuminate\Http\Request;

use App\Employee;
use Hash;
use Illuminate\Support\Facades\Validator;
class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
    return view('registration');

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

        $validator = Validator::make($request->all(), [
             'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],        
            ]);
            if ($validator->fails()) {
    
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }
               
           $user=new Employee;    
           $user->name=$request->name;
           $user->state=$request->state;
           $user->email=$request->email;
           $user->dob=$request->dob;
           $user->address=$request->address;
           $user->country=$request->country;
           $user->city=$request->city;
           $user->type='user';

           $user->password=Hash::make($request->password);
           
           $user->save();
           if($user) {
               Session::put('user', $user);
               //return redirect('/agent');
           }
           

           


return Redirect::route('inquery.index');
  
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
