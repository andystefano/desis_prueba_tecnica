/*
Clase creada por mi para este ejercicio para manejar todos los aspectos de la votacion
tiene distintos metodos para validar cada uno de los campos por separado,
para detectar los eventos de onchange de region y cargar la lista
para cargar json con regiones y comunas que vienen desde la bd
validar formulario general, mostarr errores, enviar datos a BD y mas.
No usa jquery ni otra libreria el objetivo es demostrar la habilidad para poder solucionar problemas con codigo 100% nativo
*/
class Votacion {
    constructor() {
        this.jsonUbicaciones = null; // Propiedad para almacenar el JSON cargado
        this.jsonCandidatos = null; // Propiedad para almacenar el jsonCandidatos cargado
    }

    async cargarJSONUbicaciones(url) {
        /*
        Este metodo carga en una variable todas las comunas y regiones 
        obtetidas desde un json que traemos desde la abse de datos
        */
        try {
            const responseU = await fetch(url);
            if (!responseU.ok) {
                throw new Error('Error al cargar el JSON');
            }
            this.jsonUbicaciones = await responseU.json();
            console.log('JSON de ubicaciones cargado exitosamente:', this.jsonUbicaciones);
        } catch (error) {
            console.error('Error al cargar el JSON de ubicaciones:', error.message);
        }
    }

    async cargarJSONCandidatos(url) {
        /*
        Este metodo carga en una variable todas los candidatos
        obtetidas desde un json que traemos desde la base de datos de datos
        */
        try {
            const responseC = await fetch(url);
            if (!responseC.ok) {
                throw new Error('Error al cargar el JSON');
            }
            this.jsonCandidatos = await responseC.json();
            console.log('JSON de candidatos cargado exitosamente:', this.jsonCandidatos);
        } catch (error) {
            console.error('Error al cargar el JSON de candidatos:', error.message);
        }
    }

    cargarRegionesEnSelect() {
        const selectElement = document.getElementById('id_region');

        if (!selectElement || !Array.isArray(this.jsonUbicaciones)) {
            console.error('El elemento select o el JSON de ubicaciones no están disponibles.');
            return;
        }



        const regionesSet = new Set(); // Conjunto para almacenar los region_id ya agregados

        this.jsonUbicaciones.forEach((ubicacion) => {
            if (!regionesSet.has(ubicacion.region_id)) {
                const option = document.createElement('option');
                option.value = ubicacion.region_id;
                option.textContent = ubicacion.region;
                selectElement.appendChild(option);
                regionesSet.add(ubicacion.region_id); // Agregar el region_id al conjunto para evitar duplicados
            }
        });

        console.log('Regiones Cargadas al Formulario.');
    }


    eliminarYcargarComunas(idRegion) {
        const selectComuna = document.getElementById('id_comuna');

        if (!selectComuna || !Array.isArray(this.jsonUbicaciones)) {
            console.error('El elemento select o el JSON de ubicaciones no están disponibles.');
            return;
        }

        // Eliminar todas las opciones menos la primera
        while (selectComuna.options.length > 1) {
            selectComuna.remove(1);
        }

        const comunasRegion = this.jsonUbicaciones
            .filter((ubicacion) => ubicacion.region_id === idRegion)
            .sort((a, b) => a.comuna.localeCompare(b.comuna)); // Ordenar alfabéticamente

        comunasRegion.forEach((ubicacion) => {
            const option = document.createElement('option');
            option.value = ubicacion.comuna_id;
            option.textContent = ubicacion.comuna;
            selectComuna.appendChild(option);
        });

        console.log('Comunas cargadas y ordenadas alfabéticamente.');
    }


    validarNombreCompleto() {

        //

        const nombreCompletoInput = document.getElementById('nombre_completo');
        const ErrorNombreCompleto = document.getElementById('error-nombre_completo');

        if (!nombreCompletoInput) {
            console.error('El campo "nombre_completo" no está disponible.');
            return false;
        }

        const nombreCompleto = nombreCompletoInput.value.trim();

        if (nombreCompleto === '') {
            // El campo está vacío
            ErrorNombreCompleto.innerHTML = "Debe escrirbir el nombre completo";
            return false;
        } else {
            // El campo no está vacío
            ErrorNombreCompleto.innerHTML = "";
            return true;
        }

    }


