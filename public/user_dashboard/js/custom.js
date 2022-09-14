$(".mobile_menu_trigger").click(function() {
    $('.sidebar_container').addClass('show_sidebar');
    $('body').addClass('overlay');

})

$(".side_bar_close").click(function() {
    $('.sidebar_container').removeClass('show_sidebar');
    $('body').removeClass('overlay');

})

$(function($) {
    var path = window.location.href;
    $(".sidebar_dashboard ul>li> a").each(function() {
        if (this.href === path) {
            $(this).parent().addClass("active");
        }
    });
});


$("#redemption a").click(function() {
    var id = this.id;

    loadMusic(id);
    // Assign the id to a custom attribute called data-id
    $("#printing_div").attr("data-id", id);
 
    return false;
 });
