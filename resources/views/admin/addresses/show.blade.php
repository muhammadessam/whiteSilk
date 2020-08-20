@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
           <h3> العنوان</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.addresses.index') }}">
                        رجوع </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>

                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $address->id }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            العميل
                        </th>
                        <td>
                            {{ $address->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الاسم
                        </th>
                        <td>
                            {{ $address->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الدولة
                        </th>
                        <td>
                            {{ $address->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            المدينة
                        </th>
                        <td>
                            {{ $address->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            المنطقة
                        </th>
                        <td>
                            {{ $address->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            خط عرض
                        </th>
                        <td>
                            {{ $address->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            خط طول
                        </th>
                        <td>
                            {{ $address->long }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            تفاصيل
                        </th>
                        <td>
                            {{ $address->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            هاتف
                        </th>
                        <td>
                            {{ $address->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            هاتف بديل
                        </th>
                        <td>
                            {{ $address->alter_phone }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            المريع
                        </th>
                        <td>
                            {{ $address->block }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الجادة
                        </th>
                        <td>
                            {{ $address->gada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الشارع
                        </th>
                        <td>
                            {{ $address->street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            المبني
                        </th>
                        <td>
                            {{ $address->building }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الطابق
                        </th>
                        <td>
                            {{ $address->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الشقة
                        </th>
                        <td>
                            {{ $address->flat_house }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.addresses.index') }}">
                        رجوع
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
