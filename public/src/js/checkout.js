Stripe.setPublishableKey('pk_test_51Hj5O7D6AxQdXmkShK4weFZkeDLOo8eRMmBU2aiKyFHmO13VYL8bKZ0iESLhho2ZDJhNVDcT90Zdt8PRzXepOzF1007nGGkI1x');

//Grab the form
var $form = $('#checkout-form');

$form.submit(function(event) {
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;
});


function stripeResponseHandler (status, response) {

    if (response.error) { // Problem occurred
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else { // Token was created

        // Get the token ID:
        var token = response.id;

        // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
}

//$stripe = new \Stripe\StripeClient('sk_test_51Hj5O7D6AxQdXmkSyA7hU54zrPA9ghhmhG1T5e7F6HkYlEvnx5F7xv1I4vTsYcp0CdAQVingE8LfdqfUiahLtjym0021CBnQhI');
//$stripe->tokens->create([
  //'card' => [
    //'number' => '4242424242424242',
    //'exp_month' => 1,
    //'exp_year' => 2022,
    //'cvc' => '314',
  //],
//]);
