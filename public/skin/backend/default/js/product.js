/**
 * Created by Admin on 4/6/2016.
 */
var key_glo = 0;
PRODUCT = {
    tinymce:function(){
        var editor = CKEDITOR.replace( 'content' );
        editor.on( 'change', function( evt ) {
            $("#content").val(evt.editor.getData());
        });
    },
    uploadfile:function(){
        $("#fileuploader").uploadFile({
            url:"/backend/upload/index",
            fileName:"myfile",
            acceptFiles:"image/*",
            showPreview:true,
            onSuccess: function (files, response, xhr, pd) {
                var key = key_glo;
                if($('.delete-image-product').length == 0){
                    key = key_glo = 0;

                }
                $(".ajax-file-upload-filename").remove();
                $(".ajax-file-upload-progress").remove();
                $(".ajax-file-upload-preview").css('width', '40%');
                $(".ajax-file-upload-statusbar").css('position', 'relative');
                $(".ajax-file-upload-preview").after("<a class='delete-image-product fa fa-trash' id='delete_number_" + key + "' data-id='"+key+"' style='cursor: pointer'></a>");
                $('#image_add').append('<input type="text" name="image[]" hidden="true" id="number_'+key+'" value=\''+response+'\'>');
                $("#delete_number_" + key).parent(".ajax-file-upload-statusbar").attr('id', 'item_'+key);
                $("a.delete-image-product").prev('a.delete-image-product').remove();
                key_glo++;
                PRODUCT.hover_delete_upload();
                PRODUCT.delete_upload();
            },
        });
    },
    delete_upload:function(){
        $(".delete-image-product").click(function(){
            var id = $(this).attr('data-id');
            $("#number_"+id).remove();
            $("#item_"+id).remove();
        });

        $(".box-image-container i").click(function(){
            var id = $(this).attr('data-id');
            $(".remove_"+id).remove();
            PRODUCT.slider_reload();
            if($(".box-image-container").length == 0){
                $(".slider-image-upload").remove();
                $("#after_image").remove();
            }
        });
    },
    hover_delete_upload:function(){
        $(".ajax-file-upload-statusbar").hover(function(){
            $(this).children('.delete-image-product').show();
        },
        function(){
            $(this).children('.delete-image-product').hide();
        });

        $(".box-image-container").hover(function(){
            $(this).children('img').css('opacity','0.4');
            $(this).children('i').show();
        },
        function(){
            $(this).children('img').css('opacity','1');
            $(this).children('i').hide();
        });
    },
    slider_reload:function(){
        $('.bxslider2').bxSlider({
            maxSlides: 6,
            minSlides: 1,
            slideWidth: 100,
            slideMargin: 5,
            pager: false,
        }).reloadSlider();
    },
    ajax_product:function(){
        var url = '/backend/product/ajax';
        $(".col-md-12").html('<img src="/skin/common/oe/grid/img/loading.gif" />');
        $(".col-md-12").css('text-align','center');
        $.ajax({
            type: "POST",
            url: url,
            data: $('form').serialize(),
            success:function( msg ) {
                $(".col-md-12").html(msg);
            }
        });
    }
}

$(document).ready(function(){
    PRODUCT.hover_delete_upload();
    PRODUCT.delete_upload();
});

function change_page(e){
    $(e).append('<input name="page" hidden value="'+$(e).html()+'">');
    PRODUCT.ajax_product();
}