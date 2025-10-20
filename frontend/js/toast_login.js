function log_in_toastr(){
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "5000"
    };
        
$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); 
        var formData = {
            email: $('#e-mail').val(),
            password: $('#pass').val()
            };
        $.ajax({ 
            data: formData,
            success: function(response) {
                toastr.success('Your data has been saved successfully!');
                $('#loginForm')[0].reset();
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while saving the data.');
            }
        });
    });
});
}