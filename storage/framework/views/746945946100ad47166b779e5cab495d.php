<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card-wrapper">
        <div class="product-card">
            <a href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                <img src="<?php echo e(asset('uploads/products/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
            </a>
            <div class="product-details">
                <p class="mb-1 text-muted"><?php echo e($product->category->name); ?></p>
                <h6 class="fw-semibold"><?php echo e($product->name); ?></h6>
                <p class="mb-0">
                    <?php if($product->sale_price): ?>
                        <s class="text-danger">$<?php echo e($product->regular_price); ?></s> <strong>$<?php echo e($product->sale_price); ?></strong>
                    <?php else: ?>
                        <strong>$<?php echo e($product->regular_price); ?></strong>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(count($products) === 0): ?>
    <p class="text-center mt-4 text-muted">No products matched your preferences.</p>
<?php endif; ?>
<?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/recommendation/_products.blade.php ENDPATH**/ ?>