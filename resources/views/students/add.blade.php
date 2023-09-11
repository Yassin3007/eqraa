@extends('layouts.supervisor')
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
      <strong class="card-title">اضافة طالب</strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('students.store')}}">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >الاسم</label>
            <input type="text" name="name" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">رقم الهاتف</label>
            <input type="text" class="form-control" name="phone" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">البريد الالكتروني</label>
              <input name="email" type="email" class="form-control" id="inputEmail4" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">كلمة السر</label>
              <input type="password" name="password" class="form-control" id="inputPassword4" >
            </div>
          </div>
       
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">عدد الحصص </label>
            <input type="number" name="lessons_no" class="form-control" id="inputPassword4" >
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">المعلم</label>
            <select id="inputState" name="teacher_id" class="form-control">
              <option selected disabled hidden>اختر...</option>
              @foreach ($teachers as $teacher)
              <option value="{{$teacher->id}}">{{$teacher->name}}</option>

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