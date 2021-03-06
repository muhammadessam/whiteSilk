@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    {{$order['serial']}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <x-showtext title="النوع" value="{{$order['type']}}"></x-showtext>
                            <x-showtext title="العميل" value="{{$order->client? $order->client->name : ''}}"></x-showtext>
                            <x-showtext title="السائق" value="{{$order->driver? $order->driver->name : ''}}"></x-showtext>
                            <x-showtext title="الاشتراك" value="{{$order->subscription ? $order->subscription->name : ''}}"></x-showtext>
                            <x-showtext title="استعجال الطلب" value="{{$order->is_fast ? 'نعم' : 'لا'}}"></x-showtext>
                            <x-showtext title="عدد القطع" value="{{$order->number_of_Pieces}}"></x-showtext>


                            {{--Address--}}
                            <x-showtext title="العنوان" value="{{$order->address ? $order->address->name:''}}"></x-showtext>
                            <x-showtext title="المدينة" value="{{$order->address ? $order->address->city->name:''}}"></x-showtext>
                            <x-showtext title="هاتف العنوان" value="{{$order->address ? $order->address->phone :''}}"></x-showtext>
                            <x-showtext title="تفاصيل العنوان" value="{{$order->address ? $order->address->details :''}}"></x-showtext>
                            <x-showtext title="المربع" value="{{$order->address ? $order->address->block:''}}"></x-showtext>
                            <x-showtext title="الجادة" value="{{$order->address ? $order->address->gada:''}}"></x-showtext>

                        </div>

                        <div class="col">
                            <x-showtext title="تاريخ الاستلام" value="{{$order['arrived_at']}}"></x-showtext>
                            <x-showtext title="تاريخ التسليم" value="{{$order['out_at']}}"></x-showtext>
                            <x-showtext title="الحالة" value="{{$order->status ? $order->status->name : ''}}"></x-showtext>
                            <x-showtext title="المجموع الكلي" value="{{$order['total']}}"></x-showtext>
                            <x-showtext title="الخصم" value="{{$order->discount}}"></x-showtext>
                            <x-showtext title="المنطقة" value="{{$order->address ? $order->address->area->name:''}}"></x-showtext>


                            {{--Addresa--}}
                            <x-showtext title="الهاتف البديل" value="{{$order->address ? $order->address->alter_phone :''}}"></x-showtext>
                            <x-showtext title="الشارع" value="{{$order->address ? $order->address->street:''}}"></x-showtext>
                            <x-showtext title="المبني" value="{{$order->address ? $order->address->building:''}}"></x-showtext>
                            <x-showtext title="الطابق" value="{{$order->address ? $order->address->floor:''}}"></x-showtext>
                            <x-showtext title="الشقة" value="{{$order->address ? $order->address->flat_house:''}}"></x-showtext>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    من قائمة الاسعار
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>القطعة</th>
                                        <th>النوع</th>
                                        <th>العدد</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->pieces as $piece)
                                        <tr>
                                            <td>{{$piece->item}}</td>
                                            <td>{{$piece->pivot->type}}</td>
                                            <td>{{$piece->pivot->count}}</td>
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
        <div class="col">
            <div class="card">
                <div class="card-header">
                    قطع اضيفت يدويا
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>القطعة</th>
                                        <th>النوع</th>
                                        <th>السعر</th>
                                        <th>العدد</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->OrderPieces as $piece)
                                        <tr>
                                            <td>{{$piece->name}}</td>
                                            <td>{{$piece->type}}</td>
                                            <td>{{$piece->price}}</td>
                                            <td>{{$piece->count}}</td>
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
@endsection
