@props(['name', 'title', 'value'=>''])

<div class="form-group">
    <label for="{{$name}}">{{$title}}</label>
    <input type="text" name="{{$name}}" id="{{$name}}" class="form-control" value="{{$value}}">
    <x-error title="{{$name}}"></x-error>
</div>
