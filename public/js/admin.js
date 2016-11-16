    // style initail
(function(){
    var baseURL = 'http://www.gatherAdmin.com/';

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
    var successMsg = document.getElementById('successMsg');
    var failedMsg = document.getElementById('failedMsg');

    window.onclick = function(event){

        // 因为是页面的请求异步的，直接获得引用是拿不到的.动态生成的内容也要动态获取
        var toHandleLink = document.querySelectorAll('#toHandleList a');
        var toHandleArr = toArray(toHandleLink);
        toHandleArr.forEach(function (item) {
            if(event.target === item) {

                event.preventDefault();
                articleDetail.call(item);
            }
        });


        var gzhBtns = document.querySelectorAll('#gzhTable button');
        var gzhArr = toArray(gzhBtns);
        gzhArr.forEach(function (item) {
            if(event.target === item && event.target.innerHTML === "删除") {
                var id = event.target.parentNode.dataset.id;
                var url = baseURL + 'gzh/delete/id/' + id;
                deleteTr.call(event.target,url,"删除公众号成功","删除公众号失败")
            }else if(event.target === item && event.target.innerHTML === "更新") {
                transformData.call(event.target,'gzhForm')
            }
        })

        var themeBtns = document.querySelectorAll('#themeTable button');
        var themeArr = toArray(themeBtns);
        themeArr.forEach(function (item) {
            if(event.target === item && event.target.innerHTML === "删除") {
                var id = event.target.parentNode.dataset.id;
                var url = baseURL + 'themes/delete/id/' + id;
                deleteTr.call(event.target,url,"删除主题成功","删除主题失败")
            }else if(event.target === item && event.target.innerHTML === "更新") {
                transformData.call(event.target,'themeForm')
            }
        })

        var pagiBtn = document.querySelectorAll('.once a');
        var pagiBtnArr = toArray(pagiBtn);

        pagiBtnArr.forEach(function (item) {
            if(event.target === item) {
                event.preventDefault();
                paginate(item);
            }
        })
        // events can't bind to window

        if(event.target.id === 'toDone' || event.target.id === 'toUnDone') {
            switchView.call(event.target,event);
        }
    }


    window.onsubmit = function(event){
        event.preventDefault();
        var id = event.target.getAttribute('id');
        switch (id) {
            case 'gzhForm':
                submitForm.call(event.target,'gzhTable');
                break;
            case 'themeForm':
                submitForm.call(event.target,'themeTable');
                break;
            case 'articleForm':
                articleForm.call(event.target,'文章分类成功','文章分类失败');
            default:
                break;
        }
    }

    // event handlers
    // updateForm(event.target,'themeForm','更新主题成功','更新主题失败')
    function switchView(event) {
        event.preventDefault();
        var href = this.getAttribute('href')
        fetch(href).then(function (res) {
            return res.text();
        }).then(function(body){
            var articleView = document.getElementById('articleView');
            articleView.innerHTML = body;
        })
    }

    function transformData(formId) {
        var tr = this.parentNode.parentNode;
        var tds = tr.getElementsByTagName('td');
        var form = document.getElementById(formId);
        var data = {
            id: tds[0].innerHTML,
            name: tds[1].innerHTML
        }
        form.elements['id'].value = data.id;
        if(formId === 'themeForm') {
            form.elements['theme_name'].value = data.name;
        }else if(formId === 'gzhForm'){
            form.elements['name'].value = data.name;
        }
    }

    function articleForm(success,failed){
        var href = this.getAttribute('action');
        var form = new FormData(this);
        fetch(href,{
            method: 'POST',
            body: form
        }).then(function (res) {
            return res.json();
        }).then(function (json) {
            if(json.code === 200) {
                alertMsg('success',success);
                fetch(baseURL + 'articles/showAll').then(function (res) {
                    return res.text();
                }).then(function(body){
                    view.innerHTML = body;
                })
            }else if(json.code === 500) {
                alertMsg('fail',message);
            }
        })
    }


    function alertMsg(type,msg){
        var wraper;
        if(type === 'success') {
            wraper = document.getElementById('successMsg');
        }else {
            wraper = document.getElementById('failedMsg');
        }
        wraper.innerHTML = msg;
        wraper.parentNode.classList.add('msg-in');
        setTimeout(function(){
            wraper.parentNode.classList.remove('msg-in');
        },3000);
    }


    function paginate(item) {
        var url = item.getAttribute('href');
        console.log(item)
        fetch(url).then(function(res){
            return res.text();
        }).then(function(body){
            view.innerHTML = body;
        })
    }

    function submitForm(formId){
        var self = this;
        var href = this.getAttribute('action');
        var formData = new FormData(this);

        fetch(href,{
            method: 'POST',
            body: formData
        }).then(function (res) {
            return res.json();
        }).then(function (json) {
            if(json.code === 200) {

                if(json.type === 'create') {
                    newForm(formId,json);
                    alertMsg('success',"增加成功");
                }else if(json.type == 'update') {
                    updateForm(formId,json);
                    alertMsg('success',"更新成功");
                }


            }else if(json.code === 500) {
                if(json.type === 'create') {
                    alertMsg('fail',"增加失败");
                }else if(json.type == 'update') {
                    alertMsg('fail','更新失败');
                }

            }
        });

        // empty value
        self.elements[1].value= '';
        self.elements[2].value= '';
    }

    function newForm(targetId,json) {
        var target = document.getElementById(targetId);
        var tr = document.createElement('tr');
        var button = '<td data-id=' + json.data.id +'><button class="btn btn-primary">更新</button><button class="btn btn-danger">删除</button></td>'
        var td = '';

        td += '<td>' + json.data.id +'</td>'
        if(json.data.theme_name) {
            td += '<td>' + json.data.theme_name +'</td>'
        }else if(json.data.name) {
            td += '<td>' + json.data.name +'</td>'
        }

        tr.innerHTML = (td + button);

        target.appendChild(tr);
    }


    function updateForm(formId,json) {
        var form = document.getElementById(formId);
        var tds = form.getElementsByTagName('td');

        for (var i = 0; i < tds.length; i++) {
            if(parseInt(tds[i].innerHTML) === json.data.id) {
                console.log(i);
                if (json.data.theme_name) {
                    tds[i].nextElementSibling.innerHTML = json.data.theme_name;
                }else {
                    tds[i].nextElementSibling.innerHTML = json.data.name;
                }
            }
        }

    }


    function deleteTr(url,success,failed){
        var tr = this.parentNode.parentNode;

        fetch(url).then(function(res){
            return res.json()

        }).then(function(json){
            if(json.code === 200) {
                tr.style.height = 0;
                tr.parentNode.removeChild(tr);
                alertMsg(successMsg,success);
            }else if(json.code === 500){
                alertMsg(failedMsg,failed);
            }

        })
    }


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
