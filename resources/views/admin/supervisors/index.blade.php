@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
<div class="row">
    <div class="col-md-12 my-4">
      <h2 class="h4 mb-1">جدول المشرفين</h2>
      <br>
      {{-- <p class="mb-3">Child rows with additional detailed information</p> --}}
      <div class="card shadow">
        <div class="card-header">
          <a href="{{route('supervisor.create')}}" type="button" class="btn mb-2 btn-primary">اضافة مشرف</a>

        </div>
        <div class="card-body">
          <!-- table -->
          <table class="table table-hover table-borderless border-v">
            <thead class="thead-dark">
              <tr>
       
                <th>م</th>
                <th>الاسم</th>
                <th>الرقم </th>
                <th>البريد الالكتروني</th>
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supervisors as $supervisor)
              <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-2474">
                
                <td>{{$loop->iteration}}</td>
                <td>{{$supervisor->name}}</td>
                <td>{{$supervisor->phone}}</td>
                <td>{{$supervisor->email}}</td>
              
              
                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{route('supervisor.edit',$supervisor)}}">تعديل</a>
                  <a href=""  class="dropdown-item" data-toggle="modal" data-target="#defaultModal">حذف</a>
                  <!-- Modal -->
                                 
                </div>
              </td>
            </tr>


            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel"> هل انت متاكد من عملية الحذف ؟</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                 <form method="POST" action="{{route('supervisor.destroy',$supervisor->id)}}">

                  @csrf
                  @method('DELETE')
                  <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn mb-2 btn-primary"> تاكيد</button>
                  </div>
                 </form>
                  
                </div>
              </div>
            </div>  
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