<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Factura</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
        }

        #main-table td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 4px
        }

        #main-table th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 6px
        }

        th {
            text-align: left;
        }

        .der {
            text-align: right;
        }

        h3 {
            margin: 0px;
        }

        .subtitle {
            font-size: 12px;
        }

    </style>
</head>

<body>

    <table id="data-table">
        <tr>
            <td>
                <h1>Nombre empresa</h1>
                <h3>Núm. Factura: {{ $invoice->invoiceNumber }}</h3>
                Fecha: {{ $invoice->created_at }}<br><br>
                CIF EMPRESA<br>
                CALLE EMPRESA<br>
                NUM TELEFONO EMPRESA
            </td>
            <td class="der">
                <h4>Factura emitida para</h4>
                <b>{{ $invoice->client->name }}</b><br>
                {{ $invoice->client->companyName }} | {{ $invoice->client->identification }}<br>
                {{ $invoice->client->address }}, {{ $invoice->client->municipality }}<br>
                {{ $invoice->client->postalCode }}, {{ $invoice->client->province }}<br>
            </td>
        </tr>
    </table>

    <br>
    <table style="border-collapse: collapse;" id="main-table">
        <thead>
            <tr style="background-color: #EEEEEE">
                <th style="width: 50px;">UDS.</th>
                <th>ARTÍCULO</th>
                <th class="der" style="width: 100px;">PRECIO / U.</th>
                <th class="der" style="width: 100px;">SUBTOTAL</th>
                <th class="der" style="width: 30px;">IGIC</th>
                <th class="der" style="width: 100px;">TOTAL</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($invoice->products()->withTrashed()->get() as $item)
                <tr style="border-bottom: 1px solid black;">
                    <td style="text-align: center">{{ $item->pivot->invoiceQuantity }}</td>
                    <td><b>{{ $item->pivot->productName }}</b> <br> <span
                            class="subtitle">{{ $item->pivot->lotName }} -
                            {{ \Carbon\Carbon::parse($item->pivot->lotExpirationDate)->format('d/m/Y') }}</span></td>
                    <td class="der">{{ number_format(round($item->pivot->productPrice, 2), 2, ',', ' ') }}
                        €</td>
                    <td class="der">
                        {{ number_format(round($item->pivot->invoiceQuantity * $item->pivot->productPrice, 2), 2, ',', '.') }}
                        €
                    </td>
                    <td class="der">{{ $item->pivot->tax }}%</td>
                    <td class="der">
                        {{ number_format(round($item->pivot->productTotal, 2), 2, ',', '.') }} €
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6" style="border: none">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="4" style="border: none"></td>
                <td colspan="2" class="der" style="border: none"><strong>TOTAL:</strong>
                    {{ number_format(round($invoice->totalAmount, 2), 2, ',', '.') }} €
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
