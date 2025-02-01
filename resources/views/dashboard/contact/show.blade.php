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
            <li class="breadcrumb-item active">الاتصال</li>
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
        <table id="example1" class="table table-bordered table-striped">
          <thead class="thead-dark">
          <tr>
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>الموضوع</th>
            <th>الرسالة</th>
            <th>العمليات</th>
          </tr>
          </thead>
          <tbody>

            <tr>
              <td>{{$contact->name}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->subject}}</td>
              <td>{{$contact->message}}</td>
              <td>
                {{-- <a href="{{route('categories.edit', $category->id)}}"><button class="btn btn-sm btn-info">تعديل</button></a> --}}
                <button form="delete{{$contact->id}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
                <form method="POST" id="delete{{$contact->id}}" action="{{route('contact.destroy', $contact->id)}}">
                  @csrf
                  @method('delete')
                </form>
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