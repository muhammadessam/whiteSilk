@props(['name', 'title', 'value'=>'','loopOver', 'showCol'])


<div class="form-group">
    <label class="font-weight-bold" for="{{$name}}" class="font-weight-bold">{{$title}}</label>
    <select name="{{$name}}" id="{{$name}}" class="form-control">
        @foreach($loopOver as $item)
            <option value="{{$item['id']}}" {{$item['id'] == $value ?'selected':''}}> {{$item[$showCol]}} </option>
        @endforeach
    </select>
    <x-error title="{{$name}}"></x-error>
</div>
