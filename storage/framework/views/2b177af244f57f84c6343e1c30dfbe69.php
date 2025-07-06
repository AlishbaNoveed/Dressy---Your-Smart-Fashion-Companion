<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Stripe Test Page</title>
  <style>
    body { padding: 20px; font-family: sans-serif; background: #f9f9f9; }
    #card-element { padding: 15px; border: 1px solid #ccc; border-radius: 4px; background: white; }
    #card-errors { color: red; margin-top: 12px; }
    button { margin-top: 20px; padding: 10px 20px; }
  </style>
</head>
<body>
  <h3>Stripe Card Input Test</h3>
  <div id="card-element"></div>
  <div id="card-errors"></div>
  <button id="submit-btn">Test Card</button>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const stripe = Stripe("<?php echo e(env('STRIPE_KEY')); ?>");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    card.on('change', e => {
      document.getElementById('card-errors').textContent = e.error?.message || '';
    });

    document.getElementById('submit-btn').addEventListener('click', async () => {
      const {error, paymentMethod} = await stripe.createPaymentMethod('card', card);
      alert(error ? error.message : '✅ Card input works: ' + paymentMethod.id);
    });
  </script>
</body>
</html>
<?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/user/stripe_test.blade.php ENDPATH**/ ?>