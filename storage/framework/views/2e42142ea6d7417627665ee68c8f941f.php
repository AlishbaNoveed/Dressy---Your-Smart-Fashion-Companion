<?php $__env->startSection('content'); ?>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Shipping and Checkout</h2>
      <div class="checkout-steps">
        <a href="<?php echo e(route('cart.index')); ?>" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" id="checkout-form" action="<?php echo e(route('cart.place.an.order')); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <div class="checkout-form">
    <div class="billing-info__wrapper">
      <div class="row">
        <div class="col-6">
          <h4>SHIPPING DETAILS</h4>
        </div>
        <div class="col-6"></div>
      </div>

      <?php if($address): ?>
        <div class="row">
  <div class="col-md-12">
    <div class="my-account__address-list p-4 border rounded-3 bg-white shadow-sm">
      <div class="my-account__address-list-item">
        <div class="my-account__address-item__detail" style="font-size: 15px; color: #333;">
          <p class="mb-1"><strong>Name:</strong> <?php echo e($address->name); ?></p>
          <p class="mb-1"><strong>Address:</strong> <?php echo e($address->address); ?></p>
          <p class="mb-1"><strong>Landmark:</strong> <?php echo e($address->landmark); ?></p>
          <p class="mb-1"><strong>State/Country:</strong> <?php echo e($address->state); ?>, <?php echo e($address->country); ?></p>
          <p class="mb-1"><strong>Pincode:</strong> <?php echo e($address->zip); ?></p>
          <hr class="my-3" />
          <p class="mb-0"><strong>Phone:</strong> <?php echo e($address->phone); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

      <?php else: ?>
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="name" required value="<?php echo e(old('name')); ?>">
              <label for="name">Full Name *</label>
              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="phone" required value="<?php echo e(old('phone')); ?>">
              <label for="phone">Phone Number *</label>
              <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="zip" required value="<?php echo e(old('zip')); ?>">
              <label for="zip">Pincode *</label>
              <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="state" required value="<?php echo e(old('state')); ?>">
              <label for="state">State *</label>
              <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="city" required value="<?php echo e(old('city')); ?>">
              <label for="city">Town / City *</label>
              <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="address" required value="<?php echo e(old('address')); ?>">
              <label for="address">House no, Building Name *</label>
              <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="locality" required value="<?php echo e(old('locality')); ?>">
              <label for="locality">Road Name, Area, Colony *</label>
              <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-floating my-3">
              <input type="text" class="form-control" name="landmark" required value="<?php echo e(old('landmark')); ?>">
              <label for="landmark">Landmark *</label>
              <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="checkout__totals-wrapper">
      <div class="sticky-content">
        <div class="checkout__totals">
          <h3>Your Order</h3>
          <table class="checkout-cart-items">
            <thead>
              <tr>
                <th>PRODUCT</th>
                <th class="text-end">SUBTOTAL</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = Cart::instance('cart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item->name); ?> x <?php echo e($item->qty); ?></td>
                  <td class="text-end">$<?php echo e($item->subtotal); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

          <?php if(Session::has('discounts')): ?>
            <table class="checkout-totals">
              <tbody>
                <tr>
                  <th>Subtotal</th>
                  <td class="text-end">$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                </tr>
                <tr>
                  <th>Discount <?php echo e(Session::get('coupon')['code']); ?></th>
                  <td class="text-end">$<?php echo e(Session::get('discounts')['discount']); ?></td>
                </tr>
                <tr>
                  <th>Subtotal After Discount</th>
                  <td class="text-end">$<?php echo e(Session::get('discounts')['subtotal']); ?></td>
                </tr>
                <tr>
                  <th>Shipping</th>
                  <td class="text-end">Free</td>
                </tr>
                <tr>
                  <th>VAT</th>
                  <td class="text-end">$<?php echo e(Session::get('discounts')['tax']); ?></td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td class="text-end">$<?php echo e(Session::get('discounts')['total']); ?></td>
                </tr>
              </tbody>
            </table>
          <?php else: ?>
            <table class="checkout-totals">
              <tbody>
                <tr>
                  <th>SUBTOTAL</th>
                  <td class="text-end">$<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                </tr>
                <tr>
                  <th>SHIPPING</th>
                  <td class="text-end">Free shipping</td>
                </tr>
                <tr>
                  <th>VAT</th>
                  <td class="text-end">$<?php echo e(Cart::instance('cart')->tax()); ?></td>
                </tr>
                <tr>
                  <th>TOTAL</th>
                  <td class="text-end">$<?php echo e(Cart::instance('cart')->total()); ?></td>
                </tr>
              </tbody>
            </table>
          <?php endif; ?>
        </div>

        <div class="checkout__payment-methods">
          <div class="form-check">
            <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2" value="stripe" required>
            <label class="form-check-label" for="mode2">Pay with Stripe</label>
          </div>
          <div class="form-check">
            <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode3" value="cod">
            <label class="form-check-label" for="mode3">Cash on delivery</label>
          </div>

          <div class="policy-text">
            Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our
            <a href="#" target="_blank">privacy policy</a>.
          </div>
        </div>

        <button class="btn btn-primary mt-3">PLACE ORDER</button>
      </div>
    </div>
  </div>
</form>

    </section>
  </main>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('checkout-form').addEventListener('submit', function (e) {
    const selected = document.querySelector('input[name="mode"]:checked')?.value;

    if (selected === 'stripe') {
        e.preventDefault(); // Stop default submit
        this.action = "<?php echo e(route('stripe.checkout')); ?>"; // Redirect to Stripe route
        this.submit(); // Submit to Stripe route
    }
});
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/checkout.blade.php ENDPATH**/ ?>