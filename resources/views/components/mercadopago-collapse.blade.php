<label class="mt-3">Card details:</label>

<div class="form-group form-row">
    <div class="col-5">
        <input class="form-control" type="text" id="cardNumber" data-checkout="cardNumber" placeholder="Card Number">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" data-checkout="securityCode" placeholder="CVC">
    </div>

    <div class="col-1"></div>

    <div class="col-1">
        <input class="form-control" type="text" data-checkout="cardExpirationMonth" placeholder="MM">
    </div>

    <div class="col-1">
        <input class="form-control" type="text" data-checkout="cardExpirationYear" placeholder="YY">
    </div>
</div>



<div class="form-group form-row">
    <div class="col-5">
        <input class="form-control" type="text" data-checkout="cardholderName" placeholder="Your Name">
    </div>
    <div class="col-5">
        <input class="form-control" type="email" data-checkout="cardholderEmail" placeholder="email@example.com" name="email">
    </div>
</div>


<div class="form-group form-row">
    <div class="col-2">
        <select class="custom-select" data-checkout="docType"></select>
    </div>
    <div class="col-3">
        <input class="form-control" type="text" data-checkout="docNumber" placeholder="Document">
    </div>
</div>

<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-mute"  role="alert" >Your payment will be converted to {{ strtoupper(config('services.mercadopago.base_currency')) }}</small>
    </div>
</div>

<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
    </div>
</div>

<input type="hidden" id="cardNetwork" name="card_network">


@push('scripts')
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<script>
    const mercadoPago = window.Mercadopago;

    mercadoPago.setPublishableKey('{{ config('services.mercadopago.key') }}');

    mercadoPago.getIdentificationTypes();
</script>

<script>
    function setCardNetwork()
    {
        const cardNumber = document.getElementById("cardNumber");

        mercadoPago.getPaymentMethod(
            { "bin": cardNumber.value.substring(0,6) },
            function(status, response) {
                const cardNetwork = document.getElementById("cardNetwork");

                cardNetwork.value = response[0].id;
            }
        );
    }
</script>
@endpush
