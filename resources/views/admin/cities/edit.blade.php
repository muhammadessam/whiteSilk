@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة مدينة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.cities.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.cities.update', $city)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"><strong>الاسم</strong></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$city['name']}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">سعر التوصيل</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{$city['price']}}">
                            <x-error title="price"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">الدولة</label>
                            <select name="country_id" id="country_id" class="form-control">
                                @foreach(\App\Country::all() as $item)
                                    <option value="{{$item['id']}}" {{$item['id']==$city['country_id'] ?'selected':''}}>{{$item['name']}}</option>
                                @endforeach
                            </select>
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">الحالة</label>
                            <div class="mb-3">
                                <label class="mr-3">غير فعال</label>
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input id="is_active" name="is_active" type="checkbox" {{$city['is_active'] ? 'checked' : ''}} value="1">
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
