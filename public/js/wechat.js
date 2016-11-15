const cheerio = require('cheerio');
const request = require('superagent');
const EventEmitter = require('events');
const fs = require('fs');
const he = require('he');
// const Gzh = require('./orm/gzj.js');

var spider = {
    preFetch: preFetch,
    name : null,
    index: 0,
    entryUrl: null,
    Gzh: {},
    articles: [],
    currentGzh: null,
    historyUrl: null,
    getHistoryUrl: getHistoryUrl,
    getArticleUrl: getArticleUrl,
    init: init,
    start: start,
}

spider.preFetch();

function start() {
    var len = this.name.length;
    if(this.index >= len) return console.log('DONE!!!');
    // sleep(1000 * 30)
    this.Gzh = {};
    this.articles = [];
    this.currentGzh = this.name[this.index];
    this.entryUrl = getEntryUrl(this.currentGzh);
    this.getHistoryUrl();
}

function preFetch(){
    var api = 'spider/gzh/all';
    var self = this;
    request.get(api)
        .end(function (err,res) {
            if(err) return console.log(res.text);

            var data = res.json();
            var temp = [];

            for (var i = 0; i < data.data.length; i++) {
                temp.push(data.data[i].name )
            }

            self.name = data;
            start();
        })
}


function init() {
    sleep(1000 * 30)
    this.start();
}



function getEntryUrl(value){
    return encodeURI('http://weixin.sogou.com/weixin?type=1&query=' + value);
}

function getArticleUrl(){
        var self = this;

        request.get(self.historyUrl)
        .set("User-Agent", "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22")
        .set("Accept","text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8")
        .set("Accept-Encoding","gzip, sdch, br")
        .set("Accept-Language","en-US,en;q=0.8,zh-CN;q=0.6,zh;q=0.4,ja;q=0.2,de;q=0.2")
        .end(function(err,res){
            if(err) {
                console.log(err)
                sleep(1000 * 30);
                return self.getArticleUrl();
            };

            $ = cheerio.load(res.text);
            var history = $('#history');

            if(history.length !== 1) {
                console.log('遇到验证码,再来');
                sleep(1000 * 5);
                return self.getArticleUrl();
            }else {

                var articleArr = getArticleArr();
                // console.log(articleArr);
                // handle string to object
                articleArr.forEach(function (item) {
                    var article = clean(item)
                    self.articles.push(article);

                    subArticles = item.app_msg_ext_info.multi_app_msg_item_list;
                    if(subArticles.length !== 0) {
                        subArticles.forEach(function(sub){
                            var subArticle = cleanSub(sub);
                            subArticle.time = article.time;
                            self.articles.push(subArticle);
                        })
                    }
                });

                var storeUrl = "http://www.gatherAdmin.com/";

                self.Gzh.name = self.currentGzh;
                // self.Gzh.historyUrl = self.historyUrl;
                self.Gzh.articles = self.articles;


                var gzh = {
                    gzh: self.Gzh
                }
                console.log(gzh);

                // console.log('===== 取到' + self.Gzh.name + '的最近历史链接=====');
                // var gzhJson = JSON.stringify(gzh);
                //
                // request.post(storeUrl + 'spider/article/store')
                // .set('Content-Type','application/json')
                // .send(gzhJson)
                // .end(function (err,res) {
                //      if(err) return console.log(err);
                // })
                // return self.init();
            }

        })
}


function getHistoryUrl(){
    var self = this;

    request.get(self.entryUrl)
        .set("User-Agent", "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22")
        .set("Accept","text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8")
        .set("Accept-Encoding","gzip,sdch, br")
        .set("Accept-Language","en-US,en;q=0.8,zh-CN;q=0.6,zh;q=0.4,ja;q=0.2,de;q=0.2")
        .end(function(err,res){
            if(err) return console.log(err);

            $ = cheerio.load(res.text);
            var resultsList = $('.results .wx-rb');

            self.index++

            var result = getMatched(self.currentGzh,resultsList)
            if(typeof result !== 'undefined') {
                // 成功,拿到历史消息url
                // 异步进行下一步，去拿历史消息
                self.historyUrl = result;
                // console.log(result);
                self.getArticleUrl();
            }else {
                // 失败，跳过，下一条???
                console.log('跳过，下一条');
                // console.log(res.text);
                // throw new Error('失败')
                return self.init()
            }

        })
}


// public
function getMatched(name,resultsList){
    var regex = new RegExp('^' + name + '{1}$')
    var temp ;

    for(var i = 0; i < resultsList.length; i++) {
        var el = resultsList[i];
        var historyUrl =  $(el).attr('href');
        var gzhName = $(el).find('.txt-box h3').text().trim();

        if(regex.test(gzhName)){
            return temp = historyUrl;
        }else {
            return temp = undefined;
        }

    }
}

function getArticleArr(){
    var scripts = $('script');
    script = scripts.eq(-1).text();
    var startTxt = 'msgList = '
    var start = script.indexOf(startTxt);
    var end = script.indexOf('seajs.use');

    var finalTxt = script.slice(start + startTxt.length + 1, end).trim();
    var finalTxt = finalTxt.slice(0,finalTxt.length - 2);
    var decoded = he.decode(finalTxt);
    var artileArr = JSON.parse(decoded).list;
    return artileArr;
}

function sleep(ms) {
    var start = new Date();
    var curDate = null;
    do {curDate = new Date();}
    while ( curDate - start < ms);
}

function getToday(ms){
    var ms = ms || Date.now()
    var now = new Date(ms);
    var year = now.getFullYear();
    var month = now.getMonth();
    var day = now.getDate();
    return year + '-' + (month + 1) + '-' + day
}

function clean(perArticle) {
    var article = {};
    var base = 'http://mp.weixin.qq.com/';
    article.title = perArticle.app_msg_ext_info.title;
    article.time = getToday(perArticle.comm_msg_info.datetime * 1000);
    article.contentUrl = base + (he.decode(perArticle.app_msg_ext_info.content_url)).slice(2);
    return article;
}

function cleanSub(perArticle) {
    var base = 'http://mp.weixin.qq.com/';
    var article = {};
    article.title = perArticle.title;
    article.contentUrl = base + (he.decode(perArticle.content_url)).slice(2);
    return article;
}
