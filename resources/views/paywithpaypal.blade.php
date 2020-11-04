@extends('layouts.app')

<script
    src="https://www.paypal.com/sdk/js?client-id=AbblIweFsj0yg9fu-UeywWQYaDFY7w7FcIzgqA2nPUzUftzOPqWrWkPjVCMkhJC-isC1K4TY_g5-anxA">
    // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>

<?

    $price = substr(session('price'), 0, -1);

    if(session('language') == 'pl'){
        $lan = 'pl';
    } else {
        $lan = 'eng';
    }

    $lang['pl'] = array(
            'titleMain' => 'Płatność za ofertę',
            'titleSecond' => 'Kwota do zapłaty:',
        );
    
    $lang['eng'] = array(
        'titleMain' => 'Payment for the offer',
        'titleSecond' => 'Amount to be paid:',
    );

?>

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 120px">

        <h1 class="text-center col-12"> {{ $lang[$lan]['titleMain'] }} <strong>{{session('title') }}</strong> </h1>
        <h3 class="mt-4 text-center mb-5 col-12"> {{ $lang[$lan]['titleSecond'] }} <strong> {{session('price')  }}
            </strong></h3>


        <div id="paypal-button-container" class="col-12 row justify-content-center"></div>

        <script>
            paypal.Buttons({
                    createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            value: "<?php echo $price; ?>"
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction completed by ' + details.payer.name.given_name);
                        window.location = 'http://www.bohun.vot.pl/graphic-designer/offers';
                    });
                    }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.


                //check for Navigation Timing API support

            // powrót po przeładowaniu storny
            if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                window.location = 'http://www.bohun.vot.pl/graphic-designer/offers';
            }
        </script>
    </div>
</div>
@endsection