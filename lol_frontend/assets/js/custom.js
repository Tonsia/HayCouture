
//VALIDATION

function textOnly(e){
    if(/[^a-zA-Z+\s]/g.test(e.value) | /\s{2,}/g.test(e.value)){
        e.value = e.value.replace(/[^a-zA-Z+\s]/g,'').replace(/\s{2,}/g, ' ');
        e.nextElementSibling.innerHTML = "Only Alphabets are allowed";
        setTimeout(function(){ e.nextElementSibling.innerHTML='' }, 1000);
    }
}

function textNumOnly(e){
    e.value = e.value.toUpperCase();
    if(/[^a-zA-Z0-9+\-\s]/g.test(e.value) | /\s{2,}/g.test(e.value) | /\-{2,}/g.test(e.value) ){
        e.value = e.value.replace(/[^a-zA-Z0-9+\-\s]/g,'').replace(/\s{2,}/g, ' ').replace(/\-{2,}/g, '-');
        e.nextElementSibling.innerHTML = "Only Alphabets are allowed";
        setTimeout(function(){ e.nextElementSibling.innerHTML='' }, 1000);
    }
}

function textUpperOnly(e){
    
    e.value = e.value.toUpperCase();
    if(/[^A-Z]/g.test(e.value)){ 
        e.value = e.value.replace(/[^A-Z]/g,'');
        e.nextElementSibling.innerHTML = "Only Uppercase Alphabets are allowed";
        setTimeout(function(){ e.nextElementSibling.innerHTML = "" }, 1000);
    }
}

function textLowerOnly(e){
    
    e.value = e.value.toLowerCase();
    if(/[^a-z]/g.test(e.value)){ 
        e.value = e.value.replace(/[^a-z]/g,'');
        e.nextElementSibling.innerHTML = "Only Lowercase Alphabets are allowed";
        setTimeout(function(){ e.nextElementSibling.innerHTML = "" }, 1000);
    }
}

function textNumUpperOnly(e){
    
    e.value = e.value.toUpperCase();
    if(/[^A-Z0-9]/g.test(e.value)){ 
        e.value = e.value.replace(/[^A-Z0-9]/g,'');
        e.nextElementSibling.innerHTML = "Only Uppercase Alphabets and Number are allowed";
        setTimeout(function(){ e.nextElementSibling.innerHTML = "" }, 1000);
    }
}

function pass(e){
console.log(e.value);

}

function validation(e){
    console.log(e.id);
    switch(e.id){
        case 'pass':
            pass(e);
            break;
        case 'deptcode':
            textUpperOnly(e);
            break;
        case 'deptcatname':
            textOnly(e);
            break;
        case 'batchcode':
            textNumUpperOnly(e);
            break;
        case 'batchname':
            textNumOnly(e);
            break;
        case 'rolecode':
            textLowerOnly(e);
            break;
        case 'rolename':
            textOnly(e);
            break;


    }
}




