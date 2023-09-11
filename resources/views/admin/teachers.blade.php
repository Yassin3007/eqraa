@extends('layouts.admin')
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
        <div class="card-header">
          <a href="{{route('teacher.create')}}" type="button" class="btn mb-2 btn-primary">اضافة معلم</a>

        </div>
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>الاسم</th>
                <th>تقييم المعلم </th>
                <th>عدد الطلبة معه</th>
                <th>الراتب </th>
                <th>تقييم الطلاب له</th>
                <th>درجة الانتظام</th>
                <th>الحالة </th>
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teachers as $teacher)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                <td>{{$loop->iteration}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->supervisorRating->average}}</td>
                <td>{{$teacher->students->count()}}</td>
                <td></td>
                <td></td>
                <td></td>
              
                <td>
                  @if($teacher->block == 0)
                  <span class="badge badge-success">نشط</span>
                  @elseif($teacher->block == 1)
                  <span class="badge badge-danger">موقوف</span>

                  @endif
                </td>
               
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('teacher.edit',$teacher)}}">تعديل</a>
                    @if($teacher->block == 0)
                    <a class="dropdown-item" href="{{route('admin_block_teacher',$teacher->id)}}">ايقاف</a>
                    @elseif($teacher->block == 1)
                    <a class="dropdown-item" href="{{route('admin_active_teacher',$teacher->id)}}">تفعيل</a>
  
                    @endif
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