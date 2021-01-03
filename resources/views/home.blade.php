@extends('layouts.app')
@section('content')
  
    <div class="container"> 
      
         {{-- <div class="active-cyan-4 mb-3">
          <input class="form-control" type="text" id="myInputTextField" placeholder="Search" aria-label="Search">
        </div> --}}

         <table id="data-table" class="display">  
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

@endsection