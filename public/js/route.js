window.onload = function(){
    var view = document.getElementById('view');
    // var baseURL = 'http://www.test.manyhong.cn/';
    var baseURL = 'http://www.gatherAdmin.com/';
    var admin = "admin"

    var themes = function(){
        showName('主题管理')
        getView(baseURL + 'themes/showAll');
    }
    var dashboard = function(){
        // var formdata = new FormData();
        showName('仪表盘')
    }

    var gzh = function(){
        getView(baseURL + 'gzh/showAll')
        showName('公众号管理')
    }

    var users = function(){
         getView(baseURL + 'gatherUser/showAll')
        showName('用户管理')
    }

    var articles = function(){
        getView(baseURL + 'articles/showAll')
        showName('文章管理')
    }

    // var updateProduct = function(){
    //     getView(baseURL + 'admin/messageManagerCenter');
    //     showName('产品更新');
    // }
    var messages = function(){
        getView(baseURL + 'message/index');
        showName('消息中心');
    }

    function getView(url){
        return fetch(url).then(function(response){
            view.innerHTML = '';
            view.innerHTML = "Loading..."
            return response.text();
        }).then(function(err,body){
            if(err) return view.innerHTML = err;;
            view.innerHTML = body;
        })
    }

    function showName(item){
        var itemName = document.getElementById('itemName');
        itemName.innerHTML = item;
    }


    var routes = {
        '/gzh':gzh,
        '/messages': messages,
        '/themes':themes,
        '/dashboard': dashboard,
        '/articles':articles,
        '/users':users
    }

    var router = Router(routes);
    router.init();
}
// {{--
// <a href="{{route('messageCenter')}}">消息推送中心</a>
// <br>
// <a href="{{route('productsCenter')}}">商品管理中心</a>
// <br>
// <a href="{{route('cateCenter')}}">品类管理中心</a>
// <br>
// <!-- 查看用户提交的订单，审核，确认(并发送通知)，订单打印-->
// <a href="{{route('orderFormCenter')}}">订单管理中心</a>
// <br>
// <a href="">退出登录</a> --}}
