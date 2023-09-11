@extends('layouts.teacher')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">المكافات والجزاءات </h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
       
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th> مكافاة</th>
                <th>خصم </th>
                <th>السبب </th>
              
                
              </tr>
            </thead>
            <tbody>
              @foreach ($rewards as $reward)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <td>{{$loop->iteration}}</td>
                <td>{{$reward->reward}}</td>
                <td>{{$reward->penalty}}</td>
                <td>{{$reward->reason}}</td>
               
             
              
               
              
                
              </tr>
              @endforeach
              

          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- end section -->
</div>
</div>
</div>


  @endsection