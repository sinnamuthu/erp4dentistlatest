@extends('layouts/contentNavbarLayout')

@section('title', 'Appointment - Patient Appointment')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->



<!-- Hoverable Table rows -->
<div class="card">
  
  <div class="row">
    <div class="response"></div>
    <div id='calendar'></div>
    <div class="today-table">    
  <table class="erp-day">
      <thead>
    <tr>
      <th>Today's Schedule</th>
      <!--<th>Today's Status</th>-->
      <th>Doctors)</th>
    </tr>
  </thead>
  <tbody>
      <tr><td colspan="3"></td></tr>
    <tr>
      
      <td>
        @foreach($todayappointment as $key => $appointments)
        <div class="grn" style="background-color: {{$appointments->doc_cal_color}} !important; color:white;">{{$appointments->intime.' '.$appointments->firstname.' '.$appointments->lastname}}</div>
        <br>
        @endforeach
      </td>
      
      <!--<td><div><span>Arrival awaited: 05<span></div><br>-->
      <!--  <div><span>Checked-In: 05<span></div><br>-->
      <!--    <div><span>In Progress: 05<span></div><br>-->
      <!--      <div><span>Checked-Out: 05<span></div>-->
      <!--</td>-->
      <td>
        
        @foreach($todaydoctor as $key => $doctors)
        <div><div class="bx grn" style="background-color: {{$doctors['doc_cal_color']}} !important;"></div><label >{{$doctors['choose_doctor']}}</label></div><br>
        @endforeach
        
      </td>
    </tr>
    
      <tr><td colspan="3"></td></tr>
  </tbody>
  </table>
  </div>
</div>


<!--appointment modal start-->
@include('../layouts/appointment_modal')
<!--appointment modal end -->

</div>
<!--/ Hoverable Table rows -->

@endsection
