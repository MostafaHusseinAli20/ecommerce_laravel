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
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">الرئيسية</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{\App\Models\Admin::count()}}</h3>
    
                    <p>المشرفين</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                  <a href="{{ route('admin.index') }}" class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-left"></i></a>
                </div>
                
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{\App\Models\User::count()}}</h3>
    
                    <p>العملاء</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user-plus"></i>
                  </div>
                  <a href="#" class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-left"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{\App\Models\Order::count()}}</h3>
    
                    <p>الطلبات</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <a href="{{ route('orders.index') }}" class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-left"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{\App\Models\Product::count()}}</h3>
    
                    <p>المنتجات</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-product-hunt"></i>
                  </div>
                  <a href="{{ route('products.index') }}" class="small-box-footer">عرض المزيد <i class="fa fa-arrow-circle-left"></i></a>
                </div>
              </div>

          </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection