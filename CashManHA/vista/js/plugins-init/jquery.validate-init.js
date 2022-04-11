jQuery(".form-valide").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 5
        },
        "val-codigousuario-nuevosregistros": {
            required: !0,
            minlength: 5
        },
        "val-codesecurity": {
            required: !0,
            minlength: 5,
            maxlength: 5
        },
        "val-email": {
            required: !0,
            email: !0
        },
        "val-password": {
            required: !0,
            minlength: 8
        },
        "val-contrasenia-nuevosregistro": {
            required: !0,
            minlength: 8
        },
        "val-confirm-password": {
            required: !0,
            equalTo: "#val-password"
        },
        "val-select2": {
            required: !0
        },
        "val-select2-multiple": {
            required: !0,
            minlength: 2
        },
        "val-suggestions": {
            required: !0,
            minlength: 5
        },
        "val-skill": {
            required: !0
        },
        "val-currency": {
            required: !0,
            currency: ["$", !0]
        },
        "val-website": {
            required: !0,
            url: !0
        },
        "val-phoneus": {
            required: !0,
            phoneUS: !0
        },
        "val-digits": {
            required: !0,
            digits: !0
        },
        "val-number": {
            required: !0,
            number: !0
        },
        "val-range": {
            required: !0,
            range: [1, 5]
        },
        "val-terms": {
            required: !0
        },
        // SECCION PERFIL USUARIOS
        // CONFIGURACION DE LA CUENTA
        "val-nombreusuario": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-apellidousuario": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-usuariounico": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-contrasenia": {
            required: !0,
            minlength: 8
        },
        "val-confirmar-contrasenia": {
            required: !0,
            equalTo: "#val-contrasenia"
        },
        "val-correo": {
            required: !0,
            email: !0
        },
        // DETALLES DE USUARIOS
        "val-dui": {
            required: !0,
            minlength: 10,
            maxlength: 10
        },
        "val-nit": {
            required: !0,
            minlength: 17,
            maxlength: 17
        },
        "val-direccion1": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-direccion2": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-nombreempresa": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-cargoempresa": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-telefono1": {
            minlength: 9,
            maxlength: 9
        },
        "val-telefono2": {
            minlength: 9,
            maxlength: 9
        },
        "val-telefono3": {
            minlength: 9,
            maxlength: 9
        },
        "val-fechanacimiento": {
            required: !0
        },
        "val-genero": {
            required: !0
        },
        "val-estadocivil": {
            required: !0
        },
    },
    messages: {
        "val-nombreusuario": {
            required: "Por favor ingrese sus nombres",
            minlength: "Sus nombres debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario único",
            minlength: "Su usuario debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-dui": {
            required: "Por favor ingrese su número de dui",
            minlength: "Sus dui debe contener 9 dígitos con guión incluido",
            maxlength: "No puede exceder de 9 dígitos",
        },
        "val-nit": {
            required: "Por favor ingrese su número de nit",
            minlength: "Sus nit debe contener 17 dígitos con guión incluido",
            maxlength: "No puede exceder de 17 dígitos",
        },
        "val-nombreempresa": {
            required: "Por favor ingrese el nombre de la empresa dónde labora",
            minlength: "Su nombre de empresa debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-cargoempresa": {
            required: "Por favor ingrese el nombre del cargo de la empresa dónde labora",
            minlength: "Su nombre de cargo debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-direccion1": {
            required: "Por favor ingrese su dirección de residencia",
            minlength: "Su dirección debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-direccion2": {
            required: "Por favor ingrese su dirección de trabajo",
            minlength: "Su dirección debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-telefono1": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-telefono2": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-telefono3": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-username": {
            required: "Por favor ingrese su usuario",
            maxlength: "Su usuario debe contener al menos 5 carácteres"
        },
        "val-codigousuario-nuevosregistros": {
            required: "Por favor ingrese su usuario",
            maxlength: "Su usuario debe contener al menos 5 carácteres"
        },
        "val-fechanacimiento": "Por favor ingrese su fecha de nacimiento",
        "val-email": "Por favor ingrese un correo válido",
        "val-password": {
            required: "Por favor ingrese su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres"
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        "val-contrasenia-nuevosregistro": {
            required: "Por favor ingrese su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres"
        },
        "val-genero": "Por favor seleccione una opción",
        "val-estadocivil": "Por favor seleccione una opción",
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        "val-skill": "Please select a skill!",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        "val-phoneus": "Please enter a US phone!",
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-codesecurity": "Por favor ingrese su código de seguridad. Debe contener 5 dígitos",
        "val-terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


jQuery(".form-valide-with-icon").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 5
        },
        "val-password": {
            required: !0,
            minlength: 8
        }
    },
    messages: {
        "val-username": {
            required: "Por favor ingrese su usuario",
            minlength: "Su usuario debe contener al menos 5 carácteres"
        },
        "val-password": {
            required: "Por favor ingrese su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres"
        }
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});

jQuery(".form-valide1").validate({
    rules: {
        // SECCION PERFIL USUARIOS
        // CONFIGURACION DE LA CUENTA
        "val-nombreusuario": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-apellidousuario": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-usuariounico": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-contrasenia": {
            required: !0,
            minlength: 8
        },
        "val-confirmar-contrasenia": {
            required: !0,
            equalTo: "#val-contrasenia"
        },
        "val-correo": {
            required: !0,
            email: !0
        },
    },
    messages: {
        "val-nombreusuario": {
            required: "Por favor ingrese sus nombres",
            minlength: "Sus nombres debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario único",
            minlength: "Su usuario debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-correo": "Por favor ingrese un correo válido",
        "val-contrasenia": {
            required: "Por favor ingrese su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres"
        },
        "val-confirmar-contrasenia": {
            required: "Por favor ingrese nuevamente su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres",
            equalTo: "Su contraseña debe ser igual a la ingresada anteriormente"
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});

// REGISTRO DE NUEVOS USUARIOS

jQuery(".validacion-registro-usuarios").validate({
    rules: {
        // SECCION PERFIL USUARIOS
        // CONFIGURACION DE LA CUENTA
        "val-nombreusuario": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-apellidousuario": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-usuariounico": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-contrasenia": {
            required: !0,
            minlength: 8
        },
        "val-confirmar-contrasenia": {
            required: !0,
            equalTo: "#val-contrasenia"
        },
        "val-correo": {
            required: !0,
            email: !0
        },
        "val-rol-usuarios": {
            required: !0
        },
    },
    messages: {
        "val-nombreusuario": {
            required: "Por favor ingrese sus nombres",
            minlength: "Sus nombres debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario único",
            minlength: "Su usuario debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-correo": "Por favor ingrese un correo válido",
        "val-contrasenia": {
            required: "Por favor ingrese su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres"
        },
        "val-confirmar-contrasenia": {
            required: "Por favor ingrese nuevamente su contraseña",
            minlength: "Su contraseña debe contener al menos 8 carácteres",
            equalTo: "Su contraseña debe ser igual a la ingresada anteriormente"
        },
        "val-rol-usuarios": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});


jQuery(".validacion-registro-detalles-usuarios").validate({
    rules: {
        // DETALLES DE USUARIOS
        "val-dui": {
            required: !0,
            minlength: 10,
            maxlength: 10
        },
        "val-nit": {
            required: !0,
            minlength: 17,
            maxlength: 17
        },
        "val-direccion1": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-direccion2": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-nombreempresa": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-cargoempresa": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-telefono1": {
            minlength: 9,
            maxlength: 9
        },
        "val-telefono2": {
            minlength: 9,
            maxlength: 9
        },
        "val-telefono3": {
            minlength: 9,
            maxlength: 9
        },
        "val-fechanacimiento": {
            required: !0
        },
        "val-genero": {
            required: !0
        },
        "val-estadocivil": {
            required: !0
        },
    },
    messages: {
        "val-dui": {
            required: "Por favor ingrese su número de dui",
            minlength: "Sus dui debe contener 9 dígitos con guión incluido",
            maxlength: "No puede exceder de 9 dígitos",
        },
        "val-nit": {
            required: "Por favor ingrese su número de nit",
            minlength: "Sus nit debe contener 17 dígitos con guión incluido",
            maxlength: "No puede exceder de 17 dígitos",
        },
        "val-nombreempresa": {
            required: "Por favor ingrese el nombre de la empresa dónde labora",
            minlength: "Su nombre de empresa debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-cargoempresa": {
            required: "Por favor ingrese el nombre del cargo de la empresa dónde labora",
            minlength: "Su nombre de cargo debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-direccion1": {
            required: "Por favor ingrese su dirección de residencia",
            minlength: "Su dirección debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-direccion2": {
            required: "Por favor ingrese su dirección de trabajo",
            minlength: "Su dirección debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-telefono1": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-telefono2": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-telefono3": {
            minlength: "Su teléfono debe contener al menos 9 digítos",
            maxlength: "No puede exceder de 9 digítos",
        },
        "val-fechanacimiento": "Por favor ingrese su fecha de nacimiento",
        "val-genero": "Por favor seleccione una opción",
        "val-estadocivil": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


// MODIFICAR USUARIOS REGISTRADOS

jQuery(".validacion-modificar-usuarios").validate({
    rules: {
        // SECCION PERFIL USUARIOS
        // CONFIGURACION DE LA CUENTA
        "val-nombreusuario": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-apellidousuario": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-usuariounico": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-correo": {
            required: !0,
            email: !0
        },
        "val-rol-usuarios": {
            required: !0
        },
        "val-estado-usuarios": {
            required: !0
        },
    },
    messages: {
        "val-nombreusuario": {
            required: "Por favor ingrese sus nombres",
            minlength: "Sus nombres debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario único",
            minlength: "Su usuario debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-correo": "Por favor ingrese un correo válido",
        "val-rol-usuarios": "Por favor seleccione una opción",
        "val-estado-usuarios": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});

// REGISTRAR NUEVOS ROLES DE USUARIOS

jQuery(".validacion-registro-roles-usuarios").validate({
    rules: {
        "val-nombrerolusuarios": {
            required: !0,
            minlength: 3,
            maxlength: 75,
        },
        "val-descripcion-rolusuarios": {
            required: !0,
            minlength: 10,
            maxlength: 255
        },
    },
    messages: {
        "val-nombrerolusuarios": {
            required: "Por favor ingrese el nombre del rol de usuario",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 75 carácteres",
        },
        "val-descripcion-rolusuarios": {
            required: "Por favor ingrese la descripción completa del rol de usuario",
            minlength: "La descripción debe contener al menos 10 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});


// REGISTRAR NUEVOS PRODUCTOS CASHMAN HA

jQuery(".validacion-registro-productos").validate({
    rules: {
        "val-codigoproducto": {
            required: !0,
            minlength: 10,
            maxlength: 15,
        },
        "val-nombreproducto": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-descripcion-producto": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-requisitos-producto": {
            required: !0,
            minlength: 5,
            maxlength: 1000
        },
        "val-estado-producto": {
            required: !0
        },
    },
    messages: {
        "val-codigoproducto": {
            required: "Por favor ingrese el código único del producto",
            minlength: "El código debe contener al menos 10 carácteres sin incluir código empresarial",
            maxlength: "No puede exceder de 15 carácteres",
        },
        "val-nombreproducto": {
            required: "Por favor ingrese el nombre del producto",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-descripcion-producto": {
            required: "Por favor ingrese la descripción completa del producto",
            minlength: "Su descripción debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-requisitos-producto": {
            required: "Por favor ingrese los requisitos completos de este producto",
            minlength: "Su descripción debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 1,000 carácteres",
        },
        "val-estado-producto": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});

// REGISTRO NUEVOS MENSAJES -> MENSAJERIA INTERNA CASHMAN H.A


jQuery(".validacion-registro-mensajes").validate({
    rules: {
        "val-codigoproducto": {
            required: !0,
            minlength: 10,
            maxlength: 15,
        },
        "val-nombreproducto": {
            required: !0,
            minlength: 3,
            maxlength: 255
        },
        "val-descripcion-producto": {
            required: !0,
            minlength: 5,
            maxlength: 255
        },
        "val-requisitos-producto": {
            required: !0,
            minlength: 5,
            maxlength: 1000
        },
        "val-estado-producto": {
            required: !0
        },
    },
    messages: {
        "val-codigoproducto": {
            required: "Por favor ingrese el código único del producto",
            minlength: "El código debe contener al menos 10 carácteres sin incluir código empresarial",
            maxlength: "No puede exceder de 15 carácteres",
        },
        "val-nombreproducto": {
            required: "Por favor ingrese el nombre del producto",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-descripcion-producto": {
            required: "Por favor ingrese la descripción completa del producto",
            minlength: "Su descripción debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-requisitos-producto": {
            required: "Por favor ingrese los requisitos completos de este producto",
            minlength: "Su descripción debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 1,000 carácteres",
        },
        "val-estado-producto": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});



// REGISTRAR NUEVOS PRESTAMOS PERSONALES CLIENTES, HIPOTECARIOS

jQuery(".validacion-registro-credito-personal").validate({
    rules: {
        "valproductocreditos": {
            required: !0,
        },
        "valtipoclientecredito": {
            required: !0,
        },
        "valsalariocliente": {
            required: !0,
        },
        "valmontocreditoclientes": {
            required: !0,
        },
        "valplazocredito": {
            required: !0,
        },
        "valfechaingresosolicitud": {
            required: !0,
        },
        "valobservaciones": {
            minlength: 5,
            maxlength: 255,
        },
    },
    messages: {
        "valproductocreditos": "Por favor seleccione una opción",
        "valtipoclientecredito": "Por favor seleccione una opción",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del crédito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del crédito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del crédito solicitado",
        "valobservaciones": {
            minlength: "Debe ingresar una observación de al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});

// REGISTRAR NUEVOS PRESTAMOS PARA VEHICULOS CLIENTES

jQuery(".validacion-registro-credito-vehiculos").validate({
    rules: {
        "valproductocreditos": {
            required: !0,
        },
        "valtipoclientecredito": {
            required: !0,
        },
        "valsalariocliente": {
            required: !0,
        },
        "valmontocreditoclientes": {
            required: !0,
        },
        "valplazocredito": {
            required: !0,
        },
        "valfechaingresosolicitud": {
            required: !0,
        },
        "valobservaciones": {
            required: !0,
            minlength: 5,
            maxlength: 1500,
        },
    },
    messages: {
        "valproductocreditos": "Por favor seleccione una opción",
        "valtipoclientecredito": "Por favor seleccione una opción",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del crédito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del crédito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del crédito solicitado",
        "valobservaciones": {
            required: "Por favor ingrese las observaciones del crédito a otorgar",
            minlength: "Debe ingresar una observación de al menos 5 carácteres",
            maxlength: "No puede exceder de 1500 carácteres",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});


// REGISTRO Y GESTION DE REFERENCIAS PERSONALES -> CLIENTES CASHMAN H.A

jQuery(".validacion-registro-referencias-clientes").validate({
    rules: {
        "val-nombrereferenciapersonal": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-apellidosreferenciapersonal": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-empresareferenciapersonal": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-profesionreferenciapersonal": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-telefonoreferenciapersonal": {
            required: !0,
            minlength: 9,
            maxlength: 9,
        },
        "val-nombrereferencialaboral": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-apellidosreferencialaboral": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-empresareferencialaboral": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-profesionreferencialaboral": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-telefonoreferencialaboral": {
            required: !0,
            minlength: 9,
            maxlength: 9,
        },
        
    },
    messages: {
        "val-nombrereferenciapersonal": {
            required: "Por favor ingrese los nombres de su referencia personal",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidosreferenciapersonal": {
            required: "Por favor ingrese los apellidos de su referencia personal",
            minlength: "Los apellidos deben contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-empresareferenciapersonal": {
            required: "Por favor ingrese el nombre en dónde labora su referencia personal",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-profesionreferenciapersonal": {
            required: "Por favor ingrese la profesión u oficio su referencia personal",
            minlength: "La profesión u oficio debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-telefonoreferenciapersonal": {
            required: "Por favor ingrese el teléfono su referencia personal",
            minlength: "El teléfono debe contener 8 dígitos",
            maxlength: "No puede exceder de 8 digítos",
        },
        "val-nombrereferencialaboral": {
            required: "Por favor ingrese los nombres de su referencia personal",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-apellidosreferencialaboral": {
            required: "Por favor ingrese los apellidos de su referencia personal",
            minlength: "Los apellidos deben contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-empresareferencialaboral": {
            required: "Por favor ingrese el nombre en dónde labora su referencia personal",
            minlength: "El nombre debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-profesionreferencialaboral": {
            required: "Por favor ingrese la profesión u oficio su referencia personal",
            minlength: "La profesión u oficio debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-telefonoreferencialaboral": {
            required: "Por favor ingrese el teléfono su referencia personal",
            minlength: "El teléfono debe contener 8 dígitos",
            maxlength: "No puede exceder de 8 digítos",
        },
        
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});


// REGISTRAR NUEVOS PRESTAMOS PARA VEHICULOS CLIENTES

jQuery(".validacion-actualizacion-revisiones-creditos-clientes").validate({
    rules: {
        "valproductocreditos": {
            required: !0,
        },
        "valtipoclientecredito": {
            required: !0,
        },
        "valsalariocliente": {
            required: !0,
        },
        "valmontocreditoclientes": {
            required: !0,
        },
        "valplazocredito": {
            required: !0,
        },
        "valfechaingresosolicitud": {
            required: !0,
        },
        "valobservacionesgerencia": {
            required: !0,
            minlength: 5,
            maxlength: 1500,
        },
        "valestadoinicialcreditos": {
            required: !0,
        },
        "valobservacionespresidencia": {
            required: !0,
            minlength: 5,
            maxlength: 1500,
        },
        "valestadofinalcreditos": {
            required: !0,
        },
    },
    messages: {
        "valproductocreditos": "Por favor seleccione una opción",
        "valtipoclientecredito": "Por favor seleccione una opción",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del crédito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del crédito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del crédito solicitado",
        "valobservacionesgerencia": {
            required: "Por favor ingrese las observaciones del crédito a otorgar",
            minlength: "Debe ingresar una observación de al menos 5 carácteres",
            maxlength: "No puede exceder de 1500 carácteres",
        },
        "valestadoinicialcreditos": "Por favor seleccione una opción",
        "valobservacionespresidencia": {
            required: "Por favor ingrese las observaciones del crédito a otorgar",
            minlength: "Debe ingresar una observación de al menos 5 carácteres",
            maxlength: "No puede exceder de 1500 carácteres",
        },
        "valestadofinalcreditos": "Por favor seleccione una opción",
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});






// REGISTRO DATOS VEHICULOS -> CONTRATO FINAL PRESTAMOS DE VEHICULOS

jQuery(".validacion-registro-datos-vehiculos-contrato").validate({
    rules: {
        "val-numeroplacavehiculo": {
            required: !0,
            minlength: 7,
            maxlength: 7,
        },
        "val-tipoclasevehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 30,
        },
        "val-aniovehiculo": {
            required: !0,
            minlength: 4,
            maxlength: 4,
        },
        "val-capacidadvehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 5,
        },
        "val-asientosvehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 5,
        },
        "val-marcavehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-modelovehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 255,
        },
        "val-numeromotorvehiculo": {
            required: !0,
            minlength: 6,
            maxlength: 17,
        },
        "val-numerochasisvehiculo": {
            required: !0,
            minlength: 17,
            maxlength: 17,
        },
        "val-numerochasisvinvehiculo": { // APLICA N/D SI ES DE AGENCIA
            required: !0,
            minlength: 3,
            maxlength: 17,
        },
        "val-colorvehiculo": {
            required: !0,
            minlength: 3,
            maxlength: 40,
        },
        "val-copiacontratousuarios": {
            required: !0,
        },
        
        
    },
    messages: {
        "val-numeroplacavehiculo": {
            required: "Por favor ingrese el número de placa del vehículo",
            minlength: "El nombre debe contener al menos 7 carácteres",
            maxlength: "No puede exceder de 7 carácteres",
        },
        "val-tipoclasevehiculo": {
            required: "Por favor ingrese la clase del vehículo",
            minlength: "Los apellidos deben contener al menos 3 carácteres",
            maxlength: "No puede exceder de 30 carácteres",
        },
        "val-aniovehiculo": {
            required: "Por favor ingrese el año del vehículo",
            minlength: "El año debe contener al menos 4 dígitos",
            maxlength: "No puede exceder de 4 dígitos",
        },
        "val-capacidadvehiculo": {
            required: "Por favor ingrese la capacidad del vehículo",
            minlength: "La capacidad debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 5 carácteres",
        },
        "val-asientosvehiculo": {
            required: "Por favor ingrese el número de asientos del vehículo",
            minlength: "El teléfono debe contener 3 dígitos",
            maxlength: "No puede exceder de 5 digítos",
        },
        "val-marcavehiculo": {
            required: "Por favor ingrese la marca del vehículo",
            minlength: "La marca debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-modelovehiculo": {
            required: "Por favor ingrese el modelo del vehículo",
            minlength: "El modelo debe contener al menos 3 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-numeromotorvehiculo": {
            required: "Por favor ingrese el número del motor del vehículo",
            minlength: "El número de motor debe contener al menos 6 carácteres",
            maxlength: "No puede exceder de 17 carácteres",
        },
        "val-numerochasisvehiculo": {
            required: "Por favor ingrese el número de chasis grebado",
            minlength: "El número de chasis debe contener al menos 17 carácteres",
            maxlength: "No puede exceder de 17 carácteres",
        },
        "val-numerochasisvinvehiculo": {
            required: "Por favor ingrese el número de chasis vin del vehículo",
            minlength: "El número de chasis vin debe contener 3 carácteres",
            maxlength: "No puede exceder de 17 carácteres",
        },
        "val-colorvehiculo": {
            required: "Por favor ingrese el color del vehículo",
            minlength: "El número de chasis vin debe contener 3 carácteres",
            maxlength: "No puede exceder de 40 carácteres",
        },
        "val-copiacontratousuarios": {
            required: "Por favor adjunte la copia del contrato final generado (debe descargar archivo si no lo ha realizado)...",
        },
        
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});



// REGISTRO REPORTES DE FALLOS PLATAFORMA

jQuery(".validacion-registro-ticket-problemas").validate({
    rules: {
        "val-nombrereporte": {
            required: !0,
            minlength: 5,
            maxlength: 255,
        },
        "val-descripcion-reporte": {
            required: !0,
            minlength: 5,
            maxlength: 3000,
        },       
        "val-fotoreporteproblema": {
            required: !0,
        },  
        "val-comentario-reporte": {
            required: !0,
            minlength: 5,
            maxlength: 3000,
        },
        "val-estado-reporte-plataforma": {
            required: !0,
        },
    },
    messages: {
        "val-nombrereporte": {
            required: "Por favor ingrese el nombre de su ticket de problema",
            minlength: "El nombre debe contener al menos 5 carácteres",
            maxlength: "No puede exceder de 255 carácteres",
        },
        "val-descripcion-reporte": {
            required: "Por favor ingrese la descripción de su ticket de problema",
            minlength: "La descripción deben contener al menos 5 carácteres",
            maxlength: "No puede exceder de 3,000 carácteres",
        },
        "val-fotoreporteproblema": {
            required: "Por favor adjunte la captura de pantalla presentando el problema descrito",
        },
        "val-comentario-reporte": {
            required: "Por favor ingrese el comentario de actualización de su ticket de problema",
            minlength: "El comentario de actualización deben contener al menos 5 carácteres",
            maxlength: "No puede exceder de 3,000 carácteres",
        },
        "val-estado-reporte-plataforma": {
            required: "Por favor seleccione un estado de actualización de este ticket de problema",
        },
        
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});


// REGISTRO NUEVAS CUENTAS DE AHORRO CLIENTES

jQuery(".validacion-registro-cuentas-ahorros").validate({
    rules: {
        "val-numerocuentaahorro": {
            required: !0,
            minlength: 9,
            maxlength: 9,
        },
        "val-montodepositoapertura": {
            required: !0,
            minlength: 2,
            maxlength: 11,
        },       
        "val-clientecuentaahorro": {
            required: !0,
        },
    },
    messages: {
        "val-numerocuentaahorro": {
            required: "Por favor ingrese el número único de cuenta de ahorro",
            minlength: "El número de cuenta debe contener 9 dígitos",
            maxlength: "No puede exceder de 9 dígitos",
        },
        "val-montodepositoapertura": {
            required: "Por favor ingrese el monto de apertura de cuenta de ahorro",
            minlength: "El monto de apertura debe contener al menos 2 dígitos",
            maxlength: "No puede exceder de 11 dígitos",
        },
        "val-clientecuentaahorro": {
            required: "Por favor seleccione el cliente que aperturará nueva cuenta de ahorro",
        },
        
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }
});








