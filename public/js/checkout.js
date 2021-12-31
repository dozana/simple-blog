Stripe.setPublishableKey('pk_test_51KCimBH6eFMZkh3TxonlDLGPxpU7bhrBYa0D4hsCRRsYOWKNre9pVO8tGqt7kYcxmrl2XpSSjmu499zVvXqj4f8G00iTLcRAJK');

var $form = $('#checkoutForm');

$form.submit(function () {
    $('chargeError').addClass('hidden');
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken({
        number: $('#cardNumber').val(),
        cvc: $('#cardCvc').val(),
        exp_month: $('#cardExpiryMonth').val(),
        exp_year: $('#cardExpiryYear').val(),
        name: $('#cardName').val(),
    }, stripeResponseHandler);

    return false;
});

function stripeResponseHandler(status, response) {
    if(response.error) {
        $('chargeError').removeClass('hidden');
        $('chargeError').text(response.error.message);
        $form.find('button').prop('disabled', true);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));
        $form.get(0).submit();
    }
}
