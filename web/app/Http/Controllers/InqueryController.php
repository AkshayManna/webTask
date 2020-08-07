<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Redirect;
use DataTables;
use App\Employee;

class InqueryController extends Controller
{
    public function index(Request $request)
    {
            
            if($request->ajax())
            {
             $data = Employee::latest()->get();
            return Datatables::of($data)->addIndexColumn()

                             ->addColumn('status', function($row) {
                                if ($row->status == "inactive") {
                                    $status = isset($row->status) ? ' <a href="' . route('inquery.status', $row->id) . '" data-id="' . $row->id.'" class="btn btn-primary btn-sm btn-icon" title="status"><span class="kt-badge kt-badge--inline kt-badge--primary">Active</span></a>' : '-';
                                } 
                                 if ($row->status == "active") {
                                    $status = isset($row->status) ? ' <a href="' . route('inquery.status', $row->id) . '" data-id="' . $row->id.'" class="btn btn-primary btn-sm btn-icon" title="status"><span class="kt-badge kt-badge--inline kt-badge--danger">Inactive </span></a>' : '-';
                                }
                                return $status;
                            })
                            ->addColumn('action', function ($row) {
                                $btn = ' <a href="' . route('inquery.edit', $row->id) . '" data-id="' . $row->id.'" class="btn btn-primary btn-sm btn-icon" title="edit"><i class="fa fa-pen" ></i></a>';
                               
                               
                                $btn .= ' <a href="' . route('test', $row->id) . '" data-id="' . $row->id . '" class="delete_contactus btn btn-danger btn-sm btn-icon" title="delete"><i class="fa fa-trash"></i></a>';

                                                                 
                                 return $btn;
                            })
                            ->rawColumns(['action','status'])

                            ->make(true);
                }
       return view('inquery_home');
    }
      //

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
   return view('inquery_add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

           return Redirect::route('inquery.index')->with('success', $msg);
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
        $editdata = Employee::find($id);
        return view('inquery_view', compact('editdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $editdata = Employee::find($id);
        return view('inquery_edit', compact('editdata'));
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

     public function test($id)
     {
         $destorydata = Employee::find($id);

        $response = [];
        if (isset($destorydata) && isset($destorydata->id)) {
            $destorydata->delete();
            $response = ['status' => true, "Message" => 'Record deleted successfuly', "data" => []];
        } else {
            $response = ['status' => false, "Message" => 'Record not found!', "data" => []];
        }
        return view('inquery_home');

    }
    public function destroy($id)
    {
         $destorydata = Employee::find($id);

        $response = [];
        if (isset($destorydata) && isset($destorydata->id)) {
            $destorydata->delete();
            $response = ['status' => true, "Message" => 'Record deleted successfuly', "data" => []];
        } else {
            $response = ['status' => false, "Message" => 'Record not found!', "data" => []];
        }
        return $response;
    }

 public function statusChange($id) {
        $statusdata = Employee::find($id);
     if(isset($statusdata) && isset($statusdata->status)) {
            
            if ($statusdata->status == 'active') {
                $statusdata->status = 'inactive';
            } else {
                $statusdata->status ='active';
            }
            $statusdata->save();
        }
        return view('inquery_home');        
        
    }


}
