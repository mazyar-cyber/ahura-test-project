<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice order receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <!-- BEGIN INVOICE -->
            <div class="col-xs-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">

                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>Invoice</h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="pull-right">
                                    <img src="{{asset('img/companyLogo.PNG')}}" alt="" height="105">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>From:</strong><br>
                                    <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                    <p>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                    <address>
                                        <strong>For:</strong><br>
                                        Elaine Hernandez<br>
                                        P. Sherman 42,<br>
                                        Wallaby Way, Sidney<br>
                                        <abbr title="Phone">P:</abbr> (123) 345-6789
                                    </address>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    Visa ending **** 1234<br>
                                    h.elaine@gmail.com<br>
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    17/06/14
                                </address>
                            </div>
                        </div>

                        <product-table :products="{{$products}}"></product-table>


                        <div class="row">
                            <div class="col-md-12 text-right identity">
                                <p>Designer identity<br><strong>Jeffrey Williams</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
            background: #eee;
        }

        .invoice {
            padding: 30px;
        }

        .invoice h2 {
            margin-top: 0px;
            line-height: 0.8em;
        }

        .invoice .small {
            font-weight: 300;
        }

        .invoice hr {
            margin-top: 10px;
            border-color: #ddd;
        }

        .invoice .table tr.line {
            border-bottom: 1px solid #ccc;
        }

        .invoice .table td {
            border: none;
        }

        .invoice .identity {
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: 300;
        }

        .invoice .identity strong {
            font-weight: 600;
        }


        .grid {
            position: relative;
            width: 100%;
            background: #fff;
            color: #666666;
            border-radius: 2px;
            margin-bottom: 25px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        }

    </style>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
<script>
    import ProductTable from "../js/components/productTable";
    export default {
        components: {
            ProductTable
        }
    }

</script>
