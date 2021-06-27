function openMobileMenu(){
    document.querySelector("#MenuMobDespl").style.display="block";
    document.querySelector("#layerMenuMob").style.display="block";
}
function closeMobileMenu(){
    document.querySelector("#MenuMobDespl").style.display="none";
    document.querySelector("#layerMenuMob").style.display="none";
}
function inicializar(){
    if(getCookie("znd_cookie")!=""){
        document.querySelector("#avisoCookies").style.display="none"
    }
    menuControl()
    setTimeout(function(){document.querySelector("body").style.opacity=1},500)
}
function aceptarCookies(){
    setCookie("znd_cookie",1,30)
    document.querySelector("#avisoCookies").style.display="none"
}
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}
function menuControl(){
    var tpscll  = window.pageYOffset || document.documentElement.scrollTop
    try{
    if(tpscll==0){
        document.querySelector("#barraMenu").classList.remove("header_Flotante")
    }else{
        document.querySelector("#barraMenu").classList.add("header_Flotante")
    }
    }catch(e){}
}
function controlSlide(pg){
    document.querySelector(".slidedot.slc").classList.remove("slc");
    document.querySelector("#cnt_slide"+pg).classList.add("slc");
    document.querySelector(".slideTxt.showed").classList.remove("showed");
    document.querySelector("#slide_"+pg).classList.add("showed");
}
function checarFormu(){
    eer=0;
    errdes="";
    document.querySelector("#nombre").style.borderColor="var(--borde)";
    document.querySelector("#telefono").style.borderColor="var(--borde)";
    document.querySelector("#email").style.borderColor="var(--borde)";
    document.querySelector("#mensaje").style.borderColor="var(--borde)";

    nombre=document.querySelector("#nombre").value;
    telefono=document.querySelector("#telefono").value;
    email=document.querySelector("#email").value;
    mensaje=document.querySelector("#mensaje").value;

    if(!document.querySelector("#tos").checked){
        eer=1;
        errdes+="<div class='error'>Debes aceptar los términos de uso</div>";
    }
    if(!document.querySelector("#privac").checked){
        errdes+="<div class='error'>Debes aceptar las políticas de privacidad</div>";
        eer=1;
    }
    if(nombre==""){
        document.querySelector("#nombre").style.borderColor="red";
        errdes+="<div class='error'>Debes ingresar tu nombre para enviar el formulario</div>";
        eer=1;
    }
    if(telefono==""){
        document.querySelector("#telefono").style.borderColor="red";
        errdes+="<div class='error'>Debes ingresar tu teléfono para enviar el formulario</div>";
        eer=1;
    }
    if(email==""){
        document.querySelector("#email").style.borderColor="red";
        errdes+="<div class='error'>Debes ingresar tu correo para enviar el formulario</div>";
        eer=1;
    }
    if(mensaje==""){
        document.querySelector("#mensaje").style.borderColor="red";
        errdes+="<div class='error'>Debes escribir un mensaje para enviar el formulario</div>";
        eer=1;
    }
    if(eer==1){
        document.querySelector("#advrForm").innerHTML=errdes;
        
    }else{
        document.querySelector("#advrForm_btn").innerHTML="Enviando el formulario. Espera un moemnto.";
        sendFormu(nombre,telefono,email,mensaje)
        
    }
}
function sendFormu(nombre,telefono,email,mensaje){
    var data = new FormData();
    data.append("nombre", nombre);
    data.append("telefono", telefono);
    data.append("email", email);
    data.append("mensaje", mensaje);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api.php?acc=frm");
    xhr.send(data);


    xhr.onreadystatechange = function() { 
        if (xhr.status == 200) {
            document.querySelector("#advrForm_btn").innerHTML=xhr.responseText;
        } else {
            document.querySelector("#advrForm_btn").innerHTML=xhr.responseText;
        }
    };

}

inicializar()