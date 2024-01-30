@extends('layouts/contentNavbarLayout')

@section('title', 'Doctor - Patient List')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->



<!-- Hoverable Table rows -->
<div class="card ">
  
  <div class="row ">
  
  <h5 class="card-header col-md-4">Doctor</h5>
  <div class='col-md-4 mt-4'>
    <form action="{{ route('doctor.index') }}" method="GET">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
  </form>
    </div>
  <div class='col-md-4'>
  <button type="submit" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">Add Doctor</button>
  </div>
  
  </div>
 
  <div class="table-responsive text-nowrap pagination" >

    <table class="table table-hover ">
      <thead>
        <tr>
          <th><a href="{{ route('doctor.index', ['sort' => 'id', 'order' => 'asc']) }}">#</th>
          <th><a href="{{ route('doctor.index', ['sort' => 'doc_name', 'order' => 'asc']) }}">Name</th>
          <th>Contact No</th>
          <th>Mail</th>
          <th>Speciality</th>
          <th>Color</th>
          <th>Join Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($doctor as $key => $doctors)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ++$key }}</strong></td>
          <td>{{$doctors->doc_name}}</td>
          <td>{{$doctors->doc_mobile}}</td>
          <td>{{$doctors->doc_email}}</td>
          <td>{{$doctors->doc_speciality}}</td>
          <td><div><div class="bx grn" style="padding:8px;background-color:{{$doctors->doc_cal_color}};margin-left:8px"></div><label></label></div></td>
          <td>{{$doctors->doc_join_date}}</td>
          <td>@if($doctors->doc_status == 'Active')
            <span class="badge bg-label-primary me-1">Active</span></td>
            @else
            <span class="badge bg-label-warning me-1">In Active</span></td>
            @endif</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
              
                <a class="dropdown-item" href="{{ route('doctor.edit', $doctors->doc_id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{route('doctor.destroy',$doctors->doc_id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
  {{ $doctor->links() }}
<!--appointment modal start-->
@include('../layouts/add_doctor')
@include('../layouts/new_plan')
<!--appointment modal end -->

</div>
<!--/ Hoverable Table rows -->

@endsection
