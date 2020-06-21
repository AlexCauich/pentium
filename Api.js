
$(document).ready(function () {

    console.log("query funiona jaja");
    fetchJob();

    let edit = false;

    $('#register-form').submit(function (e) {
        const postDate = {
            name_job: $('#name_job').val(),
            name_service: $('#name_service').val(),
            phone: $('#phone').val(),
            place_delivery: $('#place_delivery').val(),
            anticipo: $('#anticipo').val(),
            fecha: $('#fecha').val(),
            especi: $('#especi').val(),
            id: $('#datoID').val()

        };

        
        let url = edit === false ? 'server/insert_form.php' : 'server/register_edit.php';

        if(edit === true){
            const ui = new UI();
            ui.showMessage('Edited successfully', 'warning');
        }else {
            const ui = new UI (); 
            ui.showMessage('Register Added Successfully', 'primary');
        }

        $.post(url, postDate, function(resp) {
            console.log(resp);
            fetchJob();
            $('#register-form').trigger('reset');
        });

        e.preventDefault();
    });

    function fetchJob() {
        $.ajax({
            url: 'server/show_form.php',
            type: 'GET',
            success: function(resp) {
                let registers = JSON.parse(resp);
                let template = '';
                registers.forEach(register => {
                    template += `
                    <tr datoID=${register.id_register}>
                        <td>${register.id_register}</td>
                        <td>${register.name_job}</td>
                        <td>${register.name_service}</td>
                        <td>${register.phone}</td>
                        <td>${register.place_delivery}</td>
                        <td>${register.anticipo}</td>
                        <td width="20%">${register.especi}</td>
                        <td>${register.fecha_registro}</td>
                        <td>
                            <button class="reg_delete btn btn-danger">Borrar</button>
                            <button type="button" class="register_edit btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                Editar
                            </button>
                        </td>
                    </td>

                    `
                });
                $('#list').html(template);
            }
        })
    }

    $(document).on('click', '.reg_delete', function() {
        if(confirm('Are you sure you want to delete it?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('datoID');
            $.post('server/register_delete.php', {id}, function(resp) {
                console.log('register destroy');
                fetchJob();
            });
        }
    });

    $(document).on('click', '.register_edit', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        $.post('server/register_update.php', {id}, function(response) {
            const register = JSON.parse(response);
            $('#name_job').val(register.name_job);
            $('#name_service').val(register.name_service);
            $('#phone').val(register.phone);
            $('#place_delivery').val(register.place_delivery);
            $('#anticipo').val(register.anticipo);
            $('#especi').val(register.especi);
            $('#fecha').val(register.fecha_registro);
            $('#datoID').val(register.id_register);
            edit = true;
        });
    });
});

class UI {
    showMessage(message, cssClass) {
        const div = document.createElement('div');
        div.className = `alert alert-${cssClass} mt-4`;
        div.appendChild(document.createTextNode(message));

        //show dom
        const container = document.querySelector('.jumbotron');
        const app = document.querySelector('#App');
        container.insertBefore(div, app);
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 2000);
    }
}