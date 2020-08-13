@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.areas.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.areas.update', $area)}}" class="form" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"><strong>الاسم</strong></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$area['name']}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">سعر التوصيل</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{$area['price']}}">
                            <x-error title="price"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">المدينة</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach(\App\City::all() as $item)
                                    <option value="{{$item['id']}}" {{$item['id']==$area['city_id'] ?'selected':''}}>{{$item['name']}}</option>
                                @endforeach
                            </select>
                            <x-error title="city_id"></x-error>
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
