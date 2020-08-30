@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">العملاء</h3>
                    <div class="card-text d-flex">
                        <div>
                            <form class="form-inline" action="{{route('admin.clients.index')}}" method="get">
                                <select name="is_subscribed" id="filter_type" class="form-control">
                                    <option value="" {{request('is_subscribed') === null ? 'selected':''}}>الكل</option>
                                    <option value="1" {{request('is_subscribed') === '1' ? 'selected':''}}>مشتركين</option>
                                    <option value="0" {{request('is_subscribed') === '0' ? 'selected':''}}>غير مشتركين</option>
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <a class="btn btn-success" href="{{route('admin.clients.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="clients" class="table table-hover non-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الهاتف</th>
                                <th>الرصيد</th>
                                <th>الصورة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['email']}}</td>
                                    <td>{{$item['phone']}}</td>
                                    <td>{{$item['credit']}}</td>
                                    <td>
                                        <img class="rounded-circle" style="width: 50px;height: 50px;" src="{{asset($item['img'])}}" alt="">
                                    </td>
                                    <td>
                                        <ul class="table-controls">
                                            <li>
                                                <a href="{{route('admin.clients.show', $item)}}" title="عرض">
                                                    <i class="fa fa-eye text-dark"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.clients.edit', $item)}}" title="تعديل"><i class="text-primary fa fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.clients.destroy', $item)}}" method="post"
                                                      onsubmit="return confirm('هل انت متاكد؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete-btn" type="submit" title="حذف"><i class="text-danger fa fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
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
    <x-datatable id="clients" mass="{{route('admin.clients.mass.destroy')}}"></x-datatable>
@endsection
