@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form  action="{{route('admin.paymentsMethod.update',$paymentsMethod)}}" method="post">
                        @csrf
                        @method('PUT')
                        <x-text value="{{$paymentsMethod['name']}}" name="name" title="الاسم"></x-text>
                        <div class="form-group">
                            <label class="font-weight-bold">الحالة</label>
                            <div class="mb-3">
                                <label class="mr-3">غير فعال</label>
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input id="is_active" name="is_active" type="checkbox" {{$paymentsMethod['is_active'] ? 'checked' : ''}} value="1">
                                    <span class="slider round"></span>
                                </label>
                                فعال
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
