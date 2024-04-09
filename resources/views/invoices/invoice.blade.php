    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body {
                font-family: 'Calibri', sans-serif;
                width: 100vw;
                height: 100vh;
            }
            .custom-table, .custom-table1 {
        width: 80%; /* Atur lebar tabel sesuai keinginan */
        margin-left: auto;
        margin-right: auto;
    }

    /* Mengurangi padding dalam sel tabel untuk mengurangi ukuran tabel */
    .table td, .table th {
        padding: .3rem; /* Sesuaikan padding sesuai kebutuhan */
    }

    /* Memastikan container tidak memiliki skala transformasi yang mempengaruhi anak-anaknya */
    .container {
        margin-top: 30px; /* Atur margin atas */
        /* Jika Anda ingin container menyesuaikan dengan ukuran tabel */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
            .invoice-info{
                margin:auto;
            }
            .invoice-info-header{
                background-color: #01013D;
                display: block;
                color: black;
                margin:auto;
            }
            .thead-primary{
                background-color: #01013D;
                color: white;
            }
            h5.fw-bold{
                font-size: 12px;
                color: black;
                margin-top: 5px;
            }
            .fw-bold{
                font-weight: bold;
            }
            .ul-invoice {
                text-decoration: none;
                list-style-type: none;
            }
            .no-invoice{
                font-size: 12px;
                padding-top: 113px;
                padding-left: 20px;
                color: black;
            }
            .custom-table, .custom-table1{
                margin: auto;
            }
            table{
                font-size: 12px;
            }
        </style>
    </head>
    <body style="margin: 0; padding: 0; width: 100%; height: 100%; background-image: url('img/bg/bg-invoice.jpg'); background-size: cover;">
            <div class="container">
                <p class="text-start no-invoice "><span class="fw-bold">INVOICE NO:</span> {{ $invoice->invoice_number }}</p>
                <div class="invoice-info-header">
                    <span></span>
                </div>
                <!-- Section for Invoice To -->
                <table class="table mb-4 table-bordered custom-table1">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col" style="color: #01013D">.</th>
                            <th scope="col" style="color: #01013D">.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through invoice items -->
                        <tr>
                            <td class="text-start">
                                <ul class="ul-invoice">
                                    <li class="fw-bold">Invoice To:</li>
                                    <li class="fw-bold" style="margin-top: 10px">{{ $invoice->customer_name }}</li>
                                    <li>{{ $invoice->customer_address }}</li>
                                </ul>
                            </td>
                            <td style="text-align: right">
                                <ul class="ul-invoice">
                                    <li class="fw-bold">Invoiced Date:</li>
                                    <li style="margin-bottom:10px" >{{ $invoice->invoice_date->format('d/m/Y') }}</li>
                                    <li class="fw-bold">Due Date:</li>
                                    <li>{{ $invoice->due_date->format('d/m/Y') }}</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Table for Invoice Items -->
                <table class="table mb-4 table-bordered custom-table">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $item)
                        <!-- Loop through invoice items -->
                        <tr>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ number_format($item->subtotal) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">VAT 10%</td>
                           @if($invoice->vat == 0)
                           <td class="fw-bold">-</td>
                            @else
                            <td class="fw-bold">{{$invoice->vat}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="3">Grand Total</td>
                            <td class="fw-bold">{{ "Rp " . number_format($invoice->paymentDetails->total)}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td class="fw-bold">{{ "Rp " . number_format($invoice->paymentDetails->total)}}</td>
                        </tr>
                      
                    </tbody>
                </table>

                <table class="table table-bordered text-center custom-table1">
                    <thead class="thead-primary">
                        <tr>
                            <th scope="col">Payment Channel</th>
                            <th scope="col">Account</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through invoice items -->
                        <tr>
                            <td>{{ $invoice->paymentDetails->bank}}<br>{{ $invoice->paymentDetails->cabang}}</td>
                            <td>{{ $invoice->paymentDetails->no_rek}}<br> a/n {{ $invoice->paymentDetails->owner_rek}}</td>
                            <td>{{ "Rp " . number_format($invoice->paymentDetails->total)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.6.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
