<div class="row">
    <div class="col">

        <div class="row layout-top-spacing">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>العناوين</h3>
                        <div>
                            <a href="{{route('admin.addresses.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="addresses" class="table table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>الاسم</th>
                                    <th>الدولة</th>
                                    <th>المدينة</th>
                                    <th>المنطقة</th>
                                    <th>العميل</th>
                                    <th>تفاصيل</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $client->addresses as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item->country->name}}</td>
                                        <td>{{$item->city->name}}</td>
                                        <td>{{$item->area->name}}</td>
                                        <td>{{$item->client ? $item->client->name : ''}}</td>
                                        <td>{{$item['details']}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('admin.addresses.show', $item)}}"><i class="fa fa-eye text-dark"></i></a>
                                            <a href="{{route('admin.addresses.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                            <form action="{{route('admin.addresses.destroy', $item)}}" method="post">
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

    </div>
</div>
