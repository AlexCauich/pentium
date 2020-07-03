$(document).ready(function() {

    getList();
    console.log('functi')
    
    let edit = false;
    
    $('#form').submit(function(e) {
        const postData = {
            date_register: $('#date_register').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            direction: $('#direction').val(),
            type_job: $('#type_job').val(),
            price: $('#price').val(),
            especi: $('#especi').val(),
            id: $('#datoID').val()
        };

        let url = edit === false ? 'queries/insert.php' : 'queries/edit.php';

        $.post(url, postData, function(resp){
            console.log(resp);
            getList();
            $('#form').trigger('reset');

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
                            <td><strong>${data.name}</strong></td>
                            <td>${data.type_job}</td>
                            <td>${data.price}</td>
                            <td>${data.date_register}</td>
                            <td>
                                <button class="view btn btn-success" title="Revisar" data-toggle="modal" data-target="#exampleModal">
                                    <img src="svg/check-circle.svg"/>
                                </button>
                                <button class="delete btn btn-danger">
                                    <img src="svg/delete.svg" title="Borrar" alt="">
                                </button>
                                <button class="edit btn btn-warning">
                                    <img src="svg/edit.svg" title="Editar" alt="">
                                </button>
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


    // Eliminar una registro
    $(document).on('click', '.delete', function(e) {
        if(confirm('Are you sure you want to delete it?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('datoID');
            $.post('queries/destroy.php', {id}, function(resp) {
                console.log(resp);
                getList();
            });
        }
        e.preventDefault();
    });

    $(document).on('click', '.edit', function(e) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        $.post('queries/update.php', {id}, function(res) {
            const content = JSON.parse(res);
            $('#name').val(content.name);
            $('#phone').val(content.phone);
            $('#direction').val(content.direction);
            $('#type_job').val(content.type_job);
            $('#preci').val(content.preci);
            $('#especi').val(content.especi);
            $('#date_register').val(content.date_register);
            $('#datoID').val(content.id_budget);
            edit = true;
            e.preventDefault()
        }); 
    });
});