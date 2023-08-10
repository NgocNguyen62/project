$(document).ready(function () {
    var url;
    // Handle the click event of the "Rate Product" links
    $(document).on('click', '.openRateModal', function (e) {
        e.preventDefault();

        // Get the URL of rate.php from the link's href attribute
        // var rateUrl = $(this).attr("href");
        var rateUrl = $(this).data("url");
        url = rateUrl;
        // Get the target modal ID from the link's data-target attribute
        var modalId = $(this).data("target");

        // Use AJAX to load the content of rate.php into the modal
        $.ajax({
            url: rateUrl,
            type: "GET",
            success: function (response) {
                // setTimeout(function () {
                //     self.$("#modal-button-close").trigger("click");
                // }, 4800);
                // Set the loaded content into the modal body
                $(modalId).find(".modal-body").html(response);

                // Show the modal
                $(modalId).modal("show");
            },
            error: function (xhr, status, error) {
                // Handle the error if needed
                alert("An error occurred. Please try again later.");
            }
        });
    });

    $(document).on('click', '#modal-button-close', function(e) {
        $('#rateModalContent').modal('hide');
    })
    $(document).on('click', '#modal-backdrop', function(e) {
        $('#rateModalContent').modal('hide');
    })

    $(document).on("hidden.bs.modal", function () {
        location.reload(true);
        // $('body').css('margin', 0);
        // $('body').css('padding-right', 0);
    });
});