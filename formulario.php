<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Producto</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="author" content="Juan Pablo Tejo">
    <meta name="description" content="Prueba de diagnostico para la empresa Desis">
</head>


<body>

    <div class="form-container">
        <h1>Formulario de Producto</h1>
        
        <!-- Grid en columnas -->
        <form id="formProducto">
            <div class="form-grid">
                <div>
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo">
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div>
                    <label for="bodega">Bodega</label>
                    <select id="bodega" name="bodega">
                        <option value="">Seleccione</option>
                    </select>
                </div>
                <div>
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal">
                        <option value="">Seleccione</option>
                    </select>
                </div>
                <div>
                    <label for="moneda">Moneda</label>
                    <select id="moneda" name="moneda">
                        <option value="">Seleccione</option>
                    </select>
                </div>
                <div>
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio">
                </div>
            </div>

            <!-- Sección aparte -->
            <div class="form-extra">
                <label class="titulo-materiales">Materiales del Producto</label>
                <div class="materiales-opciones">
                    <label><input type="checkbox" name="material[]" value="plástico"> Plástico</label>
                    <label><input type="checkbox" name="material[]" value="metal"> Metal</label>
                    <label><input type="checkbox" name="material[]" value="madera"> Madera</label>
                    <label><input type="checkbox" name="material[]" value="vidrio"> Vidrio</label>
                    <label><input type="checkbox" name="material[]" value="textil"> Textil</label>
                </div>
                <br>
                <div>
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Ingrese su descripción aquí ..."></textarea>
                </div>

                <button type="button" id="guardar">Guardar Producto</button>
            </div>
        </form>
    </div>

<script src="js/validaciones.js"></script>
</body>


<!-- Script para cargar los datos de bodega, sucursal y moneda de la base de datos -->
<script> 
document.addEventListener('DOMContentLoaded', function () {
    fetch('cargar_bodegas.php')
        .then(response => response.json())
        .then(data => {
            const selectBodega = document.getElementById('bodega');
            selectBodega.innerHTML = '<option value="">Seleccione una bodega</option>';

            data.forEach(function (bodega) {
                const option = document.createElement('option');
                option.value = bodega.id;
                option.textContent = bodega.nombre;
                selectBodega.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error al cargar las bodegas:', error);
        });

    cargarMonedas();
    cargarSucursales();
});

function cargarMonedas() {
    fetch('cargar_monedas.php')
        .then(response => response.json())
        .then(data => {
            const selectMoneda = document.getElementById('moneda');
            selectMoneda.innerHTML = '<option value="">Seleccione una moneda</option>';
            data.forEach(moneda => {
                const option = document.createElement('option');
                option.value = moneda.id;
                option.text = moneda.nombre;
                selectMoneda.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar las monedas:', error));
}

function cargarSucursales() {
    fetch('cargar_sucursales.php')
        .then(response => response.json())
        .then(data => {
            const selectSucursal = document.getElementById('sucursal');
            selectSucursal.innerHTML = '<option value="">Seleccione una sucursal</option>';
            data.forEach(sucursal => {
                const option = document.createElement('option');
                option.value = sucursal.id;
                option.text = sucursal.nombre;
                selectSucursal.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar las sucursales:', error));
}
</script>
</html>
