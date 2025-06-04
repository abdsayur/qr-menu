<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function check(Request $request)
    {
        $employee = Employee::where("phone",$request->phone)->where("password",$request->password)->first();

        if($employee){
            $type = $employee->type;

            if($type == "Manager"){
                if($request->work_type == "Waiter"){
                    return;
                }
                if($request->work_type == "Cashier"){
                    return Http::post('https://qr.algorexe.com/api/pos/take-away',[
                        'business_id'=> $request->business_id,

                    ]);
                }
            }

            if($type == "Cashier"){
                return Http::post('https://qr.algorexe.com/api/pos/take-away',[
                    'business_id'=> $request->business_id,

                ]);
            }
            if($type == "Delivery"){
                return view('pos.delivery');
            }
            if($type == "Waiter"){
                return view('pos.waiter');
            }
        }
        else {
            return $request->phone;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
