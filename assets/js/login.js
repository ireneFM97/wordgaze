const formLogin = document.querySelector(".form_login");
const formRegister = document.querySelector(".form_register");
const containerForms = document.querySelector(".container-forms");
const backboxLogin = document.querySelector(".backbox-login");
const backboxRegister = document.querySelector(".backbox-register");
const btnLogin = document.querySelector("#btn-login");
const btnRegister = document.querySelector("#btn-register");
const respuestaRegister = document.querySelector("#error-register");
const respuestaLogin = document.querySelector("#error-login");
const btnFormRegister = document.querySelector("#submit-register");
const btnFormLogin = document.querySelector("#submit-login");

const btns = document.querySelectorAll('.btn');
let eventBtn;
btns.forEach((btn) => {
  btn.addEventListener('click', event => {
    eventBtn = event.target.id
  });
});
 
//VALIDACIONES DE REGISTRO
formRegister.addEventListener("submit", (event)=>{
    const firstName = document.querySelector("#first-name");
    const surnames = document.querySelector("#surnames");
    const email = document.querySelector("#email-register");
    const user = document.querySelector("#user");
    const passwordRegister = document.querySelector("#password-register");
    const errorName = document.querySelector("#error-name");
    const errorSurnames = document.querySelector("#error-surnames");
    const errorEmail = document.querySelector("#error-email");
    const errorUser = document.querySelector("#error-user");
    const errorPasswordRegister = document.querySelector("#error-password-register");
    const regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    const regexPassword = /^.{6,8}$/;

    if(firstName.value == "" || surnames.value == "" || email.value == "" || user.value == "" || passwordRegister.value == "" || !regexPassword.test(passwordRegister.value)){
        if(firstName.value == ""){
            errorName.classList.add("shown");
            firstName.style.border = "1px solid orange";
            firstName.addEventListener("input", ()=>{
                errorName.classList.remove("shown");
                firstName.style.border = "";
            });
            event.preventDefault();
        }
    
        if(surnames.value == ""){
            errorSurnames.classList.add("shown");
            surnames.style.border = "1px solid orange";
            surnames.addEventListener("input", ()=>{
                errorSurnames.classList.remove("shown");
                surnames.style.border = "";
            });
            event.preventDefault();
        }
    
        if(email.value == ""){
            errorEmail.classList.add("shown");
            email.style.border = "1px solid orange";
            email.addEventListener("input", ()=>{
                errorEmail.classList.remove("shown");
                email.style.border = "";
            });
            event.preventDefault();
        }else if(!regexEmail.test(email.value)){
            errorEmail.classList.add("shown");
            email.style.border = "1px solid orange";
            errorEmail.innerHTML = "El email tiene que llevar @ y .";
            email.addEventListener("input", ()=>{
                errorEmail.classList.remove("shown");
                email.style.border = "";
            });
            event.preventDefault();
        }
    
        if(user.value == ""){
            errorUser.classList.add("shown");
            user.style.border = "1px solid orange";
            user.addEventListener("input", ()=>{
                errorUser.classList.remove("shown");
                user.style.border = "";
            });
            event.preventDefault();
        }
    
        if(passwordRegister.value == ""){
            errorPasswordRegister.classList.add("shown");
            passwordRegister.style.border = "1px solid orange";
            passwordRegister.addEventListener("input", ()=>{
                errorPasswordRegister.classList.remove("shown");
                passwordRegister.style.border = "";
            });
            event.preventDefault();
        }else if(!regexPassword.test(passwordRegister.value)){
            errorPasswordRegister.classList.add("shown");
            passwordRegister.style.border = "1px solid orange";
            errorPasswordRegister.innerHTML = "La contraseña debe tener entre 6 y 8 caracteres";
            passwordRegister.addEventListener("input", ()=>{
                errorPasswordRegister.classList.remove("shown");
                passwordRegister.style.border = "";
            });
            event.preventDefault();
        }
    }else{
            event.preventDefault();//Paro la acción para que realice lo siguiente
            //Con el objeto FormData guardo los valores de los inputs que el formulario me da
            let form = new FormData(formRegister);
            //Envio los datos del formulario al servidor (register_user.php) a traves del metodo POST
            //Envio los datos del formulario al servidor
            fetch('php/register_user.php',{
                method: 'POST',
                body: form
            })
            //Hago peticiones al servidor
            .then( response => response.json())//Se convierte esta funcion (respuesta) que viene del servidor register_user.php y la convierto a json 
            .then( data =>{//Es la respuesta convertida en json
                //Las comprobaciones las hago con message y no con success. Son comprobaciones que me envia el servidor
                if(eventBtn == "btn-register"){
                    if (formRegister.classList.contains('form_register') && data.message == 'Este usuario ya estaba registrado. Inicia sesión' || data.message == 'Nombre de usuario no disponible. Prueba con otro nombre' || data.message == 'Algo ha ido mal. Intenta registrarte de nuevo') {
                        respuestaRegister.style.backgroundColor = "orange";//Mensaje que sale mal
                        respuestaRegister.style.display = "block";
                        respuestaRegister.innerHTML = 
                        `
                            <p>${data.message}</p>
                        `
                    } else {//Mensaje de registro correcto
                        respuestaRegister.style.backgroundColor = "#31a84f";//Color verde, todo ha ido bien
                        respuestaRegister.style.display = "block";
                        respuestaRegister.innerHTML = 
                        `
                            <p>${data.message}</p>
                        `
                        //Dejar de nuevo vacios los campos
                        firstName.value = "";
                        surnames.value = "";
                        email.value = "";
                        user.value = "";
                        passwordRegister.value = "";
                    }
                }else{
                    respuestaRegister.style.backgroundColor = "red";
                }
            })
            .catch(error => console.error(error));//Si va todo mal me devuelve un error
        }
});

 
//VALIDACIONES DE LOGIN
formLogin.addEventListener("submit", (event)=>{
    const emailLogin = document.querySelector("#email-login");
    const passwordLogin = document.querySelector("#password-login");
    const errorEmailLogin = document.querySelector("#error-email-login");
    const errorPassword = document.querySelector("#error-password-login");
    const regexPassword = /^.{6,8}$/;    

    if(emailLogin.value == "" || passwordLogin.value == "" || !regexPassword.test(passwordLogin.value)){
        if(emailLogin.value == ""){
            errorEmailLogin.classList.add("shown");
            emailLogin.style.border = "1px solid orange";
            emailLogin.addEventListener("input", ()=>{
                errorEmailLogin.classList.remove("shown");
                emailLogin.style.border = "";
            });
            event.preventDefault();
                
        }
        if(passwordLogin.value == ""){
            errorPassword.classList.add("shown");
            passwordLogin.style.border = "1px solid orange";
            passwordLogin.addEventListener("input", ()=>{
                errorPassword.classList.remove("shown");
                passwordLogin.style.border = "";
            });
            event.preventDefault();
        }else if(!regexPassword.test(passwordLogin.value)){
            errorPassword.classList.add("shown");
            passwordLogin.style.border = "1px solid orange";
            errorPassword.innerHTML = "La contraseña debe tener entre 6 y 8 caracteres";
            passwordLogin.addEventListener("input", ()=>{
                errorPassword.classList.remove("shown");
                passwordLogin.style.border = "";
            });
            event.preventDefault();
        }
    }else{        
        event.preventDefault();//Paro la acción para que realice lo siguiente
        //Con el objeto FormData guardo los valores de los inputs que el formulario me da
        let formL = new FormData(formLogin);
        //Envio los datos del formulario al servidor a traves del metodo POST
        fetch('php/login_user.php',{
            method: 'POST',
            body: formL //Tiene los valores de cada input
        })
        //Recibo la respuesta con el then
        .then( responseLogin => responseLogin.json())
        .then( dataLogin =>{
            if (formLogin.classList.contains('form_login') && dataLogin.messageLogin == 'Email o contraseña incorrectos') {
                respuestaLogin.style.backgroundColor = "orange";
                respuestaLogin.style.display = "block";
                respuestaLogin.innerHTML = 
                `
                    <p>${dataLogin.messageLogin}</p>
                `
            } else {
                location.href = 'start.php';
            }
        })
    }
});

