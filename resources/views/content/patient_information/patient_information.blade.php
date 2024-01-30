@extends('layouts/contentNavbarLayout')

@section('title', 'EMR - Patient Information')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->

<section class="container">

  <ul class="tabs">
    <li><a href="#tab1">History</a></li>
    <li><a href="#tab2">Patient Info</a></li>
    <li><a href="#tab3">Medical Info</a></li>
    <li><a href="#tab4">EMR</a></li>
	
	
</ul>
<div id="tab1" class="tab_content"><!--History-->
	@isset($patientinformations[0]['first_name'])
	<div class="card mb-4">
	<div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" /> 
		  <div class="button-wrapper">
            <p class="text-muted mb-0"><span>Name: @isset($patientinformations[0]['first_name']){{$patientinformations[0]['first_name']}}@else @endisset </span><span style="margin-left:40px;">Email: @isset($patientinformations[0]['mail']){{$patientinformations[0]['mail']}}@else @endisset</span></p>
			<p style="padding-top:10px;" class="text-muted mb-0"><span>Mobile: @isset($patientinformations[0]['contact']){{$patientinformations[0]['contact']}}@else @endisset</span><span style="margin-left:40px;">Address: @isset($patientinformations[0]['lo_street']){{$patientinformations[0]['lo_street']}}@else @endisset</span></p>
			<p style="padding-top:12px;">
                <i class="menu-icon tf-icons bx bx-envelope" style="font-size: 26px;"></i>
				<i class="menu-icon tf-icons bx bx-phone-call" data-toggle="modal" data-target="#exampleModalCenter" style="margin-left:40px;font-size: 26px;"></i>
				<i class="menu-icon tf-icons bx bx-book-content" style="margin-left:40px;font-size: 26px;"></i>
			
			</p>
          </div>
        </div>
      </div>
	</div>
	@else @endisset
	@foreach($call as $calls)
	<div class="accordion-item card active">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
          <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionIcon-{{$calls->id}}" aria-expanded="true" aria-controls="accordionIcon-{{$calls->id}}">
            {{$calls->call_date}}{{$calls->call_time}}<span style="margin-left:20px;">{{$calls->call_title}}</span>
          </button>
        </h2>
        <div id="accordionIcon-{{$calls->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionIcon">
          <div class="accordion-body">
			{{$calls->call_note}}
          </div>
        </div>
      </div>
	  <br>
	  @endforeach

