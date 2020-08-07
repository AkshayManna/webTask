<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Employee;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('user')){
         return view('profile');
     }
     else{
        return view('login');
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
    if (session()->get('user')){

           $id=(session()->get('user')['id']);
           //echo $id;
          $editdata = Employee::find($id);
          //dd($editdata);
        return view('frontprofile', compact('editdata'));
    }
    else{
        return view('login');
       }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            {
         $input = $request->all();
        // dd($input);
        $rules['email'] = 'required';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        } else {
            if (isset($input['id'])) {
                $storedata = Employee::find($request->id);
                $msg = "Record Updated successfully.";
            } else {
                $storedata = new Employee();
                $msg = "Record created successfully.";
            }
            $storedata->fill($input)->save();

           return Redirect::route('profile.index')->with('success', $msg);
        }
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
