@php
$data = Session::get('data');
$tenement = Session::get('tenement');
$gateways = Session::get('gateways'); 
@endphp

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
          <h4 class="text-center">Client Details</h4>
          <div class="text-center mb-2" >
            <a href="{{url('tax_payer/photo/edit/'.$data->id)}}" class="img-fluid" alt='Client Photo'>
            <img src="{{url('images/profile/'.$data->photo)}}">
            </a>
          </div>
          <table class="table mb-5 rounded" id="client_table">
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

      </div>

    </div>
    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
      <div class="card">
        <div class="card-body">
          <h1 class="text-primary"></h1>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>Amount to Pay</label>
                      <input type="text" class="form-control" id="amount">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2 pull-right">Submit</button>
                    
                  </form>    

        </div>
      </div>
    </div>
    <!-- End of payment form -->
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  /*
  $('button').click(function(e){
    var button = $(this),
      data = button.closest('form').serialize();
      console.log(data);
    switch(button.attr('id')) {
      case 'tmt':
        //Tenement
        sendWithAjax($('#tmtResponse','post','/tenement/add/',data));
        break;
      case 'sks':
        // shops and kiosk
        console.log('sks');
        break;
      default:
        // code block
    } 

    e.preventDefault();
  });
    */
</script>
<script type="text/javascript">
  /**
  function sendWithAjax(responseArea,method,url,data){
      responseArea.innerHTML = "Please wait...";
        $.ajax({
          type: method,
          dataType: 'text',
          url: "{{ url('"+url+"') }}",
          data: data,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (response) {
            if (response.status !== 201) {
              
            } else {
              responseArea.html('An Error Occurred!');
            }
          },
          error: function (data) {
            console.log(data);
          }
        });
  }
  */

</script>
@endsection
