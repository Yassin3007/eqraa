@extends('layouts.teacher')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">جدول الحصص</h2>
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
                <th>السبت</th>
                <th>الاحد</th>
                <th>الاثنين</th>
                <th>الثلاثاء</th>
                <th>الاربعاء</th>
                <th>الخميس</th>
                <th>الجمعة</th>
                
             
            
              </tr>
            </thead>
            <tbody>
              @foreach ($hours as $hour)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
        
                <td>{{$hour}}</td>
                
                <td>
                  <select id="inputState" name="teacher_id" class="form-control">
                    <option selected disabled hidden>اختر...</option>
                    
                    <option  value="">--</option>
                    <option  value="">--</option>
                   
      
                    
                  </select>
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