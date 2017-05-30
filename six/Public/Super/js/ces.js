/*
PS：
两种情况：
（1）
  域名/文件夹/控制器/方法/
  
（2）
  域名/文件夹/控制器/方法/参数名称/参数值

  说明：需要在nav.html 的ul 里加个id="ces".
*/
// 获取地址栏地址，并进行兼容调试
var href=window.location.href;
var href=href.replace('?','/');
var href=href.replace('&','/');
var href=href.replace('=','/');
var arr=href.split('/');
// 循环遍历左侧菜单并判断是否带有参数
$(".submenu>li").each(function(index, el) {
    // 获取地址
    var need_a=$(this).children('a').attr("href");
    var need_a=need_a.split('/');
    // 不带参数
    if(need_a.length<=6){
        var need_a=need_a[2]+"/"+need_a[3]+"/"+need_a[4];
        var href_a=arr[2]+"/"+arr[3]+"/"+arr[4];
        // 左侧判断是否相等
        if(need_a == href_a){
            $(this).addClass('active');
            $(this).parents('ul').parents('li').addClass('open');
            // 执行顶部遍历判断
           $("#ces>li").each(function(index, el) {
               var need_b=$(this).children('a').attr("href");
               var need_b=need_b.split('/');
               var need_b=need_b[2]+"/"+need_b[3]+"/"+need_b[4]+"/"+need_b[5];
               var href_b=arr[2]+"/"+arr[3]+"/"+arr[4]+"/"+arr[5];
                if(need_b == href_b){
                    $(this).removeClass('hidden');
                    $(this).addClass('active');
                }
           });
        }
    }
    // 带参传递，限制一位参数匹配
    else{
        var need_a=need_a[6]+"/"+need_a[7];
        var href_a=arr[6]+"/"+arr[7];
        // 左侧判断是否相等
        if(need_a == href_a){
            $(this).addClass('active');
            $(this).parents('ul').parents('li').addClass('open');
            // 执行顶部遍历判断
            $("#ces>li").each(function(index, el) {
               var need_b=$(this).children('a').attr("href");
               var need_b=need_b.split('/');
               var need_b=need_b[2]+"/"+need_b[3]+"/"+need_b[4]+"/"+need_b[5];
               var href_b=arr[2]+"/"+arr[3]+"/"+arr[4]+"/"+arr[5];
                if(need_b == href_b){
                    $(this).removeClass('hidden');
                    $(this).addClass('active');
                }
           });
        }
    }
    
});
// end