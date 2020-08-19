@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>الطلبات</h3>
                    <div>
                        <a href="{{route('admin.orders.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="orders" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>طريقة الدفع</th>
                                <th>اسم العميل</th>
                                <th>العنوان</th>
                                <th>المبلغ</th>
                                <th>الحالة</th>
                                <th>حالة الدفع</th>
                                <th>الكوبون</th>
                                <th>التاريخ</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Order::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->paymentMethod->name}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->address->name}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->status->name}}</td>
                                    <td>
                                        @if($item->is_paid)
                                            <span class="badge badge-success">مدفوع</span>
                                        @else
                                            <span class="badge badge-danger">غير مدفوع</span>
                                        @endif
                                    </td>
                                    <td>{{$item->coupon_id ? $item->coupon->name : ''}}</td>
                                    <td>{{$item->date}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.orders.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.orders.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="orders" mass="{{route('admin.order.mass.destroy')}}"></x-datatable>
@endsection
