$(document).ready(function () {

    $("#loginForm").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            usuario: {
                required: "El usuario es obligatorio",
                minlength: "El usuario debe tener por lo menos 2 caracteres"
            },
            password: {
                required: "La contraseña es obligatoria",
                minlength: "Su contraseña al menos debe tener 6 caracteres"
            },
        },
        errorElement: "em",
        submitHandler: submitIniciaSession,
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {

            jQuery(element).closest('.form-control').addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            jQuery(element).closest('.form-control').addClass('is-valid').removeClass('is-invalid');
        }
    });
});
//Inicia Sesión
function submitIniciaSession() {
     
    var data = $("#loginForm").serialize();//captura todos los campos
    $.ajax({
        data: data,
        url: 'includes/procesar_inicio_de_sesion.php',
        type: 'post',
        beforeSend: function () {
             
            $("#error").fadeOut();
            $("#btn-login").html('<img src="img/cargando.gif" width="15" height="15"/>&nbsp; Espere...').attr('disabled', 'disabled');
        },
        success: function (response) {
//Verificar si recibe el echo 1 en el procesamiento:
            console.log(response);
            if (response == 1) {
                $("#btn-login").html('<img src="img/cargando.gif" width="15" height="15"/>&nbsp; Iniciando sesión ...');
                setTimeout(' window.location.href = "inicio/index.php"; ', 1000);
            } else {
                $("#error").fadeIn(1000, function () {
                    $("#btn-login").html('Iniciar Sesión').removeAttr('disabled');  
                    $("#error").html('<div class="alert alert-danger"><strong>Sucedió un problema. </strong> ' + response + '</div>');
                });
            }
        }
    });

    return false;
}
