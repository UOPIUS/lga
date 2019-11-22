@extends('general.layout')
@section('main_content')
<?php
$total = 0;
//$transactionFee = ($evasConfig->commission + $evasConfig->pie_commission) * 100;
?>
<div class="w-100">
  <div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h1>Client Details</h1>
          <div class="text-center mb-2" >
            <a href="{{url('tax_payer/photo/edit/'.$data->id)}}" class="img-fluid" alt='Client Photo'>
            <img src="{{url('images/profile/'.$data->photo)}}">
            </a>
          </div>
          <div class="table-responsive">
            <table class="table shadow mb-5 bg-white rounded" id="client_table">
              <thead>
                <tr>
                  <th>Full name</th>
                  <th>{{$data->fname.' '.$data->lname.' '.$data->oname}}</th>
                </tr>
                <tr>
                  <th>TIN</th>
                  <th>{{$data->tin}}</th>
                </tr>
                <tr>
                  <th>Mobile Number</th>
                  <th>{{$data->phone}}</th>
                </tr>
                <tr>
                  <th>Email</th>
                  <th>{{($data->email) ? $data->email : 'NIL'}}</th>
                </tr>
                <tr>
                  <th>House Address</th>
                  <th>{{$data->address}}</th>
                </tr>
                <tr>
                  <th>Work Type</th>
                  <th>{{$data->work_type}}</th>
                </tr>

                <tr>
                  <th>Logical Address</th>
                  <th>{{$data->logical_address}}</th>
                </tr>


              </thead>

            </table>
          </div>
          <div class="text-center mb-2">
            <a href="{{ route('tax-payer.edit', $data->id) }}" class="btn btn-primary">
              Edit
            </a>
          </div>
        </div>        

      </div>

    </div>
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h1 class="mb-2">Tax Services</h1>
          <div class="shadow">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="history-tab" data-toggle="tab" href="#client-service-history" role="tab" aria-controls="history-tab" aria-selected="true">Client Service History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="offence-tab" data-toggle="tab" href="#client-offence-history" role="tab" aria-controls="offence-history" aria-selected="false">All Services/Offence</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="client-service-history" role="tabpanel" aria-labelledby="history-tab">
                <div class="media">
                  
                  <div class="media-body">

                    <div class="table-responsive">
                      <table class="table table-border">
                        <thead>
                          <th>Service</th>
                          <th>Amount Paid(&#8358;)</th>
                          <th>Payment type</th>
                          <th>Date</th>
                          <th>#</th>
                        </thead>
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                 
                </div>
              </div>
              <div class="tab-pane fade" id="client-offence-history" role="tabpanel" aria-labelledby="offence-tab">
                <div class="table-responsive">
                  <table class="table table-condense">
                    <thead>
                      <th>Service</th>
                      <th>Amount Paid</th>
                      <th>Payment type</th>
                      <th>Date</th>
                      <th>#</th>
                    </thead>
                   
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')

@endsection
