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
      <strong class="card-title">اضافة معلم</strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('teacher.store')}}">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >الاسم</label>
            <input type="text" name="name" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">البريد الالكتروني</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">كلمة السر</label>
              <input type="password" name="password" class="form-control" id="inputPassword4" >
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