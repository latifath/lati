<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TDS-store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" media="all" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid col-md-6">
    <div class="col-8"></div>
    <div class="row col-md-8 header">
        <div class="invoice-col">
            <p><img src="{{ asset('assets/img/tds.png') }}" alt=""></p>
            <h3>Facture # </h3>
        </div>
        <div class="col-md-8 offset-sm-8 text-center text-lg-right">
            <div class="status">
                <span style="font-size: 24px;"> PAYE</span>
            </div>
            <div class="small-text">
                Date d'echéance:
            </div>
            <div class="paiement-btn-container hidden-print">

            </div>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-sm-6 " style="padding-left: 18px;">
            <strong> Facturé à</strong>
            <p class="small-text">
                nom prenom client <br>
                rue, ville <br>
                code postal, pays
        </div>
        <div class="col-sm-6 right">
            <strong>Payé à</strong>
            <p class="small-text">
                TDS STORE <br>
                Akpakpa, àproximité de la Béninoise <br>
                +229    / +299  (Whatsapp)
            </p>
        </div>
        <div class="col-sm-6">
            <strong>Date de facturation</strong>
            <span> 02 juillet, 2022</span>
            <br>
            <br>
        </div>
        <div class="row col-sm-6">
            <strong>Mode de paiement</strong>

            <span class="small-text data-role ="><br>
                <form action="">
                    <input type="hidden" name="mode" value="">
                    <select class="custom-select" name="mode">
                           <option value="">momo</option>
                        <option selected>momo</option>
                    </select>
                </form>
                <br>
                <br>
            </span>
        </div>

        <div class="panel panel-default col-sm-6">
            <div class="panel-heading">
                <h3 class="panel-titre">
                    <strong>Items de la facturation</strong>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td><strong>Montant</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>alv</td>
                                <td>1200fcfa</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="trannsaction-container">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Date de la trnsaction</strong></td>
                                <td class="text-center"><strong>Transaction #</strong></td>
                                <td class="text-center"><strong>Montant</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="text-right">
                                <td><strong>Solde</strong></td>
                                <td class="text-center"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>

            </div>
        </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script src=https://code.jquery.com/jquery-3.4.1.min.js></script>
    <script src=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js')  }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')  }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src=" {{ asset('asets/mail/contact.js') }}"></script>

</body>
</html>
