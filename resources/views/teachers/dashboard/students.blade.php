@extends('layouts.teacher')
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
        
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>الاسم</th>
                <th>عدد الحصص </th>
                <th>ملاحظات </th>               
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">

                <td>{{$loop->iteration}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->lessons_no}}</td>
                <td>{{$student->notes}}</td>
               
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a type="button" class="btn mb-2 " data-toggle="modal" data-target="#defaultModal">   اضافة ملاحظات </a>
                 
                </div>
              </td>


                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{route('add_student_notes',$student->id)}}" method='post'>
                            @csrf
                          <div class="modal-body"> 
                            <label for="inputPassword4"> ملاحظات  </label>
                            <textarea type="number" name="notes"  class="form-control" id="inputPassword4" rows="4" >{{$student->notes}}</textarea>
                        
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
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