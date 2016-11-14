<!DOCTYPE html>
<html>
<head>
	<title>add gzh</title>
</head>
<body>
  <form method="post" action="{{url('gzh/add')}}">
               {{csrf_field()}}
  	gzh name:<input type="text" name="name"><br>
  	{{--history url:<input type="text" name="historyUrl"><br>--}}
  	<input type="submit" value="submit">
  </form>
</body>
</html>