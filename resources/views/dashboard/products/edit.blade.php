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
                  <h3 class="card-title">التعديل</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="editForm" role="form" method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">

                    <div class="form-group">
                      <label for="title_ar">العنوان بالعربي</label>
                      <input type="text" name="title_ar" class="form-control" id="title_ar"
                      value="{{$product->title_ar}}">
                    </div>

                    <div class="form-group">
                        <label for="title_en">العنوان بالأنجليزي</label>
                        <input type="text" name="title_en" class="form-control" id="title_en"
                        value="{{$product->title_en}}">
                    </div>

                    <div class="form-group">
                        <label for="description_ar">الوصف بالعربي</label>
                        <input type="text" name="description_ar" class="form-control" id="description_ar"
                        value="{{$product->description_ar}}">
                      </div>

                      <div class="form-group">
                        <label for="description_en">الوصف بالأنجليزي</label>
                        <input type="text" name="description_en" class="form-control" id="description_en"
                        value="{{$product->description_en}}">
                      </div>

                    <div class="form-group">
                        <label for="price">السعر</label>
                        <input type="number" name="price" class="form-control" id="price"
                        value="{{$product->price}}">
                    </div>

                    <div class="form-group">
                        <label>الأقسام</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach (\App\Models\Category::all() as $cat)
                                <option {{old('category_id', $product->category_id) == $cat->id ? "selected" : ""}} 
                                    value="{{$cat->id}}">{{$cat->title_en}} - {{$cat->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                      <label>المقاسات</label>
                      <select name="sizes[]" multiple class="form-control select2" style="width: 100%;">
                          @foreach (\App\Models\CategorySizes::query()->where('category_id', $product->category_id)->get() as $size)
                              <option {{$product->sizes->contains($size) ? "selected": ""}} value="{{$size->id}}">{{$size->value}}</option>
                          @endforeach
                      </select>
                  </div> --}}

                  <div class="form-check-group mb-3">
                    @foreach (\App\Models\CategorySizes::query()->where('category_id', $product->category_id)->get() as $size)
                      <div class="form-check mb-2">
                        <input 
                          name="sizes[]" 
                          class="form-check-input" 
                          type="checkbox" 
                          id="size-{{ $size->id }}"
                          value="{{ $size->id }}"
                          @if (in_array($size->id, $selectedSizes)) checked @endif>
                        <label
                          class="form-check-label" 
                          for="size-{{ $size->id }}">
                          {{ $size->value }}
                        </label>
                      </div>
                    @endforeach
                  </div>

                    <div class="form-group">
                        <label>تاجات</label>
                        <select name="tags[]" multiple class="form-control select2" style="width: 100%;">
                            @foreach (\App\Models\Tag::all() as $tag)
                                <option {{$product->tags->contains($tag) ? "selected": ""}} value="{{$tag->id}}">{{$tag->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>

                    <img width="70px" src="{{asset('storage/' . $product->main_image)}}" alt="">

                    <div class="form-group">
                      <label for="">صورة أساسية</label>
                      <input class="form-control" type="file" name="main_image">
                    </div>

                    {{-- Product Image --}}

                    <div class="row">
                      <label for="">صور اضافية</label>
                      <div class="col-12">
                        <form action="{{ route('product_images.store') }}" enctype="multipart/form-data">
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                          <input type="file" name="path" class="form-control">
                          <button type="submit" class="btn btn-success mt-2">اضافة</button>
                        </form>
                      </div>
                    </div>

                    @forelse($product->images as $image)
                    <div class="col-4">
                        <img height="100" src="{{asset('storage/'.$image->path)}}">
                    </div>
                    <div class="form-group col-8">
                        <button form="deleteImage{{$image->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        <form id="deleteImage{{$image->id}}" action="{{route('product_images.destroy',$image->id)}}" method="post">
                          @csrf 
                          @method('delete')
                        </form>
                    </div>
                    @empty
                        <div class="col-12 mt-2">
                            <h4>لا يوجد</h4>
                        </div>
                    @endforelse

                    {{-- End Product Image --}}

                    
                    {{-- Product Props --}}

                    <div class="container text-center my-5">

                      <button id="toggleButton" type="button" class="btn btn-default btn-lg">خصائص المنتج</button>
                      
                      <div id="buttonsContainer" class="buttons-container">

                        <div class="row">
                          <div class="col-12 mt-3"><h5>خاصية جديدة</h5></div>
                          <div class="form-group col-3">
                              <label for="">عنوان عربي</label>
                              <input class="form-control" type="text" name="key_ar">
                          </div>
                          <div class="form-group col-3">
                              <label for="">قيمة عربي</label>
                              <input class="form-control" type="text" name="value_ar">
                          </div>
                          <div class="form-group col-3">
                              <label for="">عنوان انجليزي</label>
                              <input class="form-control" type="text" name="key_en">
                          </div>
                          <div class="form-group col-3">
                              <label for="">قيمة انجليزي</label>
                              <input class="form-control" type="text" name="value_en">
                          </div>
                      </div>
                    
                      <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h5>خصائص المنتج</h5>
                            </div>
                            @forelse($product->props as $prop)
                                
                                <form class="col-12" id="updateProp{{$prop->id}}" method="post" action="{{ route('props.update', $prop->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label for="key_ar_{{$prop->id}}">عنوان عربي</label>
                                            <input id="key_ar_{{$prop->id}}" class="form-control" type="text" name="key_ar" value="{{ $prop->key_ar }}">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="value_ar_{{$prop->id}}">قيمة عربي</label>
                                            <input id="value_ar_{{$prop->id}}" class="form-control" type="text" name="value_ar" value="{{ $prop->value_ar }}">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="key_en_{{$prop->id}}">عنوان انجليزي</label>
                                            <input id="key_en_{{$prop->id}}" class="form-control" type="text" name="key_en" value="{{ $prop->key_en }}">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="value_en_{{$prop->id}}">قيمة انجليزي</label>
                                            <input id="value_en_{{$prop->id}}" class="form-control" type="text" name="value_en" value="{{ $prop->value_en }}">
                                        </div>
                                    </div>
                                
                                <div class="form-group mt-2">

                                    <label>العمليات</label><br>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> حفظ
                                    </button>
                                  </form>
                    
                                    <form id="deleteProp{{$prop->id}}" action="{{ route('props.destroy', $prop->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <div class="col-12">
                                    <h4 class="mt-3">لا يوجد خصائص لهذا المنتج</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    {{-- End Product Props  --}}

                      </div>
                    


                    {{-- Product Colors --}}
                    <div class="container my-5">

                      <button id="toggleButton2" type="button" class="btn btn-default btn-lg">الوان المنتج</button>

                      <div id="buttonsContainer2" class="buttons-container">

                        <div class="row">
                          <div class="col-12 mt-3"><h5>أضافة الوان</h5></div>

                          <div class="form-group col-6">
                            <label for="">اللون بالعربي</label>
                            <input class="form-control" type="text" name="color_ar">
                        </div>

                        <div class="form-group col-6">
                            <label for="">اللون بالأنجليزي</label>
                            <input class="form-control" type="text" name="color_en">
                        </div>
                      </div>
                    
                      <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h5>الوان المنتج</h5>
                            </div>

                            @forelse($product->colors as $color)
                                
                                <form class="col-12" id="updateColor{{$color->id}}" method="post" action="{{ route('product_colors.update', $color->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="color_ar_{{$color->id}}">اللون بالعربي</label>
                                            <input id="color_ar_{{$color->id}}" class="form-control" type="text" name="color_ar" value="{{ $color->color_ar }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="color_en_{{$color->id}}">اللون بالأنجليزي</label>
                                            <input id="color_en_{{$color->id}}" class="form-control" type="text" name="color_en" value="{{ $color->color_en }}">
                                        </div>
                                    </div>
                                
                                <div class="form-group mt-2">

                                    <label>العمليات</label><br>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> حفظ
                                    </button>
                                  </form>
                    
                                    <form id="deleteColor{{$color->id}}" action="{{ route('product_colors.destroy', $color->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <div class="col-12">
                                    <h4 class="mt-3">لا يوجد الوان لهذا المنتج</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>

                      </div>
                    {{-- End Product Colors --}}
                  </div>
                    
                    
                </form>

              </div>

              <div class="card-footer">
                <button form="editForm" type="submit" class="btn btn-primary">تعديل</button>
              </div>
              
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
            
        </div>
        </div>
      </section>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
          const toggleButton = document.getElementById('toggleButton');
          const buttonsContainer = document.getElementById('buttonsContainer');

          toggleButton.addEventListener('click', (e) => {
              e.preventDefault()
              if (buttonsContainer.style.display === 'none' || buttonsContainer.style.display === '') {
                  buttonsContainer.style.display = 'block';
                  toggleButton.textContent = 'خصائص المنتج';
              } else {
                  buttonsContainer.style.display = 'none';
                  toggleButton.textContent = 'خصائص المنتج';
              }
          });
      });

  </script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const toggleButton2 = document.getElementById('toggleButton2');
      const buttonsContainer2 = document.getElementById('buttonsContainer2');

      toggleButton2.addEventListener('click', (e) => {
          e.preventDefault()
          if (buttonsContainer2.style.display === 'none' || buttonsContainer2.style.display === '') {
              buttonsContainer2.style.display = 'block';
              toggleButton2.textContent = 'الوان المنتج';
          } else {
              buttonsContainer2.style.display = 'none';
              toggleButton2.textContent = 'الوان المنتج';
          }
      });
  });

</script>

@endsection