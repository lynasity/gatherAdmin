<a href="{{url('gzh/add')}}">add gzh</a>
@foreach($gzhs as $gzh)
    <li>{{$gzh->name}}</li>
@endforeach