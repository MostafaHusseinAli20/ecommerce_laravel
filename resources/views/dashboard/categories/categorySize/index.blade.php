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
              <li class="breadcrumb-item active">الأقسام</li>
              <li class="breadcrumb-item active">الأحجام</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <a href="{{route('categories.index')}}"><button class="btn btn-primary">العودة للاقسام</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>القيمة</th>
              <th>العمليات</th>
            </tr>
            </thead>
            <tbody>
              @php
              $i = 1;
              @endphp
              @forelse ($sizes as $size)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$size->value}}</td>
                <td>
                  <button form="delete_size{{$size->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                  <form method="POST" id="delete_size{{$size->id}}" action="{{route('category.destroy', $size->id)}}">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>
              @empty
                <tr>
                  <th>
                    لا يوجد مقاسات
                  </th>
                </tr>
              @endforelse
            
                <tr>
                  <td colspan="2">
                    <form id="createForm"  action="{{route('category.sizes.store',$category->id)}}" method="post">
                      @csrf
                      <input class="form-control" type="text" name="value" value="{{ old('value') }}" required>
                    </form>
                  </td>
                  <td>
                    <button form="createForm" type="submit" class="btn btn-primary mr-3">اضف</button>
                  </td>
                </tr>
           
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