@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>الاشتراكات</h3>
                    <div>
                        <a href="{{route('admin.subscriptions.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="subscriptions" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>الوصف</th>
                                <th>السعر</th>
                                <th>الصورة</th>
                                <th>اجمالي القطع</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( \App\Subscription::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                     <td>{{$item['name']}}</td>
                                     <td>{{$item['description']}}</td>
                                     <td>{{$item['price']}}</td>
                                     <td>
                                         <img src="{{asset($item['img'])}}" alt="photo" style="width: 75px;height: 75px;" class="rounded-circle">
                                     </td>
                                     <td>{{$item['pieces']}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.subscriptions.show', $item)}}"><i class="fa fa-eye text-dark"></i></a>
                                        <a href="{{route('admin.subscriptions.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.subscriptions.destroy', $item)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-btn" type="submit"><i class="fa fa-trash text-danger"></i></button>
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
    <x-datatable id="subscriptions" mass="{{route('admin.subscriptions.mass.destroy')}}"></x-datatable>
@endsection
