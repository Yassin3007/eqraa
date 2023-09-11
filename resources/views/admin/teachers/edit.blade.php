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
      <strong class="card-title"> تعديل بيانات المعلم</strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('teacher.update',$teacher)}}">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >الاسم</label>
            <input type="text" name="name" value="{{$teacher->name}}" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">رقم الهاتف</label>
            <input type="text" name="phone" value="{{$teacher->phone}}" class="form-control" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">البريد الالكتروني</label>
              <input type="email" name="email" value="{{$teacher->email}}" class="form-control" id="inputEmail4" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">كلمة السر</label>
              <input type="text" name="password" value="{{$teacher->pass}}" class="form-control" id="inputPassword4" >
            </div>
          </div>
       
        <div class="form-row">
         
         
      
        </div>
      
        <button type="submit" class="btn btn-primary">تاكيد</button>
      </form>
    </div>
  </div>
  </div>
  </div>
</div>
@endsection