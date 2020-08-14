$(document).ready(function () {
    //For Searching 
    $('[data-search]').on('keyup', function () {

        var searchVal = $(this).val();
        var filterItems = $('[data-filter-item]');

        if (searchVal != '') {
            filterItems.addClass('searchhidden');
            $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('searchhidden');
            $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('pag-dis');
        } else {
            filterItems.removeClass('searchhidden');
            $('.page-item.active a').trigger('click');
        }
    });


    //For Pagination Script

    pageSize = 1;

    $(function () {
        var pageCount = $(".comment-row").length / pageSize;
        

        for (var i = 0; i < pageCount; i++) {
            if (i == 0)
                $(".pagination").append('<li class="page-item active"><a class="page-link" href="javascript:void(0)">' + (i + 1) + '</a></li>');
            else
                $(".pagination").append('<li class="page-item"><a class="page-link" href="javascript:void(0)">' + (i + 1) + '</a></li>');
        }


        showPage(1);

        $(".pagination li").click(function () {
            $('[data-search]').val('');
            $('[data-filter-item]').removeClass('searchhidden');
            $(".pagination li").removeClass("active");
            $(this).addClass("active");
            showPage(parseInt($(this).text()))
        });

    })

    showPage = function (page) {
       
        $(".comment-row").addClass("pag-dis");

        $(".comment-row").each(function (n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).removeClass("pag-dis");
        });
    }


    //Pagniation previous and next buttons

    $(".nex").click(function () {
        if ($(".pagination li").next().length != 0) {

            $(".page-item.active").next().addClass("active").prev().removeClass("active");
            $('.page-item.active a').trigger('click');

        }
        else {
            $(".pagination li").removeClass("active");
            $(".pagination li:first").addClass("active");

        };
        return false;
    });

    $(".pre").click(function () {
        if ($(".pagination li").prev().length != 0) {
            $(".page-item.active").prev().addClass("active").next().removeClass("active");
            $('.page-item.active a').trigger('click');
        }
        else {
            $(".pagination li").removeClass("active");
            $(".pagination li:last").addClass("active");
        };
        return false;
    });

    $(".page-item a").click(function () {
        if ($(".page-item.active").is(':last-child')) {
            $(".nex").addClass("pag-disable");
        } 
        else if ($(".page-item.active").is(':first-child')){
            $(".pre").addClass("pag-disable");
        }
        else {
            $(".nex").removeClass("pag-disable");
        }
    });
   



});//End Of Document