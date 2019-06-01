$(document).ready(function(){

    var profileEdit = $(".profile-edit");
    var phrEditBackdrop = $("#phr-edit-backdrop");
    var subMastInfo = $(".sub-mast-info");

    // input fields current value
    var editName = $(".edit-name");
    var editAddress = $(".edit-address");
    var editContact = $(".edit-contact");
    var editEmail = $(".edit-email");

    var editNameValue = $(".edit-name").html();
    var editAddressValue = $(".edit-address").html();
    var editContactValue = $(".edit-contact").html();
    var editEmailValue = $(".edit-email").html();

    profileEdit.click(function(){
        phrEditBackdrop.css("display", "block");

        editName.html(makeEditText("eName", editNameValue));
        editAddress.html(makeEditText("eName", editAddressValue));
        editContact.html(makeEditText("eName", editContactValue));
        editEmail.html(makeEditText("eName", editEmailValue));
        editLink.html(makeEditText("eName", editLinkValue));
    })

    function makeEditText(name, currVal){
        return "<input type = 'text' name = '" + name + "' value = '" + currVal + "'/>"
    }

})
