$(function() {
    $('#mycarousel').carousel();

    /* activate the category_add and category modals */
    $(".category-list").click(function(){
        $("#pinside").text($(this).text());
        $("#show-category").modal('show');
    });
    $(".btn-add").click(function(){
        $("#add-category").modal('show');
    });
});
