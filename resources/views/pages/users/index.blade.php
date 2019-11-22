@extends('general.layout')
@section('main_content')
    <div class="row">
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card" style="width: 18rem;">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <a href="{{url('users/index')}}" class="btn btn-outline-success btn-fw">Records</a> </li>

                    <li class="list-group-item"><a href="{{url('users/register')}}" class="btn btn-outline-success btn-fw hide">Add new</a></li>

                </ul>

            </div>
        </div>
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2>Users</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="users_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><strong>Full name</strong></th>
                                <th><strong>Role</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Created by</strong></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$count++}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/users/' . $user->id . '') }}">{{$user->name}}</a>
                                    </td>
                                    <td>
                                        {{$user->user_type}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->created_by}}
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#users_table').DataTable({"bLengthChange": false,"ordering":false});
        });
    </script>
@endsection
