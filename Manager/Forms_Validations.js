
function checkIfEmpty(fieldsIDs){
    var thereIsEmptyField = false;
    for(var i = 0; i < fieldsIDs.length; i++){
        if(($('#'+fieldsIDs[i]).val() == "")){
           thereIsEmptyField = true;
           break;
        }
    } 
    return thereIsEmptyField;
}
function emptyImage(img){
    if(img.files.length == 0)
    return true;
    return false;
}
function isnegativeNumber(num){
    if(num < 0)
    return true;
    return false;
}
function emptyTime(time){
    if(time.val() == "")
    return true;
    return false;
}
