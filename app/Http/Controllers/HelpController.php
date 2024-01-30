<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Help;
use App\Models\Profile;
use App\Models\Users;
use App\Models\Procmaster;
use App\Models\Docpayout;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    

    protected $help;
    protected $profile;
    protected $users;
    protected $procmaster;
    protected $docpayout;

    public function __construct(){
       $this->help = new help();
       $this->profile = new Profile();
       $this->users = new Users();
       $this->procmaster = new Procmaster();
       $this->docpayout = new Docpayout();

    }



   public function index()
   {
    $notbranch = 0 ;
    $user_id = Auth::user()->id;
    $branch = Auth::user()->branch;
    // $response['chat'] = Help::where(function ($query) {$query->where('sender_id', '=', '2')->where('reciever_id', '=', '3');})->orWhere(function ($query) {$query->where('sender_id', '=', '3')->where('reciever_id', '=', '2');})->get();
    if(Auth::user()->type == 'Super Admin')
    {
    $response['user'] = Users::join('profile', 'users.branch', '=', 'profile.id')->where('users.branch', '!=', $notbranch)->select('users.*', 'profile.hospitalname as host_name' , 'profile.image as image')->get();
    }
    else{
        $response['profile'] = Profile::where('id', '=', $branch)->get();
        $response['user'] = Users::leftJoin('profile', 'users.branch', '=', 'profile.id')
    ->where(function($query) use ($branch) {
        $query->where('users.branch', '=', $branch)
              ->orWhere('users.branch', '=', 6);
    })
    ->select('users.*', 'profile.hospitalname as host_name', 'profile.image as image')
    ->get();
    }
    return view('content.help.super-help')->with($response);
   }

   public function reloadData()
{
    $branch = Auth::user()->branch;
    $response['sender_id'] = request('sender_id');
    $response['reciever_id'] = request('reciever_id');
    $get_id = request('reciever_id');
    $notbranch = 0 ;
    $user_id = Auth::user()->id;
    $response['chat'] = Help::where(function ($query) use ($get_id,$user_id){$query->where('sender_id', '=', $get_id)->where('reciever_id', '=', $user_id);})->orWhere(function ($query) use ($get_id,$user_id) {$query->where('sender_id', '=', $user_id)->where('reciever_id', '=', $get_id);})->get();
    if(Auth::user()->type == 'Super Admin')
    {
    $response['user'] = Users::join('profile', 'users.branch', '=', 'profile.id')->where('users.branch', '!=', $notbranch)->select('users.*', 'profile.hospitalname as host_name' , 'profile.image as image')->get();
    }
    else{
        $response['profile'] = Profile::where('id', '=', $branch)->get();
        $response['user'] = Users::leftJoin('profile', 'users.branch', '=', 'profile.id')
        ->where(function($query) use ($branch) {
            $query->where('users.branch', '=', $branch)
                  ->orWhere('users.branch', '=', 6);
        })
        ->select('users.*', 'profile.hospitalname as host_name', 'profile.image as image')
        ->get();
    }

    // Return the updated data as JSON
    return response()->json($response);
}



public function proceduretype()
{
    $sender_id = request('sender_id');

    $response['proceduretype'] = Procmaster::where('proc', '=', $sender_id)->get();
    // Return the updated data as JSON
    return response()->json($response);
}

public function labprocedure()
{
    $sender_id = request('sender_id');

    $response['proceduretype'] = docpayout::where('proc', '=', $sender_id)->get();
    // Return the updated data as JSON
    return response()->json($response);
}







   public function appdata()
   {

      
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
    //    $this->help->create($request->all());
    //    return redirect()->back();
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $this->help->create($request->all());
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
       $get_id = $id;
       $notbranch = 0 ;
       $branch = Auth::user()->branch;
       $response['get_id'] = $get_id;
       $user_id = Auth::user()->id;
       $response['chatperson'] = Users::join('profile', 'users.branch', '=', 'profile.id')->where('users.id', '=', $get_id)->select('users.*', 'profile.hospitalname as host_name' , 'profile.image as image')->get();
       $response['chat'] = Help::where(function ($query) use ($get_id,$user_id){$query->where('sender_id', '=', $get_id)->where('reciever_id', '=', $user_id);})->orWhere(function ($query) use ($get_id,$user_id) {$query->where('sender_id', '=', $user_id)->where('reciever_id', '=', $get_id);})->get();
       if(Auth::user()->type == 'Super Admin')
       {
       $response['user'] = Users::join('profile', 'users.branch', '=', 'profile.id')->where('users.branch', '!=', $notbranch)->select('users.*', 'profile.hospitalname as host_name' , 'profile.image as image')->get();
       }
       else{
        $response['profile'] = Profile::where('id', '=', $branch)->get();
        $response['user'] = Users::leftJoin('profile', 'users.branch', '=', 'profile.id')
        ->where(function($query) use ($branch) {
            $query->where('users.branch', '=', $branch)
                  ->orWhere('users.branch', '=', 6);
        })
        ->select('users.*', 'profile.hospitalname as host_name', 'profile.image as image')
        ->get();
       }
       return view('content.help.super-help')->with($response);
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
