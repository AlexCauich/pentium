$(document).ready(function() {

    getList();
    
    $('#form').submit(function(e) {
        const postData = {
            date_register: $('#date_register').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            direction: $('#direction').val(),
            type_job: $('#type_job').val(),
            price: $('#price').val(),
            especi: $('#especi').val()
        };

        $.post('queries/insert.php', postData, function(resp){
            console.log(resp);
            getList();
        });
        e.preventDefault();
        
    });

    // Realizamos una funcion para pedir los datos e imprimirlos en una tabla
    function getList() {
        $.ajax({
            url: 'queries/view_budget.php', // ubicamos la direccion de la peticion php
            type: 'GET', // metodo de peticion
            success: function(resp){ // si se realiza la peticion, debuelve la respuesta del php
                let datas = JSON.parse(resp); // El método JSON.parse() analiza una cadena de texto como JSON, transformando opcionalmente  el valor producido por el análisis.
                let template = ''; // creamos una variable para poder almacenar los datos a imprimir
                datas.forEach(data => {
                    template += `
                        <tr datoID=${data.id_budget}>
                            <td><img class="view" type="button" src="svg/circle.svg" data-toggle="modal" data-target="#exampleModal"    /> ${data.name}</td>
                            <td>${data.type_job}</td>
                            <td>${data.price}</td>
                            <td>${data.date_register}</td>
                            <td>
                                <button class="btn btn-warning">Editar</button>
                                <button class="btn btn-danger">Borrar</button>
                            </td>
                        </tr>
                    `
                });
                $('#list').html(template);
            }
        });
    };

    $(document).on('click', '.view', function(e) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        $.ajax({
            url: 'queries/info.php',
            data: {id},
            type: 'POST',
            success: function(resp){
                let datas = JSON.parse(resp);
                let template = '';
                datas.forEach(data => {
                    template += `
                        <div class="form-group">
                            <p><strong>Fecha de registro: </strong> ${data.date_register}</p>
                        </div>
                        <div datoID=${data.id_budget} class="form-group">
                            <p><strong>Nombre del cliente: </strong> ${data.name}</p>
                            <p><strong>Telefono: </strong> ${data.phone}</p>
                            <p><strong>Dirección: </strong> ${data.direction}</p>
                            <p><strong>Tipo de trabajo: </strong> ${data.type_job}</p>
                            <p><strong>Precio: </strong> ${data.price}</p>
                            <p><strong>Especificaciones: </strong> ${data.especi}</p>
                        </div>
                    `
                });
                $('#content').html(template);
            }

        })

        e.preventDefault();
    });

});