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
      <strong class="card-title">تعديل مكافأة / خصم</strong>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('rewards.update',$reward)}}">
        @csrf
        @method('PUT')
        <div class="form-row">
          
          <div class="form-group col-md-6">
            <label for="inputState">المعلم</label>
            <select id="inputState" name="teacher_id" class="form-control">
              <option selected disabled hidden>اختر...</option>
              @foreach ($teachers as $teacher)
              <option value="{{$teacher->id}}" @selected($teacher->id == $reward->teacher->id)>{{$teacher->name}}</option>

              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">المبلغ  </label>
            <input type="number" name="money"
            @if ($reward->reward !=null)
            value="{{$reward->reward}}"
            @elseif($reward->penalty !=null)
            value="{{abs($reward->penalty)}}"
            @endif
             class="form-control" id="inputPassword4" >
          </div>
      
        </div>
        <div class="form-row">
          
          
          <div class="form-group col-md-6">
            <label for="inputPassword4">السبب (اختيارى)  </label>
            <textarea type="number" name="reason"  class="form-control" id="inputPassword4" rows="4" >{{$reward->reason}}</textarea>
          </div>
      
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" @checked($reward->reward !=null)  value="1" name="type" class="custom-control-input">
              <label class="custom-control-label" for="customRadio1">مكافأة</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" @checked($reward->penalty !=null) value="2" name="type" class="custom-control-input" >
              <label class="custom-control-label"  for="customRadio2">خصم</label>
            </div>
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