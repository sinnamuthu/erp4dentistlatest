<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erp4 Dentist</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .tab{
        padding: 20px ;
        border: 2px solid #CACACA;
    }
    .tabtop{
        padding: 25px 50px;
        
    }
    .tabtext{
        font-size: 14px;
        
    }
    .tophed{
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
    }
    .hedtxt{
        font-size: 13px;
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;

    }
   .tabrow{
    padding: 50px!important;
   }


   .treat{
    padding-bottom: 20px;
   }
   
   .tabhd{
    font-size: 15px;
    font-weight: 500;
   }


  </style>
</head>
<body>
    <div class="row tabtop" >
        <h4 class="tophed">Clinical Examination (View)
        </h4>
        <div class="container-fluid tab">
            <div flex="" class="flex">
                <hr>
                <table style="width: 100%">
                  <tbody><tr>
                    <td >
                      <b class="tabtext">{{$patientinformations[0]['first_name']}}</b>
                    </td>
                    <td >
                      {{-- <b class="tabtext"> Male, 0 Years</b> --}}
                    </td>
                    <td class="right-align" style="width: 33%">
                      <b class="tabtext">ID: {{$patientinformations[0]['appo_id']}}</b>
                    </td>
                  </tr>
                <tr >
                    <td colspan="3" class="tabtext">
                      {{$patientinformations[0]['lo_doorno']}},{{$patientinformations[0]['lo_street']}},{{$patientinformations[0]['lo_location']}},{{$patientinformations[0]['lo_csc']}},{{$patientinformations[0]['lo_pincode']}}
                    </td>
                  </tr>
                 <tr>
                    <td colspan="3" class="tabtext">
                        <b>Medical History: </b>@if($patientinformations[0]['bp']== 'on'){{ 'Blood Pressure'}},@endif @if($patientinformations[0]['diabetes']== 'on'){{ 'Diabetes'}},@endif @if($patientinformations[0]['acidity']== 'on'){{ 'Acidity/Ulcer'}},@endif @if($patientinformations[0]['thyroid']== 'on'){{ 'Thyroid Problem'}},@endif @if($patientinformations[0]['heart']== 'on'){{ 'Heart Problem'}}@endif @if($patientinformations[0]['asthma']== 'on'){{ 'Asthma'}}@endif @if($patientinformations[0]['kd']== 'on'){{ 'Kidney Disease'}}@endif @if($patientinformations[0]['epilepsy']== 'on'){{ 'Epilepsy'}},@endif 
                    </td>
                  </tr>
                </tbody>
            </table>
              </div>
              <hr>

            <div class="row">
                <div class="col-8">
                    <table style="width: 100%">
                        <tbody><tr>
                          <td colspan="2">
                            <label class="cont-check">
                                <input type="checkbox">
                              </label>
                           <b class="tabhd">Examination</b> 
                          </td>
                        </tr>
                        <tr>
                          <td style="width: 50%" class="tabtext">
                            Date: @isset($examination[0]['examdate']){{$examination[0]['examdate']}}@else @endisset
                          </td>
                          
                        </tr>
                        <tr>
                          <td colspan="2">
                            <table style="width: 100%;">
                              <tbody><tr>
                                <td class="tabtext"  style="width: 14%;">
                                  Chief complaint
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  @isset($examination[0]['chief_complaint']){{$examination[0]['chief_complaint']}}@else @endisset
                                </td>
                              </tr>
                              {{-- <tr ng-if="obs.description" class="ng-scope">
                                <td  class="tabtext" style="width: 14%;">
                                  Description
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  nrr 6u  56
                                </td>
                              </tr> --}}
                              <tr ng-if="obs.occlusion" class="ng-scope">
                                <td  class="tabtext" style="width: 14%;">
                                  Occlusion
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  @isset($examination[0]['class1']){{$examination[0]['class1']}}@else @endisset
                                </td>
                              </tr><tr ng-if="obs.wisdom_teeth" class="ng-scope">
                                <td class="tabtext" style="width: 14%;">
                                  Wisdom Teeth
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  {{ isset($examination[0]['18']) ? '18-Missing' : '' }}{{ isset($examination[0]['28']) ? '28-Missing' : '' }}{{ isset($examination[0]['38']) ? '38-Missing' : '' }}{{ isset($examination[0]['48']) ? '48-Missing' : '' }}
                                </td>
                              </tr><tr ng-if="obs.calculus" class="ng-scope">
                                <td class="tabtext" style="width: 14%;">
                                  Calculus
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  {{ isset($examination[0]['calculus1']) && '1' == $examination[0]['calculus1'] ? '+' : '' }}{{ isset($examination[0]['calculus1']) && '2' == $examination[0]['calculus1'] ? '++' : '' }}{{ isset($examination[0]['calculus1']) && '3' == $examination[0]['calculus1'] ? '+++' : '' }}
                                </td>
                              </tr><tr ng-if="obs.stains" class="ng-scope">
                                <td class="tabtext" style="width: 14%;">
                                  Stains
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  {{ isset($examination[0]['stains1']) && '1' == $examination[0]['stains1'] ? '+' : '' }}{{ isset($examination[0]['stains1']) && '2' == $examination[0]['stains1'] ? '++' : '' }}{{ isset($examination[0]['stains1']) && '3' == $examination[0]['stains1'] ? '+++' : '' }}
                                </td>
                              </tr>
                              {{-- <tr ng-if="obs.hard_tissue_findings" class="ng-scope">
                                <td  class="tabtext"style="width: 14%;">
                                  Hard tissue findings
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  64uu
                                </td>
                              </tr><tr ng-if="obs.soft_tissue_findings" class="ng-scope">
                                <td  class="tabtext" style="width: 14%;">
                                  Soft tissue findings
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  65u5u
                                </td>
                              </tr><tr ng-if="obs.other_observation" class="ng-scope">
                                <td  class="tabtext"style="width: 14%;">
                                  Other Observations
                                </td>
                                <td style="width: 02%;" class="center-align">:</td>
                                <td style="width: 84%;" class="tabtext">
                                  u4 5uu
                                </td>
                              </tr> --}}
                            </tbody>
                        </table>
                          </td>
                        </tr>
                       
                      </tbody></table>
                </div>
                <div class="col-4">
                    <table>
                        <tbody>
                            <tr>
                                <td class="right-align tabtext" style="width: 50%">
                                   <b>Doctor</b> :  Dr. @isset($examination[0]['exam_doctor']){{$examination[0]['exam_doctor']}}@else @endisset
                                  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
              <br>
              <div class="row">
                <tr>
                    <td  class="center-align">

                      <table style="display: inline-table; width: 100%;" class="table table-condensed table-striped ">
                        <tbody><tr>
                          <td class="hedtxt"  style="text-align: center;"><b>Tooth Number</b></td>
                          <td class="hedtxt"  style="text-align: center;"><b>Observation</b></td>
                          <td class="hedtxt" style="text-align: center;"><b>Note</b></td>
                        </tr>
                        
                      </tbody></table>
                    </td>
                  </tr>
              </div>

              <br>
             

              <div class="row">
                <table class="treat" >
                  <tbody><tr>
                    <td class="tabtext" style="width: 8%;" >
                      <b class="tabhd"> Treatment Plan  : </b>
                    </td>
                    <td  class="tabtext">
                      <button class="md-raised treatment_button md-button md-ink-ripple" type="button"  style="margin-left: 4px; margin-right: 4px;">
                        <span >Confirmed (2)</span>
                      </button> 
                    </td>
                  </tr>
                  </tbody>
                </table>

              </div>
              <br>
              <div class="row">
                <table class="table table-condensed table-striped">
                  <tbody>
                    <th> <input type="checkbox" name="" id=""></th>
                    <th>Date</th>
                    <th>Plan No</th>
                    <th>Procedure & Type</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Treatment Cost	</th>
                    <th> Status </th>

                    @foreach($plan as $key => $plans)
                  <tr class="tabrow" >
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{$plans->startDate}}</td>
                    <td>{{$plans->id}}</td>
                    <td>{{$plans->procedure}}</td>
                    <td>&#8377; {{$plans->price_proce}}</td>
                    <td>&#8377;  {{$plans->dicount}}</td>
                    <td>&#8377;  {{$plans->price_proce}}</td>
                    <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked></td>
                  </tr>
                  @endforeach
                  
                
                </tbody>
                </table>
              </div>
              <br>
              <!-- second Table Confirmed Treatments:  -->
              <div class="row">
                <table class="treat" >
                  <tbody>
                    <tr>
                    <td class="tabtext" style="width: 8%;" >
                      <b class="tabhd" > Confirmed Treatments : </b>
                    </td>                  
                  </tr>
                  </tbody>
                </table>
               </div>
               <!-- second table  -->
               <br>
               <div class="row">
                <table class="table table-condensed table-striped">
                  <tbody>
                    <th> <input type="checkbox" name="" id=""></th>
                    <th>Date</th>
                    <th>Plan No</th>
                    <th>Procedure & Type</th>
                    <th>Cost</th>
                    <th>Discount</th>
                    <th>Treatment Cost	</th>
                    <th> Invoice </th>
                    <th>Balance</th>

                    @foreach($plan as $key => $plans)
                  <tr class="tabrow" >
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{$plans->startDate}}</td>
                    <td>{{$plans->id}}</td>
                    <td>{{$plans->procedure}}</td>
                    <td>&#8377; {{$plans->price_proce}}</td>
                    <td>&#8377;  {{$plans->dicount}}</td>
                    <td>&#8377;  {{$plans->price_proce}}</td>
                    <td>&#8377;  {{$plans->invoice_amt}}</td>
                    <td>&#8377;  {{$plans->balance_amt}}</td>
                  </tr>
                  @endforeach

                 
                </tbody>

                </table>
              </div>
              <br>

               <!-- third Table Confirmed Treatments:
 -->
     <div class="row">
       <table class="treat" >
      <tbody>
      <tr>
      <td class="tabtext" style="width: 8%;" >
        <b class="tabhd" >Clinical Notes :   </b>
      </td>
    </tr>
    </tbody>
  </table>
 </div>

 <!-- second table  -->
 <br>
 <div class="row">
  <table class="table table-condensed table-striped">
    <tbody>
      <th> <input type="checkbox" name="" id=""></th>
      
      <th>Date</th>
      <th>Dr</th>
      <th>Tooth Number</th>
      <th>Observations</th>
      <th>Notes</th>


      @foreach($note as $key => $notes)
    <tr class="tabrow" >
      <td><input type="checkbox" name="" id=""></td>
      <td>{{$notes->note_date}}</td>
							<td><div class="bx org"></div> <label>{{$notes->doc_type}}</label></td>
							<td>{{$notes->tooth_no}}</td>
							<td>{{$notes->procedurenote}}</td>
							<td>{{$notes->notetype}}</td>
		
    </tr>
    @endforeach
   
  </tbody>
  </table>
