const
app = document.getElementById('col'),
productosPorPagina = 8;

// FUNCIONES
let excel;
let punto = precio => precio.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")

let createNewElement = (nombreElemento,nombreElementoString,claseElementoString) => {
     nombreElemento = document.createElement("div")
     nombreElemento.setAttribute("id", nombreElementoString)
     nombreElemento.setAttribute("class", claseElementoString)
     app.appendChild(nombreElemento)
     // var elementoSalida = document.getElementById(nombreElementoString)
     }
//FUNCION PARA DIVIDIR ARRAY DE OBJETOS ***************************************
//*****************************************************************************
function separar(base, maximo) {
var resultado = [[]];
var grupo = 0;

for (var i = 0; i < base.length; i++) {
     if (resultado[grupo] === undefined) {
          resultado[grupo] = [];
     }
     
     resultado[grupo].push(base[i]);
     
     if ((i + 1) % maximo === 0) {
          grupo = grupo + 1;
     }
}
return resultado;
}
//CIERRE FUNCION PARA DIVIDIR ARRAY DE OBJETOS ********************************
//*****************************************************************************  

// TRAER TIEMPO moment.js *********************************************
const
fechaActual = moment().format('YYYY-MM-DD HH:mm')
// console.log(fechaActual);

// cierre TRAER TIEMPO moment.js ***************************************


// cierre FUNCIONES

// Se crean los divs contenedores  
createNewElement ('pop','pop','cont-popup',)
createNewElement ('barraTags','cajabotones','button-group filter-button-group')
createNewElement ('content','ofertas-container','grid')
createNewElement ('list','lista','pagination')

let
popup = document.getElementById('pop')
barra = document.getElementById('cajabotones')
contenido = document.getElementById('ofertas-container')
lista = document.getElementById('lista')


let productTemplate = (valor) =>
`
<div class="grid-item col product" id="${valor.id}">
<div class="product-img">
           <img src="${ valor.imgHeader ? 'https://www.unimarc.cl/wp-content/uploads/img-header/' + valor.imgHeader : "" }"/>

      <a class="inline cboxElement">
          <img src="${ valor.img ? 'https://www.unimarc.cl/wp-content/uploads/img-ofertas/' + valor.img : "" }"/>
          </a>
      </div>
      <div class="text oferta-text">
        <a class="inline cboxElement">
        
          <!-- Nombre Producto -->
          ${ !valor.producto ? "" : `<h4 class="nombre-oferta">${valor.producto}</h4>`}
        </a>

        <!-- Descripcion Producto -->
        ${ !valor.descripcion ? "" : ` <p class="capitalize">${valor.descripcion}.</p>`}
      </div>

      <div class="oferta">
      <!-- Descripcion Beneficio -->
      ${ !valor.descBeneficio ? "" : `<h4>${valor.descBeneficio}</h4>`}

        <!-- Cantidad -->
          ${ !valor.cantidad ? "" : `<h4>${valor.cantidad} $${punto(valor.precioCantidad)}</h4>` }

        <!-- Precio Oferta -->
        <h2>${ !valor.detallePrecioOferta ? "" : valor.detallePrecioOferta} ${ !valor.precioOfertaPorcentaje ? "" : `${valor.precioOfertaPorcentaje}% dcto <br>`} 
       ${ !valor.PrecioOferta ? "" : `$${punto(valor.PrecioOferta)}` } ${ !valor.unidadPrecioOferta ? "" : valor.unidadPrecioOferta }</h2>

        <!-- Separación-->
        <div style="height: 1px;background-color: #ffffff; width: 100%; margin: 5px 0px 10px 0px;"></div>

        <!-- Precio normal -->
        ${ !valor.tipoPrecio ? "" : `<h4>${valor.tipoPrecio} ${!valor.precioNormal ? "" : `$${punto(valor.precioNormal)}`} ${ !valor.unidad ? "" : valor.unidad } ${ !valor.medida ? "" : valor.medida } </h4>` }

        <!-- Ahorras -->
        ${ !valor.ahorras ? "" : `<h3 style="text-transform: uppercase; font-size: 1em;"> AHORRAS: $${punto(valor.ahorras)}</h3>`}

        <!-- Precio con tarjeta -->
       ${ !valor.precioConTarjeta ? "" : `<h4 style="line-height: normal;">Precio con tarjeta Unimarc: $${punto(valor.precioConTarjeta)} ${ !valor.medida ? "" : valor.medida } </h4>` }
        
       <!-- comentarioUno -->
       ${ !valor.comentarioUno ? "" : `<h4>${valor.comentarioUno} $${punto(valor.precioComentarioUno)}</h4>` }

       <!-- comentarioDos -->
       ${ !valor.comentarioDos ? "" : `<h4>${valor.comentarioDos} ${valor.precioComentarioDos}</h4>` }

       <!-- ComentarioTres o Precio App o -->
       ${ !valor.comentarioTres ? "" : `<h4>${valor.comentarioTres} ${valor.precioComentarioTres}</h4>` }

        <!-- legal -->
        ${ !valor.legal ? "" : `<p class="legal desaparece">${valor.legal}</p>`}
      
     </div>
</div>
`
// INICIO POPUP
const popUp = () => {
let producto = document.getElementsByClassName('grid-item')
for (i = 0; i < document.getElementsByClassName('grid-item').length; i++) {
document.getElementsByClassName('grid-item')[i].addEventListener("click", function(){
//console.log('hice click')
popup.classList.add("levantar")

let 
valorPop = this.getAttribute('id')
idPop = parseInt(valorPop)
console.log(idPop)

let res = excel.filter( productos => productos.id == idPop)
console.log(res)
popup.innerHTML = ''
popup.innerHTML += `${ res.map(productTemplate).join("")}`
const legal =  document.getElementById('pop').firstElementChild.lastElementChild.lastElementChild.classList.toggle('desaparece')
// console.log(document.getElementById('pop').firstElementChild.lastElementChild.lastElementChild.classList.toggle('desaparece'));

// createNewElement ('close','close','pagination')

let
  close = document.createElement("div")
  close.setAttribute("class", "cerrar")
  close.setAttribute("id", "close")
  popup.appendChild(close)
  cerrar = document.getElementById('close')

  cerrar.addEventListener("click", function(){
      popup.innerHTML = ''
      popup.classList.remove("levantar")
      console.log('hice click')
    },false)


},false);
}
}

