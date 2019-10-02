@push('styles')
<style type="text/css">
    /**
     * The CSS shown here will not be introduced in the Quickstart guide, but shows
     * how you can use CSS to style your Element's container.
     */
    .StripeElement {
      box-sizing: border-box;

      height: 40px;

      padding: 10px 12px;

      border: 1px solid transparent;
      border-radius: 4px;
      background-color: white;

      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
      box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
      border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
    }
</style>
@endpush


<label class="mt-3">Card details:</label>
<div id="cardElement"></div>
<small class="form-text text-muted" id="cardErrors" role="alert"></small>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');

    const elements = stripe.elements({locale: 'en'});
    const cardElement = elements.create('card');

    cardElement.mount('#cardElement');
</script>
@endpush
