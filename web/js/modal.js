$(document).ready(function() {
    // Get the modal
    var modal = $("#myModal");

    // Get the button that opens the modal
    var btn = $("#myBtn");

    // When the user clicks on the button, open the modal
    btn.click(function(e) {
        e.preventDefault();
        // Get the URL from the "data-url" attribute of the button
        var popupUrl = $(this).data("url");
        console.log(popupUrl)

        // Load the content into the modal body and show the modal
        modal.modal('show').find('.modal-body').load(popupUrl);
    });

    // When the user clicks on <span> (x) or outside of the modal, close the modal
    modal.on("hidden.bs.modal", function() {
        modal.find(".modal-body").empty();
    });
});
