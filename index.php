<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Votación</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">

    
<style>

html, body{
    background-color: white;
    cursor: url(assets/img/arrowPoint.svg) 15 15, move;
    overflow-x: hidden;
    margin: 0;
    background-image: url(assets/img/ecoBg.svg);
    background-size: inherit;
    background-repeat: no-repeat;
}

a[href], input[type='submit'], input[type='checkbox'], input[type='image'], label[for], select, button {
    cursor: url('assets/img/arrowClick.svg'), auto;

}

input[type='text'], input[type='email'] , input[type='number'] {
    cursor: url('assets/img/arrowClick.svg'), auto;
    cursor: url('assets/img/arrowClickText.svg'), text;

}

input[type='text']:focus, input[type='email']:focus , input[type='number']:focus {
    cursor: url('assets/img/arrowClick.svg'), auto;
    cursor: url('assets/img/arrowClickText.svg'), text;

}



.desis-wrapper {
    position: relative;
    z-index: 1000;
    -webkit-transition: left .33s cubic-bezier(.694,.0482,.335,1);
    transition: left .33s cubic-bezier(.694,.0482,.335,1);
    left: 0;
}

.desis-wrapper .desis-wrapper-inner {
    width: 100%;
    overflow: hidden;
}

.desis-wrapper-inner {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

.desis-page-header {
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
    width: 100%;
    z-index: 110;
}


.desis-page-header .desis-menu-area {
    height: 80px;
    position: relative;
    -webkit-transition: background-color .3s ease;
    transition: background-color .3s ease;
    border-bottom: 1px solid #e7e7e7;
    background-color: #ffffff91;
}


.qodef-header-standard .qodef-menu-area {
    /* background-color: #fff; */
    background-color: transparent;
}

.desis-grid {
    width: 1300px;
    margin: 0 auto;
}


.desis-page-header .desis-grid .desis-vertical-align-containers {
    padding: 0;
    -webkit-transition: background-color .3s ease;
    transition: background-color .3s ease;
}

.desis-vertical-align-containers {
    position: relative;
    height: 100%;
    width: 100%;
    padding: 0 30px;
    box-sizing: border-box;
}

.desis-vertical-align-containers .desis-position-left {
    position: relative;
    float: left;
    z-index: 2;
    height: 100%;
}

.desis-position-left-inner {
    vertical-align: middle;
    display: inline-block;
}

.desis-logo-wrapper {
    display: block!important;
}

.desis-vertical-align-containers .desis-position-center-inner {
    vertical-align: middle;
    display: inline-block;
}

.desis-page-header .desis-menu-area .desis-logo-wrapper a{
    max-height: 90px;
}


.desis-logo-wrapper a img {
    /* height: 100%; */
    -webkit-transition: opacity .2s ease;
    transition: opacity .2s ease;
}




img.desis-normal-logo {
    margin-top: 15px;
}



.desis-page-main {
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
    width: 100%;
    z-index: 110;
    min-height: 500px;
    background-color: #e6e4cc;
}


.desis-content {
    flex: 1!important;
}

.desis-container-inner{
    padding-top: 44px;
    width: 1300px;
    margin: 0 auto;
}

.clearfix {
    clear: both;
}

.desis-two-columns-55-45 {
    width: 100%;
}


.desis-two-columns-55-45 .desis-column1{
    width: 55%;
    float: left;
    min-height: 200px;
    display: flex;
    justify-content: center; /* Centrar horizontalmente */
    align-items: center; /* Centrar verticalmente */
    text-align:center;
}

.desis-two-columns-55-45 .desis-column2{
    width: 45%;
    float: left;
    min-height: 200px;
}

#call {
    margin-top: 9em;
}

#call > h1 {
    font-family: 'Oswald', sans-serif;
    font-size: 4em;
    line-height: 0em;
    color: #403a3a;
    text-transform: uppercase;
}

