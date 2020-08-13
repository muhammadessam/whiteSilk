@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة بلد جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.countries.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.countries.store')}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">الاسم </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="code" class="font-weight-bold">الكود</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{old('code')}}">
                        </div>
                        <div class="form-group">
                            <label for="img_temp" class="font-weight-bold">الصورة</label>
                            <input type="file" name="img_temp" id="img_temp" class="form-control" value="{{old('img_temp')}}">
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