    validarAlias() {
        const aliasInput = document.getElementById('alias');
        const mensajeErrorAlias = document.getElementById('error-alias');

        if (!aliasInput) {
            console.error('El campo "alias" no está disponible.');
            return false;
        }

        const alias = aliasInput.value.trim();

        // Expresión regular para verificar si el alias tiene al menos 6 caracteres y contiene letras y números
        const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

        if (!regex.test(alias)) {
            // El alias no cumple con los requisitos, mostrar mensaje de error
            mensajeErrorAlias.innerHTML = 'El alias debe tener al menos 6 caracteres y contener letras y números.';
            return false;
        } else {
            // El alias cumple con los requisitos, borrar mensaje de error si existe
            mensajeErrorAlias.innerHTML = '';
            return true;
        }
    }




    validaRut(rutCompleto) {
        if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto))
            return false;
        var tmp = rutCompleto.split('-');
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == 'K') digv = 'k';
        return this.dv(rut) == digv;
    }

    // Cálculo del dígito verificador para el RUT chileno
    dv(T) {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        return S ? S - 1 : 'k';
    }




    async validarRutDisponible(rut) {
        // Realizar la consulta AJAX al archivo verifica_rut.php con el parámetro rut
        const url = `verifica_rut.php?rut=${rut}`;

        return new Promise((resolve, reject) => {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Verificar el estado del JSON y resolver la promesa según corresponda
                    console.log(data);
                    if (data.estado === '1') {
                        resolve(true); // RUT disponible
                        console.log("ejecuta - RUT disponible");
                    } else if (data.estado === '0') {
                        console.log("ejecuta - RUT no disponible");
                        resolve(false); // RUT usado
                    } else {
                        reject('Error en la respuesta del servidor'); // Respuesta inválida
                    }
                })
                .catch(error => {
                    reject(error); // Error en la consulta AJAX
                });
        });
    }

    // Función para validar el RUT en el elemento con id "rut"
    async validarRutInput() {
        const rutInput = document.getElementById('rut');
        const errorRut = document.getElementById('error-rut');

        if (!rutInput) {
            console.error('El campo "rut" no está disponible.');
            return false;
        }

        let rut = rutInput.value.trim();
        rut = rut.replace(/\./g, ''); // Eliminar puntos del rut

        // Verificar si el rut es válido utilizando la función validaRut() de la clase Validador
        if (!this.validaRut(rut)) {
            errorRut.innerHTML = 'El RUT ingresado no es válido.';
            return false;
        } else {
            try {
                const disponible = await this.validarRutDisponible(rut);
                if (disponible) {
                    console.log('Rut disponible');
                    errorRut.innerHTML = '';
                    return true;
                } else {
                    errorRut.innerHTML = 'El RUT ingresado ya está en uso.';
                    return false;
                }
            } catch (error) {
                // Manejar el error si ocurriera algún problema con la consulta asincrónica.
                console.error('Error al validar el RUT:', error);
                return false;
            }
        }
    }



    validarEmail() {
        const emailInput = document.getElementById('email');
        const errorEmail = document.getElementById('error-email');

        if (!emailInput) {
            console.error('El campo "email" no está disponible.');
            return false;
        }

        const email = emailInput.value.trim();

        // Expresión regular para validar el formato del correo electrónico
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (!regex.test(email)) {
            errorEmail.innerHTML = 'El correo electrónico ingresado no es válido.';
            return false;
        }

        // El email es válido
        errorEmail.innerHTML = '';
        return true;
    }



    validarRegion() {
        const regionSelect = document.getElementById('id_region');
        const errorRegion = document.getElementById('error-id_region');

        if (!regionSelect) {
            console.error('El campo "id_region" no está disponible.');
            return false;
        }

        const selectedValue = regionSelect.value;

        // Verificar si se ha seleccionado una opción válida
        if (selectedValue === '') {
            errorRegion.innerHTML = 'Debe seleccionar una región.';
            return false;
        }

        // La región es válida
        errorRegion.innerHTML = '';
        return true;
    }


    validarComuna() {
        const comunaSelect = document.getElementById('id_comuna');
        const errorComuna = document.getElementById('error-id_comuna');

        if (!comunaSelect) {
            console.error('El campo "id_comuna" no está disponible.');
            return false;
        }

        const selectedComunaValue = comunaSelect.value;

        // Verificar si se ha seleccionado una comuna válida
        if (selectedComunaValue === '') {
            errorComuna.innerHTML = 'Debe seleccionar una comuna.';
            return false;
        }

        // La comuna es válida
        errorComuna.innerHTML = '';
        return true;
    }



    validarCandidato() {
        const candidatoSelect = document.getElementById('id_candidato');
        const errorCandidato = document.getElementById('error-id_candidato');

        if (!candidatoSelect) {
            console.error('El campo "id_candidato" no está disponible.');
            return false;
        }

        const selectedCandidatoValue = candidatoSelect.value;

        // Verificar si se ha seleccionado un candidato válido
        if (selectedCandidatoValue === '') {
            errorCandidato.innerHTML = 'Debe seleccionar un candidato.';
            return false;
        }

        // El candidato es válido
        errorCandidato.innerHTML = '';
        return true;
    }




    validarComoSeEntero() {
        const comoSeEnteroCheckboxes = document.querySelectorAll('.como_se_entero');
        const errorComoSeEntero = document.getElementById('error-como_se_entero');

        if (!comoSeEnteroCheckboxes.length) {
            console.error('Los checkboxes "como_se_entero" no están disponibles.');
            return false;
        }

        const selectedCount = Array.from(comoSeEnteroCheckboxes).filter(checkbox => checkbox.checked).length;

        // Verificar si se han seleccionado al menos dos elementos
        if (selectedCount < 2) {
            errorComoSeEntero.innerHTML = 'Debe seleccionar al menos dos opciones.';
            return false;
        }

        // Los elementos seleccionados son válidos
        errorComoSeEntero.innerHTML = '';
        return true;
    }


    listener() {


        /*****************************************************************    
        Primer listener es para detectar cuando se selecciona una region */
        const selectRegion = document.getElementById('id_region');

        if (!selectRegion) {
            console.error('El elemento select de regiones no está disponible.');
            return;
        }

        selectRegion.addEventListener('change', () => {
            const idRegionSeleccionada = selectRegion.value;
            this.eliminarYcargarComunas(idRegionSeleccionada);
        });

        console.log('Listener para el elemento "id_region" configurado.');

        /* Segundo listener es para detectar cuando se  Envia Form */

        const formVotacion = document.getElementById('FormVotacion');

        if (!formVotacion) {
            console.error('El formulario de votación no está disponible.');
        } else {
            formVotacion.addEventListener('submit', (event) => {
                event.preventDefault(); // Esto evita que el formulario se envíe automáticamente.

                (async () => {


                    // Aquí puedes realizar las acciones que necesites al enviar el formulario.
                    // Por ejemplo, puedes obtener los valores de los campos del formulario y enviarlos a través de una solicitud AJAX.

                    console.log('Formulario click enviar Realizar acciones necesarias aquí para validar.');
                    // ... Código para enviar los datos del formulario ...

                    // Inicializar el contador de errores
                    let errores_validacion = 0;

                    // Llamar a los métodos y aumentar el contador de errores si el resultado es false

                    if (!this.validarNombreCompleto()) {
                        errores_validacion++;
                    }

                    if (!this.validarAlias()) {
                        errores_validacion++;
                    }

                    const resultadoValidacionRut = await this.validarRutInput();

                    if (!(resultadoValidacionRut)) {
                        errores_validacion++;
                    }

                    if (!this.validarEmail()) {
                        errores_validacion++;
                    }

                    if (!this.validarRegion()) {
                        errores_validacion++;
                    }

                    if (!this.validarComuna()) {
                        errores_validacion++;
                    }

                    if (!this.validarCandidato()) {
                        errores_validacion++;
                    }

                    if (!this.validarComoSeEntero()) {
                        errores_validacion++;
                    }


                    if (errores_validacion == 0) {
                        this.enviarFormularioPorAjax(); //Formulario es Valido Asi que se envia por ajax.       
                    }

                })();

            });

            console.log('Listener para el evento "onsubmit" del formulario "FormVotacion" configurado.');
        }

        /* Listener para evitar que en alias se ingresen caracteres no deseados
            los caracteres no permitidos los elimina de forma automatica no importa si es keypress o keyup
        */

        /* Segundo listener es para detectar cuando se  Envia Form */

        const aliasInput = document.getElementById('alias');

        aliasInput.addEventListener('keydown', function(event) {
            const key = event.key;
            const regex = /^[a-zA-Z0-9]$/;

            if (!regex.test(key) && key !== 'Backspace') {
                event.preventDefault();
            }
        });

        aliasInput.addEventListener('paste', function(event) {
            const pastedText = event.clipboardData.getData('text');

            // Eliminar caracteres no permitidos del texto pegado usando una expresión regular
            const regex = /[^a-zA-Z0-9]/g;
            const nuevoTexto = pastedText.replace(regex, '');

            // Colocar el texto modificado en el campo "alias"
            setTimeout(function() {
                aliasInput.value = nuevoTexto;
            }, 0);

            // Evitar que el evento de pegar continúe propagándose
            event.preventDefault();
        });




        /* Listener para quitar caracteres no permitidos en email */



    }


    cargarCandidatosEnSelect() {
        const selectCandidato = document.getElementById('id_candidato');

        if (!selectCandidato || !Array.isArray(this.jsonCandidatos)) {
            console.error('El elemento select o el JSON de candidatos no están disponibles.');
            return;
        }



        this.jsonCandidatos.forEach((candidato) => {
            const option = document.createElement('option');
            option.value = candidato.id;
            option.textContent = candidato.nombre_candidato;
            selectCandidato.appendChild(option);
        });

        console.log('Candidatos cargados.');
    }



    enviarFormularioPorAjax() {
        // Obtener el formulario por su ID
        const form = document.getElementById("FormVotacion");

        // Obtener todos los valores del formulario
        const formData = new FormData(form);

        // Realizar la petición AJAX por medio de fetch
        fetch("guarda_votacion.php", {
                method: "POST",
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Hubo un problema al enviar el formulario.");
                }

                // Cambiar la propiedad display a "unset" para mostrar capa de manos    
                const votorealizadoElement = document.getElementById("Votorealizado");
                votorealizadoElement.style.display = "unset";


                // Cambiar la propiedad display a "unset" para mostrar mensaje de voto guardado    
                const AvisoVotoRealizadoElement = document.getElementById("AvisoVotoRealizado");
                AvisoVotoRealizadoElement.style.display = "unset";

                //En movil no se ve el mensaje asi que a traves de javascript muevo scroll a posicion de capa mensaje

                document.getElementById('AvisoVotoRealizado').scrollIntoView({
                    behavior: 'smooth'
                });

                //Limpiar Formulario
                document.getElementById('FormVotacion').reset();

                return response.json(); // Si esperas una respuesta en JSON
                // También puedes usar response.text() si esperas texto
            })
            .then(data => {
                // Aquí puedes manejar la respuesta del servidor, si es necesario
                console.log(data);
            })
            .catch(error => {
                // Manejar cualquier error ocurrido durante la petición
                console.error(error);
            });
    }


    votar() {
        // Aquí implementa la lógica para realizar la votación con los datos cargados desde this.jsonUbicaciones
        // Por ejemplo: this.jsonUbicaciones.contestantes, this.jsonUbicaciones.opciones, etc.
    }
}



/*
La Instancia objeto que controla todo
Reemplaza  por la URL del archivo JSON que desees cargar este trae las comunas y regiones de una vez
AQui se usa promesa para que una vez que se cargue el archivo json
este ejecute posteriormente la carga de regiones ya que osino no habrian datos para cargar
*/
const votacion = new Votacion();
votacion.cargarJSONUbicaciones('ubicaciones.php').then(() => {
    votacion.cargarRegionesEnSelect();
    votacion.listener(); // Configurar el listener después de cargar el JSON
});

//Se manda a llamar el json con los candidatos
votacion.cargarJSONCandidatos('candidatos.php').then(() => {
    votacion.cargarCandidatosEnSelect(); //Carga os candidatos en el select
});