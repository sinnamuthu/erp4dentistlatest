<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Apptypes;
use App\Models\Appsubtypes;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Emr;
use App\Models\Observ;
use App\Models\Note;
use App\Models\Plan;
use App\Models\Call;
use App\Models\Occupation;
use App\Models\Doctor;
use App\Models\Occlusionsubtype;
use App\Models\Chiefcomps;
use App\Models\Intra_oral_observations;
use App\Models\Patientimage;
use App\Models\Lab;
use App\Models\Procedures;
use App\Models\Docpayout;
use App\Models\Labmaster;
use App\Models\Bills;
use App\Models\Receipt;
use Intervention\Image\Facades\Image;
use App\Models\patientinformation;


class BillingController extends Controller
{

    protected $appointment;
    protected $patientinformation;
    protected $profile;
    protected $app_types;
    protected $app_subtypes;
    protected $emr;
    protected $observ;
    protected $note;
    protected $plan;
    protected $call;
    protected $occupation;
    protected $doctor;
    protected $occlusionsubtype;
    protected $chiefcomps;
    protected $intra_oral_observations;
    protected $patientimage;
    protected $lab;
    protected $bills;
    protected $procedures;
    protected $labmaster;
    protected $docpayout;
    protected $receipt;


    public function __construct(){
        $this->patientinformation = new patientinformation();
       $this->appointment = new Appointment();
       $this->profile = new Profile();
       $this->app_types = new Apptypes();
       $this->app_subtypes = new Appsubtypes();
       $this->emr = new Emr();
       $this->observ = new Observ();
       $this->note = new Note();
       $this->plan = new Plan();
       $this->call = new Call();
       $this->occupation = new Occupation();
       $this->doctor = new Doctor();
       $this->occlusionsubtype = new Occlusionsubtype();
       $this->chiefcomps = new Chiefcomps();
       $this->intra_oral_observations = new Intra_oral_observations();
       $this->patientimage = new Patientimage();
       $this->lab = new Lab();
       $this->bills = new Bills();
       $this->docpayout = new Docpayout();
       $this->labmaster = new Labmaster();
       $this->procedures = new Procedures();
       $this->receipt = new Receipt();
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
 

       return view('content.billing.billing')->with($response);
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
 
     $response['appointment_id'] = $id;
 
     $id = $id;
 
     $branch = Auth::user()->branch;
 
     $response['profile'] = Profile::where('id', '=', $branch)->get();
     
     $response['app_types'] = $this->app_types->all();

     $response['labmaster'] = $this->labmaster->all();

     $response['docpayout'] = $this->docpayout->all();
 
     $response['app_subtypes'] = $this->app_subtypes->all();
 
     $response['occupation'] = $this->occupation->all();
 
     $response['examination'] = Emr::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['observ'] = Observ::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['note'] = Note::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['plan'] = Plan::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['patientinformations'] = patientinformation::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['call'] = Call::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['doctorlist'] = Doctor::where('doc_branch', '=', $branch)->get();
 
     $response['occlusionsubtype'] = Occlusionsubtype::all();
 
     $response['chiefcomps'] = Chiefcomps::all();
 
     $response['procedures'] = Procedures::all();
 
     $response['intra_oral_observations'] = Intra_oral_observations::all();
 
     $response['patientimage'] = Patientimage::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['lab'] = Lab::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['amount'] = Plan::where('appo_id', $id)->selectRaw('SUM(price_proce) as price_proce, SUM(balance_amt) as balance_amt, SUM(invoice_amt) as invoice_amt, SUM(advance_amt) as advance_amt')->first();
     
     $response['bills'] = Bills::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

     $response['receipt'] = Receipt::where('getappo_id', '=', $id)->where('getbranch', '=', $branch)->get();
     
     return view('content.billing.billing_information')->with($response);
        //
    }


    public function report($id)
    {
 
     $response['appointment_id'] = $id;
 
     $id = $id;
 
     $branch = Auth::user()->branch;
 
     $response['profile'] = Profile::where('id', '=', $branch)->get();
     
     $response['app_types'] = $this->app_types->all();

     $response['labmaster'] = $this->labmaster->all();

     $response['docpayout'] = $this->docpayout->all();
 
     $response['app_subtypes'] = $this->app_subtypes->all();
 
     $response['occupation'] = $this->occupation->all();
 
     $response['examination'] = Emr::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['observ'] = Observ::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['note'] = Note::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['plan'] = Plan::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['patientinformations'] = patientinformation::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['call'] = Call::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['doctorlist'] = Doctor::where('doc_branch', '=', $branch)->get();
 
     $response['occlusionsubtype'] = Occlusionsubtype::all();
 
     $response['chiefcomps'] = Chiefcomps::all();
 
     $response['procedures'] = Procedures::all();
 
     $response['intra_oral_observations'] = Intra_oral_observations::all();
 
     $response['patientimage'] = Patientimage::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['lab'] = Lab::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();
 
     $response['amount'] = Plan::where('appo_id', $id)->selectRaw('SUM(price_proce) as price_proce, SUM(balance_amt) as balance_amt, SUM(invoice_amt) as invoice_amt, SUM(advance_amt) as advance_amt')->first();
     
     $response['bills'] = Bills::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

     $response['receipt'] = Receipt::where('getappo_id', '=', $id)->where('getbranch', '=', $branch)->get();
     
     return view('layouts.print')->with($response);
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
