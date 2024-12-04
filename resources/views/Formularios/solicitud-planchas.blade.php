<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Planchas</title>

    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            border: 1px solid #d3d3d3;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 25px;
            box-sizing: border-box;
            border: 1px solid #d3d3d3;
        }
        .header img {
            width: 80px;
            height: auto;
        }
        .header-title {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
        }
        .header-number {
            font-size: 1em;
            color: red;
        }

    </style>
</head>
<body>

    <!-- Inicio del Botón de Guardar -->
    <form action="{{ route('guardarSolicitud') }}" method="POST">
        @csrf <!-- Token de seguridad obligatorio en Laravel -->

        <div class="header">
            <img src="{{ asset('images/LogoInplasa.jpg') }}" alt="Logotipo">
            <div class="header-title">
                SOLICITUD DE PLANCHAS<br>
                <small>DEPARTAMENTO DE IMPRESIÓN</small>
            </div>
            <div>
                <label style="color: red;">N°:</label>
                <input type="text" name="incrementable" placeholder="" style="font-weight: bold; color: #006699;">
            </div>
        </div>
        
        <div style="border: 1px solid #d3d3d3; padding: 10px;">
            <!-- Cliente, OP, Cant., Pistas -->
            <div style="display: flex; gap: 100px; padding: 10px;">
                <div>
                    <label>Cliente:</label>
                    <input type="text" name="cliente"> <!-- Campo para el cliente -->
                </div>
                <div>
                    <label>OP:</label>
                    <input type="number" name="op"> <!-- Campo para el número de orden de producción -->
                </div>
                <div>
                    <label>Cant.:</label>
                    <select name="cantidad" id="cantidad">
                        @for ($i = 1; $i <= 20; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select> <!-- Selector para la cantidad -->
                </div>
                <div>
                    <label>Pistas:</label>
                    <input type="number" name="pistas"> <!-- Campo para la cantidad de pistas -->
                </div>
            </div>

            <!-- Familia, Orden de prod., Referencia -->
            <div style="display: flex; gap: 100px; padding: 10px;">
                <div>
                    <label>Familia:</label>
                    <select name="familia">
                        <option value="BOP">BOP</option>
                        <option value="PE">PE</option>
                    </select> <!-- Selector para la familia de productos -->
                </div>
                <div>
                    <label>Orden de prod.:</label>
                    <input type="number" name="orden_produccion" placeholder=""> <!-- Campo para el número de orden de producción -->
                </div>
                <div>
                    <label>Referencia:</label>
                    <input type="text" name="referencia"> <!-- Campo para la referencia -->
                </div>
            </div>

            <!-- Tabla dinámica: Colores solicitados, Tipo de Planchas, Piso de Planchas -->
            <div style="padding: 25px;">
                <table>
                    <tr>
                        <td style="font-weight: bold;">Colores solicitados:</td>
                        <td id="colores-cell"></td> <!-- Celda para los colores solicitados -->
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Tipo de Planchas:</td>
                        <td id="tipo-cell"></td> <!-- Celda para el tipo de planchas -->
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Piso de plancha:</td>
                        <td id="piso-cell"></td> <!-- Celda para el piso de planchas -->
                    </tr>
                </table>
            </div>
        </div>

        <div class="section">
            <div style="display: flex; gap: 100px;">
                <div>
                    <label>Solicitado por:</label>
                    <select name="solicitado_por">
                        <option value="impresion">Impresión</option>
                        <option value="diseno">Diseño</option>
                        <option value="fotomecanica">Fotomecánica</option>
                        <option value="cliente">Cliente</option>
                        <option value="programacion">Programación</option>
                    </select> <!-- Selector para indicar quién solicitó la plancha -->
                </div>
                <div>
                    <label>Ingreso:</label>
                    <input type="datetime-local" name="ingreso"> <!-- Campo para la fecha y hora de ingreso -->
                </div>
                <div>
                    <label>Entrega:</label>
                    <input type="datetime-local" name="entrega"> <!-- Campo para la fecha y hora de entrega -->
                </div>
            </div>

            <div style="display: flex; gap: 100px; margin:25px;">
                <div>
                    <label>Causa de solicitud: Pre-prensa</label>
                    <select name="causa_solicitud">
                        <option value=" ">Seleccione Motivo</option>
                        <option value="arte_nuevo">Arte Nuevo</option>
                        <option value="cambio_arte">Cambio en Arte</option>
                        <option value="No_aplica">N/A</option>
                    </select> <!-- Selector para la causa de la solicitud -->
                </div>
                <div>
                    <label>Impresión:</label>
                    <select name="impresion">
                        <option value=" ">Seleccione Motivo</option>
                        <option value="opcion1">Roto</option>
                        <option value="opcion2">Golpe</option>
                        <option value="opcion3">Desgaste</option>
                        <option value="opcion4">Extraviado</option>
                        <option value="opcion5">Ajuste solicitado por impresión</option>
                        <option value="opcion6">Ajuste solicitado por el cliente</option>
                        <option value="opcion7">Error en diseño</option>
                        <option value="opcion8">Error en fotomecánica</option>
                        <option value="opcion9">Error en montaje</option>
                        <option value="opcion10">Complemento</option>
                        <option value="opcion11">Prueba</option>
                        <option value="opcion12">Cambio de tipo de plancha</option>
                        <option value="No_aplica">N/A</option>
                    </select> <!-- Selector para indicar el motivo relacionado con la impresión -->
                </div>
                <div>
                    <label>Cantidad de Material Utilizado:</label>
                    <select name="material_utilizado" id="material_utilizado">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select> <!-- Selector para la cantidad de material utilizado -->
                </div>
            </div>
        </div>

        <div class="section">
            <table border="0.9">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Ancho (mm)</th>
                        <th>Alto (mm)</th>
                    </tr>
                </thead>
                <tbody id="material-table-body">
                    <!-- Las filas se generarán dinámicamente aquí -->
                </tbody>
            </table>
        </div>
        <br>
        <!-- FIN Botón de Guardar -->
        <button type="submit">Guardar</button> <!-- Botón para enviar el formulario -->
    </form>

    <style>
        table input[type="text"],
        table input[type="number"],
        table select {
            width: 100px; /* Ajusta el tamaño según lo necesario */
            box-sizing: border-box; /* Para que el padding no altere el ancho total */
        }

        /* Quitar flechas de los campos de número */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield; /* Para Firefox */
        }
    </style>

    <script>
        function generarCasillas(cantidad) {
            const coloresCell = document.getElementById('colores-cell');
            const tipoCell = document.getElementById('tipo-cell');
            const pisoCell = document.getElementById('piso-cell');

            // Limpia las celdas
            coloresCell.innerHTML = '';
            tipoCell.innerHTML = '';
            pisoCell.innerHTML = '';

            for (let i = 0; i < cantidad; i++) {
                // Colores solicitados
                const colorInput = document.createElement('input');
                colorInput.type = 'text';
                colorInput.name = 'colores_solicitados[]';
                colorInput.maxLength = 50;
                coloresCell.appendChild(colorInput); // Añadir campo para el color solicitado

                // Tipo de Planchas
                const tipoSelect = document.createElement('select');
                tipoSelect.name = 'tipo_planchas[]';
                const optionDPR = new Option('DPR', 'DPR');
                const optionEPR = new Option('EPR', 'EPR');
                tipoSelect.add(optionDPR);
                tipoSelect.add(optionEPR);
                tipoCell.appendChild(tipoSelect); // Añadir selector para el tipo de plancha

                // Piso de plancha
                const pisoInput = document.createElement('input');
                pisoInput.type = 'number';
                pisoInput.name = 'piso_planchas[]';
                pisoCell.appendChild(pisoInput); // Añadir campo para el piso de la plancha
            }
        }

        // Genera al menos una casilla al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            generarCasillas(1); // Crea una casilla por defecto
        });

        // Escucha cambios en la cantidad
        document.getElementById('cantidad').addEventListener('change', function() {
            const cantidad = Math.max(1, parseInt(this.value)); // Asegura un mínimo de 1
            generarCasillas(cantidad); // Generar casillas según la cantidad seleccionada
        });

        function generarFilasMaterial(cantidad) {
            const materialTableBody = document.getElementById('material-table-body');

            // Limpiar tabla
            materialTableBody.innerHTML = '';

            for (let i = 0; i < cantidad; i++) {
                const row = document.createElement('tr');

                // Tipo
                const tipoCell = document.createElement('td');
                const tipoSelect = document.createElement('select');
                tipoSelect.name = 'tipo_material[]';
                tipoSelect.add(new Option('DPR', 'DPR'));
                tipoSelect.add(new Option('EPR', 'EPR'));
                tipoCell.appendChild(tipoSelect); // Añadir selector para el tipo de material
                row.appendChild(tipoCell);

                // Cantidad
                const cantidadCell = document.createElement('td');
                const cantidadInput = document.createElement('input');
                cantidadInput.type = 'number';
                cantidadInput.name = 'cantidad_material[]';
                cantidadCell.appendChild(cantidadInput); // Añadir campo para la cantidad de material
                row.appendChild(cantidadCell);

                // Ancho
                const anchoCell = document.createElement('td');
                const anchoInput = document.createElement('input');
                anchoInput.type = 'number';
                anchoInput.name = 'ancho_material[]';
                anchoCell.appendChild(anchoInput); // Añadir campo para el ancho del material
                row.appendChild(anchoCell);

                // Alto
                const altoCell = document.createElement('td');
                const altoInput = document.createElement('input');
                altoInput.type = 'number';
                altoInput.name = 'alto_material[]';
                altoCell.appendChild(altoInput); // Añadir campo para el alto del material
                row.appendChild(altoCell);

                // Añadir fila a la tabla
                materialTableBody.appendChild(row);
            }
        }

        // Generar una fila por defecto al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            generarFilasMaterial(1); // Genera una fila por defecto
        });

        // Escuchar cambios en el select de cantidad de material
        document.getElementById('material_utilizado').addEventListener('change', function() {
            const cantidad = Math.max(1, parseInt(this.value)); // Asegurar que el mínimo sea 1
            generarFilasMaterial(cantidad); // Generar filas según la cantidad seleccionada
        });
    </script>

    <div class="authorization-section">
        <div class="authorization-label">
            <hr>
            <label>Autorizado por</label>
        </div>
        <div class="authorization-label">
            <hr>
            <label>Operador de Fotomecánica</label>
        </div>
        <div class="authorization-label">
            <hr>
            <label>Recibido por</label>
        </div>
    </div>

    <style>
        /* Estilos para la sección de autorización */
        .authorization-section {
            display: flex;
            justify-content: space-around;
            padding: 150px;
            border-top: 1px solid #d3d3d3;
            border-bottom: 1px solid #d3d3d3;
        }
        .authorization-label {
            text-align: center;
            width: 200px;
        }
        .authorization-label hr {
            margin: 0;
            border: 1px solid #d3d3d3;
        }
        .authorization-label label {
            display: block;
            margin-top: 5px;
            font-weight: bold;
        }
    </style>

</body>
</html>