#call > h1 > strong {
    font-weight: 900;
    color: #101010;
    /* text-decoration: auto; */
    text-shadow: 3px 3px 0 #1f2127, -1px -1px 0 #1f2127, 1px -1px 0 #1f2127, -1px 1px 0 #1f2127, 1px 1px 0 #1f2127;
    text-shadow: 0 0 80px rgba(255, 255, 255, 0.5);
    background: url('assets/img//animated-text-fill.png') repeat-y;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -webkit-animation: anima_strong_h1 80s linear infinite;
    -webkit-transform: translate3d(0, 0, 0);
    -webkit-backface-visibility: hidden;
}


@keyframes anima_strong_h1 {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}


#call > h2 {
    font-family: 'Oswald', sans-serif;
    font-size: 2em;
    line-height: 1.1em;
    color: #403a3a;
    text-align: center;
}

#call > img {
    width:50%;
}

#call > p {
    font-family: 'Oswald', sans-serif;
    font-weight: 400;
    display: inline-block;
    margin-bottom: 0.3rem;
    width: 100%;
    color: rgb(102, 102, 102);
    font-size: 1.1rem;
    letter-spacing: 0.1px;
    line-height: 1.47;
    text-size-adjust: 100%;
    box-sizing: border-box;
}


.desis-column2 h1 {
    font-family: 'Oswald', sans-serif;
    font-size: 2em;
    line-height: 1.1em;
    color: #403a3a;
    text-align: center;
}

form {
    margin: 1em;
    background-color: white;
    padding: 1em;
    border-radius: 1em;
    padding-top: 3em;
    border: 2px solid #b6b1b1;
}


fieldset {
    max-width: 100%;
    border: 1px solid #f9f0f0;
    border-radius: 1em;
}

legend {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.5em;
    line-height: 0em;
    color: #403a3a;
    margin-bottom: 1em;
    font-family: 'Oswald', sans-serif;
    font-size: 1.5em;
    font-weight: 400;
    line-height: 0em;
    color: #403a3a;
    text-transform: uppercase;
}


.row{
width:100%;    
}

.c100{
    width:100%;
    float:left;
    position: relative;   
}



.row .c50:first-child {
    width:50%;
    padding-right:0.2em;
    float:left;
    position: relative;
    box-sizing: border-box;

}

/* Estilos para el segundo div con clase .c50 dentro del div con ID #row */
.row .c50:last-child {
    width:50%;
    padding-left:0.2em;
    float:right;
    position: relative;
    box-sizing: border-box;

}








.row .c25:nth-child(1) {
    text-align: center;
    width: 25%;
    padding-right: 0.2em;
    float: left;
    position: relative;
    box-sizing: border-box;
}

.row .c25:nth-child(2) {
    text-align: center;
    width: 25%;
    padding-left: 0.2em;
    float: left;
    position: relative;
    box-sizing: border-box;
}

.row .c25:nth-child(3) {
    text-align: center;
    width: 25%;
    padding-left: 0.2em;
    float: left;
    position: relative;
    box-sizing: border-box;
}

/* Estilos para el cuarto div .c50 */
.row .c25:nth-child(4) {
    text-align: center;
    width: 25%;
    padding-left: 0.2em;
    float: left;
    position: relative;
    box-sizing: border-box;
}










.c33{
    width:33.3%;
    float:left;
    position: relative;
}

 


label {
    font-family: "Roboto", "Helvetica Neue", Helvetica, Arial;
    font-family: 'Oswald', sans-serif;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 0.3rem;
    width: 100%;
    color: rgb(102, 102, 102);
    font-size: 0.9525rem;
    letter-spacing: 0.1px;
    line-height: 1.47;
    text-size-adjust: 100%;
    box-sizing: border-box;
}


input[type="text"] , input[type="email"],select  {
    box-sizing: border-box;
    display: block;
    width: 100%;
    height: calc(1.47em + 1rem + 2px);
    padding: 0.5rem 0.875rem;
    font-size: 0.8125rem;
    font-weight: 400;
    line-height: 1.47;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #E5E5E5;
    border-radius: 4px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}


.error {
    font-family: 'Oswald', sans-serif;
    font-weight: 400;
    display: inline-block;
    margin-bottom: 0.3rem;
    width: 100%;
    color: rgb(247 5 5);
    font-size: 1.0rem;
    letter-spacing: 0.1px;
    line-height: 1.47;
    text-size-adjust: 100%;
    box-sizing: border-box;
    margin-top: 0.1em;
    margin-left: 0.2em;
}


