@props(['name', 'title', 'value'=>''])

<div class="form-group">
    <label class="font-weight-bold" for="{{$name}}">{{$title}}</label>
    <textarea class="form-control" name="{{$name}}" id="{{$name}}" cols="30" rows="5">{{$value}}</textarea>
    <x-error title="{{$name}}"></x-error>
</div>
