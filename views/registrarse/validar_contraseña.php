<?php 

function validar_nombre($nombre,$error){
    if(empty($nombre)){
        $error=$error. "El nombre es requerido .<br>";
    }
    if(preg_match("/[0-9]/",$nombre)){
        $error=$error. "El nombre no puede contener numeros.<br>";
        }
    if (strlen($nombre) >15){
         $error=$error. "El nombre no puede tener mas de 15 caracteres.<br>";
        }
    return $error;
}
function validar_ape($apellido,$error){
    if(empty($apellido)){
        $error=$error. "El apellido es requerido .<br>";
    }
    if(preg_match("/[0-9]/",$apellido)){
        $error=$error. "El apellido no puede contener numeros.<br>";
        }
    if (strlen($apellido) >15){
         $error=$error. "El apellido no puede tener mas de 15 caracteres.<br>";
        }
    return $error;
}
function validar_cod_cliente($cod_cliente, $error) {
    if (empty($cod_cliente)) {
        $error .= "El codigo de cliente es obligatorio.<br>";
    }
    return $error;
}
  function validar_correo($email,$error){

    if(empty($email)){
        $error=$error. "El correo es requerido.<br>";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $error=$error. "El formato del correo no es valido.<br>";
        }
    return $error;
    }
function validar_edad($edad,$error){

    if(empty($edad)){
        $error=$error. "La edad es requerida.<br>";
    }
    if(!is_numeric($edad)){
            $error=$error. "La edad no es un numero.<br>";
         }
        return $error;
    }
function validar_Dni($dni,$error){

    if(empty($dni)){
        $error=$error. "El dni es requerido"."<br>";
    }
    if(strlen($dni) >8 && strlen($dni) <9){
        $error=$error. "el dni debe tener entre 8 a 9 numeros"."<br>";
    }
    if(!is_numeric($dni)){
        $error=$error. "el dni debe tener numeros"."<br>";
    }
    return $error;
   }
function validar_telefono($telefono,$error){
    
    if(empty($telefono)){
        $error=$error. "El telefono es requerido"."<br>";
    }
    if(strlen($telefono) <10){
        $error=$error. "El telefono debe tener 10 numeros"."<br>";
    }
    if(!is_numeric($telefono)){
        $error=$error. "el telefono debe tener numeros"."<br>";
    }
    return $error;
   }
function validar_contrasena($contrasena,$error){
    if(empty($contrasena)){
        $error=$error. "La contrasena es requerida.<br>";
    }
    
    if(preg_match("/[0-9]/",$contrasena) <1){
        $error=$error. "La contraseña debe tener almenos 1 numero.<br>";
    }
    if(preg_match("/[A-Z]/",$contrasena) <1){
        $error=$error. "La contraseña debe tener almenos 1 mayuscula.<br>";
    }
    if(preg_match("/[a-z]/",$contrasena) <1){
        $error=$error. "La contraseña debe tener almenos 1 minuscula.<br>";
    }
    if(preg_match("/[!@·$%&*?.+_:;=-]/",$contrasena) <1){
        $error=$error. "La contraseña debe tener almenos 1 caracter especial.<br>";
    }
    return $error;
}
function validar_opinion($opi,$error){
    if (strlen($nombre) >120){
         $error=$error. "la opinion no puede tener mas de 120 caracteres caracteres.<br>";
        }
    return $error;
}
function validar_direccion($direccion,$error){
    if(empty($direccion)){
        $error=$error. "la direccion es requerida"."<br>";
    }
    return $error;
}
?>