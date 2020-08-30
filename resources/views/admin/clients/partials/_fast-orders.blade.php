<div class="row">
    <div class="col">
        <div class="table-responsive mb-4 mt-4">
            <table id="userFastOrders" class="table table-hover non-hover" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>رقم الطلب</th>
                    <th>اسم العميل</th>
                    <th>الاشتراك</th>
                    <th>العنوان</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                    <th>حالة الدفع</th>
                    <th>تاريخ الاستلام</th>
                    <th>تاريخ التسليم</th>
                    <th>اجراء</th>
                </tr>
                </thead>
                <tbody>
                @foreach($client->orders()->where('is_fast',1)->get() as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>{{$item->branch->bill_prefix}}-{{$item['serial']}}</td>
                        <td>{{$item->subscription ? $item->subscription->name:''}}</td>
                        <td>{{$item->client->name}}</td>
                        <td>{{$item->address ? $item->address->name : ''}} - {{$item->address && $item->address->city ?$item->address->city->name:''}} -{{$item->address && $item->address->area ?$item->address->area->name:''}}  </td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->status ? $item->status->name : ''}}</td>
                        <td>
                            @if($item->is_paid)
                                <span class="badge badge-success">مدفوع</span>
                            @else
                                <span class="badge badge-danger">غير مدفوع</span>
                            @endif
                        </td>
                        <td>{{\Carbon\Carbon::create($item->arrived_at)->format('Y-m-d')}}</td>

                        <td>{{\Carbon\Carbon::create($item->out_at)->format('Y-m-d')}}</td>

                        <td class="d-flex">
                            <a href="{{route('admin.orders.show', $item)}}"><i class="fa fa-eye text-dark"></i></a>
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



@section('js')
    <x-datatable id="userFastOrders" mass="{{route('admin.order.mass.destroy')}}"></x-datatable>
@endsection
