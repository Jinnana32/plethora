$(document).ready(function(){

    // Edit Developer
    $(document).on('click', '.phr-edit-dev', function(){
        var devName = $(this).attr("id");
        var devId = $(this).attr("name");
        $('#edit_dev_id').val(devId);
        $("#edit_dev_name").val(devName);
    })

    // Remove developer
    $(document).on('click', '.phr-remove-dev', function(){
        var devId = $(this).attr("id");
        var devName = $(this).attr("name");
        bootbox.confirm("Are you sure you want to remove "+ devName +" as developer?", function(willDelete){
            if(willDelete){
                window.location = window.location.href + "/remove/" + devId + "/" + devName
            }
        })
    })

    // Add Brand
    $(document).on('click', '.phr-add-brand', function(){
        var devId = $(this).attr("id");
        $("#add_dev_id").val(devId);
    })

    // Edit Brand
    $(document).on('click', '.phr-edit-brand', function(){
        var brandName = $(this).attr("name");
        var brandID = $(this).attr("id");
        $('#edit_brand_id').val(brandID);
        $("#edit_brand_name").val(brandName);
    })

    // Remove brand
    $(document).on('click', '.phr-remove-brand', function(){
        var brandId = $(this).attr("id");
        var brandName = $(this).attr("name");
        bootbox.confirm("Are you sure you want to remove "+ brandName +" as developer?", function(willDelete){
            if(willDelete){
                window.location = window.location.href + "/brand/remove/" + brandId + "/" + brandName
            }
        })
    })

})