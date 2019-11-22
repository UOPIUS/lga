@extends('general.layout')

@section('main_content')

<div class="w-100">
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
           <div class="card-body shadow p-3 mb-5 bg-white rounded">
             <div class="float-right"><a class="btn btn-dark mb-2" href="{{url('tax-payer/')}}">List</a></div>
               <h1 class="mb-4">Edit Tax Payer</h1>

               <form class="form mt-4" action="{{route('tax-payer.update', $data->id)}}" method="post" autocomplete="off">
                 @method('PATCH')
                 {{ csrf_field() }}
                 <div class="row">
                        <div class="form-group col-md-4">
                        <label class="form-control-label" for="fname">First name </label>
                        <input type="text" name="fname" class="form-control input-lg" id="fname" value="{{ $data->fname }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="lname">Last name </label>

                            <input type="text" name="lname" class="form-control input-lg" id="lname" value=" {{  $data->lname  }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="oname">Other name </label>

                            <input type="text" name="oname" class="form-control input-lg" id="oname" value=" {{  $data->oname  }}">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="email">Email</label>

                            <input type="text"  class="form-control input-lg" id="email" name="email" value="{{($data->email) ? $data->email : 'NIL'}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="phone">Mobile number</label>

                            <input type="text" maxlength="15"  class="form-control input-lg" id="phone" name="phone"  value=" {{ $data->phone }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="form-control-label" for="address">Address</label>

                            <input type="text" class="form-control input-lg" name="address"  value=" {{ $data->address }}">
                        </div>

                        
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary" id="submit_btn">Save <i class="fa fa-angle-double-right"></i>
                      </button>

               </form>

           </div>
       </div>
   </div>

</div>
</div>
@endsection
