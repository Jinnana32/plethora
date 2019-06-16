$(document).ready(function(){

    showLeadGen();
    var leadModal = $("#lead_generation");
    var lead_action = $(".lead_action");
    var lead_body = $(".lead_body");
    var lead_contact = $(".lead-contact");
    var lead_message = $(".lead_message");

    function showLeadGen(){
        setTimeout(function(){
            showGen()
        }, 10000)
    }

    function showGen(){
        leadModal.modal("show")
        setTimeout(showGen, 50000)
    }

    lead_action.on("click", function(){
        lead_message.html($(this).html())
        lead_body.html(lead_contact.html())
    })

})