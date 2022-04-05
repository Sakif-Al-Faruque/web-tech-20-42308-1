/* const submit = document.getElementById("submit"); */
const name = document.getElementById("name-id");
const username = document.getElementById("uname-id");
const pass = document.getElementById("pass-id");
const re_pass = document.getElementById("re-pass-id");
const gender = document.getElementById("gender-id-1");

name.addEventListener("change", function(e){
    let errorMessage = "";
    if(name.value === ""){
        errorMessage = "Name field is required";
        
    }else if(name.value.match(/(\w+)/g).length < 2){
        errorMessage = "Name must have at least 2 words";
        
    }else if(name.value.length > 30){
        errorMessage = "The length of name can not exceed 30 characters";
        
    }else{
        name.parentNode.children[2].innerHTML = "";
        name.parentNode.children[3].classList.toggle("d-block");
        name.parentNode.children[4].classList.toggle("d-block");
    }
    
    if(errorMessage){
        name.parentNode.children[2].innerHTML = errorMessage;
        name.parentNode.children[3].classList.toggle("d-block");
        errorMessage = "";
    }
});

username.addEventListener("change", function(e){
    let errorMessage = "";
    if(username.value === ""){
        errorMessage = "Userame field is required";
        
    }else if(username.value.includes(" ")){
        errorMessage = "Username cannot have spaces";
        
    }else if(!username.value.match(/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/)){
        errorMessage = "Username must follow the special pattern";
    }else{
        username.parentNode.children[2].innerHTML = "";
        username.parentNode.children[3].classList.toggle("d-block");
        username.parentNode.children[4].classList.toggle("d-block");
    }
    
    if(errorMessage){
        username.parentNode.children[2].innerHTML = errorMessage;
        username.parentNode.children[3].classList.toggle("d-block");
        errorMessage = "";
    }
});


pass.addEventListener("change", function(e){
    let errorMessage = "";
    if(pass.value === ""){
        errorMessage = "Password field is required";
        
    }else if(pass.value.includes(" ")){
        errorMessage = "Password cannot have spaces";
        
    }else if(pass.value.length < 4){
        errorMessage = "Password must have at least 4 characters";
        
    }else if(!(pass.value.includes("@") || pass.value.includes("*") || pass.value.includes("#"))){
        errorMessage = "Password should contain some special character";
    }else{
        pass.parentNode.children[2].innerHTML = "";
        pass.parentNode.children[3].classList.toggle("d-block");
        pass.parentNode.children[4].classList.toggle("d-block");
    }
    
    if(errorMessage){
        pass.parentNode.children[2].innerHTML = errorMessage;
        pass.parentNode.children[3].classList.toggle("d-block");
        errorMessage = "";
    }
});

re_pass.addEventListener("change", function(e){
    let errorMessage = "";
    if(re_pass.value === ""){
        errorMessage = "Password field is required";
        
    }else if(re_pass.value !== pass.value){
        errorMessage = "Password is not matched";
        
    }else{
        re_pass.parentNode.children[2].innerHTML = "";
        re_pass.parentNode.children[3].classList.toggle("d-block");
        re_pass.parentNode.children[4].classList.toggle("d-block");
    }
    
    if(errorMessage){
        re_pass.parentNode.children[2].innerHTML = errorMessage;
        re_pass.parentNode.children[3].classList.toggle("d-block");
        errorMessage = "";
    }
});






