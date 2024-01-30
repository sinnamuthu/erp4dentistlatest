@extends('layouts/contentNavbarLayout')

@section('Appointment', 'Appointment Information')

@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Update Appointment Info</h5> <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('appointment.update',$appointment->id) }}" >
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-row row">
              <div class="form-group col-md-4">
                <label for="inputCity">Date</label>
                <input type="date" class="form-control" value="{{$appointment->date_appointment}}" name="date_appointment" id="date_appointment">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">In Time</label>
                <input type="time" class="form-control"  value="{{$appointment->intime}}" name='intime' pattern="[0-2][0-9]:[0-5][0-9]:[0-5][0-9]" id="intime">
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">Out Time</label>
                <input type="time" class="form-control" value="{{$appointment->outtime}}" name="outtime" pattern="[0-2][0-9]:[0-5][0-9]:[0-5][0-9]" id="outime">
              </div>
            </div>
          
            <div class="form-row row">
              <div class="form-group col-md-4">
                <label for="inputState">Title</label>
                <select id="title" name="title" class="form-control">   
                  <option selected @selected($appointment->title == "Mr") value="Mr" >Mr</option>
                  <option selected @selected($appointment->title == "Mrs") value="Mrs">Mrs</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">First Name</label>
                <input type="text" class="form-control" value="{{$appointment->firstname}}" name="firstname" id="firstname">
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="{{$appointment->lastname}}" id="lastname">
                
              </div>
            </div>
          
          
            <div class="form-row row">
              <div class="form-group col-md-4">
                <label for="inputState">Country Code</label>
                <select id="countrycode" name="countrycode" class="form-control">
                  <option selected @selected($appointment->countrycode == "+91") value="+91">+91</option>
                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="inputZip">Contact Number</label>
                <input type="text" class="form-control" name="contact_no" value="{{$appointment->contact_no}}" id="contactnumber">
                <input type="hidden" class="form-control" name="branch" value="{{auth()->user()->branch}}" id="contactnumber">
              </div>
            </div>
          
            <div class="form-row row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" value="{{$appointment->email}}" id="inputEmail4" placeholder="Email">
              </div>
            </div>
          
            <div class="form-row row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Choose Doctor</label>
                <select id="choose_doctor" name="choose_doctor" class="form-control">
                  @foreach($doctorlist as $doctorlists)
                  <option selected value="{{ $doctorlists->doc_name }}" @selected($appointment->choose_doctor == $doctorlists->doc_name)>{{ $doctorlists->doc_name }}</option>
              @endforeach
                </select>
            </div>
          
          
            <div class="form-row row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Reason For Appointment</label>
                <select id="reason_appointment"  name="reason_appointment" class="form-control">
                <option selected value="Checkup" @selected($appointment->reason_appointment == "Checkup")>Checkup</option>
                  </select>
              </div>

              
            </div>
          
          
            <div class="form-row row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Note</label>
                <input type="text" value="{{$appointment->note}}" class="form-control" name="note" id="note" >
              </div>

              <div class="form-group col-md-6">
                <label for="inputEmail4">Status</label>
                <select id="status" name="status" class="form-control">
                    <option  value="0"  @selected($appointment->status == "0")>In Active</option>
                  <option  value="1"  @selected($appointment->status == "1")>Active</option>
                 
                </select>
            </div>

            </div>

   
          
            </div>
          
          
                </div>

            <div class="modal-footer">
             <a class="btn btn-warning" href="{{ url()->previous() }}" >Back</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
      </div>
    </div>
  </div>
 
</div>
@endsection
