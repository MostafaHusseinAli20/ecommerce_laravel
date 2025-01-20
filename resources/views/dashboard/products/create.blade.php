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
                <li class="breadcrumb-item active">المنتجات</li>
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
                  <h3 class="card-title">اضافة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label for="title_ar">العنوان بالعربي</label>
                      <input type="text" name="title_ar" class="form-control" id="title_ar"
                      value="{{old('title_ar')}}">
                    </div>

                    <div class="form-group">
                        <label for="title_en">العنوان بالأنجليزي</label>
                        <input type="text" name="title_en" class="form-control" id="title_en"
                        value="{{old('title_en')}}">
                    </div>

                    <div class="form-group">
                        <label for="description_ar">الوصف بالعربي</label>
                        <textarea type="text" name="description_ar" class="form-control" id="description_ar">{{old('description_ar')}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="description_en">الوصف بالأنجليزي</label>
                        <textarea type="text" name="description_en" class="form-control" id="description_en">{{old('description_en')}}</textarea>
                      </div>

                    <div class="form-group">
                        <label for="price">السعر</label>
                        <input type="text" name="price" class="form-control" id="price"
                        value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label>الأقسام</label>
                        <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach (\App\Models\Category::all() as $cat)
                                <option {{old('category_id') == $cat->id ? "selected" : ""}} value="{{$cat->id}}">{{$cat->title_en}} - {{$cat->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                          
                    <div class="form-group">
                        <label>تاجات</label>
                        <select name="tags[]" multiple class="form-control select2" style="width: 100%;">
                            @foreach (\App\Models\Tag::all() as $tag)
                                <option value="{{$tag->id}}">{{$tag->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="">صورة أساسية</label>
                      <input class="form-control" type="file" name="main_image">
                    </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">اضف</button>
                  </div>

                </form>
              </div>

          </div>

        </div><!-- /.container-fluid -->
      </section>
            
        </div>
        </div>
      </section>
    </div>

@endsection