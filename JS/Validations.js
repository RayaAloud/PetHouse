function notEmptyRadio(input){
    var ischecked = false;
    for(var i = 0; i < input.length; i++){
        if(input[i].checked)
        ischecked = true
    }
    return ischecked;
}
function validFirstName(name){
    return /^[A-Za-z]{1,30}$/.test(name);
}
function validLastName(name){
    return /^[A-Za-z]{1,30}$/.test(name);
}
function validEmail(email){
   var pattern =  /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
   return pattern.test(email);
}
function validPass(pass){
    var eight = true;
    var specialChar = false;
    if(pass.length < 8)
      valid = false;
    var sc = '!”#$%&’()*+,-./:;<=>?@[\]^_{|}~`';
    for(var i = 0; i < sc.length; i++){
      if(pass.includes(sc[i],0)){
        specialChar = true;
        break;
      }
    }
    return eight === true && specialChar === true;
}
function validPhone(phone){
  return /05+[0-9]{8}/.test(phone)
}