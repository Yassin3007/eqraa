@extends('layouts.supervisor')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">جدول المعلمين</h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
       
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>الاسم</th>
                <th>تقييم الكاميرا</th>
                <th>تقييم الكاميرا والخلفية</th>
                <th>تقييم المادة العلمية </th>
                <th>تقييم التفاعل</th>
                <th>درجة الانتظام</th>
                <th>اجمالي التقييم</th>
                
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teachers as $teacher)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <td>{{$loop->iteration}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->supervisorRating->camera}}</td>
                <td>{{$teacher->supervisorRating->background}}</td>
                <td>{{$teacher->supervisorRating->material}}</td>
                <td>{{$teacher->supervisorRating->Interaction}}</td>
                <td>{{$teacher->supervisorRating->regularity}}</td>
                <td>{{$teacher->supervisorRating->average}}</td>
               
             
              
               
                <td><a href="{{route('teacher_rating.edit',$teacher->supervisorRating)}}" type="button" class="btn mb-2 btn-primary">تعديل </a>

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