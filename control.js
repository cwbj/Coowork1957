var send = document.getElementById('send');
var alertmessage = document.querySelector('.seccess-alert');
var backg  = document.querySelector('.goback');
var nameErros = document.getElementById('name-errose');
var errosEmail = document.getElementById('email-errose');
var errosPhone = document.getElementById('phone-errose');
var erroseMessage = document.getElementById('message-errose');
var erroseSend = document.getElementById('submiterrose');
function nameinput(){
    var name = document.getElementById('fulname').value;
    if(name.length == 0){
        nameErros.innerHTML = 'Name is required!';
        return false;
    }if(!name.match(/^[A-za-z]*\s{1}[A-Za-z]*$/)){
        nameErros.innerHTML = 'write Full name!';
        return false;
    }
    nameErros.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}

function emailinput(){
    var email = document.getElementById('email').value;
    if(email.length == 0){
        errosEmail.innerHTML = 'Email required!';
        return false;
    }
    if(!email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )){
        errosEmail.innerHTML = 'Email not correct!';
        return false;
    }
    errosEmail.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}

function phoninput(){
    var phone = document.getElementById('phone-num').value;
    if(phone.length == 0){
        errosPhone.innerHTML = 'Phone is not reqired!';
        return false;
    }if(phone.length !== 9){
        errosPhone.innerHTML = "phone mast be 9 digits!";
        return false;
    } if(!phone.match(/^[0-9]{9}$/)){
        errosPhone.innerHTML = 'only digits pleas!';
        return false;
    }
    errosPhone.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}
function messageinput(){
    var message = document.getElementById('message').value;
    var required = 15;
    var left = required - message.length;
    if(left > 0){
        erroseMessage.innerHTML = left + 'more characters required';
        return false;
    }
    erroseMessage.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}

function submitdata(){
    if(!nameinput() || !emailinput() || !phoninput() || !messageinput()){
        erroseSend.innerHTML = "Please make sure!";
    }else{
     alertmessage.style.top = "0" 
     alertmessage.style.zIndex = "2" 
        Email.send({
            Host: "smtp.gmail.com",
            Username: "sender@email_address.com",
            Password: "Enter your password",
            To: 'receiver@email_address.com',
            From: "sender@email_address.com",
            Subject: "Sending Email using javascript",
            Body: "Well that was easy!!",
        })
        .then(function (message) {
            alert("mail sent successfully")
        });
    }
}

backg.addEventListener('click', function(){
    alertmessage.style.top = "-200%"
})