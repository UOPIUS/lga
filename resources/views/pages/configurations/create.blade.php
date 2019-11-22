@extends('general.layout')
@section('main_content')
    <div class="row">
        <div class="col-lg-2 grid-margin stretch-card offset-2">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="{{url('/users/register')}}" class="btn btn-outline-success btn-fw">New Configuration</a></li>

                </ul>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card d-flex flex-column justify-content-between">
                <div class="card-body">
                    <h2>ConfigureTax price</h2>
                    <hr>
                    <form class="form" action="#" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="fname">Payment Name </label>
                            <select class="form-control" name="payment">
                                <option>-Select</option>
                                @foreach($payments as $payment)
                                <option value="{{$payment->id}}">{{$payment->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration in Months</label>
                            <input type="text"  class="form-control" name="duration" placeholder="Duration in Months">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text"  class="form-control" name="amount" placeholder="Amount">
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