//FIN POPUP

const traerDatos = (data) => {

// Variable de publicacion por tiempo moment.js
const approved = data.filter(
                       function publicacion(user){
                       // console.log(`fecha: ${user.fechaDespublicacion}`);
                       
                       fechaPublicacion = moment(user.fechaPublicacion)
                       fechaDespublicacion = moment(user.fechaDespublicacion)
                       diferenciaPublicacion = fechaPublicacion.diff(fechaActual,'hour')
                       diferenciaDespublicacion = fechaDespublicacion.diff(fechaActual,'hour')
                       // console.log(fechaPublicacion);
                       //console.log(diferenciaDespublicacion);
                       if (
                           diferenciaPublicacion <= 0
                           &&
                           diferenciaDespublicacion >= 0
                           )
                       {
                       return true
                       }
                       else {
                       // console.log('cerrado');
                       return false
                       }
                       }
                       )
// Cierre variable de publicacion por tiempo moment.js

divisionPaginas = separar (approved, productosPorPagina);
contenido.innerHTML = '';
contenido.innerHTML += `${divisionPaginas[0].map(productTemplate).join("")}`
popUp()
}

function dataPrimary(data){

// Variable de publicacion por tiempo moment.js
const approved = data.filter(
                       function publicacion(user){
                       // console.log(`fecha: ${user.fechaDespublicacion}`);
                       
                       fechaPublicacion = moment(user.fechaPublicacion)
                       fechaDespublicacion = moment(user.fechaDespublicacion)
                       diferenciaPublicacion = fechaPublicacion.diff(fechaActual,'hour')
                       diferenciaDespublicacion = fechaDespublicacion.diff(fechaActual,'hour')
                       // console.log(fechaPublicacion);
                       //console.log(diferenciaDespublicacion);
                       if (
                           diferenciaPublicacion <= 0
                           &&
                           diferenciaDespublicacion >= 0
                           )
                       {
                       return true
                       }
                       else {
                       // console.log('cerrado');
                       return false
                       }
                       }
                       )
// Cierre variable de publicacion por tiempo moment.js
console.log(`los aprobados` );
console.log(approved);


let
divisionPaginas = separar (approved, productosPorPagina)
// console.log(divisionPaginas)

for (let i = 0; i < divisionPaginas.length; i++) {
lista.innerHTML += `<a class="indice inactive" id="${[i]}">${[i+1]}</a>`
}
let indice = document.getElementsByClassName('indice');

for (i = 0; i < indice.length; i++) {
indice[i].addEventListener("click", getLista,false);
}

function getLista() {
let valorId = this.getAttribute('id');
let numero = parseInt(valorId)
// console.log(numero)
// contenido.innerHTML = '';
// console.log(divisionPaginas[numero]);
contenido.innerHTML = ''
contenido.innerHTML += `${divisionPaginas[numero].map(productTemplate).join("")}`
popUp()  
}

}

