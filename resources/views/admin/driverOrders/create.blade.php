@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.driver-orders.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.driver-orders.store')}}" class="form" method="post">
                        @csrf
                        <addresses :clients="{{\App\User::where('type', 'عميل')->with('addresses')->get()}}"></addresses>
                        <div class="form-group">
                            <label class="font-weight-bold" for="time_id">الوقت</label>
                            <select name="time_id" id="time_id" class="form-control">
                                @foreach(\App\DriversTime::all() as $item)
                                    <option value="{{$item['id']}}" {{$item['id'] == old('time_id') ?'selected':''}}> {{$item['from'] . ' - '. $item['to']}} </option>
                                @endforeach
                            </select>
                            <x-error title="time_id"></x-error>
                        </div>
                        <x-number name="pieces" value="{{old('pieces')}}" title="عدد القطع"></x-number>
                        <div class="form-group">
                            <label for="date" class="font-weight-bold">التاريخ</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <x-select :loopOver="\App\DriverOrderStatus::all()" title="الحالة" value="{{old('status_id')}}" name="status_id" showCol="name"></x-select>
                        <div class="form-group">
                            <label class="font-weight-bold" for="time_id">الاشتراك</label>
                            <select name="subscription_id" id="subscription_id" class="form-control">
                                <option value=""></option>
                                @foreach(\App\Subscription::all() as $item)
                                    <option value="{{$item['id']}}" {{$item['id'] == old('subscription_id') ?'selected':''}}> {{$item['from'] . ' - '. $item['to']}} </option>
                                @endforeach
                            </select>
                            <x-error title="subscription_id"></x-error>
                        </div>

                        <x-checkbox name="is_urgent" value="{{old('is_urgent')}}" title="استعجال الطلب"></x-checkbox>
                        <x-select name="driver_id" value="{{old('driver_id')}}" showCol="name" title="السائق" :loopOver="\App\User::where('type','سائق')->get()"></x-select>
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
