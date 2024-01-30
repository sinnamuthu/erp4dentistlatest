<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientinformation;
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
use App\Models\Labmaster;
use App\Models\Docpayout;
use App\Models\Procedures;
use App\Models\Bills;
use Intervention\Image\Facades\Image;

class PatientinformationController extends Controller
{

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
    protected $procedures;
    protected $labmaster;
    protected $docpayout;
    protected $bills;

    public function __construct(){
       $this->patientinformation = new patientinformation();
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
       $this->procedures = new Procedures();
       $this->labmaster = new Labmaster();
       $this->docpayout = new Docpayout();
       $this->bills = new Bills();
       
    }



   public function index()
   {
       $response['patientinformation'] = $this->patientinformation->all();
       $response['app_types'] = $this->patientinformation->all();
       return view('content.patient_information.patient_information')->with($response);
       // return view('content.appointment.appointment');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $this->patientinformation->create($request->all());
       session()->flash('success', 'Patientinformation Created Successfully.');
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
       $this->patientinformation->create($request->all());
       session()->flash('success', 'Patientinformation Created Successfully.');
       return redirect()->back();
   }

   public function bills(Request $request)
   {

    // dd($request);

     $id = $request->input('getid');
     $bill_amount = $request->input('bill_amount');
     $bill_to_paid = $request->input('bill_to_paid');
     $balance_amt = $request->input('balance_amt');
     $advance_amount = $request->input('advance_amount');

         Plan::where('id', $id)->update(['invoice_amt' => $bill_to_paid,'balance_amt' => $balance_amt,'advance_amt' => $advance_amount]);

       $this->bills->create($request->all());
       session()->flash('success', 'Bills Created Successfully.');
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

    $response['app_subtypes'] = $this->app_subtypes->all();

    $response['occupation'] = $this->occupation->all();

    $response['examination'] = Emr::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['observ'] = Observ::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['note'] = Note::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['plan'] = Plan::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['patientinformations'] = patientinformation::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['call'] = Call::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['doctorlist'] = Doctor::where('doc_branch', '=', $branch)->get();

    $response['labmaster'] = $this-> labmaster->all();

    $response['docpayout'] = $this-> docpayout->all();

    $response['occlusionsubtype'] = Occlusionsubtype::all();

    $response['chiefcomps'] = Chiefcomps::all();

    $response['procedures'] = Procedures::all();

    $response['intra_oral_observations'] = Intra_oral_observations::all();

    $response['patientimage'] = Patientimage::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

    $response['lab'] = Lab::where('appo_id', '=', $id)->where('branch', '=', $branch)->get();

     return view('content.patient_information.patient_information')->with($response);
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(patientinformation $patientinformation)
    {
        $appointment_id = $patientinformation;

        echo $patientinformation;
       // return view('content.patient_information.patient_information',compact('patientinformation', 'appointment_id'));
    }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, patientinformation $patientinformation)
    {
        //



        // $patientinformation->update($request->all());
        // session()->flash('success', 'Patient Updated Successfully.');
        //  return back();
    }

    public function observdataedit(Request $request){

        $id = $request->input('observeditid');
     $Observ = Observ::find($id);

     $Observ->update($request->all());
     session()->flash('success', 'Observation Updated Successfully.');
      return back();

    }

    public function noteeditdata(Request $request){
        $id = $request->input('noteeditid');
        $Note = Note::find($id);
   
        $Note->update($request->all());
        session()->flash('success', 'Clinical Notes Updated Successfully.');
         return back();
    }

    public function noteeditModal(Request $request){
        $id = $request->query('id'); 
        $item = Note::find($id);
        return response()->json($item);
    }

    public function labeditModal(Request $request){
        $id = $request->query('id'); 
        $item = Lab::find($id);
        return response()->json($item);
    }