function buscar(datos) {
document.getElementById('campoBuscar').addEventListener("keyup", () => {
                                                  //console.log(document.getElementById('campoBuscar').value);
                                                  const texto = campoBuscar.value.toLowerCase()
                                                  
                                                  // Variable de publicacion por tiempo moment.js
                                                  const approved = datos.filter(
                                                                                function publicacion(user){
                                                                                fechaPublicacion = moment(user.fechaPublicacion)
                                                                                fechaDespublicacion = moment(user.fechaDespublicacion)
                                                                                diferenciaPublicacion = fechaPublicacion.diff(fechaActual,'hour')
                                                                                diferenciaDespublicacion = fechaDespublicacion.diff(fechaActual,'hour')
                                                                                
                                                                                if (
                                                                                    diferenciaPublicacion <= 0
                                                                                    &&
                                                                                    diferenciaDespublicacion >= 0
                                                                                    )
                                                                                {
                                                                                return true
                                                                                }
                                                                                else {
                                                                                // console.log('cerrado');
                                                                                return false
                                                                                }
                                                                                }
                                                                                )
                                                  
                                                  let res = approved.filter( productos => productos.producto.includes(texto))
                                                  console.log(res);
                                                  // Cierre variable de publicacion por tiempo moment.js
                                                  
                                                  for (let valor of approved) {
                                                  let nombre = valor.producto.toLowerCase()
                                                  // console.log(nombre.indexOf(texto));
                                                  
                                                  
                                                  if (nombre.indexOf(texto) !== -1) {
                                                  lista.innerHTML = ''
                                                  contenido.innerHTML = ''
                                                  contenido.innerHTML +=
                                                  `
                                                  <h1 class="header center orange-text">Productos</h1>
                                                  <div class="row center">
                                                  <h5 class="header col s12 light">La cantidad de productos es de: ${datos.length} items</h5>
                                                  </div>
                                                  <div class="row">
                                                  
                                                  <div class="col s12 m4">
                                                  <div class="card">
                                                  <div class="card-image">
                                                  <img src="${'img-ofertas/' + valor.img}"/>
                                                  <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                                                  </div>
                                                  <div class="card-content">
                                                  <span class="card-title">${ valor.producto }</span>
                                                  <p>${ valor.descripcion }.</p>
                                                  <h2>${valor.ofertaPrecioUno ? `$${punto(valor.ofertaPrecioUno)}` : ''}</h2>
                                                  <h3>${valor.ofertaPrecioDos? `$${punto(valor.ofertaPrecioDos)}` : ''}</h3>
                                                  <blockquote>
                                                  valor precio no socio: ${valor.precioNosocio ? `$${punto(valor.precioNosocio)}`:''}
                                                  </blockquote>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  `
                                                  } else if (nombre.indexOf(texto) == 1) {
                                                  contenido.innerHTML = '';
                                                  contenido.innerHTML +=
                                                  `
                                                  <h2 style="text-align: center; margin-top: 44px; color: #00319f82;"> Producto no encontrado...</h2>
                                                  `
                                                  }
                                                  
                                                  if (texto.length === 0) {
                                                  //LIMPIAR INDICE
                                                  contenido.innerHTML = ''
                                                  traerDatos(datos)
                                                  }
                                                  if (nombre.indexOf(texto) == 1) {
                                                  contenido.innerHTML = '';
                                                  contenido.innerHTML +=
                                                  `
                                                  <h2 style="text-align: center; margin-top: 44px; color: #00319f82;"> Producto no encontrado...</h2>
                                                  `
                                                  }
                                                  // if (nombre.indexOf(texto) == -1) {
                                                  //       contenido.innerHTML = '';
                                                  //       contenido.innerHTML += `
                                                  //       <h2 style="text-align: center; margin-top: 44px; color: #00319f82;"> Producto no encontrado...</h2>`
                                                  //     }
                                                  }
                                                  }
                                                  )
}