.progress-button[data-style="fill"][data-horizontal] {
    overflow: hidden;
}

.progress-button {
    border-radius: 22px;
    position: relative;
    display: inline-block;
    padding: 0 60px;
    outline: none;
    border: none;
    background: #1d9650;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 1.2em;
    line-height: 4;
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    
}

.progress-button:hover {
    color: white;
    background: #dae23a;
}

.progress-button[data-style="fill"][data-horizontal] .content {
    z-index: 10;
    -webkit-transition: -webkit-transform 0.3s;
    transition: transform 0.3s;
}

.progress-button .content {
    position: relative;
    display: block;
}

.progress-button .progress {
    background: #148544;
}

.progress-button[data-horizontal] .progress-inner {
    top: 0;
    width: 0;
    height: 100%;
    -webkit-transition: width 0.3s, opacity 0.3s;
    transition: width 0.3s, opacity 0.3s;
}

.progress-button .progress-inner {
    position: absolute;
    left: 0;
    background: #0e7138;
}

.notransition {
    -webkit-transition: none !important;
    transition: none !important;
}



footer {
    min-height: 100px;
    background-color: green;
    border-top: 3px solid #034b03;
    margin-top: 3em;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  min-height: 100px;
    background-color: green;
    border-top: 3px solid #034b03;
    margin-top: 3em;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.footer-section {
  flex: 1;
    padding: 0 20px;
    max-width: 300px;
    text-align: left;
    font-family: 'Oswald', sans-serif;
    font-weight: 100;
}

.footer-section h3 {
  margin-bottom: 10px;
  color: #fff;
}

.footer-section p, .footer-section ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.footer-section ul li a {
  color: #fff;
  text-decoration: none;
}

.footer-section ul li a:hover {
  text-decoration: underline;
}



@keyframes circle-in-hesitate {
  0% {
    clip-path: circle(0%);
  }
  40% {
    clip-path: circle(40%);
  }
  100% {
    clip-path: circle(125%);
  }
}

[transition-style="in:circle:hesitate"] {
  animation: 2.5s cubic-bezier(.25, 1, .30, 1) circle-in-hesitate both;
}



</style>


</head>
<body>
    
<div transition-style="in:circle:hesitate"></div>
 
<div class="desis-wrapper" transition-style="in:circle:hesitate">
   <div class="desis-wrapper-inner">

    <header class="desis-page-header">
         <div class="desis-menu-area">
            <div class="desis-grid">
               <div class="desis-vertical-align-containers">
                  <div class="desis-position-left">
                     <div class="desis-position-left-inner">
                        <div class="desis-logo-wrapper blablaheader">
                           <a href="index.php">
                           <img height="54" width="172" class="desis-normal-logo" src="assets/img/logo.png" alt="logo">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </header>


    <main class="desis-content qdfcntnthdr">
        <div class="desis-content-inner">

            <div class="desis-container">

                <div class="desis-container-inner">

                    <div class="desis-two-columns-55-45">

                        <div class="desis-column1">

                            <div id="call">
                                <h1>¡<strong>Vota</strong> y participa <strong> Ya!</strong> </h1>
                                <h2>Completa el formulario y selecciona tu candidato.</h2>

                                <img src="assets/img/symbol.avif" style="">

                                <p>Prueba Tecnica <strong>Andy Hormazabal Budin</strong>, disponibilidad inmediata, +56996300466.</p>

                            </div>

                        </div>

                        <div class="desis-column2">



                                <form action="#" method="post" class="animate__animated animate__backInUp" style="animation-delay:1.1s;" id="FormVotacion">
                                    <fieldset>
                                        <legend>Datos Personales</legend>

                                        <div class="row">

                                            <div class="c100">
                                                <label for="nombre">Nombre Completo:</label>
                                                <input type="text" id="nombre_completo" name="nombre_completo" >
                                                <span class="error" id="error-nombre_completo"></span>
                                            </div>

                                        </div>

                                      
                                        <div class="row">

                                            <div class="c50">
                                                <label for="alias">Alias:</label>
                                                <input type="text" id="alias" name="alias" >
                                                <span class="error" id="error-alias"></span>
                                            </div>
                                            <div class="c50">
                                                <label for="rut">Rut:</label>
                                                <input type="text" id="rut" name="rut" >
                                                <span class="error" id="error-rut"></span>
                                            </div>

                                        </div>

                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" >
                                        <span class="error" id="error-email"></span>
                                    </fieldset>
                                    <br>

                                    <fieldset>
                                        <legend>Ubicación</legend>
                                        <label for="id_region">Región:</label>
                                        <select id="id_region" name="id_region" >
                                            <option value="" disabled selected>Seleccione una región</option>
                                        </select>
                                        <span class="error" id="error-id_region"></span>
                                        <br>

                                        <label for="id_region">Comuna:</label>
                                        <select id="id_comuna" name="id_comuna">
                                            <option value="" disabled="" selected="">Seleccione una comuna</option>
                                        </select>

                                        <span class="error" id="error-id_comuna"></span>
                                    </fieldset>
                                    <br>

                                    <fieldset>
                                        <legend>Elección de Candidato</legend>
                                        <label for="id_candidato">Candidato:</label>
                                        <select id="id_candidato" name="id_candidato">
                                            <option value="" disabled="" selected="">Seleccione un Candidato</option>
                                        </select>
                                        <span class="error" id="error-id_candidato"></span>
                                    </fieldset>
                                    <br>

                                    <fieldset>
                                        <legend>¿Cómo se enteró de nosotros?</legend>
                                        
                                        <div class="row">

                                        <div class="c25">
                                            <label for="web">Web <br/><input type="checkbox" id="web" name="como_se_entero" value="1"></label>
                                        </div>
                                        <div class="c25">
                                            
                                            <label for="tv">TV <br/> <input type="checkbox" id="tv" name="como_se_entero" value="2"></label>
                                        </div>
                                        <div class="c25">

                                            
                                            <label for="redes_sociales">Redes Sociales <br/><input type="checkbox" id="redes_sociales" name="como_se_entero" value="3"></label>
                                        </div>
                                        <div class="c25">

                                            
                                            <label for="amigo">Amigo <br/><input type="checkbox" id="amigo" name="como_se_entero" value="4"></label>
                                        </div>
                                       

                                            <span class="error" id="error-como_se_entero"></span>
                                      
                                        </div>

                                    </fieldset>
                                    <br>

                                    <button class="progress-button" data-style="fill" data-horizontal="">
                                        <span class="content">Registrar Votación</span>
                                        <span class="progress"><span class="progress-inner notransition" style="width: 0%; opacity: 1;"></span></span>
                                    </button>


                                </form>


                        </div>

                    </div>                  

                </div>

            </div>

        </div>
    </main>

<footer>
  <div class="footer-content">
    <div class="footer-section">
      <h3>Contacto</h3>
      <p>Email: andy@andy.cl</p>
      <p>Teléfono: +56996300466</p>
    </div>
    <div class="footer-section">
      <h3>Enlaces</h3>
      <ul>
        <li><a href="https://www.desis.cl/">Desis</a></li>
        <li><a href="https://www.andy.cl/">Andy (En construcción)</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Síguenos</h3>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Instagram</a></li>
      </ul>
    </div>
  </div>
</footer>



   </div>
</div>



<script>
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



    // Función para validar el RUT en el elemento con id "rut"
    validarRutInput() {
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
        }

        // El rut es válido
        errorRut.innerHTML = '';
        return true;
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
    const comoSeEnteroCheckboxes = document.querySelectorAll('input[name="como_se_entero"]');
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

        if (!this.validarRutInput()) {
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


        if(errores_validacion>0){
            alert('Tiene errores que arreglar en formulario');
        }else{
            alert(' formulario se envia');           
        }


        // O puedes simplemente enviar el formulario de manera convencional usando:
        // formVotacion.submit();
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
  votacion.cargarCandidatosEnSelect();//Carga os candidatos en el select
});


</script>


</body>
</html>