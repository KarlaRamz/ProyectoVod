//funcion init
$(document).ready(function() {
    //console.log('jQuery is working');

    $('#product-result').hide();
    $('#tit_busqeuda').hide();
    $('#product-result_tot').hide();
    $('#tit_busqeuda_tot').hide();
    mostrarSeries();
    mostrarPelis();
    mostrarRecientes();

    mostrarTodo();
    mostrarFavorito();
});

function mostrarform() {
    let form = document.getElementById('tipo_cont');
    if (form.value == 'pelicula') {
        document.getElementById('pelicula_info').style.display = 'block';
        document.getElementById('button_add_peli').style.display = 'block';
        document.getElementById('series_info').style.display = 'none';
        document.getElementById('button_add_serie').style.display = 'none';
        tipoCont();
    }
    else if (form.value == 'serie') {
        document.getElementById('series_info').style.display = 'block';
        document.getElementById('button_add_serie').style.display = 'block';
        document.getElementById('pelicula_info').style.display = 'none';
        document.getElementById('button_add_peli').style.display = 'none';
        tipoCont();
    }
    else{
        document.getElementById('series_info').style.display = 'none';
        document.getElementById('button_add_serie').style.display = 'none';
        document.getElementById('pelicula_info').style.display = 'none';
        document.getElementById('button_add_peli').style.display = 'none';
    }
    //tipoCont();
}

function tipoCont() {
            
    let form = document.getElementById('tipo_cont');
    
    if(form.value == 'serie')
    {
        let numTemp = document.getElementById('temporadas_cont');
        let numCap = document.getElementById('capitulos_cont');
        numTemp.setAttribute('required','');
        numCap.setAttribute('required','');
    }
    else if(form.value == 'peli')
    {
        let duracion = document.getElementById('duracion_cont');
        duracion.setAttribute('required','');
    }
}


function mostrarFavorito(){
    $.ajax({
        url: '../backend/mostrar_favorito.php',
        type: 'GET',
        success: function (response) {
            console.log(response);
            var contenido = JSON.parse(response);

            //verificar que el json tenga objs
            if (Object.keys(contenido).length > 0) {
                let template = '';

                contenido.forEach(elemento => {
                    if(elemento.tabla1=='tabla1'){//serie
                        template += `
                        <div class="col">
                        <div class="card border-0">
                        <a aria-current="page" href="serie.html" onclick="setitemserie(${elemento.id})">
                            <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                            <div class="card-body mx-auto">
                                <h4>${elemento.titulo}</h4>
                            </div>
                        </div>
                        </div>
                    `; 
                        }
                        else{
                                template += `
                                <div class="col">
                                <div class="card border-0">
                                <a aria-current="page" href="pelicula.html" onclick="setitempelicula(${elemento.id})">
                                    <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                                    <div class="card-body mx-auto">
                                        <h4>${elemento.titulo}</h4>
                                    </div>
                                </div>
                                </div>
                            `; 
                        }               
                });
                $('#contenido_favoritos').html(template);
            }
        }
    });
}
function mostrarRecientes(){
    $.ajax({
        url: '../backend/mostrar_recientes.php',
        type: 'GET',
        success: function (response) {
            console.log(response);
            var contenido = JSON.parse(response);

            //verificar que el json tenga objs
            if (Object.keys(contenido).length > 0) {
                let template = '';

                contenido.forEach(elemento => {
                    if(elemento.tabla1=='tabla1'){//serie
                        template += `
                        <div class="col">
                        <div class="card border-0">
                        <a aria-current="page" href="serie.html" onclick="setitemserie(${elemento.id})">
                            <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                            <div class="card-body mx-auto">
                                <h4>${elemento.titulo}</h4>
                            </div>
                        </div>
                        </div>
                    `; 
                        }
                        else{
                                template += `
                                <div class="col">
                                <div class="card border-0">
                                <a aria-current="page" href="pelicula.html" onclick="setitempelicula(${elemento.id})">
                                    <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                                    <div class="card-body mx-auto">
                                        <h4>${elemento.titulo}</h4>
                                    </div>
                                </div>
                                </div>
                            `; 
                        }               
                });
                $('#contenido_reciente').html(template);
            }
        }
    });
}
//mostrar series
function mostrarSeries(){
    $.ajax({
        url: '../backend/mostrar_series.php',
        type: 'GET',
        success: function (response) {
            console.log(response);
            let contenido = JSON.parse(response);

            //verificar que el json tenga objs
            if (Object.keys(contenido).length > 0) {
                let template = '';

                contenido.forEach(elemento => {
                    template += `
                        <div class="col">
                        <div class="card border-0">
                        <a aria-current="page" href="serie.html" onclick="setitemserie(${elemento.id})">
                            <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                            <div class="card-body mx-auto">
                                <h4>${elemento.titulo}</h4>
                                <p>${elemento.totalCapitulos} Episodios</p>
                            </div>
                        </div>
                        </div>
                    `;                   
                });
                $('#contenido_series').html(template);
            }
        }
    });
}