function tags(valor){
//console.log(valor);
const noRepetidas= [... new Set(valor.map(x => x.categoria))];
console.log(noRepetidas.indexOf('-'));
barra.innerHTML = ''

barra.innerHTML +=
`
${!noRepetidas ? '' : `<a class="categorias btn btn-default" id="todos" onclick="location.reload()">Todos</a>`}
`

barra.innerHTML +=
`
${noRepetidas.map(cat => cat.indexOf('-') == -1
            ? `<a class="categorias btn btn-default" id="${cat}">${cat.split('-').join(' ')}</a>`
            : `<a class="categorias btn btn-default" id="${cat}">${cat.split('-').join(' ')}</a>`
            ).join(' ')}
`

let categorias = document.getElementsByClassName('categorias');

for (i = 0; i < categorias.length; i++) {
categorias[i].addEventListener("click", getProduct,false);
}
function getProduct(e){
let elementoClikeado = e.target.getAttribute('id');
// console.log(elementoClikeado);

lista.innerHTML = ''
contenido.innerHTML += `<h2 style="text-align: center; margin-top: 44px; color: #00319f82;"> Producto no encontrado...</h2>`


// Variable de publicacion por tiempo moment.js
const approved = valor.filter(
                            function publicacion(user){
                            // console.log(`fecha: ${user.fechaDespublicacion}`);
                            fechaPublicacion = moment(user.fechaPublicacion)
                            fechaDespublicacion = moment(user.fechaDespublicacion)
                            diferenciaPublicacion = fechaPublicacion.diff(fechaActual,'hour')
                            diferenciaDespublicacion = fechaDespublicacion.diff(fechaActual,'hour')
                            // console.log(fechaPublicacion);
                            //console.log(diferenciaDespublicacion);
                            if (
                                diferenciaPublicacion <= 0
                                &&
                                diferenciaDespublicacion >= 0
                                )
                            {
                            return true
                            }
                            else {
                            // console.log('cerrado');
                            return false
                            }
                            }
                            )
// Cierre variable de publicacion por tiempo moment.js

let datosSeleccionados = approved.filter( (catSeleccionada) => {
                                       if(catSeleccionada.categoria == elementoClikeado){
                                       
                                       return true
                                       }
                                       else {
                                       console.log('no hay coincidencias con id del btn');
                                       }
                                       })
// console.log(datosSeleccionados);
contenido.innerHTML = ''
contenido.innerHTML += `${datosSeleccionados.map(productTemplate).join("")}`
popUp()
}
}
fetch(url)
.then(
fail = (res) => {
/* get the data as a Blob */
if (!res.ok) throw new Error("fetch failed");
return res.arrayBuffer();
}
  )
.then(
load = (ab) => {
/* parse the data when it is received */
let data = new Uint8Array(ab);
let workbook = XLSX.read(data, {
                      type: "array"
                      });

/* DO SOMETHING WITH workbook HERE */
let first_sheet_name = workbook.SheetNames[0];
/* Get worksheet */
let worksheet = workbook.Sheets[first_sheet_name];
excel = XLSX.utils.sheet_to_json(
  worksheet, {raw: true}
                              )
console.log(excel)
traerDatos(excel)
dataPrimary(excel)
// buscar(excel)
tags(excel)

// let campoBuscar = document.getElementById('campoBuscar')
  }
)
.catch(err => console.log(err));