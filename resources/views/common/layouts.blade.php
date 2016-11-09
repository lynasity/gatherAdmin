<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    @section('meta')
    @show
   <link rel="stylesheet" href="{{asset('./css/reset.css')}}"/>
   <link rel="stylesheet" href="{{asset('./css/main.css')}}"/>
   <link rel="stylesheet" href="{{asset('./css/font-awesome.min.css')}}"/>
    <title>@yield('title','index')</title>
    @section('style')
    @show
  </head>
  <body>
    @section('maincontent')
    @show
    <footer>
      <ul>
        <li><span class="copyright">Copyright &copy; 2016-2016 </span><span class="powerd">Powerd By <a href="#">Larvel,</a>Host on <a href="#"><span class="fa fa-github"></span> Github</a></span></li>
        <li>
          {{-- <div class="author">Authors:<a href="" title="BackEnd">Many Hong </a>& <a href="" title="FrontEnd">Quill Jou</a></div> --}}
        </li>
      </ul>
    </footer>
    {{-- @section('js') --}}
    <script scr="{{asset('./js/jquery-3.1.0.js')}}"></script>
    <script scr="{{asset('./js/customer.js')}}"></script>
    {{-- @endsection --}}
  </body>
</html>
