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
            minlength: "Sus nombres debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario ??nico",
            minlength: "Su usuario debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-dui": {
            required: "Por favor ingrese su n??mero de dui",
            minlength: "Sus dui debe contener 9 d??gitos con gui??n incluido",
            maxlength: "No puede exceder de 9 d??gitos",
        },
        "val-nit": {
            required: "Por favor ingrese su n??mero de nit",
            minlength: "Sus nit debe contener 17 d??gitos con gui??n incluido",
            maxlength: "No puede exceder de 17 d??gitos",
        },
        "val-nombreempresa": {
            required: "Por favor ingrese el nombre de la empresa d??nde labora",
            minlength: "Su nombre de empresa debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-cargoempresa": {
            required: "Por favor ingrese el nombre del cargo de la empresa d??nde labora",
            minlength: "Su nombre de cargo debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-direccion1": {
            required: "Por favor ingrese su direcci??n de residencia",
            minlength: "Su direcci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-direccion2": {
            required: "Por favor ingrese su direcci??n de trabajo",
            minlength: "Su direcci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-telefono1": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-telefono2": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-telefono3": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-username": {
            required: "Por favor ingrese su usuario",
            maxlength: "Su usuario debe contener al menos 5 car??cteres"
        },
        "val-codigousuario-nuevosregistros": {
            required: "Por favor ingrese su usuario",
            maxlength: "Su usuario debe contener al menos 5 car??cteres"
        },
        "val-fechanacimiento": "Por favor ingrese su fecha de nacimiento",
        "val-email": "Por favor ingrese un correo v??lido",
        "val-password": {
            required: "Por favor ingrese su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres"
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        "val-contrasenia-nuevosregistro": {
            required: "Por favor ingrese su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres"
        },
        "val-genero": "Por favor seleccione una opci??n",
        "val-estadocivil": "Por favor seleccione una opci??n",
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
        "val-codesecurity": "Por favor ingrese su c??digo de seguridad. Debe contener 5 d??gitos",
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
            minlength: "Su usuario debe contener al menos 5 car??cteres"
        },
        "val-password": {
            required: "Por favor ingrese su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres"
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
            minlength: "Sus nombres debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario ??nico",
            minlength: "Su usuario debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-correo": "Por favor ingrese un correo v??lido",
        "val-contrasenia": {
            required: "Por favor ingrese su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres"
        },
        "val-confirmar-contrasenia": {
            required: "Por favor ingrese nuevamente su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres",
            equalTo: "Su contrase??a debe ser igual a la ingresada anteriormente"
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
            minlength: "Sus nombres debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario ??nico",
            minlength: "Su usuario debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-correo": "Por favor ingrese un correo v??lido",
        "val-contrasenia": {
            required: "Por favor ingrese su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres"
        },
        "val-confirmar-contrasenia": {
            required: "Por favor ingrese nuevamente su contrase??a",
            minlength: "Su contrase??a debe contener al menos 8 car??cteres",
            equalTo: "Su contrase??a debe ser igual a la ingresada anteriormente"
        },
        "val-rol-usuarios": "Por favor seleccione una opci??n",
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
            required: "Por favor ingrese su n??mero de dui",
            minlength: "Sus dui debe contener 9 d??gitos con gui??n incluido",
            maxlength: "No puede exceder de 9 d??gitos",
        },
        "val-nit": {
            required: "Por favor ingrese su n??mero de nit",
            minlength: "Sus nit debe contener 17 d??gitos con gui??n incluido",
            maxlength: "No puede exceder de 17 d??gitos",
        },
        "val-nombreempresa": {
            required: "Por favor ingrese el nombre de la empresa d??nde labora",
            minlength: "Su nombre de empresa debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-cargoempresa": {
            required: "Por favor ingrese el nombre del cargo de la empresa d??nde labora",
            minlength: "Su nombre de cargo debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-direccion1": {
            required: "Por favor ingrese su direcci??n de residencia",
            minlength: "Su direcci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-direccion2": {
            required: "Por favor ingrese su direcci??n de trabajo",
            minlength: "Su direcci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-telefono1": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-telefono2": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-telefono3": {
            minlength: "Su tel??fono debe contener al menos 9 dig??tos",
            maxlength: "No puede exceder de 9 dig??tos",
        },
        "val-fechanacimiento": "Por favor ingrese su fecha de nacimiento",
        "val-genero": "Por favor seleccione una opci??n",
        "val-estadocivil": "Por favor seleccione una opci??n",
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
            minlength: "Sus nombres debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidousuario": {
            required: "Por favor ingrese sus apellidos",
            minlength: "Sus apellidos debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-usuariounico": {
            required: "Por favor ingrese su usuario ??nico",
            minlength: "Su usuario debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-correo": "Por favor ingrese un correo v??lido",
        "val-rol-usuarios": "Por favor seleccione una opci??n",
        "val-estado-usuarios": "Por favor seleccione una opci??n",
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
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 75 car??cteres",
        },
        "val-descripcion-rolusuarios": {
            required: "Por favor ingrese la descripci??n completa del rol de usuario",
            minlength: "La descripci??n debe contener al menos 10 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
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
            required: "Por favor ingrese el c??digo ??nico del producto",
            minlength: "El c??digo debe contener al menos 10 car??cteres sin incluir c??digo empresarial",
            maxlength: "No puede exceder de 15 car??cteres",
        },
        "val-nombreproducto": {
            required: "Por favor ingrese el nombre del producto",
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-descripcion-producto": {
            required: "Por favor ingrese la descripci??n completa del producto",
            minlength: "Su descripci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-requisitos-producto": {
            required: "Por favor ingrese los requisitos completos de este producto",
            minlength: "Su descripci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 1,000 car??cteres",
        },
        "val-estado-producto": "Por favor seleccione una opci??n",
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
            required: "Por favor ingrese el c??digo ??nico del producto",
            minlength: "El c??digo debe contener al menos 10 car??cteres sin incluir c??digo empresarial",
            maxlength: "No puede exceder de 15 car??cteres",
        },
        "val-nombreproducto": {
            required: "Por favor ingrese el nombre del producto",
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-descripcion-producto": {
            required: "Por favor ingrese la descripci??n completa del producto",
            minlength: "Su descripci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-requisitos-producto": {
            required: "Por favor ingrese los requisitos completos de este producto",
            minlength: "Su descripci??n debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 1,000 car??cteres",
        },
        "val-estado-producto": "Por favor seleccione una opci??n",
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
        "valproductocreditos": "Por favor seleccione una opci??n",
        "valtipoclientecredito": "Por favor seleccione una opci??n",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del cr??dito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del cr??dito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del cr??dito solicitado",
        "valobservaciones": {
            minlength: "Debe ingresar una observaci??n de al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
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
        "valproductocreditos": "Por favor seleccione una opci??n",
        "valtipoclientecredito": "Por favor seleccione una opci??n",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del cr??dito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del cr??dito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del cr??dito solicitado",
        "valobservaciones": {
            required: "Por favor ingrese las observaciones del cr??dito a otorgar",
            minlength: "Debe ingresar una observaci??n de al menos 5 car??cteres",
            maxlength: "No puede exceder de 1500 car??cteres",
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
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidosreferenciapersonal": {
            required: "Por favor ingrese los apellidos de su referencia personal",
            minlength: "Los apellidos deben contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-empresareferenciapersonal": {
            required: "Por favor ingrese el nombre en d??nde labora su referencia personal",
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-profesionreferenciapersonal": {
            required: "Por favor ingrese la profesi??n u oficio su referencia personal",
            minlength: "La profesi??n u oficio debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-telefonoreferenciapersonal": {
            required: "Por favor ingrese el tel??fono su referencia personal",
            minlength: "El tel??fono debe contener 8 d??gitos",
            maxlength: "No puede exceder de 8 dig??tos",
        },
        "val-nombrereferencialaboral": {
            required: "Por favor ingrese los nombres de su referencia personal",
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-apellidosreferencialaboral": {
            required: "Por favor ingrese los apellidos de su referencia personal",
            minlength: "Los apellidos deben contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-empresareferencialaboral": {
            required: "Por favor ingrese el nombre en d??nde labora su referencia personal",
            minlength: "El nombre debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-profesionreferencialaboral": {
            required: "Por favor ingrese la profesi??n u oficio su referencia personal",
            minlength: "La profesi??n u oficio debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-telefonoreferencialaboral": {
            required: "Por favor ingrese el tel??fono su referencia personal",
            minlength: "El tel??fono debe contener 8 d??gitos",
            maxlength: "No puede exceder de 8 dig??tos",
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
        "valproductocreditos": "Por favor seleccione una opci??n",
        "valtipoclientecredito": "Por favor seleccione una opci??n",
        "valsalariocliente": "Ingrese el salario de este cliente",
        "valmontocreditoclientes": "Ingrese el monto del cr??dito solicitado por el cliente",
        "valplazocredito": "Por favor ingrese el plazo del cr??dito solicitado por el cliente",
        "valfechaingresosolicitud": "Por favor ingrese la fecha de inicio del cr??dito solicitado",
        "valobservacionesgerencia": {
            required: "Por favor ingrese las observaciones del cr??dito a otorgar",
            minlength: "Debe ingresar una observaci??n de al menos 5 car??cteres",
            maxlength: "No puede exceder de 1500 car??cteres",
        },
        "valestadoinicialcreditos": "Por favor seleccione una opci??n",
        "valobservacionespresidencia": {
            required: "Por favor ingrese las observaciones del cr??dito a otorgar",
            minlength: "Debe ingresar una observaci??n de al menos 5 car??cteres",
            maxlength: "No puede exceder de 1500 car??cteres",
        },
        "valestadofinalcreditos": "Por favor seleccione una opci??n",
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
            required: "Por favor ingrese el n??mero de placa del veh??culo",
            minlength: "El nombre debe contener al menos 7 car??cteres",
            maxlength: "No puede exceder de 7 car??cteres",
        },
        "val-tipoclasevehiculo": {
            required: "Por favor ingrese la clase del veh??culo",
            minlength: "Los apellidos deben contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 30 car??cteres",
        },
        "val-aniovehiculo": {
            required: "Por favor ingrese el a??o del veh??culo",
            minlength: "El a??o debe contener al menos 4 d??gitos",
            maxlength: "No puede exceder de 4 d??gitos",
        },
        "val-capacidadvehiculo": {
            required: "Por favor ingrese la capacidad del veh??culo",
            minlength: "La capacidad debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 5 car??cteres",
        },
        "val-asientosvehiculo": {
            required: "Por favor ingrese el n??mero de asientos del veh??culo",
            minlength: "El tel??fono debe contener 3 d??gitos",
            maxlength: "No puede exceder de 5 dig??tos",
        },
        "val-marcavehiculo": {
            required: "Por favor ingrese la marca del veh??culo",
            minlength: "La marca debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-modelovehiculo": {
            required: "Por favor ingrese el modelo del veh??culo",
            minlength: "El modelo debe contener al menos 3 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-numeromotorvehiculo": {
            required: "Por favor ingrese el n??mero del motor del veh??culo",
            minlength: "El n??mero de motor debe contener al menos 6 car??cteres",
            maxlength: "No puede exceder de 17 car??cteres",
        },
        "val-numerochasisvehiculo": {
            required: "Por favor ingrese el n??mero de chasis grebado",
            minlength: "El n??mero de chasis debe contener al menos 17 car??cteres",
            maxlength: "No puede exceder de 17 car??cteres",
        },
        "val-numerochasisvinvehiculo": {
            required: "Por favor ingrese el n??mero de chasis vin del veh??culo",
            minlength: "El n??mero de chasis vin debe contener 3 car??cteres",
            maxlength: "No puede exceder de 17 car??cteres",
        },
        "val-colorvehiculo": {
            required: "Por favor ingrese el color del veh??culo",
            minlength: "El n??mero de chasis vin debe contener 3 car??cteres",
            maxlength: "No puede exceder de 40 car??cteres",
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
            minlength: "El nombre debe contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 255 car??cteres",
        },
        "val-descripcion-reporte": {
            required: "Por favor ingrese la descripci??n de su ticket de problema",
            minlength: "La descripci??n deben contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 3,000 car??cteres",
        },
        "val-fotoreporteproblema": {
            required: "Por favor adjunte la captura de pantalla presentando el problema descrito",
        },
        "val-comentario-reporte": {
            required: "Por favor ingrese el comentario de actualizaci??n de su ticket de problema",
            minlength: "El comentario de actualizaci??n deben contener al menos 5 car??cteres",
            maxlength: "No puede exceder de 3,000 car??cteres",
        },
        "val-estado-reporte-plataforma": {
            required: "Por favor seleccione un estado de actualizaci??n de este ticket de problema",
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
            required: "Por favor ingrese el n??mero ??nico de cuenta de ahorro",
            minlength: "El n??mero de cuenta debe contener 9 d??gitos",
            maxlength: "No puede exceder de 9 d??gitos",
        },
        "val-montodepositoapertura": {
            required: "Por favor ingrese el monto de apertura de cuenta de ahorro",
            minlength: "El monto de apertura debe contener al menos 2 d??gitos",
            maxlength: "No puede exceder de 11 d??gitos",
        },
        "val-clientecuentaahorro": {
            required: "Por favor seleccione el cliente que aperturar?? nueva cuenta de ahorro",
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








