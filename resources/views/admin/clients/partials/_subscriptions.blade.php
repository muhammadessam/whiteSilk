<div class="widget-content widget-content-area">
    <div class="row card-header d-flex justify-content-between">
        <form class="form form-inline" action="{{route('admin.client.subscription.store')}}" method="post">
            @csrf
            <input type="hidden" name="client_id" value="{{$client['id']}}">
            <select name="subscription_id" id="subscription_id" class="form-control">
                @foreach(\App\Subscription::all() as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
        </form>
    </div>
    <div class="table-responsive">
        <table id="subscriptionsTable" class="table table-bordered table-striped mb-4">
            <thead>
            <tr>
                <th></th>
                <th>الاسم</th>
                <th>سعر الاشتراك</th>
                <th>الحالة</th>
                <th>عدد القطع المتبقية</th>
                <th>تاريخ البدء</th>
                <th>تاريخ الانتهاء</th>
                <th>المبلغ المضاف</th>
                <th>اجراء</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client->subscriptions->sortBy('id')  as $item)
                <tr>
                    <td>{{$item->pivot->id}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>
                        @if($item->pivot->is_active)
                            <span class="badge badge-success">فعال</span>
                        @else
                            <span class="badge badge-danger">منتهي</span>
                        @endif
                    </td>
                    <td>{{$item->pivot->remaining_pieces}}</td>
                    <td>{{$item->pivot->start_date}}</td>
                    <td>{{$item->pivot->end_date}}</td>
                    <td>{{$item->added_credit}}</td>
                    <td class="d-flex">
                        <form action="{{route('admin.client.subscription.edit')}}" method="POST">
                            @csrf
                            <input type="hidden" name="client_id" value="{{$client->id}}">
                            <input type="hidden" name="subscription_id" value="{{$item->id}}">
                            <input type="hidden" name="pivot_id" value="{{$item->pivot->id}}">
                            <button type="submit" class="delete-btn"><i class="fa fa-edit text-info"></i></button>
                        </form>
                        <form action="{{route('admin.client.subscription.destroy')}}" method="POST" onsubmit="return confirm('هل انت متاكد؟')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="client_id" value="{{$client->id}}">
                            <input type="hidden" name="subscription_id" value="{{$item->id}}">
                            <input type="hidden" name="pivot_id" value="{{$item->pivot->id}}">
                            <button type="submit" class="delete-btn"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
