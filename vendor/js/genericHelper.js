
/* Factory */
function makeOption(id, value){
    return "<option id = '"+ id +"'>"+ value +"</option>"
}

function makeRow(id, cls, children){
    return "<tr id = '"+ id +"' class = '"+ cls +"'>"+ children +"</tr>"
}

function makeCol(children){
    var col = ""
    for(index in children){
        col += "<td>"+ children[index] +"</td>"
    }
    return col
}

/* Toggles */
function toggleDisplay(view){
    if($(view).css("display") == "block"){
        $(view).css("display", "none")
    }else{
        $(view).css("display", "block")
    }
}

function showView(view){
    $(view).css("display", "block")
}

function hideView(view){
    $(view).css("display", "none")
}