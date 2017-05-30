 function toP(){
    $.post("<?php echo $Think.const.SITE_URL;?>index.php/Super/Pcd/toP", {param1: 'value1'}, function(data) {
        $("#toP").html(data);
        $("#p").change(function(event) {
            var pid=$(this).val();
            $.post("{$Think.const.SITE_URL}index.php/Super/Pcd/toC", {id: pid}, function(data) {
                $("#toC").html(data);
                $("#c").change(function(event) {
                    var cid=$(this).val();
                    $.post("{$Think.const.SITE_URL}index.php/Super/Pcd/toD", {id: cid}, function(data) {
                        $("#toD").html(data);
                    });
                });
            });

        });
    });
}