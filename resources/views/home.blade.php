@extends('layouts.app')
@section('content')

    <!-- Credits to https://github.com/NOSS-itnu/pyp -->
    <div class="container text-center">

          <div class="active-cyan-4 mb-3">
          <input class="form-control" type="text" id="myInputTextField" placeholder="Search" aria-label="Search">
        </div>

         <table id="data-table" class="display table table-striped table-dark table-responsive m-auto">
              <thead>
                   <tr>
                        <th>Link</th>
                        <th>Paper Name</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Paper Year</th>
                   </tr>
              </thead>
         </table>

    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

    <!--  Datatable js -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

    <script>url = "{{asset('js/Data.json')}}" </script>

    <!-- Credits to https://github.com/NOSS-itnu/pyp -->
    <script type="text/javascript" src="{{asset('js/Data.js')}}"></script>

@endsection
