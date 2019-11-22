@extends('general.layout')
@section('main_content')
    <div class="row">
        <div class="col-lg-2 grid-margin stretch-card offset-2">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="{{url('/roles.create')}}" class="btn btn-outline-success btn-fw">New Roles</a></li>

                </ul>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card d-flex flex-column justify-content-between">
                <div class="card-body">
                    <h2>New Role</h2>
                    <hr>
                    <form class="form" action="#" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="amount">Role Name</label>
                            <input type="text"  class="form-control" name="amount" placeholder="Enter Role Name">
                        </div>

                        <button class ="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
