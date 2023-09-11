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
      <strong class="card-title">تقييم المعلم  </strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('teacher_rating.update',$teacherRating)}}">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >تقييم الكاميرا</label>
            <input type="number" value="{{$teacherRating->camera}}" name="camera" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">تقييم الكاميرا والخلفية </label>
            <input type="number" name="background" value="{{$teacherRating->background}}" class="form-control" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >تقييم المادة العلمية</label>
            <input type="number" name="material" value="{{$teacherRating->material}}" class="form-control"  >
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4"> تقييم التفاعل</label>
            <input type="number" name="interaction" value="{{$teacherRating->interaction}}" class="form-control" id="inputPassword4" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label >درجة الانتظام</label>
            <input type="number" name="regularity" value="{{$teacherRating->regularity}}" class="form-control"  >
          </div>
          
        </div>
        
      
        <button type="submit" class="btn btn-primary">تاكيد</button>
      </form>
    </div>
  </div>
  </div>
  </div>
</div>
@endsection