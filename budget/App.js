$(document).ready(function () {
    console.log("success")
    fetchBudget();

    $('#form').submit(function (e) {
        const postDate = {
            date_register: $('#date_register').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            direction: $('#direction').val(),
            type_job: $('#type_job').val(),
            price: $('#price').val(),
            especi: $('#especi').val(),
        };

        $.post('Queries/insert_form.php', postDate, function(res) {
            console.log(res);
            fetchBudget();
            $("#form").trigger('reset');
        });
        e.preventDefault();

    });

    function fetchBudget() {
        $.ajax({
            url: 'Queries/view_budget.php',
            type: 'GET',
            success: function(res) {
                let datas = JSON.parse(res);
                let temp = '';
                datas.forEach(data => {
                    temp += ` 
                    <tr datoID=${data.id_budget}>
                        <td>${data.name}</td>
                        <td>${data.type_job}</td>
                        <td>${data.price}</td>
                        <td>${data.date_register}</td>
                        <td>
                            <button class="reg_delete btn btn-danger">Borrar</button>
                            <button type="button" class="register_edit btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                Editar
                            </button>
                        </td>
                    </td>

                    `
                });
                $('#list').html(temp);
            }
        })
    }


}); 