    public function updatedata(Request $request)
    {
        //
     $id = $request->query('id'); 

     $patientinformation = patientinformation::find($id);

     $patientinformation->update($request->all());
     session()->flash('success', 'Patient Updated Successfully.');
      return back();
 
    }

    
    public function labeditdata(Request $request){
        $id = $request->input('labeditid');
        $Note = Lab::find($id);
   
        $Note->update($request->all());
        session()->flash('success', 'Lab Work Updated Successfully.');
         return back();
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


   public function appdata(Request $request)
   {

    $switch = $request->has('switch') ? 'on' : 'off';
    $allerg_med = $request->has('allerg_med') ? 'on' : 'off';
    $bp = $request->has('bp') ? 'on' : 'off';
    $diabetes = $request->has('diabetes') ? 'on' : 'off';
    $acidity = $request->has('acidity') ? 'on' : 'off';
    $thyroid = $request->has('thyroid') ? 'on' : 'off';
    $heart = $request->has('heart') ? 'on' : 'off';
    $asthma = $request->has('asthma') ? 'on' : 'off';
    $kd = $request->has('kd') ? 'on' : 'off';
    $epilepsy = $request->has('epilepsy') ? 'on' : 'off';
    $pregnant = $request->has('pregnant') ? 'on' : 'off';
    $pills = $request->has('pills') ? 'on' : 'off';
    $present_med = $request->has('present_med') ? 'on' : 'off';
    $smoke = $request->has('smoke') ? 'on' : 'off';
    $floss = $request->has('floss') ? 'on' : 'off';


    $request['allerg_med'] = $allerg_med;
    $request['bp'] = $bp;
    $request['diabetes'] = $diabetes;
    $request['acidity'] = $acidity;
    $request['thyroid'] = $thyroid;
    $request['heart'] = $heart;
    $request['asthma'] = $asthma;
    $request['kd'] = $kd;
    $request['epilepsy'] = $epilepsy;
    $request['pregnant'] = $pregnant;
    $request['pills'] = $pills;
    $request['present_med'] = $present_med;
    $request['smoke'] = $smoke;
    $request['floss'] = $floss;
    $request['switch'] = $switch;


   // dd($request->all());

    $this->patientinformation->create($request->all());
    session()->flash('success', 'Patientinformation Created Successfully.');
    return redirect()->back();
   }

   public function observdata(Request $request)
   {
    $id = $request->query('id'); 
    $item = Observ::find($id);
    return response()->json($item);
   }

   public function treateditdata(Request $request)
   {
    $id = $request->query('id'); 
    $item = Plan::find($id);
    return response()->json($item);

   }

   public function treateditmodal(Request $request)
   {
    $id = $request->input('planeditid');
    $Plan = Plan::find($id);

    $Plan->update($request->all());
    session()->flash('success', 'Treatment Updated Successfully.');
     return back();
   }

   

   public function image(Request $request)
   {


    // $request->validate([
    //     'imagedate'=>'required',
    //     'image_type'=>'required',
    //     'doctype'=>'required',
    //     'appo_id'=>'required',
    //     'branch'=>'required',
    //     'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:3048'
    // ]);


    // dd($request);
    $maxFileSize = 100 * 1024 * 1024; // 100 MB

if ($request->file('image')->getSize() > $maxFileSize) {
    // Handle the case where the file size is too large
   // return redirect()->back()->with('error', 'File size is too large.');
    session()->flash('error', 'File size is too large.');
    return redirect()->back();
}else{
    // $input = $request->all();

    // $imageName = 'check.jpeg';

    //  $request->image->move(public_path('patient_teeth'), $imageName);


    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $path = public_path('patient_teeth/' . $imageName);

    $maxFileSize = 150; // Maximum file size in KB
    $quality = 90; // Initial quality value

    // Compress the image while the file size is above the limit
    while (filesize($image->getRealPath()) / 1024 > $maxFileSize && $quality > 0) {
        // Encode the image with the specified quality
        Image::make($image)->encode('jpg', $quality)->save($path);
        
        // Reduce quality for the next iteration
        $quality -= 10;
    }



    $input = $request->all();


     $input['image'] = $imageName;

       $this->patientimage->create($input);

 session()->flash('success', 'Patient Image Uploaded Successfully.');
 return redirect()->back();
}


   }

}
