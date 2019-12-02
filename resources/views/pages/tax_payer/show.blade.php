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
          <div class="text-center mb-2">
            <a href="{{ route('tax-payer.edit', $data->id) }}" class="btn btn-primary">
              Edit
            </a>
          </div>
        </div>        

      </div>

    </div>
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="row">
        
            <div class="col-md-12 grid-margin stretch-card d-none d-md-flex">
              <div class="card">
                <div class="card-body">
                  <h1>Tax Services</h1>
                  
                  <div class="row">
                    <div class="col-3">
                      <ul class="nav nav-pills nav-pills-vertical nav-pills-info" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <li class="nav-item">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            
                            Tenement Rate
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="k-pills-profile-tab" data-toggle="pill" href="#k-pills-profile" role="tab" aria-controls="k-pills-profile" aria-selected="false">
                            
                            Shops and Kiosks
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                           
                            Motor Park Levy
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                           
                            Signboard and Advertisement
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="mdi mdi-account-outline"></i>
                            Marriage Registration
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="mdi mdi-account-outline"></i>
                            Birth Registration
                          </a>                          
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="mdi mdi-account-outline"></i>
                            Vehicle Radio License
                          </a>                          
                        </li>
                      </ul>
                    </div>
                    <div class="col-9">
                      <div class="tab-content tab-content-vertical" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                          <div class="media">
                            
                            <div class="media-body">
                              
                              <form class="mt-2" method="post" action="{{url('tenement')}}">
                                @csrf
                                
                                <div class="form-group mt-2">
                                  <label>
                                  C of O (Certificate of Occupancy)
                                </label>
                                  <input type="text" class="form-control" name="cofo" value="{{old('cofo')}}">
                                  <input type="hidden" name="tax_service" value="TMT">
                                  <input type="hidden" name="tax_payer" value="{{$data->id}}">
                                </div>
                                <div class="form-group">
                                  <label>Address of facility</label>
                                  <input type="text" class="form-control" name="address">
                                </div>
                                <div class="form-group">
                                  <label>Amount generated from rent</label>
                                  <input type="text" class="form-control" name="money_made">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right"
                                id="tmt">Submit
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="k-pills-profile" role="tabpanel" aria-labelledby="k-pills-profile-tab">
                          <div class="media">
                            <div class="media-body">
                              <form class="mt-2" action="kiosk_shop" id="kiosk_shop" method="post">
                                @csrf
                                <div class="form-group mt-2">
                                  <label for="exampleInputEmail1">C of O (Certificate of Occupancy)</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="C of O Number">
                                  
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">House code</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="12345856">
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary pull-right"
                                 id='sks' >Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>


                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                          <div class="media">
                            <div class="media-body">
                              
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                          <div class="media">
                            
                            <div class="media-body">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Custom pills</h4>
                  <p class="card-description">Add class <code>.nav-pills-custom</code> and <code>.tab-content-custom-pill</code> to <code>.nav-pills</code> and <code>.tab-content</code></p>
                  <div class="row">
                    <div class="col-md-12 mx-auto">
                      <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                            Health
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Career
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Music
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-vibes-tab-custom" data-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Vibes
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-energy-tab-custom" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Energy
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
                        <div class="tab-pane fade active show" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                          <div class="d-flex mb-4">
                            <img src="../../../../images/samples/300x300/12.jpg" class="w-25 h-100 rounded" alt="sample image">
                            <img src="../../../../images/samples/300x300/1.jpg" class="w-25 h-100 ml-4 rounded" alt="sample image">
                            <img src="../../../../images/samples/300x300/2.jpg" class="w-25 h-100 ml-4 rounded" alt="sample image">
                          </div>
                          <p>
                              I'm not the monster he wants me to be. So I'm neither man nor beast. I'm something new entirely. With 
                              my own set of rules. I'm Dexter. Boo. Only you could make those words cute. I'm thinking two circus clowns dancing. You?
                          </p>
                          <p>
                              Under normal circumstances, I'd take that as a compliment. Tell him time is of the essence. I'm really more 
                              an apartment person. Finding a needle in a haystack isn't hard when every straw is computerized.
                          </p>
                        </div>
                        <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="http://www.urbanui.com/" alt="sample image">
                            <div class="media-body">
                              <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is 
                                computerized. Tell him time is of the essence. 
                                Somehow, I doubt that. You have a good heart, Dexter.</p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../../../images/samples/300x300/14.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, 
                                  I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                              </p>
                              <p>
                                  I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. 
                                  I catch killers. Hello, Dexter Morgan.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../../../images/samples/300x300/15.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  This man is a knight in shining armor. I feel like a jigsaw puzzle missing a piece. And I'm not 
                                  even sure what the picture should be. Somehow, I doubt that. You have a good heart, Dexter. Keep your mind limber.
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab-custom">
                          <div class="media">
                            <img class="mr-3 w-25 rounded" src="../../../../images/samples/300x300/11.jpg" alt="sample image">
                            <div class="media-body">
                              <p>
                                  Finding a needle in a haystack isn't hard when every straw is computerized. You're a killer. I catch killers. 
                                  I will not kill my sister. I will not kill my sister. I will not kill my sister. Rorschach would say you have a hard time relating to others.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <!--- Client service history -->

    </div>
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
