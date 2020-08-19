@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>طرق الدفع</h3>
                    <div>
                        <form class="form-inline" action="{{route('admin.paymentsMethod.store')}}" method="post">
                            @csrf
                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل طريقة جديدة ...">
                            <div class="form-group">
                                <div class="ml-2 mb-3">
                                    <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                        <input id="is_active" name="is_active" type="checkbox" checked value="1">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="payments" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>الحالة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\PaymentMethod::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>
                                        @if($item->is_active)
                                            <span class="badge badge-success">فعال</span>
                                        @else
                                            <span class="badge badge-danger">غير فعالة</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.paymentsMethod.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.paymentsMethod.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
    <x-datatable id="payments" mass="{{route('admin.payment.method.mass.destroy')}}"></x-datatable>
@endsection
