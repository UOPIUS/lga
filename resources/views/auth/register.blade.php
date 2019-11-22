@extends('general.layout')
@section('main_content')
    <div class="row">
        <div class="col-lg-2 grid-margin stretch-card offset-2">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                   @can('isAdmin') <li class="list-group-item"> <a href="{{url('/users/index')}}" class="btn btn-outline-success btn-fw">Other users</a> </li>@endcan
                    <li class="list-group-item"><a href="{{url('/users/register')}}" class="btn btn-outline-success btn-fw">Add user</a></li>

                </ul>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card d-flex flex-column justify-content-between">
                <div class="card-body">
                    <h2>Add a user</h2>
                    <hr>
                    <form class="form" action="#" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="fname">Full name</label>
                            <input type="text"  class="form-control" name="fname" placeholder="Last First Other name" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="e.g francis@evas.com.ng">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="center">Local Government Area</label>
                            <select class="form-control" id="lg" name="lg">
                                <option>-Select-</option>
                                @foreach($lgs as $lg)
                                    <option value="">{{$lg->description}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="insurance">Roles</label>
                            <select class="form-control" id="user_type" name="user_type">
                                <option value="">-Select-</option>
                                @foreach($roles as $role)
                                    <option value="">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
