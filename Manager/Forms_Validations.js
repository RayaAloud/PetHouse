
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