</div><!--./History-->
<div id="tab2" class="tab_content"><!--Patient Info-->
	<div class="patient">
		<h3>Patient Info</h3>
		@if(isset($patientinformations[0]['startDate']))
		<form method="post" action="{{ route('patient_information.updatedata', ['id' => $patientinformations[0]['id']]) }}"  >
			@csrf
		@else
			<form method="post" action="{{ route('patient_infodata') }}">
				@csrf
		@endif
		
			<div class="row form-wrap">
					<aside class="col-md-3"><p>Patient ID: <span>Erp/2023/03</span></p></aside>
					<aside class="col-md-3">
					<div class='input-group date' id='startDate'>					
					<span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
					<input type='date' class="form-control" name="startDate" value="{{ isset($patientinformations[0]['startDate']) ? $patientinformations[0]['startDate'] : '' }}" placeholder="Reg. Date" />
					</div>
					</aside>
					<aside class="col-md-3">
						<select id="inputState" name="appointment_type" class="form-select">
							@foreach($app_types as $app_typess)
							<option value="{{ $app_typess->app_type_desc }}" {{ isset($patientinformations[0]['appointment_type']) && $app_typess->app_type_desc == $patientinformations[0]['appointment_type'] ? 'selected' : '' }}>{{ $app_typess->app_type_desc }}</option>
						@endforeach
						</select>
					</aside>
					<aside class="col-md-3">
						<select id="inputState" name="appointmentsub_type" class="form-select">
							@foreach($app_subtypes as $app_subtypess)
							<option value="{{ $app_subtypess->app_subtype_desc }}"{{ isset($patientinformations[0]['appointmentsub_type']) && $app_subtypess->app_subtype_desc == $patientinformations[0]['appointmentsub_type'] ? 'selected' : '' }}>{{ $app_subtypess->app_subtype_desc }}</option>
						@endforeach
						</select>
						</aside>
				</div>
				<div class="row form-wrap">					
					<aside class="col-md-2">
						<select id="inputState" name="title" class="form-select">
						<option value="Title" {{ isset($patientinformations[0]['title']) && 'Title' == $patientinformations[0]['title'] ? 'selected' : '' }}>Title</option>
						<option value="Mr." {{ isset($patientinformations[0]['title']) && 'Mr.' == $patientinformations[0]['title'] ? 'selected' : '' }} >Mr.</option>
						<option value="Mrs." {{ isset($patientinformations[0]['title']) && 'Mrs.' == $patientinformations[0]['title'] ? 'selected' : '' }}>Mrs.</option>
						<option value="Ms." {{ isset($patientinformations[0]['title']) && 'Ms.' == $patientinformations[0]['title'] ? 'selected' : '' }}>Ms.</option>
						</select>
					</aside>
					<aside class="col-md-6">
						<input type="text" class="form-control" placeholder="First name *" value="{{ isset($patientinformations[0]['first_name']) ? $patientinformations[0]['first_name'] : '' }}" name="first_name" aria-label="First name">
					</aside>
					<aside class="col-md-4">
						<input type="text" class="form-control" placeholder="Last name" value="{{ isset($patientinformations[0]['second_name']) ? $patientinformations[0]['second_name'] : '' }}" name="second_name" aria-label="Last name">
					</aside>
				</div>
				<div class="row form-wrap">
					<aside class="col-md-4">
						<div class='input-group date' id='startDate'>					
						<span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
						<input type='date' class="form-control" name="dateofbirth" value="{{ isset($patientinformations[0]['dateofbirth']) ? $patientinformations[0]['dateofbirth'] : '' }}" placeholder="Date of brith" />
						</div>
					</aside>
					<aside class="col-md-2">
						<div class='input-group date' id='startDate'>					
						<span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
						<input type='text' class="form-control" name="age" value="{{ isset($patientinformations[0]['age']) ? $patientinformations[0]['age'] : '' }}" placeholder="Age" />
						</div>
					</aside>				
					<aside class="col-md-2">
						<select id="inputState" name="gender" class="form-select">
						<option value="Gender" {{ isset($patientinformations[0]['gender']) && 'Gender' == $patientinformations[0]['gender'] ? 'selected' : '' }}>Gender</option>
						<option value="Male" {{ isset($patientinformations[0]['gender']) && 'Male' == $patientinformations[0]['gender'] ? 'selected' : '' }}>Male</option>
						<option value="Female" {{ isset($patientinformations[0]['gender']) && 'Female' == $patientinformations[0]['gender'] ? 'selected' : '' }}>Female</option>
						<option value="Transgender" {{ isset($patientinformations[0]['gender']) && 'Transgender' == $patientinformations[0]['gender'] ? 'selected' : '' }}>Transgender</option>
						</select>
					</aside>		
					<aside class="col-md-4">
						<select id="inputState" name="nationality" class="form-select">
						<option value="Indian"  {{ isset($patientinformations[0]['nationality']) && 'Indian' == $patientinformations[0]['nationality'] ? 'selected' : '' }}>Indian</option>
						<option value="Foreigner" {{ isset($patientinformations[0]['nationality']) && 'Foreigner' == $patientinformations[0]['nationality'] ? 'selected' : '' }}>Foreigner</option>
						<option value="NRI" {{ isset($patientinformations[0]['nationality']) && 'NRI' == $patientinformations[0]['nationality'] ? 'selected' : '' }}>NRI</option>
						</select>
					</aside>	
				</div>
				<div class="row form-wrap">
					<aside class="col-md-2">
					<label for="inputCountry" class="form-label small">Country Code*</label>
					</aside>
					<aside class="col-md-2">
					<select id="inputCountry" name="country_pin" class="form-select">
					<option selected>India (+91)</option>
					</select>
					</aside>
					<aside class="col-md-3">
					<input type="text" class="form-control ic contact" name="contact" value="{{ isset($patientinformations[0]['contact']) ? $patientinformations[0]['contact'] : '' }}" placeholder="Contact No*" aria-label="First name">
					</aside>
					<aside class="col-md-5">
					<input type="email" class="form-control ic mail" name="mail" id="inputEmail4" value="{{ isset($patientinformations[0]['mail']) ? $patientinformations[0]['mail'] : '' }}" placeholder="Email Address">
					<input type="hidden" class="form-control ic mail" name="appo_id" id="appo_id"  value="{{$appointment_id}}" >
					<input type="hidden" class="form-control " name="branch" id="branch"  value="{{auth()->user()->branch}}" >
					</aside>					
				</div>

			
				
				<div class="row form-wrap">
					<aside class="col-md-5">
						<div class="row">	
							<aside class="col-md-5">
								<select id="inputState" name="occupation" class="form-select">
									@foreach($occupation as $occupations)
									<option value="{{ $occupations->occupation_name }}"{{ isset($patientinformations[0]['occupation']) && $occupations->occupation_name == $patientinformations[0]['occupation'] ? 'selected' : '' }}>{{ $occupations->occupation_name }}</option>
								@endforeach
								</select>
							</aside>		
							<aside class="col-md-7">
								<select id="inputState"  name="marriage_status" class="form-select">
									<option value="Married" {{ isset($patientinformations[0]['marriage_status']) && 'Married' == $patientinformations[0]['marriage_status'] ? 'selected' : '' }}>Married</option>
									<option value="Unmarried" {{ isset($patientinformations[0]['marriage_status']) && 'Unmarried' == $patientinformations[0]['marriage_status'] ? 'selected' : '' }}>Unmarried</option>
								</select>
							</aside>	
						</div>
					</aside>
				</div>
				<hr />
				<div class="row"><!--Local Address-->
					<aside class="col-sm-6">
							<h4>Local Address</h4>
							  <div class="form-wrap">
									<input type="text" class="form-control" id="inputAddress" value="{{ isset($patientinformations[0]['lo_doorno']) ? $patientinformations[0]['lo_doorno'] : '' }}" name="lo_doorno" placeholder="Door No">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" id="inputAddress" value="{{ isset($patientinformations[0]['lo_street']) ? $patientinformations[0]['lo_street'] : '' }}" name="lo_street" placeholder="Street">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" id="inputAddress" value="{{ isset($patientinformations[0]['lo_location']) ? $patientinformations[0]['lo_location'] : '' }}" name="lo_location" placeholder="Location">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" id="inputAddress" value="{{ isset($patientinformations[0]['lo_csc']) ? $patientinformations[0]['lo_csc'] : '' }}" name="lo_csc" placeholder="City, State & Country">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" id="inputAddress" value="{{ isset($patientinformations[0]['lo_pincode']) ? $patientinformations[0]['lo_pincode'] : '' }}" name="lo_pincode" placeholder="Pincode">
							  </div>
					</aside>
					<aside class="col-sm-6">
						<div class="form-check form-switch add">
							<label class="form-check-label" for="flexSwitchCheckDefault">Permanent  Addres</label>
							<input class="form-check-input" type="checkbox" name="switch" value="{{ isset($patientinformations[0]['switch']) ? $patientinformations[0]['switch'] : '' }}" {{ isset($patientinformations[0]['switch']) && $patientinformations[0]['switch'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
						</div>
							
							  <div class="form-wrap">
									<input type="text" class="form-control" name="per_doorno" value="{{ isset($patientinformations[0]['per_doorno']) ? $patientinformations[0]['per_doorno'] : '' }}" id="inputAddress" placeholder="Door No">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" name="per_street" value="{{ isset($patientinformations[0]['per_street']) ? $patientinformations[0]['per_street'] : '' }}" id="inputAddress" placeholder="Street">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" name="per_location" value="{{ isset($patientinformations[0]['per_location']) ? $patientinformations[0]['per_location'] : '' }}" id="inputAddress" placeholder="Location">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" name="per_csc" value="{{ isset($patientinformations[0]['per_csc']) ? $patientinformations[0]['per_csc'] : '' }}" id="inputAddress" placeholder="City, State & Country">
							  </div>
							  <div class="form-wrap">
									<input type="text" class="form-control" name="per_pincode" value="{{ isset($patientinformations[0]['per_pincode']) ? $patientinformations[0]['per_pincode'] : '' }}" id="inputAddress" placeholder="Pincode">
							  </div>
					</aside>
				</div><!--./Local Address-->
		
		<button type="button" class="btn btn-link next">Next</button>

	</div>   
</div><!--./Patient Info-->
<div id="tab3" class="tab_content"><!--Medical Info-->
	<div class="medical">
		<h3>Medical Info</h3>
		<div class="row">	
		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Blood Pressure</label>
				<input class="form-check-input" type="checkbox" name="bp" value="{{ isset($patientinformations[0]['bp']) ? $patientinformations[0]['bp'] : '' }}" {{ isset($patientinformations[0]['bp']) && $patientinformations[0]['bp'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
				
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Diabetes</label>
				<input class="form-check-input" type="checkbox" name="diabetes" value="{{ isset($patientinformations[0]['diabetes']) ? $patientinformations[0]['diabetes'] : '' }}" {{ isset($patientinformations[0]['diabetes']) && $patientinformations[0]['diabetes'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Acidity/Ulcer</label>
				<input class="form-check-input" type="checkbox" name="acidity" value="{{ isset($patientinformations[0]['acidity']) ? $patientinformations[0]['acidity'] : '' }}" {{ isset($patientinformations[0]['acidity']) && $patientinformations[0]['acidity'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Thyroid Problem</label>
				<input class="form-check-input" type="checkbox" rname="thyroid" value="{{ isset($patientinformations[0]['thyroid']) ? $patientinformations[0]['thyroid'] : '' }}" {{ isset($patientinformations[0]['thyroid']) && $patientinformations[0]['thyroid'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Heart Problem</label>
				<input class="form-check-input" type="checkbox" name="heart" value="{{ isset($patientinformations[0]['heart']) ? $patientinformations[0]['heart'] : '' }}" {{ isset($patientinformations[0]['heart']) && $patientinformations[0]['heart'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Asthma</label>
				<input class="form-check-input" type="checkbox" name="asthma" value="{{ isset($patientinformations[0]['asthma']) ? $patientinformations[0]['asthma'] : '' }}" {{ isset($patientinformations[0]['asthma']) && $patientinformations[0]['asthma'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Kidney Disease</label>
				<input class="form-check-input" type="checkbox" name="kd" value="{{ isset($patientinformations[0]['kd']) ? $patientinformations[0]['kd'] : '' }}" {{ isset($patientinformations[0]['kd']) && $patientinformations[0]['kd'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Epilepsy</label>
				<input class="form-check-input" type="checkbox" name="epilepsy" value="{{ isset($patientinformations[0]['epilepsy']) ? $patientinformations[0]['epilepsy'] : '' }}" {{ isset($patientinformations[0]['epilepsy']) && $patientinformations[0]['epilepsy'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>
		</div>
		<h3>For Women Only</h3>
		<div class="row">			
		<aside class="col-sm-3">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Pregnant</label>
				<input class="form-check-input" type="checkbox" value="{{ isset($patientinformations[0]['pregnant']) ? $patientinformations[0]['pregnant'] : '' }}" {{ isset($patientinformations[0]['pregnant']) && $patientinformations[0]['pregnant'] == 'on' ? 'checked' : '' }} name="pregnant" role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-4">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Using birth control pills?</label>
				<input class="form-check-input" type="checkbox" value="{{ isset($patientinformations[0]['pills']) ? $patientinformations[0]['pills'] : '' }}" {{ isset($patientinformations[0]['pills']) && $patientinformations[0]['pills'] == 'on' ? 'checked' : '' }} name="pills" role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>	
			<div class="form-wrap">
				<input type="text" class="form-control" id="others" value="{{ isset($patientinformations[0]['wom_others']) ? $patientinformations[0]['wom_others'] : '' }}" name="wom_others" placeholder="Others">
			</div>
		</div>
		<hr />
		<h3>Medications</h3>
		<div class="row">			
		<aside class="col-sm-6">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Presently under any medications?</label>
				<input class="form-check-input" type="checkbox" role="switch" value="{{ isset($patientinformations[0]['present_med']) ? $patientinformations[0]['present_med'] : '' }}" name="present_med" {{ isset($patientinformations[0]['present_med']) && $patientinformations[0]['present_med'] == 'on' ? 'checked' : '' }} id="flexSwitchCheckDefault">
			</div>

		</aside>		
		<aside class="col-sm-6">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Allergic to any medications?</label>
				<input class="form-check-input" type="checkbox" role="switch" value="{{ isset($patientinformations[0]['allerg_med']) ? $patientinformations[0]['allerg_med'] : '' }}" {{ isset($patientinformations[0]['allerg_med']) && $patientinformations[0]['allerg_med'] == 'on' ? 'checked' : '' }} name="allerg_med" id="flexSwitchCheckDefault">
			</div>

		</aside>	
		</div>
		<hr />
		<h3>Dental History</h3>
		<div class="row">			
		<aside class="col-sm-4 lab-adj-tp">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Smoke or Chew tobacco?</label>
				<input class="form-check-input" type="checkbox" name="smoke" value="{{ isset($patientinformations[0]['smoke']) ? $patientinformations[0]['smoke'] : '' }}" {{ isset($patientinformations[0]['smoke']) && $patientinformations[0]['smoke'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>		
		<aside class="col-sm-4">
			<label for="brushing" class="form-label small">No of times brushing per day?</label>
			 <div class="col-sm-3">
			<select id="inputState" nam="perday" class="form-select">
			<option  value='1' {{ isset($patientinformations[0]['perday']) && '1' == $patientinformations[0]['perday'] ? 'selected' : '' }}>1</option>
			<option value='2' {{ isset($patientinformations[0]['perday']) && '2' == $patientinformations[0]['perday'] ? 'selected' : '' }}>2</option>
			</select>
			</div>
		</aside>			
		<aside class="col-sm-4 lab-adj-tp">
			<div class="form-check form-switch med">
				<label class="form-check-label" for="flexSwitchCheckDefault">Use floss?</label>
				<input class="form-check-input" name="floss" type="checkbox" value="{{ isset($patientinformations[0]['floss']) ? $patientinformations[0]['floss'] : '' }}" {{ isset($patientinformations[0]['floss']) && $patientinformations[0]['floss'] == 'on' ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
			</div>
		</aside>	
		</div>
		<hr />
		<button type="submit" class="btn btn-link next">Save</button>
	</div>
</form>
</div><!--./Medical Info-->
<div id="tab4" class="tab_content"><!--EMR-->
    <ul class="tabs">   <!-- Add tabs here -->
        <li><a href="#tab4-1" class="exam"><span>Examination</span></a></li>
        <li><a href="#tab4-2" class="observation"><span>Observation</span></a></li>
        <li><a href="#tab4-3" class="treatment"><span>Treatment</span></a></li>
        <li><a href="#tab4-4" class="clinical"><span>Clinical Notes</span></a></li>
        <li><a href="#tab4-5" class="lab"><span>Lab Works</span></a></li>
        <li><a href="#tab4-6" class="uploads"><span>Uploads</span></a></li>
    </ul>
<div id="tab4-1">
		<div class="emr">
			<h3>Examination</h3>
			@if(isset($examination[0]['examdate']))
			<form method="post" action="{{ route('examination.updatedata', ['id' => $examination[0]['id']]) }}"  >
				@csrf
			@else
			<form method="post" action="{{ route('emr_examination') }}">
				@csrf
			@endif
			
				<div class="row form-wrap">
						<aside class="col-md-4">
						<label>Examination Date*</label>
						<div class='input-group date' id='startDate'>					
						<span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
						<input type='date' class="form-control" name="examdate" value="{{ isset($examination[0]['examdate']) ? $examination[0]['examdate'] : '' }}" placeholder="Exam. Date" />
						</div>
						</aside>
						<aside class="col-md-4">
						<label>Doctor</label>
							<select id="inputState" name="exam_doctor" class="form-select">
								@foreach($doctorlist as $doctorlists)
								<option value="{{ $doctorlists->doc_name }}" {{ isset($examination[0]['exam_doctor']) && $doctorlists->doc_name == $examination[0]['exam_doctor'] ? 'selected' : '' }}>{{ $doctorlists->doc_name }}</option>
							@endforeach
							</select>
						</aside>
						<aside class="col-md-4">
							<label>Chief Complaint</label>
							<select id="inputState" name="chief_complaint" class="form-select">
								@foreach($chiefcomps as $chiefcompss)
								<option value="{{ $chiefcompss->chief_comp_name }}" {{ isset($examination[0]['chief_complaint']) && $chiefcompss->chief_comp_name == $examination[0]['chief_complaint'] ? 'selected' : '' }}>{{ $chiefcompss->chief_comp_name }}</option>
							@endforeach
							</select>
							</aside>
					</div>
					  <div class="form-wrap">
						<label for="description" class="form-label">Description</label>
						<input type="text" class="form-control" name="exam_description" value="{{ isset($examination[0]['exam_description']) ? $examination[0]['exam_description'] : '' }}" id="description" placeholder="">
						<input type="hidden" class="form-control ic mail" name="appo_id" id="appo_id"  value="{{$appointment_id}}" >
						<input type="hidden" class="form-control " name="branch" id="branch"  value="{{auth()->user()->branch}}" >	
					</div>
					  <hr />
					  <h4 class="text-center">Clinical findings</h4>
					  <div class="form-wrap mb0">
	<label>Occlusion</label>
	</div>
	<div class="form-wrap">
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" value="1" {{ isset($examination[0]['class1']) && '1' == $examination[0]['class1'] ? 'checked' : '' }} name="class1" id="class1" >
	  <label class="form-check-label" for="inlineRadio1">Class 1</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" value="2" {{ isset($examination[0]['class1']) && '2' == $examination[0]['class1'] ? 'checked' : '' }} name="class1" id="class2" >
	  <label class="form-check-label" for="inlineRadio2">Class 2</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" value="3" {{ isset($examination[0]['class1']) && '3' == $examination[0]['class1'] ? 'checked' : '' }} name="class1" id="class3" >
	  <label class="form-check-label" for="inlineRadio3">Class 3</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" value="4" {{ isset($examination[0]['class1']) && '4' == $examination[0]['class1'] ? 'checked' : '' }} name="class1" id="class3" >
	  <label class="form-check-label" for="inlineRadio3">Bi-maxillary protrusion</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="radio" value="5" {{ isset($examination[0]['class1']) && '5' == $examination[0]['class1'] ? 'checked' : '' }} name="class1" id="class3" >
	  <label class="form-check-label" for="inlineRadio3">None</label>
	</div>
	</div>
	
					  <div class="form-wrap">
						<label for="subType" class="form-label">Sub Type</label>
							<select id="inputState" name="subtype" class="form-select">
								@foreach($occlusionsubtype as $occlusionsubtypes)
								<option value="{{ $occlusionsubtypes->occlusion_sub_type_name }}" {{ isset($examination[0]['subtype']) && $occlusionsubtypes->occlusion_sub_type_name == $examination[0]['subtype'] ? 'selected' : '' }}>{{ $occlusionsubtypes->occlusion_sub_type_name }}</option>
							@endforeach
							</select>
					  </div>
		
		
								<div class="form-wrap mb0">
									<label>Wisdom Teeth</label>
								</div>
					  <div class="row form-wrap wisdom">
					<aside class="col-sm-3">
							 <label for="chkSelect">
							<input type="checkbox" value="{{ isset($examination[0]['18']) ? $examination[0]['18'] : '' }}" {{ isset($examination[0]['18']) && $examination[0]['18'] == 'on' ? 'checked' : '' }} name="18" id="chkSelect" />
							Teeth No. 18
							</label>
							<div class="custom-select" id="content" style="display:none">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['18sub']) && '1' == $examination[0]['18sub'] ? 'checked' : '' }} name="18sub" id="class1" value="1">
							<label class="form-check-label" for="inlineRadio1">Erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['18sub']) && '2' == $examination[0]['18sub'] ? 'checked' : '' }} name="18sub" id="class2" value="2">
							<label class="form-check-label" for="inlineRadio2">Partially erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['18sub']) && '3' == $examination[0]['18sub'] ? 'checked' : '' }} name="18sub" id="class3" value="3">
							<label class="form-check-label" for="inlineRadio3">Impacted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['18sub']) && '4' == $examination[0]['18sub'] ? 'checked' : '' }} name="18sub" id="class3" value="4">
							<label class="form-check-label" for="inlineRadio3">Extracted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['18sub']) && '5' == $examination[0]['18sub'] ? 'checked' : '' }} name="18sub" id="class3" value="5">
							<label class="form-check-label" for="inlineRadio3">Missing</label>
							</div>
							</div>
					</aside>
					<aside class="col-sm-3">
							 <label for="chkSelect2">
							<input type="checkbox" value="{{ isset($examination[0]['28']) ? $examination[0]['28'] : '' }}" {{ isset($examination[0]['28']) && $examination[0]['28'] == 'on' ? 'checked' : '' }} name="28" id="chkSelect2" />
							Teeth No. 28
							</label>
							<div class="custom-select" id="content2" style="display:none">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['28sub']) && '1' == $examination[0]['28sub'] ? 'checked' : '' }} name="28sub" id="class1" value="1">
							<label class="form-check-label" for="inlineRadio1">Erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['28sub']) && '2' == $examination[0]['28sub'] ? 'checked' : '' }} name="28sub" id="class2" value="2">
							<label class="form-check-label" for="inlineRadio2">Partially erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['28sub']) && '3' == $examination[0]['28sub'] ? 'checked' : '' }} name="28sub" id="class3" value="3">
							<label class="form-check-label" for="inlineRadio3">Impacted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['28sub']) && '4' == $examination[0]['28sub'] ? 'checked' : '' }} name="28sub" id="class3" value="4">
							<label class="form-check-label" for="inlineRadio3">Extracted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['28sub']) && '5' == $examination[0]['28sub'] ? 'checked' : '' }} name="28sub" id="class3" value="5">
							<label class="form-check-label" for="inlineRadio3">Missing</label>
							</div>
							</div>
					</aside>
					<aside class="col-sm-3">
							 <label for="chkSelect3">
							<input type="checkbox" value="{{ isset($examination[0]['38']) ? $examination[0]['38'] : '' }}" {{ isset($examination[0]['38']) && $examination[0]['38'] == 'on' ? 'checked' : '' }} name="38" id="chkSelect3" />
							Teeth No. 38
							</label>
							<div class="custom-select" id="content3" style="display:none">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['38sub']) && '1' == $examination[0]['38sub'] ? 'checked' : '' }} name="38sub" id="class1" value="1">
							<label class="form-check-label" for="inlineRadio1">Erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['38sub']) && '2' == $examination[0]['38sub'] ? 'checked' : '' }} name="38sub" id="class2" value="2">
							<label class="form-check-label" for="inlineRadio2">Partially erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['38sub']) && '3' == $examination[0]['38sub'] ? 'checked' : '' }} name="38sub" id="class3" value="3">
							<label class="form-check-label" for="inlineRadio3">Impacted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['38sub']) && '4' == $examination[0]['38sub'] ? 'checked' : '' }} name="38sub" id="class3" value="4">
							<label class="form-check-label" for="inlineRadio3">Extracted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['38sub']) && '5' == $examination[0]['38sub'] ? 'checked' : '' }} name="38sub" id="class3" value="5">
							<label class="form-check-label" for="inlineRadio3">Missing</label>
							</div>
							</div>
					</aside>
					<aside class="col-sm-3">
							 <label for="chkSelect4">
							<input type="checkbox" id="chkSelect4" name="48" value="{{ isset($examination[0]['48']) ? $examination[0]['48'] : '' }}" {{ isset($examination[0]['48']) && $examination[0]['48'] == 'on' ? 'checked' : '' }}/>
							Teeth No. 48
							</label>
							<div class="custom-select" id="content4" style="display:none">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['48sub']) && '1' == $examination[0]['48sub'] ? 'checked' : '' }} name="48sub" id="class1" value="1">
							<label class="form-check-label" for="inlineRadio1">Erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['48sub']) && '2' == $examination[0]['48sub'] ? 'checked' : '' }} name="48sub" id="class2" value="2">
							<label class="form-check-label" for="inlineRadio2">Partially erupted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['48sub']) && '3' == $examination[0]['48sub'] ? 'checked' : '' }} name="48sub" id="class3" value="3">
							<label class="form-check-label" for="inlineRadio3">Impacted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['48sub']) && '4' == $examination[0]['48sub'] ? 'checked' : '' }} name="48sub" id="class3" value="4">
							<label class="form-check-label" for="inlineRadio3">Extracted</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" {{ isset($examination[0]['48sub']) && '5' == $examination[0]['48sub'] ? 'checked' : '' }} name="48sub" id="class3" value="5">
							<label class="form-check-label" for="inlineRadio3">Missing</label>
							</div>
							</div>
					</aside>
					</div>
					<div class="row form-wrap">
							<aside class="col-sm-6">
								<div class="form-wrap mb0">
									<label>Calculus</label>
								</div>
								<div class="">
									<div class="form-check form-check-inline">
										
									<input class="form-check-input" type="radio" name="calculus1" {{ isset($examination[0]['calculus1']) && '1' == $examination[0]['calculus1'] ? 'checked' : '' }} id="class1" value="1">
									<label class="form-check-label" for="inlineRadio1">+</label>
									</div>
									<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="calculus1" {{ isset($examination[0]['calculus1']) && '2' == $examination[0]['calculus1'] ? 'checked' : '' }} id="class2" value="2">
									<label class="form-check-label" for="inlineRadio2">++</label>
									</div>
									<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="calculus1" {{ isset($examination[0]['calculus1']) && '3' == $examination[0]['calculus1'] ? 'checked' : '' }} id="class3" value="3">
									<label class="form-check-label" for="inlineRadio3">+++</label>
									</div>
								</div>
							</aside>
							<aside class="col-sm-6">
								<div class="form-wrap mb0">
									<label>Stains</label>
								</div>
								<div class="">
									<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="stains1" id="class1" {{ isset($examination[0]['stains1']) && '1' == $examination[0]['stains1'] ? 'checked' : '' }} value="1">
									<label class="form-check-label" for="inlineRadio1">+</label>
									</div>
									<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="stains1" id="class2" {{ isset($examination[0]['stains1']) && '2' == $examination[0]['stains1'] ? 'checked' : '' }} value="2">
									<label class="form-check-label" for="inlineRadio2">++</label>
									</div>
									<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="stains1" id="class3" {{ isset($examination[0]['stains1']) && '3' == $examination[0]['stains1'] ? 'checked' : '' }} value="3">
									<label class="form-check-label" for="inlineRadio3">+++</label>
									</div>
								</div>
							</aside>
						</div>
	
					  <div class="form-wrap">
						<label for="hardTissue" class="form-label">Hard tissue findings</label>
						<input type="text" class="form-control" name="hardTissue" id="description" value="{{ isset($examination[0]['hardTissue']) ? $examination[0]['hardTissue'] : '' }}" placeholder="">
					  </div>
					  <div class="form-wrap">
						<label for="softTissue" class="form-label">Soft tissue findings</label>
						<input type="text" class="form-control" name="softTissue" id="description" value="{{ isset($examination[0]['softTissue']) ? $examination[0]['softTissue'] : '' }}" placeholder="">
					  </div>
					  <div class="form-wrap">
						<label for="observations" class="form-label">Other observations</label>
						<input type="text" class="form-control" name="observations" id="observations" value="{{ isset($examination[0]['observations']) ? $examination[0]['observations'] : '' }}" placeholder="">
					  </div>
			
			<button type="submit" class="btn btn-link back">Save</button>
		</form>
		</div>   
		</div>
        <div id="tab4-2">
			<div class="observation">
			<h3>Observation</h3>
			
			<div class="observation-bx">
				<div class="row">
					<aside class="col-sm-7">
						<div class="obsv-bx-top">
							<p>Examination Date: <span>@isset($examination[0]['examdate']){{$examination[0]['examdate']}}@else @endisset</span></p>
							<p>Chief Complaint: <span>@isset($examination[0]['chief_complaint']){{$examination[0]['chief_complaint']}}@else @endisset</span></p>
							<p>Occlusion: <span>@isset($examination[0]['class1']){{$examination[0]['class1']}}@else @endisset</span></p>
							<p>Wisdom Teeth: <span>{{ isset($examination[0]['18']) ? '18-Missing' : '' }}{{ isset($examination[0]['28']) ? '28-Missing' : '' }}{{ isset($examination[0]['38']) ? '38-Missing' : '' }}{{ isset($examination[0]['48']) ? '48-Missing' : '' }}</span></p>
							<div class="row">
								<aside class="col">
										<p>Calculus: <span>{{ isset($examination[0]['calculus1']) && '1' == $examination[0]['calculus1'] ? '+' : '' }}{{ isset($examination[0]['calculus1']) && '2' == $examination[0]['calculus1'] ? '++' : '' }}{{ isset($examination[0]['calculus1']) && '3' == $examination[0]['calculus1'] ? '+++' : '' }}</span></p>
								</aside>
								<aside class="col">
										<p>Stains: <span>{{ isset($examination[0]['stains1']) && '1' == $examination[0]['stains1'] ? '+' : '' }}{{ isset($examination[0]['stains1']) && '2' == $examination[0]['stains1'] ? '++' : '' }}{{ isset($examination[0]['stains1']) && '3' == $examination[0]['stains1'] ? '+++' : '' }}</span></p>
								</aside>
									</div>
							</div>			
						</aside>
						
						<aside class="col-sm-5">
								<div class="obsv-bx-top">	
									Doctor: <span>@isset($examination[0]['exam_doctor']){{$examination[0]['exam_doctor']}}@else @endisset </span>
										<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
									<div class="dropdown-menu">
									  {{-- <a class="dropdown-item"  data-toggle="modal" data-target="#chiefcomplaintModal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1" ></i> Edit Chief Complaint</a> --}}
									  {{-- <a class="dropdown-item" href="{{ route('patient_information.show',$appointments->id) }}"><i class="bx bx-street-view me-1"></i> History</a> --}}
									  <a class="dropdown-item" data-toggle="modal" data-target="#obserModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add New Observation</a>
									  <a class="dropdown-item" data-toggle="modal" data-target="#secondModalCenter" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add New Plan</a>

									</div>
									
								</div>
						</aside>
				</div>
				<table class="obv">
				<tr>
					<th>Date</th>
					<th>Dr</th>
					<th>Tooth Number</th>
					<th>Observations</th>
					<th>Notes</th>
					<th>Plan Treatment</th>
					<th>Plan created</th>
					<th>Edit</th>
					<th>Delete</th>
				  </tr>
				  @foreach($observ as $key => $observs)
				  <tr>
					<td>{{$observs->startDate}}</td>
					<td><div class="bx org"></div> <label>{{$observs->doctor}}</label></td>
					<td>{{ isset($observs->lower) && 'on' == $observs->lower ? 'Lower Mouth' : '' }}{{ isset($observs->full) && 'on' == $observs->full ? 'Full Mouth' : '' }}{{ isset($observs->upper) && 'on' == $observs->upper ? 'Upper Mouth' : '' }}{{ isset($observs->teeth_18) && '1' == $observs->teeth_18 ? '18,' : '' }}{{ isset($observs->teeth_17) && '1' == $observs->teeth_17 ? '17,' : '' }}{{ isset($observs->teeth_16) && '1' == $observs->teeth_16 ? '16,' : '' }}{{ isset($observs->teeth_15) && '1' == $observs->teeth_15 ? '15,' : '' }}{{ isset($observs->teeth_14) && '1' == $observs->teeth_14 ? '14,' : '' }}{{ isset($observs->teeth_13) && '1' == $observs->teeth_13 ? '13,' : '' }}{{ isset($observs->teeth_12) && '1' == $observs->teeth_12 ? '12,' : '' }}{{ isset($observs->teeth_11) && '1' == $observs->teeth_11 ? '11,' : '' }}{{ isset($observs->teeth_21) && '1' == $observs->teeth_21 ? '21,' : '' }}{{ isset($observs->teeth_22) && '1' == $observs->teeth_22 ? '22,' : '' }}{{ isset($observs->teeth_23) && '1' == $observs->teeth_23 ? '23,' : '' }}{{ isset($observs->teeth_24) && '1' == $observs->teeth_24 ? '24,' : '' }}{{ isset($observs->teeth_25) && '1' == $observs->teeth_25 ? '25,' : '' }}{{ isset($observs->teeth_26) && '1' == $observs->teeth_26 ? '26,' : '' }}{{ isset($observs->teeth_27) && '1' == $observs->teeth_27 ? '27,' : '' }}{{ isset($observs->teeth_28) && '1' == $observs->teeth_28 ? '28,' : '' }}{{ isset($observs->teeth_48) && '1' == $observs->teeth_48 ? '48,' : '' }}{{ isset($observs->teeth_47) && '1' == $observs->teeth_47 ? '47,' : '' }}{{ isset($observs->teeth_46) && '1' == $observs->teeth_46 ? '46,' : '' }}{{ isset($observs->teeth_45) && '1' == $observs->teeth_45 ? '45,' : '' }}{{ isset($observs->teeth_44) && '1' == $observs->teeth_44 ? '44,' : '' }}{{ isset($observs->teeth_43) && '1' == $observs->teeth_43 ? '43,' : '' }}{{ isset($observs->teeth_42) && '1' == $observs->teeth_42 ? '42,' : '' }}{{ isset($observs->teeth_41) && '1' == $observs->teeth_41 ? '41,' : '' }}{{ isset($observs->teeth_31) && '1' == $observs->teeth_31 ? '31,' : '' }}{{ isset($observs->teeth_32) && '1' == $observs->teeth_32 ? '32,' : '' }}{{ isset($observs->teeth_33) && '1' == $observs->teeth_33 ? '33,' : '' }}{{ isset($observs->teeth_34) && '1' == $observs->teeth_34 ? '34,' : '' }}{{ isset($observs->teeth_35) && '1' == $observs->teeth_35 ? '35,' : '' }}{{ isset($observs->teeth_36) && '1' == $observs->teeth_36 ? '36,' : '' }}{{ isset($observs->teeth_37) && '1' == $observs->teeth_37 ? '37,' : '' }}{{ isset($observs->teeth_38) && '1' == $observs->teeth_38 ? '38,' : '' }}{{ isset($observs->teeth_55) && '1' == $observs->teeth_55 ? '55,' : '' }}{{ isset($observs->teeth_54) && '1' == $observs->teeth_54 ? '54,' : '' }}{{ isset($observs->teeth_53) && '1' == $observs->teeth_53 ? '53,' : '' }}{{ isset($observs->teeth_52) && '1' == $observs->teeth_52 ? '52,' : '' }}{{ isset($observs->teeth_51) && '1' == $observs->teeth_51 ? '51,' : '' }}{{ isset($observs->teeth_61) && '1' == $observs->teeth_61 ? '61,' : '' }}{{ isset($observs->teeth_62) && '1' == $observs->teeth_62 ? '62,' : '' }}{{ isset($observs->teeth_63) && '1' == $observs->teeth_63 ? '63,' : '' }}{{ isset($observs->teeth_64) && '1' == $observs->teeth_64 ? '64,' : '' }}{{ isset($observs->teeth_65) && '1' == $observs->teeth_65 ? '65,' : '' }}{{ isset($observs->teeth_85) && '1' == $observs->teeth_85 ? '85,' : '' }}{{ isset($observs->teeth_84) && '1' == $observs->teeth_84 ? '84,' : '' }}{{ isset($observs->teeth_83) && '1' == $observs->teeth_83 ? '83,' : '' }}{{ isset($observs->teeth_82) && '1' == $observs->teeth_82 ? '82,' : '' }}{{ isset($observs->teeth_81) && '1' == $observs->teeth_81 ? '81,' : '' }}{{ isset($observs->teeth_71) && '1' == $observs->teeth_71 ? '71,' : '' }}{{ isset($observs->teeth_72) && '1' == $observs->teeth_72 ? '72,' : '' }}{{ isset($observs->teeth_73) && '1' == $observs->teeth_73 ? '73,' : '' }}{{ isset($observs->teeth_74) && '1' == $observs->teeth_74 ? '74,' : '' }}{{ isset($observs->teeth_75) && '1' == $observs->teeth_75 ? '75,' : '' }}</td>
					<td>{{$observs->observation}}</td>
					<td>{{$observs->note}}</td>
					<td> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
					<td><img src="/assets/img/customimage/btn-planning.png"></td>
					<td> <a class="dropdown-item observmod" data-toggle="modal" data-id="{{$observs->id}}" data-target="#obsereditModal" href="javascript:void(0);"><i class="bx bx-pencil me-1"></i> </a></td>
					<td><img src="/assets/img/customimage/ic-delete.png"></td>
				  </tr>
				 @endforeach
				</table>
			</div>
			<button type="button" class="btn btn-link back">Back to search</button>
			</div>   
		</div>
		<div id="tab4-3">
			<div class="treatment">
				<div class="treatment-bx">
				<h3>Treatment</h3>
	
					<div id="tab4-3-1">
					<div class ="total-blk">
						<div class="row">
							<aside class="col-sm-6">
								<p>Total Estimated Plan Amount: ₹ 1,75,865</p>
							</aside>
							<aside class="col-sm-6">
								<p class="text-end">Total Confirmed Plan Amount: ₹ 54,800</p>
							</aside>
						</div>
					</div>
								<table class="obv">
									
								<tr>
									<th>Plan No</th>
									<th>Plan Date</th>
									<th>Dr</th>
									<th>Tooth Number</th>
									<th>Procedure & Type</th>
									<th>Cost</th>
									<th>Discount</th>
									<th>Treatment Cost</th>
									<th>Invoiced Amount</th>
									<th>Balance Amount</th>
									<th>Confirmed</th>
									<th>Action</th>
								  </tr>
								  @foreach($plan as $key => $plans)
								  <tr>
									<td>{{$plans->id}}</td>
									<td>{{$plans->startDate}}</td>
									<td><div class="bx org"></div></td>
									<td>{{ isset($plans->teeth_18) && '1' == $plans->teeth_18 ? '18,' : '' }}{{ isset($plans->teeth_17) && '1' == $plans->teeth_17 ? '17,' : '' }}{{ isset($plans->teeth_16) && '1' == $plans->teeth_16 ? '16,' : '' }}{{ isset($plans->teeth_15) && '1' == $plans->teeth_15 ? '15,' : '' }}{{ isset($plans->teeth_14) && '1' == $plans->teeth_14 ? '14,' : '' }}{{ isset($plans->teeth_13) && '1' == $plans->teeth_13 ? '13,' : '' }}{{ isset($plans->teeth_12) && '1' == $plans->teeth_12 ? '12,' : '' }}{{ isset($plans->teeth_11) && '1' == $plans->teeth_11 ? '11,' : '' }}{{ isset($plans->teeth_21) && '1' == $plans->teeth_21 ? '21,' : '' }}{{ isset($plans->teeth_22) && '1' == $plans->teeth_22 ? '22,' : '' }}{{ isset($plans->teeth_23) && '1' == $plans->teeth_23 ? '23,' : '' }}{{ isset($plans->teeth_24) && '1' == $plans->teeth_24 ? '24,' : '' }}{{ isset($plans->teeth_25) && '1' == $plans->teeth_25 ? '25,' : '' }}{{ isset($plans->teeth_26) && '1' == $plans->teeth_26 ? '26,' : '' }}{{ isset($plans->teeth_27) && '1' == $plans->teeth_27 ? '27,' : '' }}{{ isset($plans->teeth_28) && '1' == $plans->teeth_28 ? '28,' : '' }}{{ isset($plans->teeth_48) && '1' == $plans->teeth_48 ? '48,' : '' }}{{ isset($plans->teeth_47) && '1' == $plans->teeth_47 ? '47,' : '' }}{{ isset($plans->teeth_46) && '1' == $plans->teeth_46 ? '46,' : '' }}{{ isset($plans->teeth_45) && '1' == $plans->teeth_45 ? '45,' : '' }}{{ isset($plans->teeth_44) && '1' == $plans->teeth_44 ? '44,' : '' }}{{ isset($plans->teeth_43) && '1' == $plans->teeth_43 ? '43,' : '' }}{{ isset($plans->teeth_42) && '1' == $plans->teeth_42 ? '42,' : '' }}{{ isset($plans->teeth_41) && '1' == $plans->teeth_41 ? '41,' : '' }}{{ isset($plans->teeth_31) && '1' == $plans->teeth_31 ? '31,' : '' }}{{ isset($plans->teeth_32) && '1' == $plans->teeth_32 ? '32,' : '' }}{{ isset($plans->teeth_33) && '1' == $plans->teeth_33 ? '33,' : '' }}{{ isset($plans->teeth_34) && '1' == $plans->teeth_34 ? '34,' : '' }}{{ isset($plans->teeth_35) && '1' == $plans->teeth_35 ? '35,' : '' }}{{ isset($plans->teeth_36) && '1' == $plans->teeth_36 ? '36,' : '' }}{{ isset($plans->teeth_37) && '1' == $plans->teeth_37 ? '37,' : '' }}{{ isset($plans->teeth_38) && '1' == $plans->teeth_38 ? '38,' : '' }}{{ isset($plans->teeth_55) && '1' == $plans->teeth_55 ? '55,' : '' }}{{ isset($plans->teeth_54) && '1' == $plans->teeth_54 ? '54,' : '' }}{{ isset($plans->teeth_53) && '1' == $plans->teeth_53 ? '53,' : '' }}{{ isset($plans->teeth_52) && '1' == $plans->teeth_52 ? '52,' : '' }}{{ isset($plans->teeth_51) && '1' == $plans->teeth_51 ? '51,' : '' }}{{ isset($plans->teeth_61) && '1' == $plans->teeth_61 ? '61,' : '' }}{{ isset($plans->teeth_62) && '1' == $plans->teeth_62 ? '62,' : '' }}{{ isset($plans->teeth_63) && '1' == $plans->teeth_63 ? '63,' : '' }}{{ isset($plans->teeth_64) && '1' == $plans->teeth_64 ? '64,' : '' }}{{ isset($plans->teeth_65) && '1' == $plans->teeth_65 ? '65,' : '' }}{{ isset($plans->teeth_85) && '1' == $plans->teeth_85 ? '85,' : '' }}{{ isset($plans->teeth_84) && '1' == $plans->teeth_84 ? '84,' : '' }}{{ isset($plans->teeth_83) && '1' == $plans->teeth_83 ? '83,' : '' }}{{ isset($plans->teeth_82) && '1' == $plans->teeth_82 ? '82,' : '' }}{{ isset($plans->teeth_81) && '1' == $plans->teeth_81 ? '81,' : '' }}{{ isset($plans->teeth_71) && '1' == $plans->teeth_71 ? '71,' : '' }}{{ isset($plans->teeth_72) && '1' == $plans->teeth_72 ? '72,' : '' }}{{ isset($plans->teeth_73) && '1' == $plans->teeth_73 ? '73,' : '' }}{{ isset($plans->teeth_74) && '1' == $plans->teeth_74 ? '74,' : '' }}{{ isset($plans->teeth_75) && '1' == $plans->teeth_75 ? '75,' : '' }}</td>
									<td>{{$plans->procedure}}</td>
									<td>&#8377; {{$plans->price_proce}}</td>
									<td>&#8377;  {{$plans->dicount}}</td>
									<td>&#8377;  {{$plans->price_proce}}</td>
									<td>&#8377;  {{$plans->invoice_amt}}</td>
									<td>&#8377;  {{$plans->balance_amt}}</td>
									<td> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
									<td><div class="dropdown">
										<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
										<div class="dropdown-menu">
										  <a class="dropdown-item treatedit"  data-toggle="modal" data-id="{{$plans->id}}" data-target="#secondeditModalCenter" href="javascript:void(0);"><i class="bx bx-edit-alt me-1" ></i> Edit</a>
										  {{-- <a class="dropdown-item" href="{{ route('patient_information.show',$appointments->id) }}"><i class="bx bx-street-view me-1"></i> History</a> --}}
										  <a class="dropdown-item" data-toggle="modal" data-target="#noteModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Note</a>
										  <a class="dropdown-item" data-toggle="modal" data-target="#labModalCenter" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Lab Work</a>

										</div></td>
								  </tr>

								  @endforeach
								 
								</table>
					</div>
					
				
				</div>
				<button type="button" class="btn btn-link back">Back to search</button>
			</div>   
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#labWorkMoal">
		  Lab Treat modal
		</button>
			</div>
			<div id="tab4-4">
				<div class="treatment">
					<div class="treatment-bx">
					<h3>Clinical Notes</h3>
						<table class="obv">
						<tr>
							<th>Date</th>
							<th>Dr</th>
							<th>Tooth Number</th>
							<th>Observations</th>
							<th>Notes</th>
							<th>Plan Treatment</th>
							<th>Plan created</th>
							<th>Edit</th>
							<th>Delete</th>
						  </tr>
						  @foreach($note as $key => $notes)
						  <tr>
							<td>{{$notes->note_date}}</td>
							<td><div class="bx org"></div> <label>{{$notes->doc_type}}</label></td>
							<td>{{$notes->tooth_no}}</td>
							<td>{{$notes->procedurenote}}</td>
							<td>{{$notes->notetype}}</td>
							<td> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
							<td><button type="button" class="btn btn-primary">
								Plan Created
							  </button></td>
							  <td> <a class="dropdown-item noteeditModal" data-toggle="modal" data-id="{{$notes->id}}" data-target="#noteeditModal" href="javascript:void(0);"><i class="bx bx-pencil me-1"></i> </a></td>
							<td><img src="/assets/img/customimage/ic-delete.png"></td>
						  </tr>
						 @endforeach
						</table>
					</div>
					<button type="button" class="btn btn-link back">Back to search</button>
				</div>   
				</div>
    <div id="tab4-5">
		<div class="treatment">
			<div class="treatment-bx">
			<h3>Lab Works</h3>
				<table class="obv">
				<tr>
					<th>Order Date</th>
					<th>Dr</th>
					<th>Lab Name</th>
					<th>Tooth Number & Procedure</th>
					<th>Cost Details</th>
					<th>Work Particulars</th>
					<th>Repeat</th>
					<th>Remarks</th>
					<th>Action</th>
				  </tr>
				  @foreach($lab as $key => $labs)
				  <tr>
					<td>{{$labs->orderdate}}</td>
					<td><div class="bx org"></div> <label>{{$labs->doctor}}</label></td>
					<td>{{$labs->lab}}</td>
					<td>{{ isset($labs->teeth_18) && '1' == $labs->teeth_18 ? '18,' : '' }}{{ isset($labs->teeth_17) && '1' == $labs->teeth_17 ? '17,' : '' }}{{ isset($labs->teeth_16) && '1' == $labs->teeth_16 ? '16,' : '' }}{{ isset($labs->teeth_15) && '1' == $labs->teeth_15 ? '15,' : '' }}{{ isset($labs->teeth_14) && '1' == $labs->teeth_14 ? '14,' : '' }}{{ isset($labs->teeth_13) && '1' == $labs->teeth_13 ? '13,' : '' }}{{ isset($labs->teeth_12) && '1' == $labs->teeth_12 ? '12,' : '' }}{{ isset($labs->teeth_11) && '1' == $labs->teeth_11 ? '11,' : '' }}{{ isset($labs->teeth_21) && '1' == $labs->teeth_21 ? '21,' : '' }}{{ isset($labs->teeth_22) && '1' == $labs->teeth_22 ? '22,' : '' }}{{ isset($labs->teeth_23) && '1' == $labs->teeth_23 ? '23,' : '' }}{{ isset($labs->teeth_24) && '1' == $labs->teeth_24 ? '24,' : '' }}{{ isset($labs->teeth_25) && '1' == $labs->teeth_25 ? '25,' : '' }}{{ isset($labs->teeth_26) && '1' == $labs->teeth_26 ? '26,' : '' }}{{ isset($labs->teeth_27) && '1' == $labs->teeth_27 ? '27,' : '' }}{{ isset($labs->teeth_28) && '1' == $labs->teeth_28 ? '28,' : '' }}{{ isset($labs->teeth_48) && '1' == $labs->teeth_48 ? '48,' : '' }}{{ isset($labs->teeth_47) && '1' == $labs->teeth_47 ? '47,' : '' }}{{ isset($labs->teeth_46) && '1' == $labs->teeth_46 ? '46,' : '' }}{{ isset($labs->teeth_45) && '1' == $labs->teeth_45 ? '45,' : '' }}{{ isset($labs->teeth_44) && '1' == $labs->teeth_44 ? '44,' : '' }}{{ isset($labs->teeth_43) && '1' == $labs->teeth_43 ? '43,' : '' }}{{ isset($labs->teeth_42) && '1' == $labs->teeth_42 ? '42,' : '' }}{{ isset($labs->teeth_41) && '1' == $labs->teeth_41 ? '41,' : '' }}{{ isset($labs->teeth_31) && '1' == $labs->teeth_31 ? '31,' : '' }}{{ isset($labs->teeth_32) && '1' == $labs->teeth_32 ? '32,' : '' }}{{ isset($labs->teeth_33) && '1' == $labs->teeth_33 ? '33,' : '' }}{{ isset($labs->teeth_34) && '1' == $labs->teeth_34 ? '34,' : '' }}{{ isset($labs->teeth_35) && '1' == $labs->teeth_35 ? '35,' : '' }}{{ isset($labs->teeth_36) && '1' == $labs->teeth_36 ? '36,' : '' }}{{ isset($labs->teeth_37) && '1' == $labs->teeth_37 ? '37,' : '' }}{{ isset($labs->teeth_38) && '1' == $labs->teeth_38 ? '38,' : '' }}</td>
					<td>{{$labs->cost}}</td>
					<td> {{$labs->cost}}</td>
					<td>{{$labs->repeat}}</td>
					<td>{{$labs->remark}}</td>
					<td> <a class="dropdown-item labmodedit" data-toggle="modal" data-id="{{$labs->id}}" data-target="#labeditModalCenter" href="javascript:void(0);"><i class="bx bx-pencil me-1"></i> </a></td>
					{{-- <td><img src="/assets/img/customimage/ic-edit.png"></td> --}}
				  </tr>
				 @endforeach
				</table>
			</div>
			<button type="button" class="btn btn-link back">Back to search</button>
		</div>   
    </div>

    <div id="tab4-6">
        <div class="uploads">
			<div class="uploads-bx">
			<h3>Uploads</h3>
			  <button type="button" class="btn btn-secondary cancel" data-bs-toggle="modal" data-bs-target="#uploadModal"><img src="/assets/img/customimage/ic-upload.png" alt=""> Upload</button>
			  <div class="row">
				@foreach($patientimage as $key => $patientimages)
				<aside class="col-md-3">
						<div class="clinical-file-bx">
							<div class="item-img">
								<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadImgModal"><img src="/patient_teeth/{{$patientimages->image}}" class="img-fluid getimage"></a>
							</div>
							<div class="item-desc"><p>03/08/2023 <span>Pre-treatment, Photo</span></p><div class="delete"><a href="javascript:;"><img src="/assets/img/customimage/ic-delete2.png"></a></div></div>
						</div>
				</aside>
				@endforeach
				
			  </div>
			</div>
			<button type="button" class="btn btn-link back">Back to search</button>
		</div>  
    </div>
