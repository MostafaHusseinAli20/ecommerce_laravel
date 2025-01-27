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
            <li class="breadcrumb-item active">الطلبات</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>بيانات العميل</th>
            <th>الموبايل</th>
            <th>البريد الألكتروني</th>
            <th>حالة الطلب</th>
            <th>اجمالي الطلب</th>
            <th>العمليات</th>
          </tr>
          </thead>
          <tbody>
            @php
            $i = 1;
            @endphp
            @forelse ($orders as $order)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$order->full_name}} <br> 
                {{$order->full_adreess}}
              </td>
              
              <td>{{$order->phone}}</td>
              <td>{{$order->email}}</td>
              <td>{{$order->status}}</td>
              <td>{{$order->total}}</td>
              
              <td>
                <a href="{{route('orders.show', $order->id)}}"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            @empty
              <tr>
                <th colspan="1000">
                  <h6 class="text-center">لايوجد بيانات </h6>
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
