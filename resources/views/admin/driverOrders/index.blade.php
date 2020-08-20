@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>طلبات السائقين</h3>
                    <div>
                        <a href="{{route('admin.driver-orders.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="driverOrders" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>العميل</th>
                                <th>العنوان</th>
                                <th>الوقت</th>
                                <th>التاريخ</th>
                                <th>عدد القطع</th>
                                <th>الحالة</th>
                                <th>الاشتراك</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\DriverOrder::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->client->name}}</td>
                                    <td>{{$item->address->name}} - {{$item->address->area->name}} </td>
                                    <td>{{$item->time->from . ' - ' . $item->time->to}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->pieces}}</td>
                                    <td>{{$item->status->name}}</td>
                                    <td>{{$item->subscription ? $item->subscription->name : ''}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.driver-orders.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.driver-orders.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <x-datatable id="driverOrders" mass="{{route('admin.driver.order.mass.destroy')}}"></x-datatable>
@endsection
