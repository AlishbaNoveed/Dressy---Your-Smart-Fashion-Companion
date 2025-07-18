<?php $__env->startSection('content'); ?>
<style>
   .pt-90 {
      padding-top: 90px !important;
    }

    .pr-6px {
      padding-right: 6px;
      text-transform: uppercase;
    }

    .my-account .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 40px;
      border-bottom: 1px solid;
      padding-bottom: 13px;
    }

    .my-account .wg-box {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      padding: 24px;
      flex-direction: column;
      gap: 24px;
      border-radius: 12px;
      background: var(--White);
      box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .bg-success {
      background-color: #40c710 !important;
    }

    .bg-danger {
      background-color: #f44032 !important;
    }

    .bg-warning {
      background-color: #f5d700 !important;
      color: #000;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
      --bs-table-accent-bg: #fff !important;

    }

    .table-transaction th,
    .table-transaction td {
      padding: 0.625rem 1.5rem .25rem !important;
      color: #000 !important;
    }

    .table> :not(caption)>tr>th {
      padding: 0.625rem 1.5rem .25rem !important;
      background-color: #6a6e51 !important;
    }

    .table-bordered>:not(caption)>*>* {
      border-width: inherit;
      line-height: 32px;
      font-size: 14px;
      border: 1px solid #e1e1e1;
      vertical-align: middle;
    }

    .table-striped .image {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      flex-shrink: 0;
      border-radius: 10px;
      overflow: hidden;
    }

    .table-striped td:nth-child(1) {
      min-width: 250px;
      padding-bottom: 7px;
    }

    .pname {
      display: flex;
      gap: 13px;
      /* align-items: center; */
      
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
      border-width: 1px 1px;
      border-color: #6a6e51;
    }
  </style>
 <main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Order Details</h2>
        <div class="row">
            <div class="col-lg-2">
                 <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
           </div>

            <div class="col-lg-10">
                  <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap"> 
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Ordered Details</h5>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a class="btn btn-sm btn-danger" href="<?php echo e(route('user.orders')); ?>">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                            <?php if(Session::has('status')): ?>
                                        <p class="alert alert-success">
                                            <?php echo e(Session::get('status')); ?>

                                        </p>
                                            <?php endif; ?>
                                        <table class="table  table-bordered table-striped table-transaction">
                                           <tr>
                                                <th>Order No</th>
                                                <td><?php echo e($order->id); ?></td>
                                                <th>Mobile</th>
                                                <td><?php echo e($order->phone); ?></td>
                                                <th>Zip Code</th>
                                                <td><?php echo e($order->zip); ?></td>
                                          </tr>
                                          <tr>
                                                <th>Order Date</th>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <th>Delivered Date</th>
                                                <td><?php echo e($order->delivered_date); ?></td>
                                                <th>Canceled Date</th>
                                                <td><?php echo e($order->canceled_date); ?></td>
                                          </tr>
                                          <tr>
                                                <th>Order Status</th>
                                                <td colspan="5">
                                                    <?php if($order->status =='delivered'): ?>
                                                       <span class="badge bg-success">Delivered</span>
                                                    <?php elseif($order->status=='canceled'): ?>
                                                       <span class="badge bg-danger">Canceled</span>
                                                     <?php else: ?>
                                                       <span class="badge bg-warning">Ordered</span>
                                                      <?php endif; ?>
                                                </td>
                                          </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <h5>Ordered Items</h5>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
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
                                                    <td class="pname">
                                                        <div class="image">
                                                            <img src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($item->product->image); ?>" alt="<?php echo e($item->product->name); ?>" class="image">
                                                        </div>
                                                        <div class="name">
                                                            <a href="<?php echo e(route('shop.product.details',['product_slug'=>$item->product->slug])); ?>" target="_blank"
                                                                class="body-title-2" ><?php echo e($item->product->name); ?></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$<?php echo e($item->price); ?></td>
                                                    <td class="text-center"><?php echo e($item->quantity); ?></td>
                                                    <td class="text-center"><?php echo e($item->product->SKU); ?></td>
                                                    <td class="text-center"><?php echo e($item->product->category->name); ?></td>
                                                    <td class="text-center"><?php echo e($item->product->brand->name); ?></td>
                                                    <td class="text-center"><?php echo e($item->options); ?></td>
                                                    <td class="text-center"><?php echo e($item->rstatus == 0 ? "No":"Yes"); ?></td>
                                                    <td class="text-center">
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

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                        <?php echo e($orderItems->links('pagination::bootstrap-5')); ?>


                                    </div>
                                </div>

                                <div class="wg-box mt-5">
                                    <h5>Shipping Address</h5>
                                    <div class="my-account__address-item col-md-6">
                                        <div class="my-account__address-item__detail">
                                            <p><?php echo e($order->name); ?></p>
                                            <p><?php echo e($order->address); ?></p>
                                            <p><?php echo e($order->locality); ?></p>
                                            <p><?php echo e($order->city); ?>, <?php echo e($order->country); ?> </p>
                                            <p><?php echo e($order->landmark); ?></p>
                                            <p><?php echo e($order->zip); ?></p>
                                            <br/>
                                            <p>Mobile : <?php echo e($order->phone); ?></p>
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
                               <?php if($order->status=='ordered' && optional($order->transaction)->status != 'approved'): ?>
                              <div class="wg-box mt-5 text-right">
                               <form action="<?php echo e(route('user.order.cancel')); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                <?php echo method_field("PUT"); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                                   <button type="button" class="btn btn-danger cancel-order">Cancel Order</button>                        
                               </form>
                             </div>
                             <?php endif; ?>
                </div>
             </div>
      </section>
</main>
<?php $__env->stopSection(); ?>

 <?php $__env->startPush('scripts'); ?>
                <script>
                  $(function(){
                    $('.cancel-order').on('click',function(e){
                        e.preventDefault();
                        var form = $(this).closest('form');
                        swal({
                            title:"Are you sure?",
                            text:"You want to cancel this order?",
                            type:"warning",
                            buttons:["No","Yes"],
                            confirmButtonColor:'#dc3545'
                        }).then(function(result){
                            if(result){
                                form.submit();
                            }
                        });
                    });
                  });
                </script>
                <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/user/order-details.blade.php ENDPATH**/ ?>