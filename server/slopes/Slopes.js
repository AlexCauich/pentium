$(document).ready(function () {
    console.log("funciona");

    $('#add_deliverd').click(function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('datoID');

        console.log(id);

    });
});