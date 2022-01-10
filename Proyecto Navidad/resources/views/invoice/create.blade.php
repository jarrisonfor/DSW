@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Nueva factura</h1>

    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
        ¡Recuerda que las facturas no se pueden editar, lee bien los datos!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('invoice.store') }}">

        @csrf

        {{-- Client ID que se le pasa a la BD --}}
        <input type="hidden" name="client" value="{{ $client->id }}">

        {{-- Generación de listados de productos disponibles en el cliente (con precio asignado) --}}
        <div class="col-md-3 mt-3">
            <select class="custom-select" id="product" name="product">
                <option value="" selected data-check="empty">Elige un producto</option>
                @forelse($client->products as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->pivot->price }}€</option>
                @empty
                    <option value="" data-check="empty">No hay asignado ningún producto</option>
                @endforelse
            </select>
        </div>

        {{-- Listado de lotes una vez se elija un producto --}}
        <div class="col-md-3 mt-3">
            <select class="custom-select" id="lot" name="lot" data-name=''>
                <option value="" selected data-check="empty">Lote del producto</option>
            </select>
        </div>

        {{-- Cantidad junto a botón de añadir --}}
        <div class="input-group col-md-3 mt-3">
            <input type="number" class="form-control" placeholder="Cantidad" name="quantity" id="quantity"
                autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn-success" type="button" onclick="check()"><b>+ Añadir</b></button>
            </div>
        </div>

        {{-- Botonera de creación de la factura o de volver --}}
        <div class="col-12 mt-4">
            <button class="btn btn-primary" type="submit">Crear factura</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Volver</a>
        </div>

        {{-- Tabla vacía que se irá rellenando con los productos elegidos --}}
        <div class="table-responsive">
            <table class="table mt-3" id="productsTable">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </form>

    <script>
        // Sacar una copia de los productos que tiene el cliente de la factura
        var arr_copy = <?php echo json_encode($client->products); ?>;

        // Listado que contendrá los items actuales en la lista
        var current_items = [];

        // Funcion de validación del lado del cliente (con alerts)
        function check() {

            // Obtener información de los inputs, tanto la cantidad, el validador del producto y el lote y la cantidad máxima que tenemos en stock
            var product = $('#product option:selected').attr('data-check');
            var product_in_array = current_items.includes($('#product option:selected').val());
            var quantity = $('#quantity').val();
            var lot = $('#lot option:selected').attr('data-check');
            var lotmax = $('#lot option:selected').attr('data-quantity')

            // Comrpobar que el producto ni el lote estén vacíos, comprobar que la cantidad es mayor que sero pero inferior al stock actual
            if (product != 'empty' && parseInt(quantity) > 0 && parseInt(quantity) <= parseInt(lotmax) && lot != 'empty' &&
                product_in_array != true) {
                listado();
            } else if (product_in_array) {
                alert('No puedes añadir dos productos iguales a la misma factura')
            } else if (parseInt(quantity) > parseInt(lotmax)) {
                alert('Tienes menos stock del que has intentado añadir')
            } else {
                alert('Comprueba e introduce bien los datos');
            }
        }

        // Funcion para añadir items al listado
        function listado() {

            // Añadir el nombre del lote a la validación de items
            current_items.push($('#product option:selected').val())

            // Obtener los valores de los inputs
            var product = document.getElementById('product').value;
            var quantity = document.getElementById('quantity').value;
            var lot = document.getElementById('lot').value;

            // Buscar el producto en el listado de productos del cliente
            product = arr_copy.find((e) => e.id == product)

            // Obtener la tabla donde irán los productos
            var table = document.getElementById("productsTable").getElementsByTagName('tbody')[0];

            // Insertar una fila
            var row = table.insertRow(0)

            // Insertar los campos de cada fila
            var cell = row.insertCell();
            // Nombre
            cell.innerHTML = product.name;
            var cell = row.insertCell();
            // Cantidad añadida
            cell.innerHTML = "<input type='hidden' value='" + quantity + "' name='products[" + product.id +
                "][invoiceQuantity]'></input>" + quantity;
            var cell = row.insertCell();
            // Lote
            cell.innerHTML = "<input type='hidden' value='" + lot + "' name='products[" + product.id + "][lot]'></input>" +
                $('#lot option:selected').attr('data-name');
            var cell = row.insertCell();
            // Botón de borrar
            cell.innerHTML =
                "<button type='button' class='btn btn-danger' data-product_id='" + product.id +
                "' onclick='borrar(this)'><i class='bi bi-trash'></i></button>";

            // Restablecer los inputs de la factura
            var product = document.getElementById('product').value = "";
            var quantity = document.getElementById('quantity').value = "";
            $('#lot').find('option').remove().end();
            $('#lot').append($('<option>', {
                value: '',
                text: 'Lote del producto',
                'data-check': 'empty'
            }));
        }

        // Función para borrar items de la factura
        function borrar(r) {

            // Obtener el ID del producto
            id_producto = $(r).attr("data-product_id");

            // Obtener la fila en la que se hizo click al botón de borrar
            var row = r.parentNode.parentNode.rowIndex;
            // Borrar dicha fila
            document.getElementById("productsTable").deleteRow(row);

            // Recorrer el array que está en la validación y borrar el producto actual
            for (var i = 0; i < current_items.length; i++) {
                if (current_items[i] == id_producto) {
                    current_items.splice(i, 1);
                }
            }
        }

        // AJAX para actualizar el listado de lotes del producto seleccionado
        $("#product").change(function() {
            // Limpiar listado de lotes
            $('#lot').find('option').remove().end();
            // Conexión AJAX
            $.ajax({
                    method: "GET",
                    url: '{{ route('lot.json') }}',
                    // Datos que envío en la consulta de AJAX
                    data: {
                        product_id: $(this).val(),
                        client_id: {{ $client->id }},
                    }
                })
                .done(function(lots) {
                    // Generar la primera opción del listado de lotes
                    $('#lot').append($('<option>', {
                        value: '',
                        text: 'Lote del producto',
                        'data-check': 'empty'
                    }));
                    // Generar las opciones del listado de lotes
                    $.each(lots, function(a, b) {
                        // Generar las opciones solo si son mayores que 0
                        if (b.quantity > 0) {
                            // A = Índice del bucle
                            // B = Objeto obtenido en cada vuelta

                            // Dar formato a la fecha de caducidad
                            var d = new Date(b.expirationDate);
                            var curr_date = d.getDate();
                            var curr_month = d.getMonth() + 1;
                            var curr_year = d.getFullYear();
                            var date = curr_date + "/" + curr_month + "/" + curr_year

                            // Crear la línea de opción
                            $('#lot').append($('<option>', {
                                value: b.id,
                                text: b.name + ' x' + b.quantity + ' | ' + date,
                                'data-name': b.name,
                                'data-quantity': b.quantity
                            }));
                        }
                    })
                });
        });
    </script>

@endsection
