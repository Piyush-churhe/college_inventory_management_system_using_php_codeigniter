$(document).ready(function() {
    $('.sidebar-toggle').on('click', function(e) {
        e.preventDefault();
        $('.left-sidebar').toggleClass('aside-margin');
        $('.wrapper-page').toggleClass('wrapper-margin');
        $(".footer").toggleClass("wrapper-margin");
    });
    $("#sidebar-toggle").on("click", function() {
        $(".left-sidebar").toggleClass("aside-margin-sm");
        $(".wrapper-page").toggleClass("wrapper-margin");
        $(".footer").toggleClass("wrapper-margin");
    });
    $(".toggle-sidebar-bars").click(function(event) {
        event.preventDefault();
        $(".left-sidebar").toggleClass("toggle-sidebar");
    });

    $(".slimscroll-left-sidebar").slimScroll({
        height: "100%",
        color: "#878787",
        disableFadeOut: true,
        borderRadius: 0,
        size: "3px",
        alwaysVisible: false
    });

    $(".uploaded_image").magnificPopup({
        delegate: "a",
        type: "image",
        gallery: {
            enabled: true
        }
    });

    $(".slimScrollNote").slimScroll({
        height: "325px",
        color: "#878787",
        disableFadeOut: true,
        borderRadius: 0,
        size: "4px",
        allowPageScroll: true,
        alwaysVisible: false
    });

    $('.datetimepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

    $(".switch-label").click(function() {
        $("#product_color")
            .val($(this).data("value"))
            .trigger("change");
        $(this).addClass("selected");
        $(this)
            .siblings()
            .removeClass("selected");
        $("#product_size")
            .val($(this).data("value"))
            .trigger("change");
        $(this).addClass("selected");
        $(this)
            .siblings()
            .removeClass("selected");
    });
    $(".js-example-basic-single").select2();
    $(".js-example-basic-multiple").select2();
    expandSidebarMenuItem();
    setMenuItemActive();
    setCalendar();
    setDataTable();
});



function expandSidebarMenuItem() {
    $(".sidebar-nav  ul  li  a").click(function() {
        var $target = $(this).parent();
        if ($target.hasClass("main")) {
            if ($target.hasClass("active")) {
                $target.removeClass("active");
            } else {
                $(".sidebar-menu > li").removeClass("active");
                $target.addClass("active");
            }
            if (!$(this)
                .closest("li")
                .find("ul")
                .children().length == 0) {
                return false;
            }
        }
    });
}

function setMenuItemActive() {
    $("li.main").click(function(e) {
        localStorage.setItem("thisLink", $(this).attr("data-id"));
        e.stopPropagation();
    });

    $(".navbar-brand, #loginBtn").click(function(e) {
        localStorage.setItem("thisLink", "dashboard");
        e.stopPropagation();
    });

    thisLink = localStorage.getItem("thisLink");
    if (thisLink) {
        $("#" + thisLink).addClass("active");
    }
}

//calendar
function setCalendar() {

    $("#calendar").fullCalendar({
        defaultDate: "2017-06-12",
        editable: true,
        events: [{
                title: "All Day Event",
                start: "2017-06-01"
            },
            {
                title: "Long Event",
                start: "2017-06-07",
                end: "2017-06-10"
            },
            {
                id: 999,
                title: "Repeating Event",
                start: "2017-06-09T16:00:00"
            },
            {
                id: 999,
                title: "Repeating Event",
                start: "2017-06-16T16:00:00"
            },
            {
                title: "Meeting",
                start: "2017-06-12T10:30:00",
                end: "2017-06-12T12:30:00"
            },
            {
                title: "Lunch",
                start: "2014-06-12T12:00:00"
            },
            {
                title: "Birthday Party",
                start: "2017-06-13T07:00:00"
            },
            {
                title: "Click for Google",
                url: "http://google.com/",
                start: "2017-06-28"
            }
        ]
    });
}

//datatable
function setDataTable() {
    $("#example, #example2").DataTable({
        buttons: [
            { extend: "csv", className: "datatable-buttons" },
            { extend: "excel", className: "datatable-buttons" },
            { extend: "pdf", className: "datatable-buttons" },
            { extend: "print", className: "datatable-buttons" }
        ],
        /*"dom": '<"top"i>rt<"bottom"flp><"clear">',*/
        // "dom": '<"top"i>rt<"bottom"flp><"clear">',
        dom: "<'row datatable-header'<'col-sm-6'Bl><'col-sm-6'f>>" +
            "<'row datatable-table'<'col-sm-12'tr>>" +
            "<'row datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "simple",
        paging: true, // pagintion
        ordering: true, // the reorder icons
        info: true, // info at the bottom
        bLengthChange: false, // the dropdown to set number of entry to show per page
        iDisplayLength: 10, // how many per page to show by default
        fnInfoCallback: function(
            oSettings,
            iStart,
            iEnd,
            iMax,
            iTotal,
            sPre
        ) {
            return iStart + "/" + iEnd + "  " + iTotal;
        }
    });
}

$("#user_image, #img_url").on("change", function() {
    if (typeof FileReader == "undefined") {
        alert("Your browser doesn't support HTML5, Please upgrade your browser");
    } else {
        var container = $(".file_prev");
        //remove all previous selected files
        container.empty();

        //create instance of FileReader
        var reader = new FileReader();
        reader.onload = function(e) {
            $("<img />", {
                src: e.target.result
            }).appendTo(container);
        };
        reader.readAsDataURL($(this)[0].files[0]);
    }
});

function previewImages() {
    var $preview = $(".image-preview");
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...
        var reader = new FileReader();
        $(reader).on("load", function() {
            $preview.append(
                "<span class='upload-wrapper'><span class='upload-wrapper-delete'>X</span><img src='" +
                this.result +
                "'></span>"
            );
        });
        reader.readAsDataURL(file);
        $(document).on("click", ".upload-wrapper-delete", function(e) {
            $(this)
                .parents(".upload-wrapper")
                .remove();
            $(this).remove();
        });
    }
}
$("#product_image").on("change", previewImages);

$("form").each(function() {
    $(this).validate({
        submitHandler: function(form) {
            var formval = form;
            var url = $(form).attr("action");

            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                // url: "crud/Add_userInfo",
                url: url,
                dataType:'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,                
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
               window.setTimeout(function() {location.reload();}, 2000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });
        }
    });
});