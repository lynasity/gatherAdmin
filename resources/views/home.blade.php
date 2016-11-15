<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('./css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="{{asset('./css/view.css')}}"/>
    <link rel="stylesheet" href="{{asset('./css/admin.css')}}">
    <title>Admin</title>
</head>
<body>
    <div class="container-fluid full-height">

        <div class="row">
            <div class="col-left">
                <div class="user">
                    <div class="face">
                        <!-- <img src="http://www.fillmurray.com/100/100" /> -->
                    </div>
                    <div class="name">
                        Many Hong
                    </div>
                </div>
            </div>

            <div class="col-right">
                <div class="title-bar">
                    <span>
                        <span class="logo">ALL IN ONE</span>后台管理系统
                    </span>
                    <span class="divider"></span>
                    <span class="item-name" id="itemName">仪表盘</span>
                    <a class="sign-out" href="{{url('logout')}}">
                        <i class="fa fa-sign-out"></i>
                        登出
                    </a>
                    <div class="alert alert-success msg">
                        <i class="fa fa-check"></i>
                        <span id="successMsg"></span>
                    </div>
                    <div class="alert alert-danger msg">
                        <i class="fa fa-close"></i>
                        <span id="failedMsg"></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row fix-height">

            <div class="col-left nav-wrap">
                    <ul id="nav" class="nav-v">
                        <li>
                            <a href="#/dashboard">
                                <i class="fa fa-tachometer"></i>
                                仪表盘
                            </a>
                        </li>
                        <li>
                            <a href="#/gzh">
                                <i class="fa fa-server"></i>
                                公众号管理
                            </a>
                        </li>
                        <li>
                            <a href="#/themes">
                                <i class="fa fa-hashtag"></i>
                                主题管理
                            </a>
                        </li>
                        <li>
                            <a href="#/users">
                                <i class="fa fa-pencil"></i>
                                用户管理
                            </a>
                        </li>
                        <li>
                            <a href="#/articles">
                                <i class="fa fa-bar-chart"></i>
                                文章分类
                            </a>
                        </li>
                        <li>
                            <a href="#/messages">
                                <i class="fa fa-bell"></i>
                                消息中心
                            </a>
                        </li>

                    </ul>
            </div>
            <div class="col-right full-height">
                <div class="view" id="view">
                    <form action=""></form>
                </div>
            </div>

        </div>
        <!--end container-->
    </div>
    <script src="{{asset('./js/fetch.js')}}"></script>
    <script src="{{asset('./js/director.js')}}"></script>
    <script src="{{asset('./js/route.js')}}"></script>
    <script src="{{asset('./js/admin.js')}}"></script>
</body>
</html>
