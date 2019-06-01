var phrLoader = $("#loading-modal")
var phrErrorLoader = $("#error-dialog")
var phrSuccessLoader = $("#success-dialog")

/* Success Dialogs */
function showSuccess(title, message){
    var sucess_title = $('.success-dialog-title');
    var success_message = $('.success-dialog-message');

    sucess_title.html(title)
    success_message.html(message)

    phrSuccessLoader.modal('show')
}

function hideSuccess(){
    phrSuccessLoader.modal('hide')
}

/* Error Dialog */
function showError(title, message){
    var error_title = $('.error-dialog-title');
    var error_message = $('.error-dialog-message');

    error_title.html(title)
    error_message.html(message)

    phrErrorLoader.modal('show')
}

function hideError(){
    phrErrorLoader.modal('hide')
}

/* Loading dialog */
function showLoading(){
    phrLoader.modal('show')
}

function hideLoading(){
    phrLoader.modal('hide')
}

function resetField(form){
    form.trigger("reset");
}