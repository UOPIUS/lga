@extends('general.layout')
@section('main_content')
<div class="w-100">
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
           <div class="card-body shadow p-3 mb-5 bg-white rounded">
             <div class="float-right"><a class="btn btn-dark mb-2" href="{{url('tax-payer/')}}">List</a></div>
               <h1 class="mb-4 text-primary">Add A New Tax Payer</h1>

               <form class="form mt-4" action="{{url('/tax-payer/')}}" method="post" autocomplete="off">
                 {{ csrf_field() }}
                 <div class="row">
                        <div class="form-group col-md-4">
                        <label class="form-control-label" for="fname">First name </label>
                        <input type="text" name="fname" class="form-control input-lg" id="fname" placeholder="E.g Olusegun" value="{{ request('fname') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="lname">Last name </label>

                            <input type="text" name="lname" class="form-control input-lg" id="lname" placeholder="Johnson" value=" {{ request('lname') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="oname">Other name </label>

                            <input type="text" name="oname" class="form-control input-lg" id="oname" placeholder="Agbonlahor" value=" {{ request('oname') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="state_id">State of Origin</label>
                            <select class="form-control"  id="state_id" name="state_id">
                              <option value="">Choose...</option>
                              @foreach ($states as $value)
                                <option value="{{$value->state_id}}">{{$value->name}}</option>
                              @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="lga_id">Local Government Area</label>
                            <select class="form-control"  id="lga_id" name="lga_id">
                              <option value="">Choose...</option>
                              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="email">Email</label>

                            <input type="text"  class="form-control input-lg" id="email" name="email" placeholder="E.g bolaji@evas.com.ng" value=" {{ request('email') }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="phone">Mobile number</label>

                            <input type="text" maxlength="11"  class="form-control input-lg" id="phone" name="phone" placeholder="E.g 08109593411" value=" {{ request('phone') }}">
                        </div>

                        <?php $gender = ['Male', 'Female']; ?>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="gender">Gender</label>
                            <select class="form-control"  id="gender" name="gender">
                              <option value="">Choose...</option>
                              @foreach ($gender as $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>
                        <?php $occupation = ['Business', 'Civil Servant','Private Employee']; ?>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="occupation">Occupation</label>
                            <select class="form-control"  id="occupation" name="occupation">
                              <option value="">Choose...</option>
                              @foreach ($occupation as $value)
                                <option value="{{$value}}">{{$value}}</option>
                              @endforeach

                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="address">Address</label>

                            <input type="text" class="form-control input-lg" name="address" placeholder="e.g No 66 Federal Housing Estate...." value=" {{ request('address') }}">
                        </div>

                        
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary" id="submit_btn">Continue <i class="fa fa-angle-double-right"></i>
                      </button>
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
      /* Load LGA on state change */
      $('#state_id').change(function(){
            var selectedState = $('#state_id').val();
            $.ajax({
                type: "get",
                dataType: 'text',
                url: "{{ url('fetchlga') }}",
                data: {state_id:selectedState}, // serialize all form inputs
                   headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(response) {
              if(response.status !== 201){
                $('#lga_id').html(response);
              }
              else {
                alert('Something is wrong');
              }
            },
            error: function(data) {
                console.log(data);
            }
        });
      }); /// Load LGA ends

      $.getJSON("{{url('autocomplete')}}", function (data) {
        var clients = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          // `states` is an array of state names defined in "The Basics"
          local: data
        });

        $('#fname').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
        },
        {source: clients});

  });//Json Load
    });
    </script>
@endsection
