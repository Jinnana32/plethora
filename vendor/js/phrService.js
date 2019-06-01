var PhrService = {
    post: function(url, data, successFn){ makeCall("POST", url, data, successFn) },
    get: function(url, data, successFn){ makeCall("GET", url, data, successFn) },
    put: function(url, data, successFn){ makeCall("PUT", url, data, successFn) },
    delete: function(url, data, successFn){ makeCall("DELETE", url, data, successFn) },
    getNoLoading: function(url, data, successFn){ noLoadingCall("GET", url, data, successFn) }
}

function serviceOperator(resp){
    hideLoading();
    var status = resp.status;
    if(status == 400){
        showError("Unsuccessful", resp.responseJSON.error)
    }else{
        showError("Something went wrong", "It seems that the server has a on-going processes. Try again later")
    }
}

function makeCall(type, url, data, successFn){
    var customizedData = (type === "GET") ? data : JSON.stringify(data)
    showLoading()
    $.ajax({
        type: type,
        url: url,
        data: customizedData,
        contentType: 'application/json',
        success: function(resp){
            successFn(resp)
        },
        error: function(err){
            serviceOperator(err)
            console.error("PHR ERROR: " , err)
        }
    }).done(function(){
        hideLoading()
    })
}

function noLoadingCall(type, url, data, successFn){
    var customizedData = (type === "GET") ? data : JSON.stringify(data)
    $.ajax({
        type: type,
        url: url,
        data: customizedData,
        contentType: 'application/json',
        success: function(resp){
            successFn(resp)
        },
        error: function(err){
            serviceOperator(err)
            console.error("PHR ERROR: " , err)
        }
    }).done(function(){
        hideLoading()
    })
}