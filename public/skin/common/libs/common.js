/**
 * Created by Admin on 3/18/2016.
 */

COMMON = {
    hover_menu:function() {
        $(".lst-category a li").hover(function () {
            var h = $(this).offset().top - $(".content-box").offset().top;
            var hide = $(this).children('div');
            hide.css('display','block');
            var li_this = this;
            var id = $(this)[0].id;
            $('.'+id).css('top', h/2);
            $('.'+id).show();
            $(li_this).css('border-bottom','1px solid #DCDEE3');
            $(li_this).css('border-top','1px solid #DCDEE3');
            $('.'+id).hover(function(){
                $(this).show();
                hide.css('display','block');
                $(li_this).css('border-bottom','1px solid #DCDEE3');
                $(li_this).css('border-top','1px solid #DCDEE3');
            },
            function(){
                $(this).hide();
                hide.css('display','none');
                $(li_this).css('border-bottom','0');
                $(li_this).css('border-top','0');
            }
            );
        },
        function () {
            $(this).children('div').css('display','none');
            var id = $(this)[0].id;
            $('.'+id).hide();
            var li_this = this;
            $(li_this).css('border-bottom','0');
            $(li_this).css('border-top','0');
        }
        );
    },

    show_hide_cate:function(){
        $(".li-category i").click(function(){
            var parent = $(this).parent('.li-category')[0];
            if($(this).hasClass('fa-plus')) {
                $(parent).find('.category-level1, .category-level2').show();
                $(this).removeClass('fa-plus');
                $(this).addClass('fa-minus');
                return false;
            }
            if($(this).hasClass('fa-minus')) {
                $(parent).find('.category-level1, .category-level2').hide();
                $(this).removeClass('fa-minus');
                $(this).addClass('fa-plus');
                return false;
            }
        });
    },
    filter_cate:function(){
        $(".filter-shop").click(function(){
            var i = $(this).find('i')[0];
            $('.filter-shop i').addClass('fa-link');
            $(i).removeClass('fa-link');
            $(i).addClass('fa-check');
        });
    },
    check_login:function(){
        $("#sm-login").click(function(){
            $.ajax({
                type: "POST",
                url: '/user/login',
                data: $("#frm-login").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#myLogin .modal-body #ms-error").remove();
                    if(data != ''){
                        $("#myLogin .modal-body").prepend('<p id="ms-error" style="color: red">'+data+'</p>');
                    }else{
                        $("#myLogin .modal-body #ms-error").remove();
                        window.location.reload();
                    }
                }
            });
        });
    },
    register:function(){
        $("#sm-register").click(function(){
            $("#err-register").remove();
            $.ajax({
                type: "POST",
                url: '/user/register',
                data: $("#frm-register").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    if(data != true) {
                        data = JSON.parse(data);
                        for (var index in data) {
                            var attr = data[index];
                            $("input#" + index).after('<p id="err-register" style="color: red;">' + attr + '</p>')
                        }
                    }else{
                        window.location.reload();
                    }
                }
            });
        });
    }
}

$(document).ready(function(){
    COMMON.hover_menu();
    COMMON.show_hide_cate();
    COMMON.filter_cate();
    COMMON.check_login();
    COMMON.register();
});