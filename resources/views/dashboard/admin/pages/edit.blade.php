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
                <li class="breadcrumb-item active">المشرفين</li>
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
                <form role="form" method="POST" action="{{route('admin.update', $admin->id)}}">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">الأسم</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                      value="{{$admin->name}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">الكود</label>
                      <input type="number" name="code" class="form-control" id="exampleInputEmail1"
                      value="{{$admin->code}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                      value="{{old('password')}}">
                    </div>

                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">موافق علي السياسات</label>
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