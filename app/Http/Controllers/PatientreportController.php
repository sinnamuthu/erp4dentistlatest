<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class PatientreportController extends Controller
{

    protected $appointment;

    public function __construct(){
       $this->appointment = new Appointment();
    }



   public function index()
   {
      
    $branch = Auth::user()->branch;
    $response['profile'] = Profile::where('id', '=', $branch)->get();
    $response['appointment'] = Appointment::select('appointment.id','appointment.title','appointment.firstname','appointment.lastname','appointment.date_appointment','appointment.intime','appointment.outtime','appointment.countrycode','appointment.contact_no','appointment.email','appointment.status','appointment.choose_doctor','appointment.reason_appointment','appointment.note','appointment.created_at','appointment.updated_at','appointment.branch')
    ->join('plan', 'appointment.id', '=', 'plan.appo_id')
    ->where('appointment.branch', $branch)
    ->groupBy('appointment.id','appointment.title','appointment.firstname','appointment.lastname','appointment.date_appointment','appointment.intime','appointment.outtime','appointment.countrycode','appointment.contact_no','appointment.email','appointment.status','appointment.choose_doctor','appointment.reason_appointment','appointment.note','appointment.created_at','appointment.updated_at','appointment.branch')
    ->get();
 
       return view('content.patinet_report.patinet_report')->with($response);
       // return view('content.appointment.appointment');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $this->appointment->create($request->all());
       return redirect()->back();
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $this->appointment->create($request->all());
       return redirect()->back();
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