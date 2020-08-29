@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.price-list.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.price-list.update', $priceList)}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-text name="item" title="الصنف" value="{{$priceList['item']}}"></x-text>
                        <x-number name="washing" title="غسيل جاف" value="{{$priceList['washing']}}"></x-number>
                        <x-number name="washingAndIron" title="غسيل وكوي" value="{{$priceList['washingAndIron']}}"></x-number>
                        <x-number name="ironed" title="كوي" value="{{$priceList['ironed']}}"></x-number>
                        <x-img></x-img>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
