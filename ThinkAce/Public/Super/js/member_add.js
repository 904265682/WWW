jQuery(document).ready(function() {

    $('#pic_head').ace_file_input({
        style:'well',
        btn_choose:'请选择一个图片上传',
        btn_change:null,
        no_icon:'ace-icon fa fa-cloud-upload',
        droppable:true,
        thumbnail:'fit'//large | fit
        //,icon_remove:null//set null, to hide remove/reset button
        /**,before_change:function(files, dropped) {
				//Check an example below
				//or examples/file-upload.html
				return true;
			}*/
        /**,before_remove : function() {
				return true;
			}*/
        ,
        allowExt: ["jpeg", "jpg", "png", "gif"],
        allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif"],
        preview_error : function(filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            //alert(error_code);
        }

    }).on('change', function(){
        // console.log($(this).data('ace_input_files'));
        // console.log($(this).data('ace_input_method'));
    });

    $('#pic_live').ace_file_input({
        style:'well',
        btn_choose:'请选择一个图片上传',
        btn_change:null,
        no_icon:'ace-icon fa fa-cloud-upload',
        droppable:true,
        thumbnail:'fit'//large | fit
        //,icon_remove:null//set null, to hide remove/reset button
        /**,before_change:function(files, dropped) {
				//Check an example below
				//or examples/file-upload.html
				return true;
			}*/
        /**,before_remove : function() {
				return true;
			}*/
        ,
        allowExt: ["jpeg", "jpg", "png", "gif"],
        allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif"],
        preview_error : function(filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            //alert(error_code);
        }

    }).on('change', function(){
        // console.log($(this).data('ace_input_files'));
        // console.log($(this).data('ace_input_method'));
    });

    $('.pic-edit .btn-change-pic').click(function () {
        $('.pic-edit').hide();
        $('.pic-upload').removeClass('hidden');
    });


});