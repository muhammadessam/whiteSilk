@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل </h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.countries.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.countries.update', $country)}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">الاسم </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$country['name']}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="code" class="font-weight-bold">الكود</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{$country['code']}}">
                        </div>
                        <div class="form-group">
                            <label for="img_temp" class="font-weight-bold">الصورة</label>
                            <input type="file" name="img_temp" id="img_temp" class="form-control" value="{{$country['img_temp']}}">
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
