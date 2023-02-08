const nameEl = document.querySelector('#name');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const confirmPasswordEl = document.querySelector('#password1');
const mobEl= document.querySelector('#mob');
const addrEl= document.querySelector('#addr');
const stateEl= document.querySelector('#state');
const districtEl= document.querySelector('#district');
const cityEl= document.querySelector('#city');
const pinEl= document.querySelector('#pin');
const form = document.querySelector('#signup');

const checkName = () => {

    let valid = false;
    const min = 3,max = 25;
    const name = nameEl.value.trim();
    //nameEl.value = name.replace(/\s{2,}/g, ' ');
    if (!isRequired(name)) {
        showError(nameEl, 'Name cannot be blank.');
    }
    /*else if(name.startsWith("_")){
        showError(nameEl, 'Name should not start with _');
        nameEl.value = nameEl.value.replace(/_/g, '');}*/
    else if (!isUNameValid(name)){
        showError(nameEl, 'Full name should contain only alphabets');
    }
        //nameEl.value = nameEl.value.toLowerCase();
        //nameEl.value = nameEl.value.replace(/[^0-9a-z]/gi, ''); }
        //name.replace(/\s{2,}/g, ' ');
         //replacing spcl chars  
    // else if (!isCheckSpace(name)) {
    //     showError(nameEl, `Name must be between ${min} and ${max} characters.`)}*/
     
    else {
        showSuccess(nameEl);
        valid = true;
    }
    return valid;
};

const checkEmail = () => {
    let valid = false;
    emailEl.value=emailEl.value.toLowerCase();
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {

    let valid = false;

    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();
     if (!isRequired(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
};



const checkMob = () => {

    let valid = false;
    const mob = mobEl.value.trim();
    if (!isRequired(mob)) {
        showError(mobEl, 'Mobile cannot be blank.');
    } else if (!isMobValid(mob)) {
        showError(mobEl, 'Enter your 10 digit valid number.')
    } else {
        showSuccess(mobEl);
        valid = true;
    }
    return valid;
};

const checkAddr = () => {

    let valid = false;
    const addr = addrEl.value.trim();
    if (!isRequired(addr)) {
        showError(addrEl, 'Address cannot be blank.');
    } else if (!isAddrValid(addr)) {
        showError(addrEl, 'Invalid Address.')
    } else {
        showSuccess(addrEl);
        valid = true;
    }
    return valid;
};


const checkState = () => { 

    let valid = false;
    const state = stateEl.value.trim();
    if (!isRequired(state)) {
        showError(stateEl, 'State cannot be blank.');
    }
    else if (!isStateValid(state)) {
        showError(stateEl, 'Invalid State')
    }
    else {
        showSuccess(stateEl);
        valid = true;
    }
    return valid;

};


const checkDistrict = () => { 

    let valid = false;
    const district = districtEl.value.trim();
    if (!isRequired(district)) {
        showError(districtEl, 'District cannot be blank.');
    }
    else if (!isDistrictValid(district)) {
        showError(districtEl, 'Invalid District')
    }
    else {
        showSuccess(districtEl);
        valid = true;
    }
    return valid;

};




const checkCity= () => {

    let valid = false;
    const city = cityEl.value.trim();
    if (!isRequired(city)) {
        showError(cityEl, 'City cannot be blank.');
    } else if (!isCityValid(city)) {
        showError(cityEl, 'Invalid City')
    } else {
        showSuccess(cityEl);
        valid = true;
    }
    return valid;
};


const checkPin= () => {

    let valid = false;
    const pin = pinEl.value.trim();
    if (!isRequired(pin)) {
        showError(pinEl, 'Pin cannot be blank.');
    } else if (!isPinValid(pin)) {
        showError(pinEl, 'Invalid PIN')
    } else {
        showSuccess(pinEl);
        valid = true;
    }
    return valid;
};

const isUNameValid = (name) => {
    
    //const re = /^[a-zA-Z]+ [a-zA-Z]+$/;
    //const re=/^[a-zA-Z]+ [a-zA-Z]+$/;
    
    const re=/^[a-zA-Z ]*$/;
    return re.test(name);
}

const isPinValid = (pin) => {
    
    const re = /^[1-9][0-9]{5}$/;
    //const re =/^[1-9]{1}[0-9]{2}\\s{0,1}[0-9]{3}$/;
    return re.test(pin);
};



const isMobValid = (mob) => {
    const re = /^[6-9]\d{9}$/;
     
    return re.test(mob);
};

const isAddrValid = (addr) => {
    const re = /^[a-zA-Z0-9\s,'-]*$/;
    return re.test(addr);
};

const isCityValid = (city) => {
    const re=document.getElementById("city").getAttribute('pattern').slice(0, -2).split('|');
    for (let i = 0; i < re.length; i++) {
        if(re[i] === city)
        {
            return true;
        }
      }
      return false;
};
const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isStateValid = (state) => {
    const re=document.getElementById("state").getAttribute('pattern').slice(0, -2).split('|');
    for (let i = 0; i < re.length; i++) {
        if(re[i] === state)
        {
            return true;
        }
      }
      return false;

}

const isDistrictValid = (district) => {
    const re=document.getElementById("district").getAttribute('pattern').slice(0, -2).split('|');
    for (let i = 0; i < re.length; i++) {
        if(re[i] === district)
        {
            return true;
        }
      }
      return false;
}


const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;




const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();
    nameEl.value = nameEl.value.replace(/\s{2,}/g, ' ');
    nameEl.value=nameEl.value.trim();
    // validate forms
    let isNameValid = checkName(),
        isAddrValid = checkAddr(),
        isMobValid = checkMob(),
        isPinValid = checkPin(),
        isEmailValid = checkEmail(),
        isPasswordValid = checkPassword(),
        isStateValid = checkState(),
        isConfirmPasswordValid = checkConfirmPassword(),
        isDistrictValid =checkDistrict(),
        isCityValid=checkCity();

    let isFormValid = isNameValid &&
        isAddrValid &&
        isMobValid &&
        isPinValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid &&
        isStateValid &&
        isDistrictValid &&
        isCityValid;

    // submit to the server if the form is valid
    // if (isFormValid) {

    // }
});


const debounce = (fn, delay = 70) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};


form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'name':
            checkName();
            break;
        case 'email':
            checkEmail();
            break;
        case 'password':
            checkPassword();
            break;
        case 'password1':
            checkConfirmPassword();
            break;
        case 'mob':
            checkMob();
            break;
        case 'addr':
            checkAddr();
            break;
        case 'state':
            checkState();
            break;
        case 'district':
            checkDistrict();
            break;
        case 'city':
            checkCity();
            break;
        case 'pin':
            checkPin();
            break;
    }
}));

