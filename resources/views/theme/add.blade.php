<!DOCTYPE html>
<html>
<head>
	<title>add theme</title>
</head>
<body>
 <form method="post" action="{{url('themes/add')}}">
          {{csrf_field()}}
 	theme name:<input type="text" name="theme_name">
    <input type="submit" value="submit">
 </form>
</body>
</html>