//mostrar pelis

function mostrarPelis(){
    $.ajax({
        url: '../backend/mostrar_pelis.php',
        type: 'GET',
        success: function (response) {
            //console.log(response);
            let contenido = JSON.parse(response);

            //verificar que el json tenga objs
            if (Object.keys(contenido).length > 0) {
                let template = '';

                contenido.forEach(elemento => {
                    template += `
                        <div class="col">
                        <div class="card border-0">
                        <a aria-current="page" href="pelicula.html" onclick="setitempelicula(${elemento.id})">
                            <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img"></a>
                            <div class="card-body mx-auto">
                                <h4>${elemento.titulo}</h4>
                                <p>${elemento.duracion} minutos</p>
                            </div>
                        </div>
                        </div>
                    `;                   
                });
                $('#contenido_pelis').html(template);
            }
        }
    });
}

function setitemserie(id){
    localStorage.setItem("idserie", id);
}
function setitemserie2(id){
    localStorage.setItem("idserie", id);
}

function setitempelicula(id){
    localStorage.setItem("idpelicula", id);
}
//mostrar series
//mostrar todo
function mostrarTodo(){
    $.ajax({
        url: '../backend/mostrar_todo.php',
        type: 'GET',
        success: function (response) {
            //console.log(response);
            let contenido = JSON.parse(response);
            //verificar que el json tenga objs
            //console.log(contenido);
            if (Object.keys(contenido).length > 0) {
                let template = '';
                    contenido.forEach(elemento => {
                        if(elemento.tabla1=='tabla1'){ //tabla1:tabla1 = serie
                            template += `
                                <div class="col">
                                <div class="card border">
                                    <a aria-current="page" href="serie.html" onclick="setitemserie('${elemento.id}')">
                                    <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img">
                                    </a>
                                    <div class="card-body mx-auto">
                                        <h4 class="mx-auto">${elemento.titulo}</h4>
                                        <div class="d-flex float-left">
                                            <a href="editar_contenido.html?tabla=1" onclick="setitemserie('${elemento.id}')">
                                            <button type="button" class="btn btn-secondary">Editar</button>
                                            </a>
                                            <button type="button" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            `;                 
                        }
                        else if(elemento.tabla1=='tabla2'){
                        //if(elemento.tabla1=="tabla2"){ //tabla1:tabla2 = pelicula
                            template += `
                                <div class="col">
                                <div class="card border">
                                    <a aria-current="page" href="pelicula.html" onclick="setitempelicula(${elemento.id})">
                                    <img src="${elemento.rutaPortada}" width = "33.333333%" class="card-img-top" alt="portada_img">
                                    </a>
                                    <div class="card-body mx-auto">
                                        <h4 class="mx-auto">${elemento.titulo}</h4>
                                        <div class="d-flex float-left">
                                            <a href="editar_contenido.html?tabla=2" onclick="setitempelicula('${elemento.id}')">
                                            <button type="button" class="btn btn-secondary">Editar</button>
                                            </a>
                                            <button type="button" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            `;        
                        //}       
                        }
                    });
                    $('#contenido_total').html(template);
                }
        }
    });
}

//funcion de busqueda
$('#search').keyup(function (e) {
    if ($('#search').val()) {
        let search = $('#search').val();

        $.ajax({
            url: '../backend/busqueda.php',
            type: 'GET',
            data: { search },
            success: function(response) {
                let busqueda = JSON.parse(response);

                //console.log(response);
                let template = '';
                //let template_bus = '';

                busqueda.forEach(elemento => {
                    if(elemento.tabla1=='tabla1'){//serie
                    template += `
                    <div class="my-2 row container">
                        <div class="col-sm-2">
                            <a aria-current="page" href="serie.html" onclick="setitemserie(${elemento.id})">
                            <img alt="portada_bus" class="rounded" src="${elemento.rutaPortada}" style="width:160px;"></a>
                        </div>
                        <div class="col-sm-10">
                            <h4>${elemento.titulo}</h4>
                            <p>${elemento.descripcion}</p>
                            <a aria-current="page" href="serie.html"><button type="button" class="btn btn-outline-danger">Ver ahora</button></a>
                        </div>
                    </div>
                    `;
                    }
                    else{
                            template += `
                        <div class="my-2 row container">
                            <div class="col-sm-2">
                                <a aria-current="page" href="pelicula.html" onclick="setitempelicula(${elemento.id})">
                                <img alt="portada_bus" class="rounded" src="${elemento.rutaPortada}" style="width:160px;"></a>
                            </div>
                            <div class="col-sm-10">
                                <h4>${elemento.titulo}</h4>
                                <p>${elemento.descripcion}</p>
                                <a aria-current="page" href="pelicula.html"><button type="button" class="btn btn-outline-danger">Ver ahora</button></a>
                            </div>
                        </div>
                        `;
                    }
                });

                $('#container').html(template);
                $('#product-result').show();
                $('#tit_busqueda').show();
            }
        });
    }
    $('#product-result').hide();
    $('#tit_busqueda').hide();
});

