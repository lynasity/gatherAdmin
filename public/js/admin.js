    // style initail
(function(){
    // var baseURL = 'http://www.test.manyhong.cn/';

    // subnav
    var nav  = document.getElementById('nav');
    var links = nav.getElementsByTagName('li');
    links[0].classList.add('acitve-class')

    var addActiveClass = function (){
        for(var i = 0; i < links.length; i++){
            links[i].classList.remove('acitve-class');
        }
        this.classList.add('acitve-class')
    }
    for(var i = 0; i < links.length; i++){
        links[i].onclick = addActiveClass;
    }

    // glocal variable
    var view = document.getElementById('view');

    window.onclick = function(event){
        // 因为是页面的请求异步的，直接获得引用是拿不到的
        var toHandleLink = document.querySelectorAll('#toHandleList a');
        var arr = toArray(toHandleLink);
        arr.forEach(function (item) {
            if(event.target === item) {

                event.preventDefault();
                articleDetail.call(item);
            }
        })


    }

    // event handlers
    function articleDetail(){
        var href = this.getAttribute('href');

        fetch(href).then(function(res){
            return res.text();
        }).then(function(body){
            view.innerHTML = body;
        })
    }

    // utils
    function toArray(stuff) {
        return [].slice.call(stuff,0);
    }
})()