</div>
<br>


<!-- four  -->

              <!-- second Table Confirmed Treatments:
 -->
 <div class="row">
  <table class="treat" >
    <tbody>
      <tr>
      <td class="tabtext" style="width: 8%;" >
        <b class="tabhd" > Bills : </b>
      </td>
      
    </tr>
    </tbody>
  </table>
 </div>
 
 <br>
 <div class="row">
  <table class="table table-condensed table-striped">
    <tbody>
      <th> <input type="checkbox" name="" id=""></th>
      <th>Bill No.	</th>
      <th>Date</th>
      <th>Treatment Cost	</th>
      <th>Additional Cost	</th>
      <th>Other Charges	</th>
      <th>Bill Amount	</th>
      <th>Received		</th>
      <th> Balance </th>

      @foreach($bills as $key => $billss)
    <tr class="tabrow" >
      <td><input type="checkbox" name="" id=""></td>
      <td>{{$billss->bill_id}}</td>
      <td>{{$billss->bill_date}}</td>
      <td>&#8377; {{$billss->treatment_cost}}</td>
      <td>&#8377; {{$billss->tot_additional_cost}}</td>
      <td>&#8377; {{$billss->other_charges}}</td>
      <td>&#8377; {{$billss->bill_amount}}</td>
      <td>&#8377;  {{$billss->advance_amount}}</td>
      <td>&#8377;  {{$billss->balance_amt}}</td>
    </tr>
    @endforeach


  </tbody>
  </table>
