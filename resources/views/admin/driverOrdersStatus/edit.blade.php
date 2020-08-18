@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.driver-order-status.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.driver-order-status.update', $driverOrderStatus)}}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <x-text name="name" title="الاسم" value="{{$driverOrderStatus['name']}}"></x-text>
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