</div><!--./EMR-->


<!--upload model-->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog upload">
	  <div class="modal-content">
		<form method="post" enctype="multipart/form-data" action="{{ route('patient_image') }}">
			@csrf
		<div class="modal-body">
			<div class="row">
			  <aside class="col-sm-8 upload-form">
			  <div class="row form-wrap d-flex justify-content-between">
						  <div class='input-group date' id='obserDate'>					
							  <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
							  <input type='date' class="form-control" name="imagedate" placeholder="Imaged Date" />
						  </div>
			  </div>
			  <div class="row form-wrap">	
					  <select id="inputState" name="image_type" class="form-select">
					  <option value="Pre Treatment">Pre Treatment</option>
					  <option value="Post Treatment">Post Treatment</option>
					  </select>
			  </div>
			  <div class="row form-wrap mb0">	
					  <select id="inputState" name="doctype" class="form-select">
					  <option value="Image">Image</option>
					  </select>
			  </div>			
			  </aside>
			  <aside class="col-sm-4">
				  <div class="drag-bx">
						  <input type="file" name="image"><img src="/assets/img/customimage/drag-drop-img.png" alt=""  class="img-fluid">
						  <input type="hidden" class="form-control ic mail" name="appo_id" id="appo_id"  value="{{$appointment_id}}" >
						  <input type="hidden" class="form-control " name="branch" id="branch"  value="{{auth()->user()->branch}}" >
						</div>			
			  </aside>		
		  </div>            
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary cancel" data-dismiss="modal"><img src="/assets/img/customimage/ic-close.png" alt=""> Cancel</button>
		  <button type="submit" class="btn btn-primary save"><img src="/assets/img/customimage/ic-save.png" alt=""> Save</button>
		</div>
		</form>
	  </div>
	</div>
  </div><!--./upload model-->
  
  <!--upload Image model-->
  <div class="modal fade" id="uploadImgModal" tabindex="-1" aria-labelledby="uploadImgModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-body">
				  <a class="close " data-bs-dismiss="modal"  href="javascript:;"><img src="/assets/img/customimage/ic-close.png" alt=""></a>
			  <figure><img src="" class="setteethimg"></figure>
		</div>
	  </div>
	</div>	
  </div><!--./upload Image model-->


  <script>
	function proceduretype() {

		var field2Element = $('.procmaster');
		field2Element.empty(); 
		// Get the selected value from field1
		var selectedValue = document.getElementById('procedure').value;

		// Make an Ajax request to fetch options for field2 based on selectedValue
		// You would need a route and a controller method to handle this request
		$.ajax({
        url: '/proceduretype',
          type: 'GET',
          dataType: 'json',
		  data: {
        sender_id: selectedValue
			},
          success: function (data) {
			console.log(data['proceduretype']);
            console.log(data['proceduretype'].length);
			console.log(data['proceduretype'][0].type);
			//var option = '<option value="'+value.id+'">'+value.text+'</option>';
			var option = '<option value="" >Select</option>';
  			$('.procmaster').append(option);

			for (var i = 0; i < data['proceduretype'].length; i++) {
			var option = '<option value="'+data['proceduretype'][i].type+'" data-id="'+data['proceduretype'][i].cost_price+'">'+data['proceduretype'][i].type+'</option>';
  			$('.procmaster').append(option);

			}

          },
          error: function (error) {
              console.error('Error loading data:', error);
          }
      });


	}

	function labprocedure() {

// var field2Element = $('.procmaster');
// field2Element.empty(); 
// Get the selected value from field1
var selectedValue = $('.labprocedure').val();


// Make an Ajax request to fetch options for field2 based on selectedValue
// You would need a route and a controller method to handle this request
$.ajax({
url: '/labprocedure',
  type: 'GET',
  dataType: 'json',
  data: {
sender_id: selectedValue
	},
  success: function (data) {
	console.log(data['proceduretype']);
	console.log(data['proceduretype'].length);
	console.log(data['proceduretype'][0].type);
	//var option = '<option value="'+value.id+'">'+value.text+'</option>';
	var option = '<option value="" >Select</option>';
	  $('.labtype').append(option);

	for (var i = 0; i < data['proceduretype'].length; i++) {
	var option = '<option value="'+data['proceduretype'][i].type+'" data-id="'+data['proceduretype'][i].con_price+'">'+data['proceduretype'][i].type+'</option>';
	  $('.labtype').append(option);

	}

  },
  error: function (error) {
	  console.error('Error loading data:', error);
  }
});


}


	function procmaster(){
		var selectedDataId = $('.procmaster').find(':selected').data('id');

		console.log(selectedDataId);

		$('#notu').val(1);
		$('#price_proce').val(selectedDataId);
		$('#hidprice_proce').val(selectedDataId);
	}

	function labtype(){
		var selectedval = $('.labtype').find(':selected').data('id');

		console.log('logcal',selectedval);

		$('.totalCost').val(selectedval);
		$('.cost').val(selectedval);


	}



