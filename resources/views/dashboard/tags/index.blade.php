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
            <li class="breadcrumb-item active">العلامات</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <a href="{{route('tags.create')}}"><button class="btn btn-primary">اضافة</button></a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>العنوان بالعربي</th>
            <th>العنوان بالأنجليزي</th>
            <th>الصورة</th>
            <th>العمليات</th>
          </tr>
          </thead>
          <tbody>
            @php
            $i = 1;
            @endphp
            @forelse ($tags as $tag)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$tag->title_ar}}</td>
              <td>{{$tag->title_en}}</td>
              <td>
                @if ($tag->logo)
                    <img width="70px" src="{{asset("storage/$tag->logo")}}" alt="">
                @else
                    بدون صورة
                @endif
              </td>
              <td>
                <a href="{{route('tags.edit', $tag->id)}}"><button class="btn btn-sm btn-info">تعديل</button></a>
                <button form="delete{{$tag->id}}" class="btn btn-sm btn-danger">حذف</button>
                <form method="POST" id="delete{{$tag->id}}" action="{{route('tags.destroy', $tag->id)}}">
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