$(document).ready(function(){
    // Reference to modal
    var phrModal = $("#phrModal")
    var phrModalImage = $("#phrModalImage")
    var close = $(".close")

    $(document).on("click", ".modal-item", function(){
        var src = $(this).attr("src")
        console.log(src)
        phrModalImage.attr("src", src).show()
        phrModal.css("display", "block")
    })

    close.click(function(){
        closeModal()
    })

    phrModal.click(function(){
        closeModal()
    })

    function closeModal(){
        phrModal.css("display", "none")
    }

})