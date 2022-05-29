@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Panel principal</h1>

    <div class="row mb-4">

        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title">Hoy</h2>
                    <canvas id="today"></canvas>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title">Esta semana</h2>
                    <canvas id="week"></canvas>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title">Este año</h2>
                    <canvas id="year"></canvas>
                </div>
            </div>
        </div>

    </div>

    <h2>Acceso rápido a ultimas 10 facturas</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Núm. factura</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope="col" style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices->take(10) as $item)
                    @if ($item->client = $item->client()->withTrashed()->first())
                        <tr>
                            <td>{{ $item->invoiceNumber }}</td>
                            <td>{{ $item->client->companyName }}</td>
                            <td>{{ number_format(round($item->totalAmount, 2), 2, ',', ' ') }}€</td>
                            <td style="text-align: center;">
                                <a class="btn btn-sm btn-primary" href="{{ route('invoice.email', $item->id) }}"
                                    role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
                                    </svg>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ route('invoice.pdf', $item->id) }}"
                                    role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                        <path fill-rule="evenodd"
                                            d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                    </svg></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <script>
            window.onload = function () {
                Chart.register(window['chartjs-plugin-autocolors']);
                moment.locale('es');
                let now = moment();
                let invoices = <?php echo json_encode($invoices->toArray(), JSON_NUMERIC_CHECK); ?>;
                let yearConfig = {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            data: [],
                        }]
                    },
                    options: {
                        plugins: {
                            autocolors: {
                                mode: 'data'
                            },
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    title: () => { },
                                    label: (context) => {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += '';
                                        }
                                        return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(context.parsed.y);
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    callback: label => `${label}€`
                                }
                            }
                        }
                    }
                };
                yearConfig.data.labels = moment.monthsShort().map(month => month.charAt(0).toUpperCase() + month.slice(1).replace(/^\.+|\.+$/g, ''));
                yearConfig.data.datasets[0].data = yearConfig.data.labels.map((month, i) => {
                    let totalMonth = 0;
                    invoices.forEach(invoice => {
                        let invoiceMoment = moment(invoice.datetime);
                        if (invoiceMoment.month() === i && invoiceMoment.year() === now.year()) {
                            totalMonth += invoice.totalAmount;
                        }
                    });
                    return totalMonth;
                });
                var yearChart = new Chart(document.getElementById("year").getContext('2d'), yearConfig);

                let weekConfig = {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            data: [],
                        }]
                    },
                    options: {
                        plugins: {
                            autocolors: {
                                mode: 'data'
                            },
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    title: () => { },
                                    label: (context) => {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    callback: label => `${label}€`
                                }
                            }
                        }
                    }
                };
                weekConfig.data.labels = moment.weekdaysShort(true).map(week => week.charAt(0).toUpperCase() + week.slice(1).replace(/^\.+|\.+$/g, ''));
                weekConfig.data.datasets[0].data = weekConfig.data.labels.map((week, i) => {
                    let totalWeek = 0;
                    invoices.forEach(invoice => {
                        let invoiceMoment = moment(invoice.datetime);
                        if (invoiceMoment.weekday() === i && invoiceMoment.month() === now.month() && invoiceMoment.year() === now.year()) {
                            totalWeek += invoice.totalAmount;
                        }
                    });
                    return totalWeek;
                });
                var weekChart = new Chart(document.getElementById("week").getContext('2d'), weekConfig);

                let todayConfig = {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{
                            data: [],
                        }]
                    },
                    options: {
                        plugins: {
                            autocolors: {
                                mode: 'data'
                            },
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    title: () => { },
                                    label: (context) => {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += '';
                                        }
                                        return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' }).format(context.parsed.y);
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    callback: label => `${label}€`
                                }
                            }
                        }
                    }
                };
                let todayInvoices = invoices.filter((invoice) => moment(invoice.datetime).isSame(now, 'day'));
                todayConfig.data.labels = todayInvoices.map(invoice => moment(invoice.datetime).format("HH:mm"));
                todayConfig.data.datasets[0].data = todayInvoices.map(invoice => invoice.totalAmount);
                var todayChart = new Chart(document.getElementById("today").getContext('2d'), todayConfig);
            };
        </script>
    </div>

@endsection
