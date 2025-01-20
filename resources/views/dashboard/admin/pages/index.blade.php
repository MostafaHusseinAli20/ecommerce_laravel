@extends('dashboard.layouts.master')

@section('main-content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active">المشرفين</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <a href="{{route('admin.create')}}"><button class="btn btn-primary">اضافة</button></a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>كود</th>
            <th>الأسم</th>
            <th>العمليات</th>
          </tr>
          </thead>
          <tbody>
            @php
            $i = 1;
            @endphp
            @forelse ($admins as $admin)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$admin->code}}</td>
              <td>{{$admin->name}}</td>
              <td>
                <a href="{{route('admin.edit', $admin->id)}}"><button class="btn btn-sm btn-info">تعديل</button></a>
                <button form="delete{{$admin->id}}" class="btn btn-sm btn-danger">حذف</button>
                <form method="POST" id="delete{{$admin->id}}" action="{{route('admin.destroy', $admin->id)}}">
                  @csrf
                  @method('delete')
                </form>
              </td>
            </tr>
            @empty
              <tr>
                <th>
                  لايوجد بيانات 
                </th>
              </tr>
            @endforelse
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection