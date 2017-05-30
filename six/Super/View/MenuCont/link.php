<extend name="layout/layout" />

<block name="nav">
    <include file="MenuCont:nav" />
</block>

<block name="tab-content">
    
<present name="error">
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <strong>
        <i class="ace-icon fa fa-times"></i>
    </strong>
    {$error}
    <br>
</div>
</present>

<present name="message">
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <strong>
        <i class="ace-icon fa fa-check"></i>
    </strong>
    {$message}
     页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
    <br>
</div>
</present>

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form action="__SELF__" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <!-- #section:elements.form -->
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">显示顺序：</label>
                <div class="col-sm-2">
                   <input type="text" name="show_order" value="{$show_order}" class="col-xs-10 col-sm-6" placeholder="显示顺序">
                </div>
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">访问次数：</label>
                <div class="col-sm-2">
                   <input type="text" name="click_num" class="col-xs-10 col-sm-6" placeholder="访问次数">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"  for="form-field-1">标题：</label>
                <div class="col-sm-3">
                   <input type="text" name="title" class="col-xs-10 col-sm-12" placeholder="请输入标题">
                </div>
                <label class="col-sm-1 control-label no-padding-right"  for="form-field-1">作者：</label>
                <div class="col-sm-3">
                   <input type="text" name="writer" class="col-xs-10 col-sm-8" placeholder="请输入作者">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">选择图片：</label>

                <div class="col-sm-2">
                    <input type="file" placeholder="" name="pic" class="col-xs-10 col-sm-12"  />
                </div>
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">标签：</label>
                <div class="col-sm-3">
                   <input type="text" name="label" class="col-xs-10 col-sm-12" placeholder="标签">
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="form-field-1">显示状态：</label>
                <div class="col-sm-2">
                    <div class="radio">
                        <label>
                            <input class="ace" checked name="state" type="radio" value="1">
                            <span class="lbl"> 显示</span>
                        </label>
                        <label>
                            <input class="ace" name="state" type="radio" value="0">
                            <span class="lbl"> 隐藏</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">摘要：</label>
                <div class="col-sm-10">
                    <textarea name="abstract" cols="110" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1" >内容：</label><div class="col-sm-10"><script id="editor" type="text/plain" name="cont" style="width:800px;height:500px;"></script></div>
            </div>
            <script>
                var ue = UE.getEditor('editor');
            </script>

            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">注册时间：</label>
                <div class="col-sm-2" style="margin-top:10px">
                   系统自动添加
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">添加人：</label>
                <div class="col-sm-2" style="margin-top:10px">
                  {$Think.session.s_name}
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        提交
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>
            
        </form> 
    </div><!-- /.col -->
</div><!-- /.row -->
</block>


<block name="scripts">

<script type="text/javascript">
var nowTemp = new Date();

    $('#apply_start').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#apply_over').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#start').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });
    $('#over').fdatepicker({
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    });

    window.onload=function(){
    var one=document.getElementById('one');
    var twor=document.getElementById('two');
    var two=twor.getElementsByTagName('option');
    var a=one.getElementsByTagName('option');
    document.getElementById("one").onchange=function(){
        var v = one.value;
        if (v==a[0].value) {
            two[2].style.display="block";
        }else{
            two[2].style.display="none";
        }
    }

    twor.onchange=function(){
        var vv = twor.value;
        if (vv==two[3].value) {
            for (var i = 1; i < a.length; i++) {
            a[i].style.display="none";
            }
        }else{
            for (var i = 1; i < a.length; i++) {
            a[i].style.display="block";
            }
        }
    }
}

(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();

</script>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();
</script>
</block>
