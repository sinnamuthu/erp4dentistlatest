@extends('layouts/contentNavbarLayout')

@section('title', 'Accounting - Billing Information')

@section('content')
<!-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Appointment /</span> Patient Appointment
</h4> -->

<section class="container">

  <ul class="tabs">
    <li><a href="#tab1">Confirmed Treatments</a></li>
    <li><a href="#tab2">Bills</a></li>

	
	
</ul>
<div id="tab1" class="tab_content"><!--History-->
        <div class="treatment">
            <div class="treatment-bx">
                <div >
                <div class ="total-blk">
                    <div class="row">
                        <aside class="col-sm-3">
                            <p>Total Treatment Cost: ₹ {{$amount->price_proce}}</p>
                        </aside>
                        <aside class="col-sm-3">
                            <p>Balance Advance Amount: ₹ {{$amount->advance_amt}}</p>
                        </aside>
                        <aside class="col-sm-3">
                            <p>Total Invoiced Treatment Amount: ₹ {{$amount->invoice_amt}}</p>
                        </aside>
                        <aside class="col-sm-3">
                            <p class="text-end">Total Balance Treatment Amount: ₹ {{$amount->balance_amt}}</p>
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
                                   
                                      {{-- <a class="dropdown-item" href="{{ route('patient_information.show',$appointments->id) }}"><i class="bx bx-street-view me-1"></i> History</a> --}}
                                      {{-- <a class="dropdown-item" data-toggle="modal" data-target="#advance_center" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Advance</a> --}}
                                      <a class="dropdown-item getbill" id="getbill" data-toggle="modal"  data-target="#bill_center"  data-price="{{$plans->price_proce}}" data-invoice="{{$plans->invoice_amt}}" data-balance="{{$plans->balance_amt}}" data-id="{{$plans->id}}" data-appo_id="{{$plans->appo_id}}" data-branch="{{$plans->branch}}" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Bill</a>

                                    </div></td>
                              </tr>

                              @endforeach
                             
                            </table>
                </div>
            </div>
        </div>   
    
</div><!--./History-->
<div id="tab2" class="tab_content"><!--Patient Info-->
    <div class="treatment">
        <div class="treatment-bx">
            <div >
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
                            <th>Bill No</th>
                            <th>Bill Date</th>
                            <th>Treatment Cost</th>
                            <th>Additional Cost</th>
                            <th>Other Charges</th>
                            <th>Bill Amount</th>
                            <th>Received Amount</th>
                   
                            <th>Balance Amount</th>
                   
                            <th>Action</th>
                          </tr>
                          @foreach($bills as $key => $billss)
                          <tr>
                            <td>{{$billss->bill_id}}</td>
                            <td>{{$billss->bill_date}}</td>
                            <td>&#8377; {{$billss->treatment_cost}}</td>
                            <td>&#8377; {{$billss->tot_additional_cost}}</td>
                            <td>&#8377; {{$billss->other_charges}}</td>
                            <td>&#8377; {{$billss->bill_amount}}</td>
                            <td>&#8377;  {{$billss->advance_amount}}</td>
                            <td>&#8377;  {{$billss->balance_amt}}</td>
                            <td><div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item"  data-toggle="modal" data-target="#chiefcomplaintModal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1" ></i> Edit</a>
                                  {{-- <a class="dropdown-item" href="{{ route('patient_information.show',$appointments->id) }}"><i class="bx bx-street-view me-1"></i> History</a> --}}
                                  {{-- <a class="dropdown-item" data-toggle="modal" data-target="#advance_center" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Advance</a>
                                  <a class="dropdown-item" data-toggle="modal" data-target="#bill_center" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Add Bill</a> --}}

                                </div></td>
                          </tr>

                          @endforeach
                         
                        </table>
            </div>
           
       
        </div>

    </div>   

</div><!--./Patient Info-->







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


	function procmaster(){
		var selectedDataId = $('.procmaster').find(':selected').data('id');

		console.log(selectedDataId);

		$('#notu').val(1);
		$('#price_proce').val(selectedDataId);
		$('#hidprice_proce').val(selectedDataId);
	}



$(document).ready(function () {

  //modal value get billcenter

  $(".getbill").click(function(){

    var getid = $(this).attr("data-id");
    var getprice = $(this).attr("data-price");
    var getbalance = $(this).attr("data-balance");
    var getadvance = $(this).attr("data-advance");

    $("#bill_total_amt").val(getprice);
    $("#getbalance").val(getbalance);
    $("#bill_bal_amt").val(getbalance);
    $("#getid").val(getid);
    $("#getadvance").val(getadvance);
    

  });


  //end billcenter

  $('.bill_to_paid').keyup(function(){

    var bill_to_paid = $('#bill_to_paid').val();
    var bill_total_amt = $('#bill_total_amt').val();
    var getbalance = $('#getbalance').val();
    var getadvance = $('#getadvance').val();
    var bill_bal_amt = $('#bill_bal_amt').val();

    //balance amt
    actualbalnce = getbalance - bill_to_paid;
    $('#bill_bal_amt').val(actualbalnce);

    //advance amt
    console.log('ad',getadvance);
    actualadvance = getadvance + bill_to_paid;
    $('#setadvance').val(actualadvance);

    //  //total amt
    //  $actualtotal = bill_total_amt + bill_to_paid;
    //  $('#bill_total_amt').val();

    $('#bill_total_amt').val(bill_total_amt);
    $('#bill_amount').val(bill_total_amt);

  });


	$('#notu').keyup(function () {

		var notuval = $('#notu').val();
		var hidprice_proce = $('#hidprice_proce').val();
		var discount = $('#discount').val();
		var toprice_proce = notuval * hidprice_proce;
		var toprice_proce_dis = toprice_proce - discount;
		$('#price_proce').val(toprice_proce_dis);
        $('#price_balance').val(toprice_proce_dis);
		
		
		});

		$('#discount').keyup(function () {

var price_proce = $('#price_proce').val();

var discount = $('#discount').val();

var toprice_proce_dis = price_proce - discount;

$('#price_proce').val(toprice_proce_dis);
$('#price_balance').val(toprice_proce_dis);


});

   });


</script>



@include('../layouts/history_note')
@include('../layouts/emr_chiefcomplaint')
@include('../layouts/new_observation')


</section>


@endsection
