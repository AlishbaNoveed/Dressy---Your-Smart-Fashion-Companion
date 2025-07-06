<?php $__env->startSection('content'); ?>
<style>
  .table-transaction>tbody>tr:nth-of-type(odd)
   {
    --bs-table-accent-bg: #fff !important;
   }
</style>
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Order Details</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="<?php echo e(route('admin.index')); ?>">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Order details</div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Ordered Details table -->
                                   <div class="wg-box">
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
    <div class="wg-filter flex-grow-1">
      <h5 class="mb-0">Ordered Details</h5>
    </div>
    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.orders')); ?>">Back</a>
  </div>

  <div class="table-responsive">
    <?php if(Session::has('status')): ?>
      <p class="alert alert-success mb-3">
        <?php echo e(Session::get('status')); ?>

      </p>
    <?php endif; ?>

    <table class="table table-bordered table-striped align-middle text-center w-100">
      <thead class="table-light">
        <tr class="text-center">
          <th class="text-center">Order No</th>
          <th class="text-center">Mobile</th>
          <th class="text-center">Zip Code</th>
          <th class="text-center">Order Date</th>
          <th class="text-center">Delivered Date</th>
          <th class="text-center">Canceled Date</th>
          <th class="text-center">Order Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td class="text-center"><?php echo e($order->id); ?></td>
          <td class="text-center"><?php echo e($order->phone); ?></td>
          <td class="text-center"><?php echo e($order->zip); ?></td>
          <td class="text-center"><?php echo e($order->created_at); ?></td>
          <td class="text-center"><?php echo e($order->delivered_date); ?></td>
          <td class="text-center"><?php echo e($order->canceled_date); ?></td>
          <td class="text-center">
            <?php if($order->status == 'delivered'): ?>
              <span class="badge bg-success">Delivered</span>
            <?php elseif($order->status == 'canceled'): ?>
              <span class="badge bg-danger">Canceled</span>
            <?php else: ?>
              <span class="badge bg-warning">Ordered</span>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


                            <!-- Ordered Items Table -->
<div class="wg-box">
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
    <div class="wg-filter flex-grow-1">
      <h5>Ordered Items</h5>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center w-100">
      <thead class="table-light">
        <tr class="text-center">
          <th class="text-center">Name</th>
          <th class="text-center">Price</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">SKU</th>
          <th class="text-center">Category</th>
          <th class="text-center">Brand</th>
          <th class="text-center">Options</th>
          <th class="text-center">Return Status</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="text-start">
            <div class="d-flex align-items-center gap-3">
              <img src="<?php echo e(asset('uploads/products/thumbnails/' . $item->product->image)); ?>" alt="<?php echo e($item->product->name); ?>" width="50" height="50" class="rounded">
              <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>" target="_blank" class="fw-semibold text-decoration-none">
                <?php echo e($item->product->name); ?>

              </a>
            </div>
          </td>
          <td class="text-center">$<?php echo e($item->price); ?></td>
          <td class="text-center"><?php echo e($item->quantity); ?></td>
          <td class="text-center"><?php echo e($item->product->SKU); ?></td>
          <td class="text-center"><?php echo e($item->product->category->name); ?></td>
          <td class="text-center"><?php echo e($item->product->brand->name); ?></td>
          <td class="text-center"><?php echo e($item->options); ?></td>
          <td class="text-center">
            <?php if($item->rstatus == 0): ?>
              <span class="badge bg-secondary">No</span>
            <?php else: ?>
              <span class="badge bg-success">Yes</span>
            <?php endif; ?>
          </td>
          <td>
            <div class="list-icon-function view-icon">
              <div class="item eye">
                <i class="icon-eye"></i>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </tbody>
    </table>
  </div>

  <div class="divider my-3"></div>

  <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
    <?php echo e($orderItems->links('pagination::bootstrap-5')); ?>

  </div>
</div>

                            
                            <!-- Shipping Address Box-->
                               <div class="wg-box mt-5">
                                    <h5 class="mb-3">Shipping Address</h5>
                                    <div class="my-account__address-item col-md-6 p-3 bg-light rounded shadow-sm">
                                        <div class="my-account__address-item__detail">
                                        <p class="mb-1 fw-bold"><?php echo e($order->name); ?></p>
                                        <p class="mb-1"><?php echo e($order->address); ?></p>
                                        <p class="mb-1"><?php echo e($order->locality); ?></p>
                                        <p class="mb-1"><?php echo e($order->city); ?>, <?php echo e($order->country); ?></p>
                                        <p class="mb-1"><?php echo e($order->landmark); ?></p>
                                        <p class="mb-3"><?php echo e($order->zip); ?></p>
                                        <p class="mb-0"><strong>Mobile:</strong> <?php echo e($order->phone); ?></p>
                                        </div>
                                     </div>
                                </div>

                                <div class="wg-box mt-5">
                                    <h5>Transactions</h5>
                                    <table class="table table-striped table-bordered table-transaction">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>$<?php echo e($order->subtotal); ?></td>
                                                <th>Tax</th>
                                                <td>$<?php echo e($order->tax); ?></td>
                                                <th>Discount</th>
                                                <td>$<?php echo e($order->discount); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>$<?php echo e($order->total); ?></td>
                                                <th>Payment Mode</th>
                                                <td><?php echo e($transaction->mode); ?></td>
                                                <th>Status</th>
                                                <td > 
                                                    <?php if($transaction->status=='approved'): ?>
                                                       <span class="badge bg-success">Approved</span>
                                                    <?php elseif($transaction->status=='declined'): ?>
                                                       <span class="badge bg-danger">Declined</span>
                                                    <?php elseif($transaction->status=='refunded'): ?>
                                                       <span class="badge bg-secondary">Refunded</span>
                                                    <?php else: ?>
                                                       <span class="badge bg-warning">Pending</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                             <?php if($transaction->mode != 'cod'): ?>
                                            <tr>
                                              <th>Transaction ID</th>
                                                <td colspan="5">
                                                     <?php echo e($transaction->transaction_id ?? 'N/A'); ?>

                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>


                             <div class="wg-box mt-5">
                                    <h5>Update Order Status</h5>
                                 <form action="<?php echo e(route('admin.order.status.update')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("PUT"); ?>
                                        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>"  />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="select">
                                                 <select id="order_status" name="order_status">                            
                                                     <option value="ordered" <?php echo e($order->status=='ordered' ? "selected":""); ?>>Ordered</option>
                                                     <option value="delivered" <?php echo e($order->status=='delivered' ? "selected":""); ?>>Delivered</option>
                                                      <?php if(optional($order->transaction)->status != 'approved'): ?>
                                                     <option value="canceled" <?php echo e($order->status=='canceled' ? "selected":""); ?>>Canceled</option>
                                                      <?php endif; ?>
                                                 </select>
                                             </div>
                                         </div>
                                           <div class="col-md-3">
                                              <button type="submit" class="btn btn-primary tf-button w208">Update Status</button>
                                          </div>                    
                                        </div>
                                   </form>
                                </div>

                            </div>
                        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/order-details.blade.php ENDPATH**/ ?>