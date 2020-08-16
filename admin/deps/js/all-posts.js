$(document).ready(function () {
    // ==============================================================
    // Search bar Script
    // ==============================================================

    $("[data-search]").on("keyup", function () {
        var searchVal = $(this).val();
        var filterItems = $("[data-filter-item]");

        if (searchVal != "") {
            filterItems.addClass("searchhidden");
            $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass("searchhidden");
            $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass("pag-dis");
        } else {
            filterItems.removeClass("searchhidden");
            $(".page-item.active a").trigger("click"); //trigger pagination box when search val empty
        }
    });

    // ==============================================================
    // For Pagination Script
    // ==============================================================

    pageSize = 2;

    $(function () {
        var pageCount = $(".comment-row").length / pageSize;

        for (var i = 0; i < pageCount; i++) {
            if (i == 0) {
                $(".pagination").append('<li class="page-item active"><a class="page-link" href="javascript:void(0)">' + (i + 1) +
                    "</a></li>"
                );
                $(".pre").addClass("pag-disable"); // For adding Arrow disable on load
            } else {
                $(".pagination").append('<li class="page-item"><a class="page-link" href="javascript:void(0)">' + (i + 1) +
                    "</a></li>"
                );
            }
        }

        showPage(1);

        $(".pagination li").click(function () {
            $("[data-search]").val(""); // Search Bar Val empty on click pagination box
            $("[data-filter-item]").removeClass("searchhidden"); // unhide all post cads key on search box
            $(".pagination li").removeClass("active");
            $(".pre").removeClass("pag-disable"); // For Removing Arrow disable
            $(this).addClass("active");
            showPage(parseInt($(this).text()));
        });
    });

    showPage = function (page) {
        $(".comment-row").addClass("pag-dis");

        $(".comment-row").each(function (n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).removeClass("pag-dis");
        });
    };

    //Pagniation previous and next buttons

    $(".nex").click(function () {
        if ($(".pagination li").next().length != 0) {
            $(".page-item.active").next().addClass("active").prev().removeClass("active");
            $(".page-item.active a").trigger("click");
        } else {
            $(".pagination li").removeClass("active");
            $(".pagination li:first").addClass("active");
        }
        return false;
    });

    $(".pre").click(function () {
        if ($(".pagination li").prev().length != 0) {
            $(".page-item.active").prev().addClass("active").next().removeClass("active");
            $(".page-item.active a").trigger("click");
        } else {
            $(".pagination li").removeClass("active");
            $(".pagination li:last").addClass("active");
        }
        return false;
    });

    $(".page-item a").click(function () {
        //Pagniation previous and next buttons disable Condition
        if ($(".page-item.active").is(":last-child")) {
            $(".pre").removeClass("pag-disable");
            $(".nex").addClass("pag-disable");
        } else if ($(".page-item.active").is(":first-child")) {
            $(".nex").removeClass("pag-disable");
            $(".pre").addClass("pag-disable");
        } else {
            $(".pre").removeClass("pag-disable");
            $(".nex").removeClass("pag-disable");
        }
    });


    //For delete Post data in database


    //for page reload call
    function arUpdateDiv() {
        setTimeout(function() {
            location.reload(true);
        }, 1000);
    }
    $(".comment-widgets :checkbox").change(function() {
        $(this).parent().parent().toggleClass('ar_ps_del');
    });
    $("#mainCheckbox:checkbox").change(function() {
        $(".pag-dis #posdel").prop("checked", false);

        


        $(".comment-row").toggleClass('ar_ps_del');
    }); //Functions for toggle classes during checkbox select

    $('#pos_delete').on('click', function(e) {
        e.preventDefault();
        var posdelbtn = $('#pos_delete').val();
        var poscheckbx = [];

        $("#posdel:checked").each(function() {
            poscheckbx.push(this.value);
        });
        if (poscheckbx.length !== 0) {
            $.ajax({
                type: "POST",
                url: 'inc/ajax-handler.php',
                data: {
                    "posdelbtn": posdelbtn,
                    "poscheckbx": poscheckbx
                },

                success: function(response) {
                    //$( "#posdel:checked" ).addClass( "posdelcolor" );
                    if (response == "YES") {
                        $(".ar_ps_del").addClass("delcolor");
                        arUpdateDiv();
                    } else {
                        alert(response);
                    }

                },
                cache: false,
            });
            return false;
        } else {
            alert("Please select one to delete");
        }


    });
    //End of delete post data in database

    // ==============================================================
    //
    // ==============================================================
}); //End Of Document