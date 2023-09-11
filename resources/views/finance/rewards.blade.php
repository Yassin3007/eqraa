@extends('layouts.supervisor')
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
        <div class="card-header">
          <a href="{{route('rewards.create')}}" type="button" class="btn mb-2 btn-primary"> اضافة مكافأة / خصم </a>

        </div>
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>اسم المعلم </th>
                <th> مكافاة</th>
                <th>خصم </th>
                <th>السبب </th>
              
                
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rewards as $reward)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <td>{{$loop->iteration}}</td>
                <td>{{$reward->teacher->name}}</td>
                <td>{{$reward->reward}}</td>
                <td>{{$reward->penalty}}</td>
                <td>{{$reward->reason}}</td>
               
             
              
               
              
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{route('rewards.edit',$reward)}}">تعديل</a>
                  <a class="dropdown-item" href="{{route('rewards_delete',$reward->id)}}">حذف</a>
                </div>
              </td>
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