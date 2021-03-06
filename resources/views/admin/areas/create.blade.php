@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة منطقة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.areas.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.areas.store')}}" class="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"><strong>الاسم</strong></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">سعر التوصيل</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
                            <x-error title="price"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">المدينة</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach(\App\City::all() as $item)
                                    <option value="{{$item['id']}}" {{$item['id']==old('city_id') ?'selected':''}}>{{$item['name']}}</option>
                                @endforeach
                            </select>
                            <x-error title="city_id"></x-error>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">الحالة</label>
                            <div class="mb-3">
                                <label class="mr-3">غير فعال</label>
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input id="is_active" name="is_active" type="checkbox" checked value="1">
                                    <span class="slider round"></span>
                                </label>
                                فعال
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
