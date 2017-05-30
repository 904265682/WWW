/**
 * Created by Administrator on 2016/7/9.
 */
var order_id = '';
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

    $('#batch_order').click(function(e) {
        var checkbox = $('#simple-table > tbody > tr > td input[type=checkbox]:checked');
        if (!checkbox.length) {
            alert('您还没有选中任何数据！');
            $('#order_batch_distribute').modal('hide');
            return false;
        }
        var ids = new Array();
        checkbox.each(function () {
            ids.push([$(this).val()]);
        });
        var driverId = $('#driverId').val();
        var href = "/index.php/Super/Order/driverDistributeBatch/ids" + '/' + ids+'/driverId/'+driverId;
        location.href = href;

    });
    $('#order_distribute_confirm').click(function(e){
        var dirver_id = $('#driver_id').val();
        if(!dirver_id){
            alert('请选择司机');
            return false;
        }
        $.ajax({
            url:'/index.php/Super/Order/driverDistribute',
            method:'POST',
            data:{
                id:order_id,
                driver_id:dirver_id
            },
            error:function(){
                alert('系统错误，请联系管理员！');
            },
            success:function(data){
                if(data==200){
                    alert('分配成功');
                    location.reload();
                }else{
                    alert('分配失败，请重新分配');
                }
            }
        });
    });
});
function distribute(obj){
    order_id = $(obj).attr('order_id');
}