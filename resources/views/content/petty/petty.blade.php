@extends('layouts/contentNavbarLayout')

@section('title', 'Accounting - Petty Cash')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->



<!-- Hoverable Table rows -->
<div class="card">
  
  <div class="row">
  
  <h5 class="card-header col-md-8">Petty Cash</h5>
  <div class='col-md-4'>
   
  <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#pettyModalCenter">Add Credit</button>
  <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#pettydebitModalCenter">Add Debit</button>
  </div>
  
  </div>

  
  
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Transaction Date</th>
          <th>Voucher No</th>
          <th>Particulars</th>
          <th>Credit</th>
          <th>Debit</th>
          <th>Balance</th>
          <th>Remarks</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($petty as $key => $pettys)
        <tr>
          <td>{{$pettys->petty_date}}</td>
          <td>{{$pettys->id}}</td>
          <td>{{$pettys->particulars}}</td>
          <td>{{$pettys->credit}}</td>
          <td>{{$pettys->debit}}</td>
          <td>{{$pettys->balance}}</td>
          <td>{{$pettys->reamrks}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('doctor.edit',$pettys->id) }}"><i class="bx bx-street-view me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>

          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>

<!--appointment modal start-->
@include('../layouts/add_doctor')
@include('../layouts/new_plan')
<!--appointment modal end -->

</div>
<!--/ Hoverable Table rows -->

@endsection
