// $('#modalButton').on('click', function(){
//     if ($('#modal').data('bs.modal').isShown) {
//         $('#modal').find('#modalContent')
//             .load($(this).attr('value'));
//         document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
//     } else {
//         //if modal isn't open; open it and load content
//         $('#modal').modal('show')
//             .find('#modalContent')
//             .load($(this).attr('value'));
//         //dynamiclly set the header for the modal
//         document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
//     }
// })
// $(document).ready(function() {
//     // Attach click event to the modal button
//     $('#modalButton').on('click', function() {
//         var url = $(this).attr('value');
//
//         // Make an AJAX request to fetch the modal content
//         $.ajax({
//             url: url,
//             type: 'get',
//             success: function(response) {
//                 // Set the fetched content to the modal body
//                 $('#modal').modal('show');
//                 $('#modalContent').html(response);
//             }
//         });
//     });
// });