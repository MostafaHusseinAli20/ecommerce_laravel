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
            <li class="breadcrumb-item active">المنتجات</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <a href="{{route('products.create')}}"><button class="btn btn-primary">اضافة</button></a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>العنوان بالعربي</th>
            <th>العنوان بالأنجليزي</th>
            <th>كمية</th>
            <th>سعر</th>
            <th>القسم</th>
            <th>صورة</th>
            <th>العمليات</th>
          </tr>
          </thead>
          <tbody>
            @php
            $i = 1;
            @endphp
            @forelse ($products as $product)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$product->title_ar}}</td>
              <td>{{$product->title_en}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->price}}</td>
              <td><a href="{{route('categories.index', ['category_id'=>$product->category->id])}}">
                {{$product->category->title_ar}} - {{$product->category->title_en}}  
              </a></td>
              <td>
                @if ($product->main_image)
                    <img width="50px" src="{{asset("storage/$product->main_image")}}" alt="">
                @else
                    بدون صورة
                @endif
              </td>
              <td>
                <a href="{{route('products.edit', $product->id)}}"><button class="btn btn-sm btn-info">تعديل</button></a>
                <button form="delete{{$product->id}}" class="btn btn-sm btn-danger">حذف</button>
                <form method="POST" id="delete{{$product->id}}" action="{{route('products.destroy', $product->id)}}">
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
