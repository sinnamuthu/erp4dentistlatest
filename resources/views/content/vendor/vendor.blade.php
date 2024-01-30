@extends('layouts/contentNavbarLayout')

@section('title', 'Accounting - Vendor')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->



<!-- Hoverable Table rows -->
<div class="card ">
  
  <div class="row ">
  
  <h5 class="card-header col-md-4">Vendor Labs</h5>
  <div class='col-md-4 mt-4'>
    <form action="{{ route('lab.index') }}" method="GET">
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

    <table class="table table-hover">
      <thead>
        <tr>
          <th><a href="{{ route('lab.index', ['sort' => 'lab_id', 'order' => 'asc']) }}">Lab ID</th>
          <th><a href="{{ route('lab.index', ['sort' => 'lab_name', 'order' => 'asc']) }}">Lab Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($labmaster as $key => $labmasters)
        <tr>
          <td>{{$labmasters->lab_id}}</td>
          <td>{{$labmasters->lab_name}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" onclick="myFunction(this)" data-name="{{$labmasters->lab_name}}" data-id="{{$labmasters->lab_id}}" data-toggle="modal" data-target="#exampleModaledit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{route('lab.destroy',$labmasters->lab_id)}}" > <i class="bx bx-trash me-1"></i> Delete</a>
                
              </div>
            </div>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
  {{ $labmaster->links() }}
</div>
  <!-- Modal Appointment -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Labs</h5>
    
      </div>
      <form method="POST" action="{{ route('lab.store') }}" >
      @csrf
      <div class="modal-body">
      <div class="form-row row">

      <div class="form-group col-md-12">
      <label for="inputCity">Lab Name</label>
      <input type="text" class="form-control" name="lab_name" id="lab_name">
      
    </div>

   </div>


   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Labs</h5>
    
      </div>
      <form method="POST" action="{{ route('labupdate') }}" >
      @csrf
      <div class="modal-body">
      <div class="form-row row">
    <div class="form-group col-md-12">

    
      <input type="hidden" class="form-control" name="lab_id" id="lab_idedit"><br>

      <label for="inputCity">Lab Name</label>
      <input type="text" class="form-control" name="lab_name" id="lab_nameedit">

      
      
    </div>

  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!--/ Hoverable Table rows -->

<script>
function myFunction(d) {
console.log(d.getAttribute("data-name"));
$("#lab_nameedit").val(d.getAttribute("data-name"));
console.log(d.getAttribute("data-id"));
$("#lab_idedit").val(d.getAttribute("data-id"));
}


</script>

@endsection
