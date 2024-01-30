<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
   
    protected $appointment;
    protected $doctor;
    protected $profile;

    public function __construct(){
       $this->appointment = new Appointment();
       $this->doctor = new Doctor();
       $this->profile = new Profile();
    }




   public function index(Request $request)
   {
      // Admin can only enter this menu, normal users cannot enter
        // if(Auth::user()->type == 'Admin')
        // {
        //     $response['appointment'] = $this->appointment->all();
        //     return view('content.appointment.appointment')->with($response);
        // }
        // else
        // {
        //     return redirect()->back();
        // }

        // Normal and Admin can also use this menu
        $sortField = $request->input('sort');
        $sortOrder = $request->input('order');

        if (isset($sortField)) {
            $branch = Auth::user()->branch;
            $response['profile'] = Profile::where('id', '=', $branch)->get();

            // Search filter 
            $query = Doctor::query();
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('doc_name', 'like', "%$searchTerm%")
                      ->orWhere('doc_email', 'like', "%$searchTerm%")
                      ->orWhere('doc_mobile', 'like', "%$searchTerm%")
                      ->orWhere('doc_speciality', 'like', "%$searchTerm%")
                      ->orWhere('doc_join_date', 'like', "%$searchTerm%")
                      ->orWhere('doc_status', 'like', "%$searchTerm%");

                $response['doctor'] = $query->paginate(10);
            } else {
                $response['doctor'] = Doctor::where('doc_branch', '=', $branch)->orderBy($sortField, $sortOrder)->paginate(5);
            }
        } else {
            $branch = Auth::user()->branch;
            $response['profile'] = Profile::where('id', '=', $branch)->get();
            $query = Doctor::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('doc_name', 'like', "%$searchTerm%")
                      ->orWhere('doc_email', 'like', "%$searchTerm%")
                      ->orWhere('doc_mobile', 'like', "%$searchTerm%")
                      ->orWhere('doc_speciality', 'like', "%$searchTerm%")
                      ->orWhere('doc_join_date', 'like', "%$searchTerm%")
                      ->orWhere('doc_status', 'like', "%$searchTerm%");

                $response['doctor'] = $query->paginate(10);
            } else {
                $response['doctor'] = Doctor::where('doc_branch', '=', $branch)->orderBy('created_at', 'desc')->paginate(5);
            }
        }

        return view('content.doctor.doctor')->with($response);
}

   public function appdata()
   {

       $appdatas = $this->appointment->all();

       $formatted = [];
       foreach ($appdatas as $appdata) {
           $formatted[] = [
               'id' => $appdata->title,
               'title' => $appdata->firstname.' '.$appdata->lastname,
               'start' => $appdata->date_appointment,
               'end' => $appdata->date_appointment,
               'status' => $appdata->title,
           ];
       }

       // $data = [
       //     [
       //         'id' => '1',
       //         'title' => 'fdsafdsa',
       //         'start' => '2023-10-03 00:00:00',
       //         'end' => '2023-10-04 00:00:00',
       //         'status' => '1',
       //     ]
       // ];
       
       $jsonData = json_encode($formatted);
       
       echo $jsonData;
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
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

    $validator = Validator::make($request->all(), [
        
        'doc_name' => 'required|min:3',
        'doc_mobile' => 'required|regex:/^[0-9]{10}$/',
        'doc_email' => 'required|email',
        'doc_speciality' => 'required',
        'doc_cal_color' =>'required',
        'doc_status' =>'required',
        'doc_termination_date' =>'required',
        'doc_join_date' =>'required',
        // Other rules for additional fields...
    ]);

                if ($validator->fails()) {
                 
                    session()->flash('error',"Kindly Check the Form");
                      return redirect()->back();
                }
                else{
                    $this->doctor->create($request->all());
                    session()->flash('success', 'Doctor Created successfully.');
                    return redirect()->back();
                }
              
                        // Continue with your logic if validation passes

     
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
   public function edit(Doctor $doctor)
   {
       //
       return view('content.doctor.doctor_edit',compact('doctor'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Doctor $doctor)
   {
       //
       $validator = Validator::make($request->all(), [
        
        'doc_name' => 'required|min:3',
        'doc_mobile' => 'required|regex:/^[0-9]{10}$/',
        'doc_email' => 'required|email',
        'doc_speciality' => 'required',
        'doc_cal_color' =>'required',
        'doc_status' =>'required',
        'doc_termination_date' =>'required',
        'doc_join_date' =>'required',
        // Other rules for additional fields...
    ]);

                if ($validator->fails()) {
                 
                    session()->flash('error',"Kindly Check the Form");
                      return redirect()->back();
                }
                else{
                    $doctor->update($request->all());
                    session()->flash('success', 'Doctor Updated Successfully.');
                     return back();
                }
      

   }



   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($request)
   {

    
      Doctor::where('doc_id',$request)->delete();
      session()->flash('success', 'Doctor Deleted Successfully.');
      return back();  
   }

}
