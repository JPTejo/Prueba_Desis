$(document).ready(function () {

    $('#bodega').change(function () {
        const idBodega = $(this).val();
        $.post('get_sucursales.php', { id_bodega: idBodega }, function (data) {
            $('#sucursal').html('<option value="">Seleccione</option>' + data);
        });
    });
    

    $('#guardar').click(function () {
        let codigo = $('#codigo').val();
        let nombre = $('#nombre').val();
        let bodega = $('#bodega').val();
        let sucursal = $('#sucursal').val();
        let moneda = $('#moneda').val();
        let precio = $('#precio').val();
        let descripcion = $('#descripcion').val();
        let materiales = $("input[name='material[]']:checked");

        // Validaciones
        const regexCodigo = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,15}$/;
        const regexPrecio = /^\d+(\.\d{1,2})?$/;

        if (!codigo) return alert("El código del producto no puede estar en blanco.");
        if (!/[a-zA-Z]/.test(codigo) || !/\d/.test(codigo)) {
            return alert("El código del producto debe contener al menos una letra y un número.");
        }
        
        if (codigo.length < 5 || codigo.length > 15) {
            return alert("El código del producto debe tener entre 5 y 15 caracteres.");
        }
        

        $.post('verificar_codigo.php', { codigo: codigo }, function (respuesta) {
            if (respuesta === 'existe') {
                return alert("El código del producto ya se encuentra registrado.");
            }

            if (!nombre) return alert("El nombre del producto no puede estar en blanco.");
            if (nombre.length < 2 || nombre.length > 50) return alert("El nombre del producto debe tener entre 2 y 50 caracteres.");

            if (!bodega) return alert("Debe seleccionar una bodega.");
            if (!sucursal) return alert("Debe seleccionar una sucursal para la bodega seleccionada.");
            if (!moneda) return alert("Debe seleccionar una moneda para el producto.");

            if (!precio) return alert("El precio del producto no puede estar en blanco.");
            if (!regexPrecio.test(precio)) return alert("El precio del producto debe ser un número positivo con hasta dos decimales.");

            if (materiales.length < 2) return alert("Debe seleccionar al menos dos materiales para el producto.");

            if (!descripcion) return alert("La descripción del producto no puede estar en blanco.");
            if (descripcion.length < 10 || descripcion.length > 1000) return alert("La descripción del producto debe tener entre 10 y 1000 caracteres.");

            // Enviar por AJAX
            let datos = $('#formProducto').serialize();
            $.post('guardar_producto.php', datos, function (respuesta) {
                alert(respuesta);
                $('#formProducto')[0].reset();
            });
        });
    });
});