//funcion de busqueda admin
$('#search_tot').keyup(function (e) {

    if ($('#search_tot').val()) {
        let search = $('#search_tot').val();

        $.ajax({
            url: '../backend/busqueda.php',
            type: 'GET',
            data: { search },
            success: function(response) {
                let busqueda = JSON.parse(response);

                //console.log(response);
                let template = '';
                //let template_bus = '';

                busqueda.forEach(elemento => {
                    if(elemento.tabla1=='tabla1'){//serie
                        template += `
                        <div class="my-2 row container">
                            <div class="col-sm-10">
                                <h4>${elemento.titulo}</h4>
                                <p>${elemento.descripcion}</p>
                                <a href="editar_contenido.html?tabla=1" onclick="setitemserie('${elemento.id}')">
                                <button type="button" class="btn btn-outline-secondary">Editar</button></a>
                                <button type="button" class="btn btn-outline-danger">Eliminar</button>
                            </div>
                        </div>
                        `;
                    }
                    else{
                        template += `
                        <div class="my-2 row container">
                            <div class="col-sm-10">
                                <h4>${elemento.titulo}</h4>
                                <p>${elemento.descripcion}</p>
                                <a href="editar_contenido.html?tabla=2" onclick="setitempelicula('${elemento.id}')">
                                <button type="button" class="btn btn-outline-secondary">Editar</button></a>
                                <button type="button" class="btn btn-outline-danger">Eliminar</button>
                            </div>
                        </div>
                        `;
                    }
                });

                $('#container_tot').html(template);
                $('#product-result_tot').show();
                $('#tit_busqueda_tot').show();
            }
        });
    }
    $('#product-result_tot').hide();
    $('#tit_busqueda_tot').hide();
});

//agregar pelicula
$(document).on('click', '.add-peli', function(e){

    var titulo_peli = document.getElementById('titulo').value;
    var duracion_peli = document.getElementById('duracion').value;
    var descripcion_peli = document.getElementById('descripcion').value;
    var rutaP_peli = document.getElementById('img_cont').value;
    var idioma_peli = document.getElementById('idioma').value;
    var generoId_peli = document.getElementById('genero').value;
    var clasificacionId_peli = document.getElementById('classi').value;
    var regionId_peli = document.getElementById('region').value;
    e.preventDefault;
    $.ajax({
        url: '../backend/add_peli.php',
        type: 'POST',
        data: { 
            titulo: titulo_peli,
            duracion: duracion_peli,
            descripcion: descripcion_peli,
            rutaPortada: rutaP_peli,
            idioma: idioma_peli,
            Genero_id: generoId_peli,
            Clasificacion_id: clasificacionId_peli,
            Region_id: regionId_peli 
         },
        success: function(response) {
            //console.log(response);

            let respuesta = JSON.parse(response);
            mostrarTodo();
            $('#form_add').trigger('reset'); 
            let msj = respuesta.message;
            echo("<script type='text/JavaScript'> location.reload(); </script>");
            alert(msj);
        }
    });
});

//agregar serie
$(document).on('click', '.add-serie', function(e){
    var titulo_serie = document.getElementById('titulo').value;
    var numTemp_serie = document.getElementById('numTemp').value;
    var totCaps_serie = document.getElementById('numCap').value;
    var descripcion_serie = document.getElementById('descripcion').value;
    var rutaP_serie = document.getElementById('img_cont').value;
    var idioma_serie = document.getElementById('idioma').value;
    var generoId_serie = document.getElementById('genero').value;
    var clasificacionId_serie = document.getElementById('classi').value;
    var regionId_serie = document.getElementById('region').value;
    e.preventDefault;
    $.ajax({
        url: '../backend/add_serie.php',
        type: 'POST',
        data: { 
            titulo: titulo_serie,
            numTemporadas: numTemp_serie,
            totalCapitulos: totCaps_serie,
            descripcion: descripcion_serie,
            rutaPortada: rutaP_serie,
            idioma: idioma_serie,
            Genero_id: generoId_serie,
            Clasificacion_id: clasificacionId_serie,
            Region_id: regionId_serie 
        },
        success: function(response) {
            //console.log(response);

            let respuesta = JSON.parse(response);
            mostrarTodo();
            $('#form_add').trigger('reset'); 
            let msj = respuesta.message;
            echo("<script type='text/JavaScript'> location.reload(); </script>");
            alert(msj);
        }
    });
});

