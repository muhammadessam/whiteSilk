@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>اضافة</h3>
            <div>
                <a href="{{route('admin.addresses.index')}}" class="btn btn-success"><i class="fa fa-list"></i></a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.addresses.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="customer_id">المستخدم</label>
                    <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        @foreach(\App\User::all() as $item)
                            <option value="{{ $item->id }}" {{ old('customer_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <option value="{{ $item->id }}" {{ old('country_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <option value="{{ $item->id }}" {{ old('city_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <option value="{{ $item->id }}" {{ old('area_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area'))
                        <span class="text-danger">{{ $errors->first('area') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lat">خط عرض</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number" name="lat" id="lat" value="{{ old('lat', '') }}" step="0.01">
                    @if($errors->has('lat'))
                        <span class="text-danger">{{ $errors->first('lat') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="long">خط طول</label>
                    <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="number" name="long" id="long" value="{{ old('long', '') }}" step="0.01">
                    @if($errors->has('long'))
                        <span class="text-danger">{{ $errors->first('long') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="details">تفاصيل</label>
                    <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details') }}</textarea>
                    @if($errors->has('details'))
                        <span class="text-danger">{{ $errors->first('details') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">الهاتف</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alter_phone">الهاتف البديل</label>
                    <input class="form-control {{ $errors->has('alter_phone') ? 'is-invalid' : '' }}" type="text" name="alter_phone" id="alter_phone" value="{{ old('alter_phone', '') }}">
                    @if($errors->has('alter_phone'))
                        <span class="text-danger">{{ $errors->first('alter_phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="block">المربع</label>
                    <input class="form-control {{ $errors->has('block') ? 'is-invalid' : '' }}" type="text" name="block" id="block" value="{{ old('block', '') }}">
                    @if($errors->has('block'))
                        <span class="text-danger">{{ $errors->first('block') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gada">الجادة</label>
                    <input class="form-control {{ $errors->has('gada') ? 'is-invalid' : '' }}" type="text" name="gada" id="gada" value="{{ old('gada', '') }}">
                    @if($errors->has('gada'))
                        <span class="text-danger">{{ $errors->first('gada') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="street">الشارع</label>
                    <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}">
                    @if($errors->has('street'))
                        <span class="text-danger">{{ $errors->first('street') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="building">المبني</label>
                    <input class="form-control {{ $errors->has('building') ? 'is-invalid' : '' }}" type="text" name="building" id="building" value="{{ old('building', '') }}">
                    @if($errors->has('building'))
                        <span class="text-danger">{{ $errors->first('building') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="floor">الطابق</label>
                    <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ old('floor', '') }}">
                    @if($errors->has('floor'))
                        <span class="text-danger">{{ $errors->first('floor') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="flat_house">الشقة</label>
                    <input class="form-control {{ $errors->has('flat_house') ? 'is-invalid' : '' }}" type="text" name="flat_house" id="flat_house" value="{{ old('flat_house', '') }}">
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
