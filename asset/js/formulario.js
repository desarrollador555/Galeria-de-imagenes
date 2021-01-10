const show=()=>{
    const elem = document.getElementById('show');
        const tipo=document.querySelector("#password");
        if(tipo.type == "password"){
            tipo.type = "text";
            elem.innerHTML="Ocultar";
        }else{
            tipo.type = "password";
            elem.innerHTML="Ver Contraseña";
        }
}

const botonFormularioLogin=document.getElementById("formulario");
const inputs=document.querySelectorAll(".formulario__input");
const botonContacto=document.getElementById("formContacto");
const botonCreateImagen=document.getElementById("formulario__galeria__create");


const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/,
    mensaje: /[a-zA-Z0-9\_\-]\s{2,16}/, // Letras, numeros, guion y guion_bajo
    titulo:/[a-zA-Z0-9]+[^{}/]?\s?/,
    archivo:/(C:\\|c\:\\)([a-zA-Z0-9-_*]+\\?){1,8}(.jpg|.jpeg)/,
    descripcion:/^[a-zA-Z0-9]+\s?/
}
const campos={
	usuario:false,
    password:false,
    correo:false,
    mensaje:false,
    titulo:false,
    archivo:false,
    descripcion:false
};
const validarCampo=(expresion,texto,campo)=>{
    if(expresion.test(texto.value)){
        document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-correcto");
        document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-incorrecto");
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove("formulario__input-error-activo");
        campos[campo]=true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add("formulario__grupo-incorrecto");
        document.getElementById(`grupo__${campo}`).classList.remove("formulario__grupo-correcto");
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add("formulario__input-error-activo");
        campos[campo]=false;
    }
}
const validarPassword=()=>{
    const password1=document.getElementById("password");
    const password2=document.getElementById("password2");
    if(password2!==null){
        if(password1.value==password2.value){
            document.getElementById(`grupo__password2`).classList.add("formulario__grupo-correcto");
            document.getElementById(`grupo__password2`).classList.remove("formulario__grupo-incorrecto");
            document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove("formulario__input-error-activo");
            campos["password"]=true;
        }else{
            document.getElementById(`grupo__password2`).classList.add("formulario__grupo-incorrecto");
            document.getElementById(`grupo__password2`).classList.remove("formulario__grupo-correcto");
            document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add("formulario__input-error-activo");
            campos["password"]=false;
        }
    }
};

const validarFormulario=(e)=>{
    switch(e.target.name){
        case "nombre":
            validarCampo(expresiones.usuario,e.target,"usuario");
            break;
        case "password":
            validarCampo(expresiones.password,e.target,"password");
            validarPassword();
            break;
        case "password2":
            validarPassword();
            break;
        case "correo":
            validarCampo(expresiones.correo,e.target,"correo");
            break;
        case "mensaje":
            validarCampo(expresiones.mensaje,e.target,"mensaje");
            break;
        case "titulo":
            validarCampo(expresiones.titulo,e.target,"titulo");
            break;
        case "archivo":
            validarCampo(expresiones.archivo,e.target,"archivo");
            break;
        case "descripcion":
            validarCampo(expresiones.descripcion,e.target,"descripcion");
            break;
    };
};
// console.log(inputs);
if(inputs!==null){
    inputs.forEach((input)=>{
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    });
}
//inputs galeria->update
    // console.log(inputs);
    const boton__galeria__Update=document.getElementById('formulario__galeria__update');
    if(boton__galeria__Update!==null){
        inputs.forEach((input)=>{
            if(input!==null){
                // console.log(input.name);
                switch(input.name){
                    case 'titulo':
                        campos.titulo=true;
                        break;
                    case 'archivo':
                        campos.archivo=true;
                        break;
                    case 'descripcion':
                        campos.descripcion=true;
                        break;
                }
            }
        });
    }

// };
if(botonFormularioLogin!==null){
    botonFormularioLogin.addEventListener("submit",(e)=>{
        if(campos.usuario && campos.password){
            document.querySelector(".formulario__mensaje-exito").classList.add("formulario__mensaje-exito-activo");
            setTimeout(()=>{
                document.querySelector(".formulario__mensaje-exito").classList.remove("formulario__mensaje-exito-activo");
            },4000);
        }else{
            document.querySelector(".formulario__mensaje").classList.add("formulario__mensaje-activo");
            setTimeout(()=>{
            document.querySelector(".formulario__mensaje").classList.remove("formulario__mensaje-activo");
            },4000);
            e.preventDefault();
        }
    });
}
if(botonContacto!==null){
    botonContacto.addEventListener("submit",(e)=>{
        e.preventDefault();
        if(campos.correo && campos.mensaje){
            document.querySelector(".formulario__mensaje-exito").classList.add("formulario__mensaje-exito-activo");
            setTimeout(()=>{
                document.querySelector(".formulario__mensaje-exito").classList.remove("formulario__mensaje-exito-activo");
            },2000);
        }else{
            document.querySelector(".formulario__mensaje").classList.add("formulario__mensaje-activo");
            setTimeout(()=>{
            document.querySelector(".formulario__mensaje").classList.remove("formulario__mensaje-activo");
            },4000);
        }
    });
}


//Eliminamos la imagen cargada por defecto en galeria->update
const caja=document.getElementById('cajaImagenDb');
const hijo=document.getElementById('imagenPreDB');
let verificador=true;//IMportante para hacer la elimiunacion del nodo solo una vez
    if(hijo){
        hijo.style.width="300px";
        hijo.style.marginTop="20px";
    }
    fileReader=document.getElementById("archivo");
    if(fileReader!==null){
        fileReader.onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();
            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);
            // Le decimos que cuando este listo ejecute el código interno
            reader.onload= ()=>{
                preview = document.getElementById('preview');
                image = document.createElement('img');
                image.style.width="300px";
                image.style.marginTop="20px";

                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
                    if(preview){//Si se carga una nueva imagen, la imagen por defecto mostrada se elimina del nodo padre
                        if(verificador==true && caja){
                            caja.removeChild(hijo);
                            verificador=false;
                        }
                    }
            };
        }
    }//fin del if(fileReader!==null)

//boton del formulario create
if(botonCreateImagen!==null){
    botonCreateImagen.addEventListener('submit',(e)=>{
        if(campos.titulo && campos.descripcion && campos.archivo){

        }else{
            e.preventDefault();
            document.querySelector(".formulario__mensaje").classList.add("formulario__mensaje-activo");
            setTimeout(()=>{
            document.querySelector(".formulario__mensaje").classList.remove("formulario__mensaje-activo");
            },4000);
        }
    });
}

//ACTIVAR EL MODEL DE ELIMINACION

elimnar=document.querySelector('eliminar');

elimnar.addEventListener('click',(e)=>{
    console.log("asd");
    modalEliminar=document.querySelector('model');
    modalEliminar.style.display='flex';
    e.preventDefault();
});
//cancelar eliminacion usando el modal
// const cancelar=()=>{
//     modalEliminar.style.display='none';
// }