@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>عمليات الدفع</h3>
                    <div>
                        <a href="{{route('admin.payments.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="payments" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>النوع</th>
                                <th>الاسم</th>
                                <th>القيمة</th>
                                <th>الطلب</th>
                                <th>طريقة الدفع</th>
                                <th>result</th>
                                <th>post code</th>
                                <th>trans id</th>
                                <th>auth</th>
                                <th>ref</th>
                                <th>trackid</th>
                                <th>udf_1</th>
                                <th>udf_2</th>
                                <th>udf_3</th>
                                <th>udf_4</th>
                                <th>udf_5</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Payment::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>{{$item->order_id}}</td>
                                    <td>{{$item->paymentMethod ? $item->paymentMethod->name : ''}}</td>
                                    <td>{{$item->result}}</td>
                                    <td>{{$item->postCode}}</td>
                                    <td>{{$item->tranid}}</td>
                                    <td>{{$item->auth}}</td>
                                    <td>{{$item->ref}}</td>
                                    <td>{{$item->trackid}}</td>
                                    <td>{{$item->udf_1}}</td>
                                    <td>{{$item->udf_2}}</td>
                                    <td>{{$item->udf_3}}</td>
                                    <td>{{$item->udf_4}}</td>
                                    <td>{{$item->udf_5}}</td>

                                    <td class="d-flex">
                                        <a href="{{route('admin.payments.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.payments.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="payments" mass="{{route('admin.payment.mass.destroy')}}"></x-datatable>
@endsection
