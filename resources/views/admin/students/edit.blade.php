@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="card shadow mb-4">
    <div class="card-header">
      <strong class="card-title">تعديل بيانات الطالب</strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('student.update',$student)}}">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >الاسم</label>
            <input type="text" name="name" value="{{$student->name}}" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">رقم الهاتف</label>
            <input type="text" class="form-control" value="{{$student->phone}}" name="phone" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">البريد الالكتروني</label>
              <input name="email" type="email" value="{{$student->email}}" class="form-control" id="inputEmail4" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">كلمة السر</label>
              <input type="text" name="password" value="{{$student->pass}}"  class="form-control" id="inputPassword4" >
            </div>
          </div>
       
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">عدد الحصص </label>
            <input type="number" name="lessons_no" value="{{$student->lessons_no}}" class="form-control" id="inputPassword4" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">المعلم</label>
            <select id="inputState" name="teacher_id" class="form-control">
              <option selected disabled hidden>اختر...</option>
              @foreach ($teachers as $teacher)
              <option value="{{$teacher->id}}" @selected($teacher->id ==$student->teacher_id)>{{$teacher->name}}</option>

              @endforeach
            </select>
          </div>
      
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  </div>
  </div>
</div>
@endsection