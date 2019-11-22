@extends('general.layout')
@section('main_content')
<div class="w-100">
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
           <div class="card-body">
               <h2 class="mb-4">Registered Tax Payers</h2>
               <div class="float-right"><a class="btn btn-primary mb-2" href="{{url('tax-payer/create')}}"><i class="fa fa-plus"></i> Add new Tax Payer</a></div>
               <div class="table-responsive">
                   <table class="table table-striped shadow mb-5 bg-white rounded table-condensed " id="client_table">
                       <thead class="thead-dark">
                         <tr>
                           <th>TIN</th>
                           <th>FIRST</th>
                           <th>LAST</th>
                           <th>PHONE</th>
                           <th>EMAIL</th>
                           <th>HOUSE ADDRESS</th>
                           <th>WORK</th>
                           <th>CREATED BY</th>
                           <th>CREATED</th>
                         </tr>
                       </thead>

                   </table>
               </div>

           </div>
       </div>
   </div>

</div>
</div>
@endsection
@section('js')
    <script>
    $(function(){
      $('#client_table').DataTable({
        "bLengthChange": false,
        "ordering":false,
          processing: true,
          serverSide: true,
          ajax: "{{ url('/tax-payer/ajax/search') }}",
  			            "columnDefs": [ {
  			            "targets": 0,
  			            "render": function ( data, type, full, meta ) {
  							return '<a href="{{ url('/tax-payer/') }}/'+full.id+'">' + data + '</a>';
  			            }
  			        } ],
              columns: [
                { data: 'tin', name: 'tin'},
                { data: 'fname', name: 'fname'},
                { data: 'lname', name: 'lname'},
                { data: 'phone', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'address'},
                { data: 'work_type'},
                { data: 'user.name'},
                { data: 'created_at'},
              ]
      });
    });
    </script>
@endsection
