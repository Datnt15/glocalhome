var stripe = Stripe('pk_test_pmx83P9d4qmgqIR87kV4e57G');
var elements = stripe.elements();

var card = elements.create('card', {
    hidePostalCode: true,
    style: {
        base: {
            iconColor: '#F99A52',
            color: '#32315E',
            lineHeight: '48px',
            fontWeight: 400,
            fontFamily: '"Helvetica Neue", "Helvetica", sans-serif',
            fontSize: '15px',
            '::placeholder': {
                color: '#CFD7DF',
            }
        },
    }
});
card.mount('#card-element');

function setOutcome(result) {
    var successElement = document.querySelector('.success');
    var errorElement = document.querySelector('.error');
    successElement.classList.remove('visible');
    errorElement.classList.remove('visible');

    if (result.token) {
        // Use the token to create a charge or a customer
        // https://stripe.com/docs/charges
        successElement.querySelector('.token').textContent = result.token.id;
        successElement.classList.add('visible');
        var token = document.createElement("input");
        token.name = "stripeToken";
        token.value = result.token.id; // token value from Stripe.card.createToken
        token.type = "hidden"
        document.querySelector('form').appendChild(token);
        document.querySelector('form').submit();
    } else if (result.error) {
        errorElement.textContent = result.error.message;
        errorElement.classList.add('visible');
    }
}

card.on('change', function(event) {
    setOutcome(event);
});

document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = document.querySelector('form');
    var extraDetails = {
        amount: _total,
        currency: _currency,
        description: "Example charge",
        name: form.querySelector('input[name=cardholder-name]').value
    };
    stripe.createToken(card, extraDetails).then(setOutcome);
});