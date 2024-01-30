
@extends('layouts/contentNavbarLayout')

@section('title', 'Clinics - Clinics List')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->



<!-- Hoverable Table rows -->
<div class="card ">
  
  <div class="row ">
  
  <h5 class="card-header col-md-4">Clinics</h5>
  <div class='col-md-4 mt-4'>
    <form action="{{ route('clinics.index') }}" method="GET">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
  </form>
    </div>
  <div class='col-md-4'>
  <button type="submit" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">Add Clinics</button>
  </div>
  
  </div>
 
  <div class="table-responsive text-nowrap " >
    <table class="table table-hover">
      <thead>
        <tr>
          <th><a href="{{ route('clinics.index', ['sort' => 'id', 'order' => 'asc']) }}">#</th>
          <th>Logo</th>
          <th><a href="{{ route('clinics.index', ['sort' => 'hospitalname', 'order' => 'asc']) }}">Hospital Name</th>
          <th>Branch</th>
          <th>Phone No</th>
          <th>Email</th>
          <th>Join Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($profile as $key => $profiles)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ++$key }}</strong></td>
          <td><div class="avatar ">
            <img src="/hospital_logo/{{$profiles->image}}" alt="" class="w-px-40 h-auto rounded-circle"></div></td>
          <td>{{$profiles->hospitalname}}</td>
          <td>{{$profiles->branchname}}</td>
          <td>{{$profiles->phoneNumber}}</td>
          <td>{{$profiles->email}}</td>
          <td>{{$profiles->created_at}}</td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('doctor.edit',$profiles->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                
                <a class="dropdown-item" href="{{ route('delclinics',$profiles->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
  

<!--appointment modal start-->
@include('../layouts/add_clinics')
@include('../layouts/new_plan')
<!--appointment modal end -->

</div>
<!--/ Hoverable Table rows -->

@endsection
