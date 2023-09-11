@extends('layouts.supervisor')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">جدول الطلاب</h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
        <div class="card-header">
          <a href="{{route('students.create')}}" type="button" class="btn mb-2 btn-primary">اضافة طالب</a>

        </div>
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>الاسم</th>
                <th>الرقم </th>
                <th>المعلم</th>
                <th>عدد الحصص</th>
                <th>الدفع</th>
                <th>درجة الانتظام</th>
                <th>الحالة </th>
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">

                <td>{{$loop->iteration}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->teacher->name}}</td>
                <td>{{$student->lessons_no}}</td>
                <td></td>
                <td></td>
                <td>
                  @if($student->block == 0)
                  <span class="badge badge-success">نشط</span>
                  @elseif($student->block == 1)
                  <span class="badge badge-danger">موقوف</span>

                  @endif
                </td>
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{route('students.edit',$student)}}">تعديل</a>
                  @if($student->block == 0)
                  <a class="dropdown-item" href="{{route('block_student',$student->id)}}">ايقاف</a>
                  @elseif($student->block == 1)
                  <a class="dropdown-item" href="{{route('active_student',$student->id)}}">تفعيل</a>

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