$(document).ready(function () {


	$(".labmodedit").click(function(){

var labmodedit = $(this).attr("data-id");

console.log('labmodedit',labmodedit);

$.ajax({
	  url: '{{ route('labeditModal') }}',
		type: 'GET',
		dataType: 'json',
		data: {
		  id: labmodedit
		  },
		success: function (data) {
		  console.log(data);

		  $('.labeditid').val(data.id);
		  $('.orderdate').val(data.orderdate);
		  $('.completiondate').val(data.completiondate);
		  $('.doctor').val(data.doctor);
		  $('.upper').val(data.upper);
		  $('.full').val(data.full);
		  $('.lower').val(data.lower);
		  $('.lab').val(data.lab);
		  $('.noteeth').val(data.noteeth);
		  $('.teeth-18').val(data.teeth_18);
		  $('.teeth-17').val(data.teeth_17);
		  $('.teeth-16').val(data.teeth_16);
		  $('.teeth-15').val(data.teeth_15);
		  $('.teeth-14').val(data.teeth_14);
		  $('.teeth-13').val(data.teeth_13);
		  $('.teeth-12').val(data.teeth_12);
		  $('.teeth-11').val(data.teeth_11);
		  $('.teeth-21').val(data.teeth_21);
		  $('.teeth-22').val(data.teeth_22);
		  $('.teeth-23').val(data.teeth_23);
		  $('.teeth-24').val(data.teeth_24);
		  $('.teeth-25').val(data.teeth_25);
		  $('.teeth-26').val(data.teeth_26);
		  $('.teeth-27').val(data.teeth_27);
		  $('.teeth-28').val(data.teeth_28);
		  $('.teeth-48').val(data.teeth_48);
		  $('.teeth-47').val(data.teeth_47);
		  $('.teeth-46').val(data.teeth_46);
		  $('.teeth-45').val(data.teeth_45);
		  $('.teeth-44').val(data.teeth_44);
		  $('.teeth-43').val(data.teeth_43);
		  $('.teeth-42').val(data.teeth_42);
		  $('.teeth-41').val(data.teeth_41);
		  $('.teeth-31').val(data.teeth_31);
		  $('.teeth-32').val(data.teeth_32);
		  $('.teeth-33').val(data.teeth_33);
		  $('.teeth-34').val(data.teeth_34);
		  $('.teeth-35').val(data.teeth_35);
		  $('.teeth-36').val(data.teeth_36);
		  $('.teeth-37').val(data.teeth_37);
		  $('.teeth-38').val(data.teeth_38);
		  $('.branch').val(data.branch);
		  $('.appo_id').val(data.appo_id);
		  $('.labprocedure').val(data.procedure);
		  $('.labtype').val(data.type);
		  $('.costPer').val(data.costPer);
		  $('.cost').val(data.cost);
		  $('.totalcost').val(data.totalcost);
		  $('.occlusal').val(data.occlusal);
		  $('.middle').val(data.middle);
		  $('.cervical').val(data.cervical);
		  $('.specialinstruction').val(data.specialinstruction);
		  $('.repeat').val(data.repeat);
		  $('.trial').val(data.trial);
		  $('.bp').val(data.bp);
		  $('.diabetes').val(data.diabetes);
		  $('.acidity').val(data.acidity);
		  $('.thyroid').val(data.thyroid);
		  $('.heart').val(data.heart);
		  $('.remark').val(data.remark);
// 		  $('.teeth-55').val(data.teeth_55);
// 		  $('.teeth-54').val(data.teeth_54);
// 		  $('.teeth-53').val(data.teeth_53);
// 		  $('.teeth-52').val(data.teeth_52);
// 		  $('.teeth-51').val(data.teeth_51);
// 		  $('.teeth-61').val(data.teeth_61);
// 		  $('.teeth-62').val(data.teeth_62);
// 		  $('.teeth-63').val(data.teeth_63);
// 		  $('.teeth-64').val(data.teeth_64);
// 		  $('.teeth-65').val(data.teeth_65);
// 		  $('.teeth-85').val(data.teeth_85);
// 		  $('.teeth-84').val(data.teeth_84);
// 		  $('.teeth-83').val(data.teeth_83);
// 		  $('.teeth-82').val(data.teeth_82);
// 		  $('.teeth-81').val(data.teeth_81);
// 		  $('.teeth-71').val(data.teeth_71);
// 		  $('.teeth-72').val(data.teeth_72);
// 		  $('.teeth-73').val(data.teeth_73);
// 		  $('.teeth-74').val(data.teeth_74);
// 		  $('.teeth-75').val(data.teeth_75);
// 		  $('.note').val(data.note);
// 		  $('.full').val(data.full);
// 		  $('.upper').val(data.upper);
// 		  $('.lower').val(data.lower);
// 		  console.log(data.teeth_18);
// 		  console.log(data.teeth_17);

//   var getdata18 = $(".teeth-18").val();if(getdata18 == '1'){$(".teeth-18").addClass("teeth-on");$(".teeth-18").val(1);}else{$(".teeth-18").removeClass("teeth-on");$(".teeth-18").val('');}
//   var getdata17 = $(".teeth-17").val();if(getdata17 == '1'){$(".teeth-17").addClass("teeth-on");$(".teeth-17").val(1);}else{$(".teeth-17").removeClass("teeth-on");$(".teeth-17").val('');}
//  var getdata16 = $(".teeth-16").val();if(getdata16 == '1'){$(".teeth-16").addClass("teeth-on");$(".teeth-16").val(1);}else{$(".teeth-16").removeClass("teeth-on");$(".teeth-16").val('');}
//   var getdata15 = $(".teeth-15").val();if(getdata15 == '1'){$(".teeth-15").addClass("teeth-on");$(".teeth-15").val(1);}else{$(".teeth-15").removeClass("teeth-on");$(".teeth-15").val('');}
//   var getdata14 = $(".teeth-14").val();if(getdata14 == '1'){$(".teeth-14").addClass("teeth-on");$(".teeth-14").val(1);}else{$(".teeth-14").removeClass("teeth-on");$(".teeth-14").val('');}
// var getdata13 = $(".teeth-13").val();if(getdata13 == '1'){$(".teeth-13").addClass("teeth-on");$(".teeth-13").val(1);}else{$(".teeth-13").removeClass("teeth-on");$(".teeth-13").val('');}
//   var getdata12 = $(".teeth-12").val();if(getdata12 == '1'){$(".teeth-12").addClass("teeth-on");$(".teeth-12").val(1);}else{$(".teeth-12").removeClass("teeth-on");$(".teeth-12").val('');}
//   var getdata11 = $(".teeth-11").val();if(getdata11 == '1'){$(".teeth-11").addClass("teeth-on");$(".teeth-11").val(1);}else{$(".teeth-11").removeClass("teeth-on");$(".teeth-11").val('');}
//  var getdata21 = $(".teeth-21").val();if(getdata21 == '1'){$(".teeth-21").addClass("teeth-on");$(".teeth-21").val(1);}else{$(".teeth-21").removeClass("teeth-on");$(".teeth-21").val('');}
//  var getdata22 = $(".teeth-22").val();if(getdata22 == '1'){$(".teeth-22").addClass("teeth-on");$(".teeth-22").val(1);}else{$(".teeth-22").removeClass("teeth-on");$(".teeth-22").val('');}
//   var getdata23 = $(".teeth-23").val();if(getdata23 == '1'){$(".teeth-23").addClass("teeth-on");$(".teeth-23").val(1);}else{$(".teeth-23").removeClass("teeth-on");$(".teeth-23").val('');}
//  var getdata24 = $(".teeth-24").val();if(getdata24 == '1'){$(".teeth-24").addClass("teeth-on");$(".teeth-24").val(1);}else{$(".teeth-24").removeClass("teeth-on");$(".teeth-24").val('');}
//   var getdata25 = $(".teeth-25").val();if(getdata25 == '1'){$(".teeth-25").addClass("teeth-on");$(".teeth-25").val(1);}else{$(".teeth-25").removeClass("teeth-on");$(".teeth-25").val('');}
// var getdata26 = $(".teeth-26").val();if(getdata26 == '1'){$(".teeth-26").addClass("teeth-on");$(".teeth-26").val(1);}else{$(".teeth-26").removeClass("teeth-on");$(".teeth-26").val('');}
// var getdata27 = $(".teeth-27").val();if(getdata27 == '1'){$(".teeth-27").addClass("teeth-on");$(".teeth-27").val(1);}else{$(".teeth-27").removeClass("teeth-on");$(".teeth-27").val('');}
//  var getdata28 = $(".teeth-28").val();if(getdata28 == '1'){$(".teeth-28").addClass("teeth-on");$(".teeth-28").val(1);}else{$(".teeth-28").removeClass("teeth-on");$(".teeth-28").val('');}
//  var getdata48 = $(".teeth-48").val();if(getdata48 == '1'){$(".teeth-48").addClass("teeth-on");$(".teeth-48").val(1);}else{$(".teeth-48").removeClass("teeth-on");$(".teeth-48").val('');}
//  var getdata47 = $(".teeth-47").val();if(getdata47 == '1'){$(".teeth-47").addClass("teeth-on");$(".teeth-47").val(1);}else{$(".teeth-47").removeClass("teeth-on");$(".teeth-47").val('');}
// var getdata46 = $(".teeth-46").val();if(getdata46 == '1'){$(".teeth-46").addClass("teeth-on");$(".teeth-46").val(1);}else{$(".teeth-46").removeClass("teeth-on");$(".teeth-46").val('');}
//   var getdata45 = $(".teeth-45").val();if(getdata45 == '1'){$(".teeth-45").addClass("teeth-on");$(".teeth-45").val(1);}else{$(".teeth-45").removeClass("teeth-on");$(".teeth-45").val('');}
//   var getdata44 = $(".teeth-44").val();if(getdata44 == '1'){$(".teeth-44").addClass("teeth-on");$(".teeth-44").val(1);}else{$(".teeth-44").removeClass("teeth-on");$(".teeth-44").val('');}
// var getdata43 = $(".teeth-43").val();if(getdata43 == '1'){$(".teeth-43").addClass("teeth-on");$(".teeth-43").val(1);}else{$(".teeth-43").removeClass("teeth-on");$(".teeth-43").val('');}
//  var getdata42 = $(".teeth-42").val();if(getdata42 == '1'){$(".teeth-42").addClass("teeth-on");$(".teeth-42").val(1);}else{$(".teeth-42").removeClass("teeth-on");$(".teeth-42").val('');}
// var getdata41 = $(".teeth-41").val();if(getdata41 == '1'){$(".teeth-41").addClass("teeth-on");$(".teeth-41").val(1);}else{$(".teeth-41").removeClass("teeth-on");$(".teeth-41").val('');}
// var getdata31 = $(".teeth-31").val();if(getdata31 == '1'){$(".teeth-31").addClass("teeth-on");$(".teeth-31").val(1);}else{$(".teeth-31").removeClass("teeth-on");$(".teeth-31").val('');}
//   var getdata32 = $(".teeth-32").val();if(getdata32 == '1'){$(".teeth-32").addClass("teeth-on");$(".teeth-32").val(1);}else{$(".teeth-32").removeClass("teeth-on");$(".teeth-32").val('');}
//  var getdata33 = $(".teeth-33").val();if(getdata33 == '1'){$(".teeth-33").addClass("teeth-on");$(".teeth-33").val(1);}else{$(".teeth-33").removeClass("teeth-on");$(".teeth-33").val('');}
//   var getdata34 = $(".teeth-34").val();if(getdata34 == '1'){$(".teeth-34").addClass("teeth-on");$(".teeth-34").val(1);}else{$(".teeth-34").removeClass("teeth-on");$(".teeth-34").val('');}
//   var getdata35 = $(".teeth-35").val();if(getdata35 == '1'){$(".teeth-35").addClass("teeth-on");$(".teeth-35").val(1);}else{$(".teeth-35").removeClass("teeth-on");$(".teeth-35").val('');}
//   var getdata36 = $(".teeth-36").val();if(getdata36 == '1'){$(".teeth-36").addClass("teeth-on");$(".teeth-36").val(1);}else{$(".teeth-36").removeClass("teeth-on");$(".teeth-36").val('');}
//   var getdata37 = $(".teeth-37").val();if(getdata37 == '1'){$(".teeth-37").addClass("teeth-on");$(".teeth-37").val(1);}else{$(".teeth-37").removeClass("teeth-on");$(".teeth-37").val('');}
//   var getdata38 = $(".teeth-38").val();if(getdata38 == '1'){$(".teeth-38").addClass("teeth-on");$(".teeth-38").val(1);}else{$(".teeth-38").removeClass("teeth-on");$(".teeth-38").val('');}
//   var getdata55 = $(".teeth-55").val();if(getdata55 == '1'){$(".teeth-55").addClass("teeth-on");$(".teeth-55").val(1);}else{$(".teeth-55").removeClass("teeth-on");$(".teeth-55").val('');}
//   var getdata54 = $(".teeth-54").val();if(getdata54 == '1'){$(".teeth-54").addClass("teeth-on");$(".teeth-54").val(1);}else{$(".teeth-54").removeClass("teeth-on");$(".teeth-54").val('');}
//   var getdata53 = $(".teeth-53").val();if(getdata53 == '1'){$(".teeth-53").addClass("teeth-on");$(".teeth-53").val(1);}else{$(".teeth-53").removeClass("teeth-on");$(".teeth-53").val('');}
//   var getdata52 = $(".teeth-52").val();if(getdata52 == '1'){$(".teeth-52").addClass("teeth-on");$(".teeth-52").val(1);}else{$(".teeth-52").removeClass("teeth-on");$(".teeth-52").val('');}
//   var getdata51 = $(".teeth-51").val();if(getdata51 == '1'){$(".teeth-51").addClass("teeth-on");$(".teeth-51").val(1);}else{$(".teeth-51").removeClass("teeth-on");$(".teeth-51").val('');}
//   var getdata61 = $(".teeth-61").val();if(getdata61 == '1'){$(".teeth-61").addClass("teeth-on");$(".teeth-61").val(1);}else{$(".teeth-61").removeClass("teeth-on");$(".teeth-61").val('');}
//   var getdata62 = $(".teeth-62").val();if(getdata62 == '1'){$(".teeth-62").addClass("teeth-on");$(".teeth-62").val(1);}else{$(".teeth-62").removeClass("teeth-on");$(".teeth-62").val('');}
//   var getdata63 = $(".teeth-63").val();if(getdata63 == '1'){$(".teeth-63").addClass("teeth-on");$(".teeth-63").val(1);}else{$(".teeth-63").removeClass("teeth-on");$(".teeth-63").val('');}
//  var getdata64 = $(".teeth-64").val();if(getdata64 == '1'){$(".teeth-64").addClass("teeth-on");$(".teeth-64").val(1);}else{$(".teeth-64").removeClass("teeth-on");$(".teeth-64").val('');}
//  var getdata65 = $(".teeth-65").val();if(getdata65 == '1'){$(".teeth-65").addClass("teeth-on");$(".teeth-65").val(1);}else{$(".teeth-65").removeClass("teeth-on");$(".teeth-65").val('');}
// var getdata85 = $(".teeth-85").val();if(getdata85 == '1'){$(".teeth-85").addClass("teeth-on");$(".teeth-85").val(1);}else{$(".teeth-85").removeClass("teeth-on");$(".teeth-85").val('');}
// var getdata84 = $(".teeth-84").val();if(getdata84 == '1'){$(".teeth-84").addClass("teeth-on");$(".teeth-84").val(1);}else{$(".teeth-84").removeClass("teeth-on");$(".teeth-84").val('');}
//   var getdata83 = $(".teeth-83").val();if(getdata83 == '1'){$(".teeth-83").addClass("teeth-on");$(".teeth-83").val(1);}else{$(".teeth-83").removeClass("teeth-on");$(".teeth-83").val('');}
//  var getdata82 = $(".teeth-82").val();if(getdata82 == '1'){$(".teeth-82").addClass("teeth-on");$(".teeth-82").val(1);}else{$(".teeth-82").removeClass("teeth-on");$(".teeth-82").val('');}
//  var getdata81 = $(".teeth-81").val();if(getdata81 == '1'){$(".teeth-81").addClass("teeth-on");$(".teeth-81").val(1);}else{$(".teeth-81").removeClass("teeth-on");$(".teeth-81").val('');}
// var getdata71 = $(".teeth-71").val();if(getdata71 == '1'){$(".teeth-71").addClass("teeth-on");$(".teeth-71").val(1);}else{$(".teeth-71").removeClass("teeth-on");$(".teeth-71").val('');}
//  var getdata72 = $(".teeth-72").val();if(getdata72 == '1'){$(".teeth-72").addClass("teeth-on");$(".teeth-72").val(1);}else{$(".teeth-72").removeClass("teeth-on");$(".teeth-72").val('');}
//  var getdata73 = $(".teeth-73").val();if(getdata73 == '1'){$(".teeth-73").addClass("teeth-on");$(".teeth-73").val(1);}else{$(".teeth-73").removeClass("teeth-on");$(".teeth-73").val('');}
// var getdata74 = $(".teeth-74").val();if(getdata74 == '1'){$(".teeth-74").addClass("teeth-on");$(".teeth-74").val(1);}else{$(".teeth-74").removeClass("teeth-on");$(".teeth-74").val('');}
//  var getdata75 = $(".teeth-75").val();if(getdata75 == '1'){$(".teeth-75").addClass("teeth-on");$(".teeth-75").val(1);}else{$(".teeth-75").removeClass("teeth-on");$(".teeth-75").val('');}
  
		  
  
		},
		error: function (error) {
			console.error('Error loading data:', error);
		}
	});

// {{ route('appointment_data') }}


});

//modal value get billcenter

$(".observmod").click(function(){

  var observid = $(this).attr("data-id");


  $.ajax({
        url: '{{ route('observdata') }}',
          type: 'GET',
          dataType: 'json',
		  data: {
			id: observid
			},
          success: function (data) {
			console.log(data);
			console.log(data.appo_id);
			console.log(data.startDate);
			console.log(data.doctor);
			$('.observeditid').val(data.id);
			$('.startDate').val(data.startDate);
			$('.doctor').val(data.doctor);
			$('.upper').val(data.upper);
			$('.full').val(data.full);
			$('.lower').val(data.lower);
			$('.observation').val(data.observation);
			$('.note').val(data.note);
			$('.teeth-18').val(data.teeth_18);
			$('.teeth-17').val(data.teeth_17);
			$('.teeth-16').val(data.teeth_16);
			$('.teeth-15').val(data.teeth_15);
			$('.teeth-14').val(data.teeth_14);
			$('.teeth-13').val(data.teeth_13);
			$('.teeth-12').val(data.teeth_12);
			$('.teeth-11').val(data.teeth_11);
			$('.teeth-21').val(data.teeth_21);
			$('.teeth-22').val(data.teeth_22);
			$('.teeth-23').val(data.teeth_23);
			$('.teeth-24').val(data.teeth_24);
			$('.teeth-25').val(data.teeth_25);
			$('.teeth-26').val(data.teeth_26);
			$('.teeth-27').val(data.teeth_27);
			$('.teeth-28').val(data.teeth_28);
			$('.teeth-48').val(data.teeth_48);
			$('.teeth-47').val(data.teeth_47);
			$('.teeth-46').val(data.teeth_46);
			$('.teeth-45').val(data.teeth_45);
			$('.teeth-44').val(data.teeth_44);
			$('.teeth-43').val(data.teeth_43);
			$('.teeth-42').val(data.teeth_42);
			$('.teeth-41').val(data.teeth_41);
			$('.teeth-31').val(data.teeth_31);
			$('.teeth-32').val(data.teeth_32);
			$('.teeth-33').val(data.teeth_33);
			$('.teeth-34').val(data.teeth_34);
			$('.teeth-35').val(data.teeth_35);
			$('.teeth-36').val(data.teeth_36);
			$('.teeth-37').val(data.teeth_37);
			$('.teeth-38').val(data.teeth_38);
			$('.branch').val(data.branch);
			$('.appo_id').val(data.appo_id);
			$('.teeth-55').val(data.teeth_55);
			$('.teeth-54').val(data.teeth_54);
			$('.teeth-53').val(data.teeth_53);
			$('.teeth-52').val(data.teeth_52);
			$('.teeth-51').val(data.teeth_51);
			$('.teeth-61').val(data.teeth_61);
			$('.teeth-62').val(data.teeth_62);
			$('.teeth-63').val(data.teeth_63);
			$('.teeth-64').val(data.teeth_64);
			$('.teeth-65').val(data.teeth_65);
			$('.teeth-85').val(data.teeth_85);
			$('.teeth-84').val(data.teeth_84);
			$('.teeth-83').val(data.teeth_83);
			$('.teeth-82').val(data.teeth_82);
			$('.teeth-81').val(data.teeth_81);
			$('.teeth-71').val(data.teeth_71);
			$('.teeth-72').val(data.teeth_72);
			$('.teeth-73').val(data.teeth_73);
			$('.teeth-74').val(data.teeth_74);
			$('.teeth-75').val(data.teeth_75);
			$('.note').val(data.note);
			$('.full').val(data.full);
			$('.upper').val(data.upper);
			$('.lower').val(data.lower);
			console.log(data.teeth_18);
			console.log(data.teeth_17);

	var getdata18 = $(".teeth-18").val();if(getdata18 == '1'){$(".teeth-18").addClass("teeth-on");$(".teeth-18").val(1);}else{$(".teeth-18").removeClass("teeth-on");$(".teeth-18").val('');}
    var getdata17 = $(".teeth-17").val();if(getdata17 == '1'){$(".teeth-17").addClass("teeth-on");$(".teeth-17").val(1);}else{$(".teeth-17").removeClass("teeth-on");$(".teeth-17").val('');}
   var getdata16 = $(".teeth-16").val();if(getdata16 == '1'){$(".teeth-16").addClass("teeth-on");$(".teeth-16").val(1);}else{$(".teeth-16").removeClass("teeth-on");$(".teeth-16").val('');}
    var getdata15 = $(".teeth-15").val();if(getdata15 == '1'){$(".teeth-15").addClass("teeth-on");$(".teeth-15").val(1);}else{$(".teeth-15").removeClass("teeth-on");$(".teeth-15").val('');}
    var getdata14 = $(".teeth-14").val();if(getdata14 == '1'){$(".teeth-14").addClass("teeth-on");$(".teeth-14").val(1);}else{$(".teeth-14").removeClass("teeth-on");$(".teeth-14").val('');}
  var getdata13 = $(".teeth-13").val();if(getdata13 == '1'){$(".teeth-13").addClass("teeth-on");$(".teeth-13").val(1);}else{$(".teeth-13").removeClass("teeth-on");$(".teeth-13").val('');}
    var getdata12 = $(".teeth-12").val();if(getdata12 == '1'){$(".teeth-12").addClass("teeth-on");$(".teeth-12").val(1);}else{$(".teeth-12").removeClass("teeth-on");$(".teeth-12").val('');}
    var getdata11 = $(".teeth-11").val();if(getdata11 == '1'){$(".teeth-11").addClass("teeth-on");$(".teeth-11").val(1);}else{$(".teeth-11").removeClass("teeth-on");$(".teeth-11").val('');}
   var getdata21 = $(".teeth-21").val();if(getdata21 == '1'){$(".teeth-21").addClass("teeth-on");$(".teeth-21").val(1);}else{$(".teeth-21").removeClass("teeth-on");$(".teeth-21").val('');}
   var getdata22 = $(".teeth-22").val();if(getdata22 == '1'){$(".teeth-22").addClass("teeth-on");$(".teeth-22").val(1);}else{$(".teeth-22").removeClass("teeth-on");$(".teeth-22").val('');}
    var getdata23 = $(".teeth-23").val();if(getdata23 == '1'){$(".teeth-23").addClass("teeth-on");$(".teeth-23").val(1);}else{$(".teeth-23").removeClass("teeth-on");$(".teeth-23").val('');}
   var getdata24 = $(".teeth-24").val();if(getdata24 == '1'){$(".teeth-24").addClass("teeth-on");$(".teeth-24").val(1);}else{$(".teeth-24").removeClass("teeth-on");$(".teeth-24").val('');}
    var getdata25 = $(".teeth-25").val();if(getdata25 == '1'){$(".teeth-25").addClass("teeth-on");$(".teeth-25").val(1);}else{$(".teeth-25").removeClass("teeth-on");$(".teeth-25").val('');}
  var getdata26 = $(".teeth-26").val();if(getdata26 == '1'){$(".teeth-26").addClass("teeth-on");$(".teeth-26").val(1);}else{$(".teeth-26").removeClass("teeth-on");$(".teeth-26").val('');}
  var getdata27 = $(".teeth-27").val();if(getdata27 == '1'){$(".teeth-27").addClass("teeth-on");$(".teeth-27").val(1);}else{$(".teeth-27").removeClass("teeth-on");$(".teeth-27").val('');}
   var getdata28 = $(".teeth-28").val();if(getdata28 == '1'){$(".teeth-28").addClass("teeth-on");$(".teeth-28").val(1);}else{$(".teeth-28").removeClass("teeth-on");$(".teeth-28").val('');}
   var getdata48 = $(".teeth-48").val();if(getdata48 == '1'){$(".teeth-48").addClass("teeth-on");$(".teeth-48").val(1);}else{$(".teeth-48").removeClass("teeth-on");$(".teeth-48").val('');}
   var getdata47 = $(".teeth-47").val();if(getdata47 == '1'){$(".teeth-47").addClass("teeth-on");$(".teeth-47").val(1);}else{$(".teeth-47").removeClass("teeth-on");$(".teeth-47").val('');}
  var getdata46 = $(".teeth-46").val();if(getdata46 == '1'){$(".teeth-46").addClass("teeth-on");$(".teeth-46").val(1);}else{$(".teeth-46").removeClass("teeth-on");$(".teeth-46").val('');}
    var getdata45 = $(".teeth-45").val();if(getdata45 == '1'){$(".teeth-45").addClass("teeth-on");$(".teeth-45").val(1);}else{$(".teeth-45").removeClass("teeth-on");$(".teeth-45").val('');}
    var getdata44 = $(".teeth-44").val();if(getdata44 == '1'){$(".teeth-44").addClass("teeth-on");$(".teeth-44").val(1);}else{$(".teeth-44").removeClass("teeth-on");$(".teeth-44").val('');}
  var getdata43 = $(".teeth-43").val();if(getdata43 == '1'){$(".teeth-43").addClass("teeth-on");$(".teeth-43").val(1);}else{$(".teeth-43").removeClass("teeth-on");$(".teeth-43").val('');}
   var getdata42 = $(".teeth-42").val();if(getdata42 == '1'){$(".teeth-42").addClass("teeth-on");$(".teeth-42").val(1);}else{$(".teeth-42").removeClass("teeth-on");$(".teeth-42").val('');}
  var getdata41 = $(".teeth-41").val();if(getdata41 == '1'){$(".teeth-41").addClass("teeth-on");$(".teeth-41").val(1);}else{$(".teeth-41").removeClass("teeth-on");$(".teeth-41").val('');}
  var getdata31 = $(".teeth-31").val();if(getdata31 == '1'){$(".teeth-31").addClass("teeth-on");$(".teeth-31").val(1);}else{$(".teeth-31").removeClass("teeth-on");$(".teeth-31").val('');}
    var getdata32 = $(".teeth-32").val();if(getdata32 == '1'){$(".teeth-32").addClass("teeth-on");$(".teeth-32").val(1);}else{$(".teeth-32").removeClass("teeth-on");$(".teeth-32").val('');}
   var getdata33 = $(".teeth-33").val();if(getdata33 == '1'){$(".teeth-33").addClass("teeth-on");$(".teeth-33").val(1);}else{$(".teeth-33").removeClass("teeth-on");$(".teeth-33").val('');}
    var getdata34 = $(".teeth-34").val();if(getdata34 == '1'){$(".teeth-34").addClass("teeth-on");$(".teeth-34").val(1);}else{$(".teeth-34").removeClass("teeth-on");$(".teeth-34").val('');}
    var getdata35 = $(".teeth-35").val();if(getdata35 == '1'){$(".teeth-35").addClass("teeth-on");$(".teeth-35").val(1);}else{$(".teeth-35").removeClass("teeth-on");$(".teeth-35").val('');}
    var getdata36 = $(".teeth-36").val();if(getdata36 == '1'){$(".teeth-36").addClass("teeth-on");$(".teeth-36").val(1);}else{$(".teeth-36").removeClass("teeth-on");$(".teeth-36").val('');}
    var getdata37 = $(".teeth-37").val();if(getdata37 == '1'){$(".teeth-37").addClass("teeth-on");$(".teeth-37").val(1);}else{$(".teeth-37").removeClass("teeth-on");$(".teeth-37").val('');}
    var getdata38 = $(".teeth-38").val();if(getdata38 == '1'){$(".teeth-38").addClass("teeth-on");$(".teeth-38").val(1);}else{$(".teeth-38").removeClass("teeth-on");$(".teeth-38").val('');}
    var getdata55 = $(".teeth-55").val();if(getdata55 == '1'){$(".teeth-55").addClass("teeth-on");$(".teeth-55").val(1);}else{$(".teeth-55").removeClass("teeth-on");$(".teeth-55").val('');}
    var getdata54 = $(".teeth-54").val();if(getdata54 == '1'){$(".teeth-54").addClass("teeth-on");$(".teeth-54").val(1);}else{$(".teeth-54").removeClass("teeth-on");$(".teeth-54").val('');}
    var getdata53 = $(".teeth-53").val();if(getdata53 == '1'){$(".teeth-53").addClass("teeth-on");$(".teeth-53").val(1);}else{$(".teeth-53").removeClass("teeth-on");$(".teeth-53").val('');}
    var getdata52 = $(".teeth-52").val();if(getdata52 == '1'){$(".teeth-52").addClass("teeth-on");$(".teeth-52").val(1);}else{$(".teeth-52").removeClass("teeth-on");$(".teeth-52").val('');}
    var getdata51 = $(".teeth-51").val();if(getdata51 == '1'){$(".teeth-51").addClass("teeth-on");$(".teeth-51").val(1);}else{$(".teeth-51").removeClass("teeth-on");$(".teeth-51").val('');}
    var getdata61 = $(".teeth-61").val();if(getdata61 == '1'){$(".teeth-61").addClass("teeth-on");$(".teeth-61").val(1);}else{$(".teeth-61").removeClass("teeth-on");$(".teeth-61").val('');}
    var getdata62 = $(".teeth-62").val();if(getdata62 == '1'){$(".teeth-62").addClass("teeth-on");$(".teeth-62").val(1);}else{$(".teeth-62").removeClass("teeth-on");$(".teeth-62").val('');}
    var getdata63 = $(".teeth-63").val();if(getdata63 == '1'){$(".teeth-63").addClass("teeth-on");$(".teeth-63").val(1);}else{$(".teeth-63").removeClass("teeth-on");$(".teeth-63").val('');}
   var getdata64 = $(".teeth-64").val();if(getdata64 == '1'){$(".teeth-64").addClass("teeth-on");$(".teeth-64").val(1);}else{$(".teeth-64").removeClass("teeth-on");$(".teeth-64").val('');}
   var getdata65 = $(".teeth-65").val();if(getdata65 == '1'){$(".teeth-65").addClass("teeth-on");$(".teeth-65").val(1);}else{$(".teeth-65").removeClass("teeth-on");$(".teeth-65").val('');}
  var getdata85 = $(".teeth-85").val();if(getdata85 == '1'){$(".teeth-85").addClass("teeth-on");$(".teeth-85").val(1);}else{$(".teeth-85").removeClass("teeth-on");$(".teeth-85").val('');}
  var getdata84 = $(".teeth-84").val();if(getdata84 == '1'){$(".teeth-84").addClass("teeth-on");$(".teeth-84").val(1);}else{$(".teeth-84").removeClass("teeth-on");$(".teeth-84").val('');}
	var getdata83 = $(".teeth-83").val();if(getdata83 == '1'){$(".teeth-83").addClass("teeth-on");$(".teeth-83").val(1);}else{$(".teeth-83").removeClass("teeth-on");$(".teeth-83").val('');}
   var getdata82 = $(".teeth-82").val();if(getdata82 == '1'){$(".teeth-82").addClass("teeth-on");$(".teeth-82").val(1);}else{$(".teeth-82").removeClass("teeth-on");$(".teeth-82").val('');}
   var getdata81 = $(".teeth-81").val();if(getdata81 == '1'){$(".teeth-81").addClass("teeth-on");$(".teeth-81").val(1);}else{$(".teeth-81").removeClass("teeth-on");$(".teeth-81").val('');}
 var getdata71 = $(".teeth-71").val();if(getdata71 == '1'){$(".teeth-71").addClass("teeth-on");$(".teeth-71").val(1);}else{$(".teeth-71").removeClass("teeth-on");$(".teeth-71").val('');}
   var getdata72 = $(".teeth-72").val();if(getdata72 == '1'){$(".teeth-72").addClass("teeth-on");$(".teeth-72").val(1);}else{$(".teeth-72").removeClass("teeth-on");$(".teeth-72").val('');}
   var getdata73 = $(".teeth-73").val();if(getdata73 == '1'){$(".teeth-73").addClass("teeth-on");$(".teeth-73").val(1);}else{$(".teeth-73").removeClass("teeth-on");$(".teeth-73").val('');}
 var getdata74 = $(".teeth-74").val();if(getdata74 == '1'){$(".teeth-74").addClass("teeth-on");$(".teeth-74").val(1);}else{$(".teeth-74").removeClass("teeth-on");$(".teeth-74").val('');}
   var getdata75 = $(".teeth-75").val();if(getdata75 == '1'){$(".teeth-75").addClass("teeth-on");$(".teeth-75").val(1);}else{$(".teeth-75").removeClass("teeth-on");$(".teeth-75").val('');}
    
			
	
          },
          error: function (error) {
              console.error('Error loading data:', error);
          }
      });

 // {{ route('appointment_data') }}


});


$('.noteeditModal').click(function(){


	var noteeditModal = $(this).attr("data-id");


$.ajax({
	  url: '{{ route('noteeditModal') }}',
		type: 'GET',
		dataType: 'json',
		data: {
		  id: noteeditModal
		  },
		success: function (data) {
		  $('.note_date').val(data.note_date);
		  $('.tooth_no').val(data.tooth_no);
		  $('.doc_type').val(data.doc_type);
		  $('.procedurenote').val(data.procedurenote);
		  $('.type').val(data.type);
		  $('.appo_id').val(data.appo_id);
		  $('.branch').val(data.branch);
		  $('.clinicalnotes').val(data.clinicalnotes);
		  $('.notetype').val(data.notetype);
		  $('.typecomp').val(data.typecomp);
		  $('.noteeditid').val(data.id);
		 
		},
		error: function (error) {
			console.error('Error loading data:', error);
		}
	});

});




$(".treatedit").click(function(){

var treatedit = $(this).attr("data-id");

$.ajax({
	  url: '{{ route('treateditdata') }}',
		type: 'GET',
		dataType: 'json',
		data: {
		  id: treatedit
		  },
		success: function (data) {
		  console.log(data);
		  console.log(data.appo_id);
		  console.log(data.startDate);
		  console.log(data.doctor);
		  $('.planeditid').val(data.id);
		  $('.startDate').val(data.startDate);
		  $('.doctor').val(data.doctor);
		  $('.upper').val(data.upper);
		  $('.full').val(data.full);
		  $('.lower').val(data.lower);
		  $('.procedure').val(data.procedure);
		  var proctype = data.type;
		  var proceduredata = $('.procedure').val();

				// Make an Ajax request to fetch options for field2 based on selectedValue
				// You would need a route and a controller method to handle this request
				$.ajax({
				url: '/proceduretype',
				type: 'GET',
				dataType: 'json',
				data: {
				sender_id: proceduredata
					},
				success: function (data) {
					console.log(data['proceduretype']);
					console.log(data['proceduretype'].length);
					console.log(data['proceduretype'][0].type);
					//var option = '<option value="'+value.id+'">'+value.text+'</option>';
					var option = '<option value="" >Select</option>';
					$('.procmaster').append(option);

					for (var i = 0; i < data['proceduretype'].length; i++) {
					
						if(proctype == data['proceduretype'][i].type){
						
							var option = '<option selected value="'+data['proceduretype'][i].type+'" data-id="'+data['proceduretype'][i].cost_price+'">'+data['proceduretype'][i].type+'</option>';
						}
						else{
							
							var option = '<option value="'+data['proceduretype'][i].type+'" data-id="'+data['proceduretype'][i].cost_price+'">'+data['proceduretype'][i].type+'</option>';
						}
					
					$('.procmaster').append(option);

					}

				},
				error: function (error) {
					console.error('Error loading data:', error);
				}
				});
		  $('.teeth-18').val(data.teeth_18);
		  $('.teeth-17').val(data.teeth_17);
		  $('.teeth-16').val(data.teeth_16);
		  $('.teeth-15').val(data.teeth_15);
		  $('.teeth-14').val(data.teeth_14);
		  $('.teeth-13').val(data.teeth_13);
		  $('.teeth-12').val(data.teeth_12);
		  $('.teeth-11').val(data.teeth_11);
		  $('.teeth-21').val(data.teeth_21);
		  $('.teeth-22').val(data.teeth_22);
		  $('.teeth-23').val(data.teeth_23);
		  $('.teeth-24').val(data.teeth_24);
		  $('.teeth-25').val(data.teeth_25);
		  $('.teeth-26').val(data.teeth_26);
		  $('.teeth-27').val(data.teeth_27);
		  $('.teeth-28').val(data.teeth_28);
		  $('.teeth-48').val(data.teeth_48);
		  $('.teeth-47').val(data.teeth_47);
		  $('.teeth-46').val(data.teeth_46);
		  $('.teeth-45').val(data.teeth_45);
		  $('.teeth-44').val(data.teeth_44);
		  $('.teeth-43').val(data.teeth_43);
		  $('.teeth-42').val(data.teeth_42);
		  $('.teeth-41').val(data.teeth_41);
		  $('.teeth-31').val(data.teeth_31);
		  $('.teeth-32').val(data.teeth_32);
		  $('.teeth-33').val(data.teeth_33);
		  $('.teeth-34').val(data.teeth_34);
		  $('.teeth-35').val(data.teeth_35);
		  $('.teeth-36').val(data.teeth_36);
		  $('.teeth-37').val(data.teeth_37);
		  $('.teeth-38').val(data.teeth_38);
		  $('.branch').val(data.branch);
		  $('.appo_id').val(data.appo_id);
		  $('.teeth-55').val(data.teeth_55);
		  $('.teeth-54').val(data.teeth_54);
		  $('.teeth-53').val(data.teeth_53);
		  $('.teeth-52').val(data.teeth_52);
		  $('.teeth-51').val(data.teeth_51);
		  $('.teeth-61').val(data.teeth_61);
		  $('.teeth-62').val(data.teeth_62);
		  $('.teeth-63').val(data.teeth_63);
		  $('.teeth-64').val(data.teeth_64);
		  $('.teeth-65').val(data.teeth_65);
		  $('.teeth-85').val(data.teeth_85);
		  $('.teeth-84').val(data.teeth_84);
		  $('.teeth-83').val(data.teeth_83);
		  $('.teeth-82').val(data.teeth_82);
		  $('.teeth-81').val(data.teeth_81);
		  $('.teeth-71').val(data.teeth_71);
		  $('.teeth-72').val(data.teeth_72);
		  $('.teeth-73').val(data.teeth_73);
		  $('.teeth-74').val(data.teeth_74);
		  $('.teeth-75').val(data.teeth_75);
		  $('.notu').val(data.notu);
		  $('.price_proce').val(data.price_proce);
		  $('.price_balance').val(data.price_balance);
		  $('.hidprice_proce').val(data.hidprice_proce);
		  $('.dicount').val(data.dicount);
		  $('.full').val(data.full);
		  $('.upper').val(data.upper);
		  $('.lower').val(data.lower);
		  console.log(data.teeth_18);
		  console.log(data.teeth_17);

  var getdata18 = $(".teeth-18").val();if(getdata18 == '1'){$(".teeth-18").addClass("teeth-on");$(".teeth-18").val(1);}else{$(".teeth-18").removeClass("teeth-on");$(".teeth-18").val('');}
  var getdata17 = $(".teeth-17").val();if(getdata17 == '1'){$(".teeth-17").addClass("teeth-on");$(".teeth-17").val(1);}else{$(".teeth-17").removeClass("teeth-on");$(".teeth-17").val('');}
 var getdata16 = $(".teeth-16").val();if(getdata16 == '1'){$(".teeth-16").addClass("teeth-on");$(".teeth-16").val(1);}else{$(".teeth-16").removeClass("teeth-on");$(".teeth-16").val('');}
  var getdata15 = $(".teeth-15").val();if(getdata15 == '1'){$(".teeth-15").addClass("teeth-on");$(".teeth-15").val(1);}else{$(".teeth-15").removeClass("teeth-on");$(".teeth-15").val('');}
  var getdata14 = $(".teeth-14").val();if(getdata14 == '1'){$(".teeth-14").addClass("teeth-on");$(".teeth-14").val(1);}else{$(".teeth-14").removeClass("teeth-on");$(".teeth-14").val('');}
var getdata13 = $(".teeth-13").val();if(getdata13 == '1'){$(".teeth-13").addClass("teeth-on");$(".teeth-13").val(1);}else{$(".teeth-13").removeClass("teeth-on");$(".teeth-13").val('');}
  var getdata12 = $(".teeth-12").val();if(getdata12 == '1'){$(".teeth-12").addClass("teeth-on");$(".teeth-12").val(1);}else{$(".teeth-12").removeClass("teeth-on");$(".teeth-12").val('');}
  var getdata11 = $(".teeth-11").val();if(getdata11 == '1'){$(".teeth-11").addClass("teeth-on");$(".teeth-11").val(1);}else{$(".teeth-11").removeClass("teeth-on");$(".teeth-11").val('');}
 var getdata21 = $(".teeth-21").val();if(getdata21 == '1'){$(".teeth-21").addClass("teeth-on");$(".teeth-21").val(1);}else{$(".teeth-21").removeClass("teeth-on");$(".teeth-21").val('');}
 var getdata22 = $(".teeth-22").val();if(getdata22 == '1'){$(".teeth-22").addClass("teeth-on");$(".teeth-22").val(1);}else{$(".teeth-22").removeClass("teeth-on");$(".teeth-22").val('');}
  var getdata23 = $(".teeth-23").val();if(getdata23 == '1'){$(".teeth-23").addClass("teeth-on");$(".teeth-23").val(1);}else{$(".teeth-23").removeClass("teeth-on");$(".teeth-23").val('');}
 var getdata24 = $(".teeth-24").val();if(getdata24 == '1'){$(".teeth-24").addClass("teeth-on");$(".teeth-24").val(1);}else{$(".teeth-24").removeClass("teeth-on");$(".teeth-24").val('');}
  var getdata25 = $(".teeth-25").val();if(getdata25 == '1'){$(".teeth-25").addClass("teeth-on");$(".teeth-25").val(1);}else{$(".teeth-25").removeClass("teeth-on");$(".teeth-25").val('');}
var getdata26 = $(".teeth-26").val();if(getdata26 == '1'){$(".teeth-26").addClass("teeth-on");$(".teeth-26").val(1);}else{$(".teeth-26").removeClass("teeth-on");$(".teeth-26").val('');}
var getdata27 = $(".teeth-27").val();if(getdata27 == '1'){$(".teeth-27").addClass("teeth-on");$(".teeth-27").val(1);}else{$(".teeth-27").removeClass("teeth-on");$(".teeth-27").val('');}
 var getdata28 = $(".teeth-28").val();if(getdata28 == '1'){$(".teeth-28").addClass("teeth-on");$(".teeth-28").val(1);}else{$(".teeth-28").removeClass("teeth-on");$(".teeth-28").val('');}
 var getdata48 = $(".teeth-48").val();if(getdata48 == '1'){$(".teeth-48").addClass("teeth-on");$(".teeth-48").val(1);}else{$(".teeth-48").removeClass("teeth-on");$(".teeth-48").val('');}
 var getdata47 = $(".teeth-47").val();if(getdata47 == '1'){$(".teeth-47").addClass("teeth-on");$(".teeth-47").val(1);}else{$(".teeth-47").removeClass("teeth-on");$(".teeth-47").val('');}
var getdata46 = $(".teeth-46").val();if(getdata46 == '1'){$(".teeth-46").addClass("teeth-on");$(".teeth-46").val(1);}else{$(".teeth-46").removeClass("teeth-on");$(".teeth-46").val('');}
  var getdata45 = $(".teeth-45").val();if(getdata45 == '1'){$(".teeth-45").addClass("teeth-on");$(".teeth-45").val(1);}else{$(".teeth-45").removeClass("teeth-on");$(".teeth-45").val('');}
  var getdata44 = $(".teeth-44").val();if(getdata44 == '1'){$(".teeth-44").addClass("teeth-on");$(".teeth-44").val(1);}else{$(".teeth-44").removeClass("teeth-on");$(".teeth-44").val('');}
var getdata43 = $(".teeth-43").val();if(getdata43 == '1'){$(".teeth-43").addClass("teeth-on");$(".teeth-43").val(1);}else{$(".teeth-43").removeClass("teeth-on");$(".teeth-43").val('');}
 var getdata42 = $(".teeth-42").val();if(getdata42 == '1'){$(".teeth-42").addClass("teeth-on");$(".teeth-42").val(1);}else{$(".teeth-42").removeClass("teeth-on");$(".teeth-42").val('');}
var getdata41 = $(".teeth-41").val();if(getdata41 == '1'){$(".teeth-41").addClass("teeth-on");$(".teeth-41").val(1);}else{$(".teeth-41").removeClass("teeth-on");$(".teeth-41").val('');}
var getdata31 = $(".teeth-31").val();if(getdata31 == '1'){$(".teeth-31").addClass("teeth-on");$(".teeth-31").val(1);}else{$(".teeth-31").removeClass("teeth-on");$(".teeth-31").val('');}
  var getdata32 = $(".teeth-32").val();if(getdata32 == '1'){$(".teeth-32").addClass("teeth-on");$(".teeth-32").val(1);}else{$(".teeth-32").removeClass("teeth-on");$(".teeth-32").val('');}
 var getdata33 = $(".teeth-33").val();if(getdata33 == '1'){$(".teeth-33").addClass("teeth-on");$(".teeth-33").val(1);}else{$(".teeth-33").removeClass("teeth-on");$(".teeth-33").val('');}
  var getdata34 = $(".teeth-34").val();if(getdata34 == '1'){$(".teeth-34").addClass("teeth-on");$(".teeth-34").val(1);}else{$(".teeth-34").removeClass("teeth-on");$(".teeth-34").val('');}
  var getdata35 = $(".teeth-35").val();if(getdata35 == '1'){$(".teeth-35").addClass("teeth-on");$(".teeth-35").val(1);}else{$(".teeth-35").removeClass("teeth-on");$(".teeth-35").val('');}
  var getdata36 = $(".teeth-36").val();if(getdata36 == '1'){$(".teeth-36").addClass("teeth-on");$(".teeth-36").val(1);}else{$(".teeth-36").removeClass("teeth-on");$(".teeth-36").val('');}
  var getdata37 = $(".teeth-37").val();if(getdata37 == '1'){$(".teeth-37").addClass("teeth-on");$(".teeth-37").val(1);}else{$(".teeth-37").removeClass("teeth-on");$(".teeth-37").val('');}
  var getdata38 = $(".teeth-38").val();if(getdata38 == '1'){$(".teeth-38").addClass("teeth-on");$(".teeth-38").val(1);}else{$(".teeth-38").removeClass("teeth-on");$(".teeth-38").val('');}
  var getdata55 = $(".teeth-55").val();if(getdata55 == '1'){$(".teeth-55").addClass("teeth-on");$(".teeth-55").val(1);}else{$(".teeth-55").removeClass("teeth-on");$(".teeth-55").val('');}
  var getdata54 = $(".teeth-54").val();if(getdata54 == '1'){$(".teeth-54").addClass("teeth-on");$(".teeth-54").val(1);}else{$(".teeth-54").removeClass("teeth-on");$(".teeth-54").val('');}
  var getdata53 = $(".teeth-53").val();if(getdata53 == '1'){$(".teeth-53").addClass("teeth-on");$(".teeth-53").val(1);}else{$(".teeth-53").removeClass("teeth-on");$(".teeth-53").val('');}
  var getdata52 = $(".teeth-52").val();if(getdata52 == '1'){$(".teeth-52").addClass("teeth-on");$(".teeth-52").val(1);}else{$(".teeth-52").removeClass("teeth-on");$(".teeth-52").val('');}
  var getdata51 = $(".teeth-51").val();if(getdata51 == '1'){$(".teeth-51").addClass("teeth-on");$(".teeth-51").val(1);}else{$(".teeth-51").removeClass("teeth-on");$(".teeth-51").val('');}
  var getdata61 = $(".teeth-61").val();if(getdata61 == '1'){$(".teeth-61").addClass("teeth-on");$(".teeth-61").val(1);}else{$(".teeth-61").removeClass("teeth-on");$(".teeth-61").val('');}
  var getdata62 = $(".teeth-62").val();if(getdata62 == '1'){$(".teeth-62").addClass("teeth-on");$(".teeth-62").val(1);}else{$(".teeth-62").removeClass("teeth-on");$(".teeth-62").val('');}
  var getdata63 = $(".teeth-63").val();if(getdata63 == '1'){$(".teeth-63").addClass("teeth-on");$(".teeth-63").val(1);}else{$(".teeth-63").removeClass("teeth-on");$(".teeth-63").val('');}
 var getdata64 = $(".teeth-64").val();if(getdata64 == '1'){$(".teeth-64").addClass("teeth-on");$(".teeth-64").val(1);}else{$(".teeth-64").removeClass("teeth-on");$(".teeth-64").val('');}
 var getdata65 = $(".teeth-65").val();if(getdata65 == '1'){$(".teeth-65").addClass("teeth-on");$(".teeth-65").val(1);}else{$(".teeth-65").removeClass("teeth-on");$(".teeth-65").val('');}
var getdata85 = $(".teeth-85").val();if(getdata85 == '1'){$(".teeth-85").addClass("teeth-on");$(".teeth-85").val(1);}else{$(".teeth-85").removeClass("teeth-on");$(".teeth-85").val('');}
var getdata84 = $(".teeth-84").val();if(getdata84 == '1'){$(".teeth-84").addClass("teeth-on");$(".teeth-84").val(1);}else{$(".teeth-84").removeClass("teeth-on");$(".teeth-84").val('');}
  var getdata83 = $(".teeth-83").val();if(getdata83 == '1'){$(".teeth-83").addClass("teeth-on");$(".teeth-83").val(1);}else{$(".teeth-83").removeClass("teeth-on");$(".teeth-83").val('');}
 var getdata82 = $(".teeth-82").val();if(getdata82 == '1'){$(".teeth-82").addClass("teeth-on");$(".teeth-82").val(1);}else{$(".teeth-82").removeClass("teeth-on");$(".teeth-82").val('');}
 var getdata81 = $(".teeth-81").val();if(getdata81 == '1'){$(".teeth-81").addClass("teeth-on");$(".teeth-81").val(1);}else{$(".teeth-81").removeClass("teeth-on");$(".teeth-81").val('');}
var getdata71 = $(".teeth-71").val();if(getdata71 == '1'){$(".teeth-71").addClass("teeth-on");$(".teeth-71").val(1);}else{$(".teeth-71").removeClass("teeth-on");$(".teeth-71").val('');}
 var getdata72 = $(".teeth-72").val();if(getdata72 == '1'){$(".teeth-72").addClass("teeth-on");$(".teeth-72").val(1);}else{$(".teeth-72").removeClass("teeth-on");$(".teeth-72").val('');}
 var getdata73 = $(".teeth-73").val();if(getdata73 == '1'){$(".teeth-73").addClass("teeth-on");$(".teeth-73").val(1);}else{$(".teeth-73").removeClass("teeth-on");$(".teeth-73").val('');}
var getdata74 = $(".teeth-74").val();if(getdata74 == '1'){$(".teeth-74").addClass("teeth-on");$(".teeth-74").val(1);}else{$(".teeth-74").removeClass("teeth-on");$(".teeth-74").val('');}
 var getdata75 = $(".teeth-75").val();if(getdata75 == '1'){$(".teeth-75").addClass("teeth-on");$(".teeth-75").val(1);}else{$(".teeth-75").removeClass("teeth-on");$(".teeth-75").val('');}
 
	  
		$('.type').val(data.type);
		console.log('type',data.type,'k');

		},
		error: function (error) {
			console.error('Error loading data:', error);
		}
	});

// {{ route('appointment_data') }}


});




	$('#notu').keyup(function () {

		var notuval = $('#notu').val();
		var hidprice_proce = $('#hidprice_proce').val();
		var discount = $('#discount').val();
		var toprice_proce = notuval * hidprice_proce;
		var toprice_proce_dis = toprice_proce - discount;
		$('#price_proce').val(toprice_proce_dis);
		
		
		});

		$('#discount').keyup(function () {

var price_proce = $('#price_proce').val();

var discount = $('#discount').val();

var toprice_proce_dis = price_proce - discount;

$('#price_proce').val(toprice_proce_dis);


});

   });


</script>

@include('../layouts/history_note')
@include('../layouts/emr_chiefcomplaint')
@include('../layouts/new_observation')


</section>


@endsection
