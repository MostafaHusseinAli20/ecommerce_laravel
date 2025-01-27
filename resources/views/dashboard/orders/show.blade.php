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
            <li class="breadcrumb-item active">عرض</li>
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
            
        <h3 class="mt-3">البيانات الاساسية</h3>
        <table id="example1" class="table table-bordered table-striped">
            <thead class="thead-dark">
               <tr>
                <th>#</th>
                <th>بيانات العميل</th>
                <th>الموبايل</th>
                <th>البريد الألكتروني</th>
                <th>حالة الطلب</th>
                <th>اجمالي الطلب</th>
               </tr>
               </thead>
               <tbody>

                 @php
                 $i = 1;
                 @endphp
                 
                 <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->full_name}} <br>
                     {{$order->full_adreess}}
                 </td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                        <form method="POST" action="{{ route('orders.update', $order->id) }}" class="form-control d-flex">
                            @csrf
                            @method('put')
                            <select class="form-control" name="status">
                                @foreach (trans('front.order_status') as $status => $title)
                                    <option {{ $status == $order->status ? "selected" : "" }} 
                                        value="{{ $status }}">{{ $title }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-success mr-3" type="submit">
                                <i class="fa fa-save"></i>
                            </button>

                        </form>
                    </td>
                  </tr>
                
             </table>

             <h3 class="my-3">البيانات الاضافية</h3>
             <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                   <tr>
                     <th>#</th>
                     <th>اسم المنتج</th>
                     <th>سعر المنتج</th>
                     <th>الكمية</th>
                     <th>اختيار اللون</th>
                     <th>اختيار الحجم</th>
                     <th>الاجمالي</th>
                    
                   </tr>
                   </thead>
                   <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach ($order->items as $order_item)
                     <tr>
                       <td>{{$i++}}</td>
                       <td>{{$order_item->product_name}}</td>
                       <td>{{$order_item->product_price}}</td>
                       <td>{{$order_item->quantity}}</td>
                       <td>{{$order_item->chosen_color ?? "لم يتم اختيار اللون"}}</td>
                       <td>{{$order_item->chosen_size ?? "لم يتم اختيار الحجم"}}</td>
                       <td>{{$order_item->sub_total}}</td>
                     </tr>
                     
                     @endforeach
                   </tbody>
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