btnLogin.addEventListener("click", ()=>{
    respuestaRegister.style.display = "none";
    if (window.innerWidth > 850){
        formLogin.style.display = "block";
        containerForms.style.left = "10px";
        formRegister.style.display = "none";
        backboxRegister.style.opacity = "1";
        backboxLogin.style.opacity = "0";
    }else{
        formLogin.style.display = "block";
        containerForms.style.left = "0px";
        formRegister.style.display = "none";
        backboxRegister.style.display = "block";
        backboxLogin.style.display = "none";
    }
    console.log("buttonClicked")
});

btnRegister.addEventListener("click", ()=>{
    respuestaLogin.style.display = "none";
    if (window.innerWidth > 850){
        formRegister.style.display = "block";
        containerForms.style.left = "410px";
        formLogin.style.display = "none";
        backboxRegister.style.opacity = "0";
        backboxLogin.style.opacity = "1";
    }else{
        formRegister.style.display = "block";
        containerForms.style.left = "0px";
        formLogin.style.display = "none";
        backboxRegister.style.display = "none";
        backboxLogin.style.display = "block";
        backboxLogin.style.opacity = "1";
    }
});


window.addEventListener("resize", ()=>{
    if (window.innerWidth > 850){
        backboxRegister.style.display = "block";
        backboxLogin.style.display = "block";
    }else{
        backboxRegister.style.display = "block";
        backboxRegister.style.opacity = "1";
        backboxLogin.style.display = "none";
        formLogin.style.display = "block";
        containerForms.style.left = "0px";
        formRegister.style.display = "none";   
    }
});



//MOSTRAR CONTRASEÑA
let iconVisibilityList = document.querySelectorAll(".eye");
let passwordList = document.querySelectorAll("[name='password']");

iconVisibilityList.forEach((iconVisibility, index) => {
    iconVisibility.addEventListener("click", () => {
      if (passwordList[index].type === "password") {
        iconVisibility.innerHTML = "visibility";
        passwordList[index].type = "text";
      } else {
        iconVisibility.innerHTML = "visibility_off";
        passwordList[index].type = "password";
      }
    });
  });