function togglePassword(){
    if(document.getElementById("password").type == "password"){
        document.getElementById("password").type= "text";
        document.getElementById("icon-pass").className="fas fa-eye-slash";
    }
    else{
        document.getElementById("password").type = "password";
        document.getElementById("icon-pass").className="fas fa-eye";
    }
    
}