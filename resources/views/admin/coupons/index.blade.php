@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>الكوبونات</h3>
                    <div>
                        <a href="{{route('admin.coupons.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="coupons" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>الكود</th>
                                <th>الوصف</th>
                                <th>النوع</th>
                                <th>القيمة</th>
                                <th>التوصيل مجاني</th>
                                <th>الاستخدام الكلي</th>
                                <th>الاتخدام لكل عميل</th>
                                <th>الحال</th>
                                <th>البداية</th>
                                <th>النهاية</th>
                                <th>اقل قيمة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Coupon::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>
                                        @if($item->is_free_Shipping)
                                            <span class="badge badge-success">نعم</span>
                                        @else
                                            <span class="badge badge-danger">لا</span>
                                    @endif
                                    <td>{{$item->total_usage}}</td>
                                    <td>{{$item->usage_per_user}}</td>
                                    <td>
                                        @if($item->is_active)
                                            <span class="badge badge-success">فعال</span>
                                        @else
                                            <span class="badge badge-danger">غير فعال</span>
                                    @endif
                                    <td>{{$item->start}}</td>
                                    <td>{{$item->end}}</td>
                                    <td>{{$item->minimum_amount}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.coupons.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.coupons.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="coupons" mass="{{route('admin.coupons.mass.destroy')}}"></x-datatable>
@endsection
