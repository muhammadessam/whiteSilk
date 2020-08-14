@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>تعديل</h3>
            <div>
                <a href="{{route('admin.addresses.index')}}" class="btn btn-success"><i class="fa fa-list"></i></a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.addresses.update", $address) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="customer_id">المستخدم</label>
                    <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        @foreach(\App\User::all() as $item)
                            <option value="{{ $item->id }}" {{ $address['customer_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer'))
                        <span class="text-danger">{{ $errors->first('customer') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="country_id">الدولة</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                        @foreach(\App\Country::all()->where('is_active', true) as $item)
                            <option value="{{ $item->id }}" {{ $address['country_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="city_id">المدينة</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                        @foreach(\App\City::all()->where('is_active', true) as $item)
                            <option value="{{ $item->id }}" {{ $address['city_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="area_id">المنظقة</label>
                    <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id">
                        @foreach(\App\Area::all()->where('is_active', true) as $item)
                            <option value="{{ $item->id }}" {{ $address['area_id'] == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area'))
                        <span class="text-danger">{{ $errors->first('area') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lat">خط عرض</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ $address['lat'] }}" step="0.01">
                    @if($errors->has('lat'))
                        <span class="text-danger">{{ $errors->first('lat') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="long">خط طول</label>
                    <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="number" name="long" id="long" value="{{ $address['long'] }}" step="0.01">
                    @if($errors->has('long'))
                        <span class="text-danger">{{ $errors->first('long') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="details">تفاصيل</label>
                    <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ $address['det'] }}</textarea>
                    @if($errors->has('details'))
                        <span class="text-danger">{{ $errors->first('details') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">الهاتف</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ $address['phone'] }}">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alter_phone">الهاتف البديل</label>
                    <input class="form-control {{ $errors->has('alter_phone') ? 'is-invalid' : '' }}" type="text" name="alter_phone" id="alter_phone" value="{{ $address['alter_phone'] }}">
                    @if($errors->has('alter_phone'))
                        <span class="text-danger">{{ $errors->first('alter_phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $address['name'] }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="block">المربع</label>
                    <input class="form-control {{ $errors->has('block') ? 'is-invalid' : '' }}" type="text" name="block" id="block" value="{{ $address['block'] }}">
                    @if($errors->has('block'))
                        <span class="text-danger">{{ $errors->first('block') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gada">الجادة</label>
                    <input class="form-control {{ $errors->has('gada') ? 'is-invalid' : '' }}" type="text" name="gada" id="gada" value="{{ $address['gada'] }}">
                    @if($errors->has('gada'))
                        <span class="text-danger">{{ $errors->first('gada') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="street">الشارع</label>
                    <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ $address['street'] }}">
                    @if($errors->has('street'))
                        <span class="text-danger">{{ $errors->first('street') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="building">المبني</label>
                    <input class="form-control {{ $errors->has('building') ? 'is-invalid' : '' }}" type="text" name="building" id="building" value="{{ $address['building'] }}">
                    @if($errors->has('building'))
                        <span class="text-danger">{{ $errors->first('building') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="floor">الطابق</label>
                    <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ $address['floor'] }}">
                    @if($errors->has('floor'))
                        <span class="text-danger">{{ $errors->first('floor') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="flat_house">الشقة</label>
                    <input class="form-control {{ $errors->has('flat_house') ? 'is-invalid' : '' }}" type="text" name="flat_house" id="flat_house" value="{{ $address['flat_house'] }}">
                    @if($errors->has('flat_house'))
                        <span class="text-danger">{{ $errors->first('flat_house') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