</div>
<br>

 <!-- five Table Confirmed Treatments:
-->
<div class="row">
<table class="treat" >
<tbody>
<tr>
<td class="tabtext" style="width: 8%;" >
<b class="tabhd" >Receipts: </b>
</td>
</tr>
</tbody>
</table>
</div>
<!-- second table  -->
<br>
<div class="row">
<table class="table table-condensed table-striped">
<tbody>
<th> <input type="checkbox" name="" id=""></th>

<th>Receipt No.	</th>

<th>Bill No.	</th>
<th>Doctor	</th>
<th>Date</th>
<th>Payment By	</th>
<th>Receipt Amount </th>


@foreach($receipt as $key => $receipts)
<tr class="tabrow" >

<td><input type="checkbox" name="" id=""></td>

<td>{{$receipts->id}}</td>
<td>{{$receipts->getbill_id}}</td>

<td>{{$receipts->choose_doctor}}</td>
<td>{{$receipts->reciept_date}}</td>
<td>{{$receipts->paymethod}}</td>
<td>{{$receipts->getbalance_amt}}</td></tr>
@endforeach
<br>


</tbody>
</table>
</div>
<br>
<hr>

<div class="row">
  <div class="col-2">
  
     <div>
       <a class="btn md-button btn-outline md-default-theme" href="{{ url()->previous() }}">
        <span class="fa-solid fa-backward" style="font-size: 35px;"></span> 
        <br>
        <span style="font-size: 15px;">Back to Search</span>
      </a>
    </div>
  </div>

    <div class="col-6">
    </div>
    <div class="col-2">
      {{-- <a class="btn md-button btn-outline md-default-theme" href="mailto:example@example.com" >
        <span class="fa-regular fa-envelope" style="font-size: 35px;"></span> 
        <br>
        <span style="font-size: 15px;">Send eMail</span>
      </a> --}}
    </div>

    <div class="col-2">
      <a class="btn md-button btn-outline md-default-theme" id="printButton">
        <span class="fa-solid fa-print" style="font-size: 35px;"></span> 
        <br>
        <span style="font-size: 15px;">Print</span>
      </a>
    </div>
     </div>
   </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
     <!-- print and mail -->


     <script>
 
      document.getElementById('printButton').addEventListener('click', function() {
        // Print the current page
        window.print();
      });
    </script>


</body>
</html>