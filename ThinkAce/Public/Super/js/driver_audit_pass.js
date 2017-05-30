/**
 * Created by Administrator on 2016/7/9.
 */
jQuery(document).ready(function() {

    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
        var th_checked = this.checked;//checkbox inside "TH" table header

        $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
        });
    });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
        var $row = $(this).closest('tr');
        if(this.checked) $row.addClass(active_class);
        else $row.removeClass(active_class);
    });

    /**
     * 删除按钮警告提示
     */

    $('.delete-btn').click(function(e) {
        if (confirm('您确定要执行此操作吗？请慎重！') == false) {
            return false;
        }
    });

    $('.audit-checked').click(function(e) {
        var checkbox = $('#simple-table > tbody > tr > td input[type=checkbox]:checked');
        if (!checkbox.length) {
            alert('您还没有选中任何数据！');
            return false;
        }
        if (confirm('您确定要执行此操作吗？请慎重！') == false) {
            return false;
        }
        var ids = new Array();
        checkbox.each(function () {
            ids.push([$(this).val()]);
        });
        var href = "/index.php/Super/ManagerDriver/auditBatch/ids" + '/' + ids;
        location.href = href;
    });
});
function audit(a){
    if (confirm('您确定要执行此操作吗？请慎重！') == false) {
        return false;
    }
    var driver_id = $(a).attr('driver_id');
    $.ajax({
        url:'/index.php/Super/ManagerDriver/audit',
        method:'POST',
        data:{
            id:driver_id
        },
        error:function(){
            alert('出错了！！！');
        },
        success:function(data){
            if(data==200){
                alert('审核通过!');
                location.reload();
            }
        }
    })
}
function auditReject(a){
    if (confirm('您确定要执行此操作吗？请慎重！') == false) {
        return false;
    }
    var driver_id = $(a).attr('driver_id');
    $.ajax({
        url:'/index.php/Super/ManagerDriver/auditReject',
        method:'POST',
        data:{
            id:driver_id
        },
        error:function(){
            alert('出错了！！！');
        },
        success:function(data){
            if(data==200){
                alert('审核不通过!');
                location.reload();
            }
        }
    })
}
function getDateTimePicker(a){
    var id = $(a).attr('picker_id');
    $('#start_time_'+id).datetimepicker({
        locale: 'zh-cn',
        format: 'YYYY-MM-DD HH:mm:ss',
    });
    $('#over_time_'+id).datetimepicker({
        locale: 'zh-cn',
        format: 'YYYY-MM-DD HH:mm:ss'
    });
}
function changeStatus(a){
    var user_id = $(a).attr('id');
    var status = $("#change_status_"+user_id+" input[name='status_"+user_id+"']:checked").val();
    var action = $('#action_'+user_id).val();
    var start_time = $('#start_time_'+user_id).val();
    var over_time = $('#over_time_'+user_id).val();
    if(start_time >= over_time){
        $('#change_status_'+user_id).modal('hide');
        $('#change_status .modal-body').html('<div class="alert alert-danger" role="alert">开始时间不能大于或等于结束时间！</div>');
        $('#change_status').modal('show');
        return false;
    }
    if(action==''){
        $('#change_status_'+user_id).modal('hide');
        $('#change_status .modal-body').html('<div class="alert alert-danger" role="alert">请填写原因！</div>');
        $('#change_status').modal('show');
        return false;
    }
    $.ajax({
        url:'/index.php/Super/ManagerDriver/changeStatus',
        method:'POST',
        data:{
            id    : user_id ,
            status: status,
            start_time:start_time,
            over_time:over_time,
            action:action
        },
        error:function(){
            alert('系统错误，请联系管理员！')
        },
        success:function(data){
            if(data==200){
                $('#change_status_'+user_id).modal('hide');
                $('#change_status .modal-body').html('<div class="alert alert-success" role="alert">用户状态设定成功！</div>');
                $('#change_status').modal('show');
            }else{
                $('#change_status_'+user_id).modal('hide');
                $('#change_status .modal-body').html('<div class="alert alert-danger" role="alert">用户状态未改变,请重新设定！</div>');
                $('#change_status').modal('show');
                return false;
            }
            setInterval('location.reload()',1500);
        }
    });
}