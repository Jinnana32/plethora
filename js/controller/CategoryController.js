$(document).ready(function(){

    $(document).on("click", ".phr-category-add-feature", function(){
        var cat_id = $(this).attr("id");
        $("#add_category_id").val(cat_id);
    })

    $(document).on('click', ".phr-edit-cat", function(){
        var cat_id = $(this).attr("id");
        var cat_name = $(this).attr("name");
        $("#cat_id").val(cat_id)
        $('#cat_name').val(cat_name)
    })

    $(document).on('click', ".phr-remove-cat", function(){
        var catName = $(this).attr("name");
        var catId = $(this).attr("id");
        bootbox.confirm("Are you sure you want to remove "+ catName +" as developer?", function(willDelete){
            if(willDelete){
                window.location = window.location.href + "/remove/" + catId + "/" + catName
            }
        })
    })

    $(document).on('click', ".phr-remove-feat", function(){
        var catId = $(this).attr("id");
        var featId = $(this).attr("name");
        bootbox.confirm("Are you sure you want to remove this feature?", function(willDelete){
            if(willDelete){
                window.location = window.location.href + "/feature/remove/"+ catId +"/" + featId
            }
        })
    })

    $(document).on('click', '.phr-category-add-option', function(){
        var catId = $(this).attr("id");
        var featId = $(this).attr("name");
        console.log("cat id" + catId)
        $("#feat_id").val(featId)
        $("#z_id").val(catId)
    })

    $(document).on('click', '.phr-category-remove-option', function(){
        var catId = $(this).attr("id");
        bootbox.confirm("Are you sure you want to remove this option?", function(willDelete){
            if(willDelete){
                window.location = window.location.href + "/option/remove/"+ catId
            }
        })
    })

})