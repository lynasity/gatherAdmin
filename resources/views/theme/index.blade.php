@foreach($themes as $theme)
  <li>{{$theme->theme_name}} | <a href="{{route('themes.updateForm',['id',$theme->id])}}">update</a> | <a href="{{url('themes/delete',['id',$theme->id])}}">delete</a> </li>
@endforeach
<p><a href="{{url('themes/add')}}">add theme</a></p>