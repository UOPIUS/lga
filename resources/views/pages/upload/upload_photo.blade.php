@extends('general.layout')
@section('main_content')

<div class="w-100">
  <div class="row">
    
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
      <div class="card">
        <div class="col-md-12"><h5 id="response" class="text-danger"></h5></div>
           <div class="card-body shadow p-3 mb-5 bg-white rounded" id="cameraContainer">
             
               <h1 class="mb-4 text-primary">Upload Picture</h1>

               <form class="form mt-4" action="{{url('tax-payer')}}" method="POST">
                @csrf
<div class="row">
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
         <input type="hidden" name="logical_address" id="logicalAddress" class="form-control mt-2">
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
    var localStream;

        //get access to camera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            //Not adding {audio:true} since we only want video now
            navigator.mediaDevices.getUserMedia({video: true}).then(function (stream) {
                //video.src = widow.URL.createObjectURL(stream) 
                video.srcObject = stream;
                localStream = stream;
                video.play();
            });
        }
        /* Legacy code below: getUserMedia **/
        else if (navigator.getUserMedia) { //Standard
            navigator.getUsrMedia({video: true},
            function (stream) {
                video.src = stream;
                localStream = stream;
                video.play();
            }, errBack);
        }

        else if (navigator.webkitGetUserMedia) { //webkit-prefixed
            navigator.webkitGetUserMedia({video: true},
            function (stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                localStream = stream;
                video.play();
            }, errBack);
        }

        else if (navigator.mozGetUserMedia) { //Mozilla firefox
            navigator.mozGetUserMedia({video: true},
            function (stream) {
                video.src = stream;
                localStream = stream;
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
                console.log(logicalAddress);
                console.info(data+' '+user+' '+logicalAddress);
            $('#response').addClass('alert alert-info text-center')
                    .html('Wait Request is Processing. . .').fadeIn();
            $.ajax({
                type: "POST",
                url: "{{url('tax-payer/photo/upload')}}",
                dataType: 'json',
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
                    if (o.status == 200) {
                      //Stop camera
                        video.pause();
                        video.src = "";
                        localStream.getTracks()[0].stop();
                        $('#cameraContainer').fadeOut(1000,function(){
                          $('#response').removeClass().addClass("alert alert-success text-center").html(o.msg);
                        });
                        
                        
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
          //Create a hidden field element
          

          getLocation();
  });

</script>
@endsection
