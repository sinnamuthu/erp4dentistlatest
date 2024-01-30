<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Profile;
use App\Models\Labmaster;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{

    protected $appointment;
    protected $labmaster;
    protected $profile;

    public function __construct(){
       $this->appointment = new Appointment();
       $this->labmaster = new Labmaster();
    }



   public function index(Request $request)
   {
    $sortField = $request->input('sort');
    $sortOrder = $request->input('order');
    
    if (isset($sortField)) {
        $branch = Auth::user()->branch;
        $response['profile'] = Profile::where('id', '=', $branch)->get();
        
            // Search filter 
            $query = Labmaster::query();
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('lab_id', 'like', "%$searchTerm%")
                      ->orWhere('lab_name', 'like', "%$searchTerm%");
                     
                $response['labmaster'] = $query->paginate(10);
    }
    else{
        $response['labmaster'] = Labmaster:: where('branch', '=', $branch)->orderBy($sortField, $sortOrder)->paginate(5);
    }
}
else {
    $branch = Auth::user()->branch;
    $response['profile'] = Profile::where('id', '=', $branch)->get();
    $query = Labmaster::query();
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('lab_id', 'like', "%$searchTerm%")
             ->orWhere('lab_name', 'like', "%$searchTerm%");
              

        $response['labmaster'] = $query->paginate(10);
    } else {
        $response['labmaster'] = Labmaster::where('branch', '=', $branch)->orderBy('created_at', 'desc')->paginate(5);
    }
}
$response['labmaster'] = $query->paginate(10);
$response['appointment'] = $this->appointment->all();
return view('content.vendor.vendor')->with($response);
}

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $this->labmaster->create($request->all());
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

       $validator =validator::make($request->all(), [
        'lab_name' => 'required|min:3',
       ]);

       if ($validator->fails())
        {    
        session()->flash('error',"Kindly Check the Form");
          return redirect()->back();
        }    
       else
       {
        $this->labmaster->create($request->all());
       session()->flash('success', 'Lab Added successfully.');
       return redirect()->back();
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
   public function destroy($request)
   {
    Labmaster::where('lab_id', $request)->delete();
        session()->flash('success', 'Lab Deleted Successfully.');
        return back();  
    }
   

   public function vendorupdate(Request $request)
   {
//    $this->labmaster->vendorupdate($request->all());
//     session()->flash('success', 'Lab Updated Successfully.');
//         return back();

        $validator =validator::make($request->all(), [
            'lab_name' => 'required|min:3',
        ]);

        if ($validator->fails())
            {    
            session()->flash('error',"Kindly Check the Form");
            return redirect()->back();
            }    
            else{
                $parameter = $request->input('lab_id');
            $lab = Labmaster::find($parameter);
            $lab->update($request->all());
            session()->flash('success', 'Lab Updated Successfully.');
            return back();
            }

      
   }
}
