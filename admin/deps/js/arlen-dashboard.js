$(document).ready(function() {

      //For Login Page
      $('#arlogsub').on('click', function(e) {
        e.preventDefault();
        $("#arlogsub").attr("disabled", "disabled");
        var arusername =  $("#aruser").val();
        var arpass = $("#arpass").val();
        var arlogsub = $("#arlogsub").val();


        if (arusername == "" || arpass == "") {
            $('#arlogresponse').html("<p class='field_empty'>!All fields are required</p>").fadeIn(500).delay(4000).fadeOut("slow");
            $("#arlogsub").removeAttr("disabled");
            
        } else {
            $(".load-wrapp").show();
            $.ajax({
                type: "POST",
                url: 'admin/inc/ajax-handler.php',
                data: {
                    "arlogsub": arlogsub,
                    "arusername": arusername,
                    "arpass": arpass
                    
                },

                success: function(response) {
                    $(".load-wrapp").hide();
                    if (response === "true"){
                        window.location.href = "admin/home.php";
                    }
                    else {
                        $('#arlogresponse').html("<p class='field_res'>" + response + "</p>").fadeIn(500).delay(5000).fadeOut("slow");
                    } 
                    $("#arlogsub").removeAttr("disabled");
                    //$('#arloginform')[0].reset();
                  

                },
                cache: false,
            });
            return false;
            
        }
    });
    
   
    // ============================================================== 
    // Password  visibility
    // ============================================================== 
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#arloginform").hide();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#arloginform").fadeIn();
    });

    // End of login page



    //Dashboard script
    $(function() {
        "use strict";

        $(".preloader").fadeOut();
        // ============================================================== 
        // Theme options
        // ==============================================================     
        // ============================================================== 
        // sidebar-hover
        // ==============================================================

        $(".left-sidebar").hover(
            function() {
                $(".navbar-header").addClass("expand-logo");
            },
            function() {
                $(".navbar-header").removeClass("expand-logo");
            }
        );
        // this is for close icon when navigation open in mobile view
        $(".nav-toggler").on('click', function() {
            $("#main-wrapper").toggleClass("show-sidebar");
            $(".nav-toggler i").toggleClass("ti-menu");
        });
        $(".nav-lock").on('click', function() {
            $("body").toggleClass("lock-nav");
            $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
            $("body, .page-wrapper").trigger("resize");
        });
        $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
            $(".app-search").toggle(200);
            $(".app-search input").focus();
        });

        // ============================================================== 
        // Right sidebar options
        // ==============================================================
        $(function() {
            $(".service-panel-toggle").on('click', function() {
                $(".customizer").toggleClass('show-service-panel');

            });
            $('.page-wrapper').on('click', function() {
                $(".customizer").removeClass('show-service-panel');
            });
        });
        // ============================================================== 
        // This is for the floating labels
        // ============================================================== 
        $('.floating-labels .form-control').on('focus blur', function(e) {
            $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
        }).trigger('blur');

        // ============================================================== 
        //tooltip
        // ============================================================== 
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        // ============================================================== 
        //Popover
        // ============================================================== 
        $(function() {
            $('[data-toggle="popover"]').popover();
        });

        // ============================================================== 
        // Perfact scrollbar
        // ============================================================== 
        $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
            wheelPropagation: !0
        });


        // ============================================================== 
        // Resize all elements
        // ============================================================== 
        $("body, .page-wrapper").trigger("resize");
        $(".page-wrapper").show();


        //=========================================================
        /* This is for the mini-sidebar if width is less then 1170*/
        //=========================================================
        var setsidebartype = function() {
            var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
            if (width < 1170) {
                $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
            } else {
                $("#main-wrapper").attr("data-sidebartype", "full");
            }
        };
        $(window).ready(setsidebartype);
        $(window).on("resize", setsidebartype);
        //==================================================
        /* This is for sidebartoggler*/
        //==================================================
        $('.sidebartoggler').on("click", function() {
            $("#main-wrapper").toggleClass("mini-sidebar");
            if ($("#main-wrapper").hasClass("mini-sidebar")) {
                $(".sidebartoggler").prop("checked", !0);
                $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
            } else {
                $(".sidebartoggler").prop("checked", !1);
                $("#main-wrapper").attr("data-sidebartype", "full");
            }
        });
    });


});