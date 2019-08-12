<script>
$(document).ready(function(){
    var CategoryOptionsWrapper = $(".phr-form-category-options")

    $(document).on("change", "#phrCategory", function(){
        var catId = $(this).val()
        if(catId == "0"){
            var optionContent = "No options to show. Category filter 'Any'";
            CategoryOptionsWrapper.html(optionContent)
        }else{
            getCategoryOption(catId);
        }
    })

    function getCategoryOption(category_id){
        if(category_id == "0"){
            var optionContent = "No options to show. Category filter 'Any'";
            CategoryOptionsWrapper.html(optionContent)
        }else{
            var url = "{{ url('/api/v1/admin/category/options/filtered') }}/" + category_id
            PhrService.get(url, {}, function(resp){
            hideLoading()
            $(".modal-backdrop").css("display", "none");
            var optionContent = "No options to show. Category filter 'Any'";
            var features = resp.units.feats;
            var options = resp.units.opts;
            if(features.length > 0) optionContent = ""
            for(var x = 0; x < features.length; x++){
                    if(features[x][0].has_options == 1){
                    optionContent += makeSelectableFields(features[x][0].id,features[x][0].display_name, options[x])
                    }/*else{
                    optionContent += makeGenericFields(features[x][0].id,features[x][0].display_name)
                    }*/
            }

            CategoryOptionsWrapper.html(optionContent)
            })
        }
    }

    function makeSelectableFields(id, label, options){
        var selectableField = '<div class="col-md-4">' +
                '<div class="form-group form-group-select">' +
                        '<label class = "cat_label" for="exampleInputEmail1">'+ label +'</label>'+
                        '<select class="form-control cat_options" id = "'+ id +'">';

                for(var x = 0; x < options.length; x++){
                        selectableField += '<option value = "'+ options[x].options +'">'+ options[x].options +'</option>';
                }

         selectableField += '</select>'+
                            '<i class="fa fa-angle-down" aria-hidden="true"></i>'+
                            '</div></div>';
        return selectableField;
    }
})
</script>