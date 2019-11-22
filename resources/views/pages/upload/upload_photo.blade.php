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
          <div class="img-fluid" alt='Client Photo'>
            <a href="">
            <img src="{{url('images/profile/'.$data->photo)}}">
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
           <div class="card-body shadow p-3 mb-5 bg-white rounded" id="cameraContainer">
             <div class="float-right"><a class="btn btn-dark mb-2" href="{{url('tax-payer/')}}">List</a></div>
               <h1 class="mb-4 text-primary">Upload Picture</h1>

               <form class="form mt-4" action="{{url('tax-payer')}}" method="POSt">
                @csrf
                
                 <div class="row">
                  <div class="col-md-12"><h5 id="response" class="text-danger"></h5></div>
                        <div class="form-group col-md-4 offset-md-1">
                            <h4 class="example-title text-center">Camera</h4>
                          <div class="card text-center">
                              <div id="my_camera">
                                  <video id="video" width="320" height="240" autoplay></video>
                              </div>
                              <input type="hidden" name="user" id="user" value="{{$data->id}}">
                          </div>
                          <p class="card-text text-center mt-2"><button id="btnSnap" class="btn btn-danger" type="button">Capture Photo</button></p>
                        </div>
                        <div class="form-group col-md-4 offset-md-1">
                            <h4 class="example-title text-center">Picture Captured</h4>
                            <div class="card text-center">
                                <div>
                                    <canvas id="canvas" width="320" height="240" style="padding: 5px"></canvas>
                                </div>
                            </div>
                             <div class="">
                               <input type="text" disabled name="logical_address" id="logicalAddress" class="form-control mt-2">
                             </div>

                        </div>
                        
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary" id="continue_btn">Submit <i class="fa fa-angle-double-right"></i></button>
                    </div>


               </form>

           </div>
       </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  $(function(){

    var canvas = document.getElementById('canvas'),
                context = canvas.getContext('2d'),
                video = document.getElementById('video');

        //get access to camera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            //Not adding {audio:true} since we only want video now
            navigator.mediaDevices.getUserMedia({video: true}).then(function (stream) {
                //video.src = widow.URL.createObjectURL(stream) 
                video.srcObject = stream;
                video.play();
            });
        }
        /* Legacy code below: getUserMedia **/
        else if (navigator.getUserMedia) { //Standard
            navigator.getUsrMedia({video: true},
            function (stream) {
                video.src = stream;
                video.play();
            }, errBack);
        }

        else if (navigator.webkitGetUserMedia) { //webkit-prefixed
            navigator.webkitGetUserMedia({video: true},
            function (stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        }

        else if (navigator.mozGetUserMedia) { //Mozilla firefox
            navigator.mozGetUserMedia({video: true},
            function (stream) {
                video.src = stream;
                video.play();
            }, errBack);
        }
        
        $('#btnSnap').click(function (e) {
            e.preventDefault();
            context.drawImage(video, 0, 0, 320, 240);
        });

        /*
          Upload picture from camera...
        */
        $('#continue_btn').click(function (e) {
            e.preventDefault();
            var data = canvas.toDataURL(),
                user = $("#user").val(),
                logicalAddress = $("#logicalAddress").val();
                console.info(data+' '+user+' '+logicalAddress);
            $('#response').addClass('alert alert-info text-center').html('Wait Request is Processing. . .').fadeIn();
            $.ajax({
                type: "POST",
                url: "{{url('tax-payer/photo/upload')}}",
                dataType: 'text',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {
                    image: data,
                    user: user,
                    logical_address: logicalAddress
                }
            }).done(function(o){
               $('#response').removeClass();
                    if (o.status === 200) {
                        $('#captureContainer').hide();
                        swal('success','Good Job', o.msg);
                    }
                    else {
                        $("#response").addClass("alert alert-danger text-center").html(o.msg);
                    }
            });
        });


          function getLocation() {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
              document.getElementById("response").innerHTML = "Geolocation is not supported by this browser.";
            }
          }

          function showPosition(position) {
            document.getElementById("logicalAddress").value = position.coords.latitude + '&'+ position.coords.longitude;
          }

          function showError(error) {
            switch(error.code) {
              case error.PERMISSION_DENIED:
                swal('warning','Permission Denied Notice', "You have to enable Permission to your location");
                break;
              case error.POSITION_UNAVAILABLE:
                swal('error','Service is Unavailable', "Location Service Not Available");
                break;
              case error.TIMEOUT:
                swal('error','Time Out Error', "Refresh the browser");
                break;
              case error.UNKNOWN_ERROR:
                swal('error','UNKNOWN_ERROR', "Try a different browser for this feature");
                break;
            }
          }

          getLocation();
  });

</script>
@endsection
