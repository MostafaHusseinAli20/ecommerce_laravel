@extends('dashboard.layouts.master')

@section('main-content')
   <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active">الأقسام</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">التعديل</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">العنوان بالعربي</label>
                      <input type="text" name="title_ar" class="form-control" id="exampleInputEmail1"
                      value="{{$category->title_ar}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">العنوان بالأنجليزي</label>
                        <input type="text" name="title_en" class="form-control" id="exampleInputEmail1"
                        value="{{$category->title_en}}">
                      </div>
                      
                      <img width="70px" src="{{asset('storage/' . $category->logo)}}" alt="">

                      <div class="form-group">
                        <label for="">صورة</label>
                        <input class="form-control" type="file" name="logo">
                      </div>

                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                  </div>
                </form>
              </div>
              
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
            
        </div>
        </div>
      </section>
    </div>
@endsection