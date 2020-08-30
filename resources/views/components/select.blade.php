@props(['name', 'title', 'value'=>'','loopOver', 'showCol'])

<div class="form-group">
    <label class="font-weight-bold" for="{{$name}}">{{$title}}</label>
    <select name="{{$name}}" id="{{$name}}" class="form-control">
        <option></option>
        @foreach($loopOver as $item)
            <option value="{{$item['id']}}" {{$item['id'] == $value ?'selected':''}}> {{$item[$showCol]}} </option>
        @endforeach
    </select>
    <x-error title="{{$name}}"></x-error>
</div>
