<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Orders</h3>
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
                                            <div class="text-tiny">Orders</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:70px">OrderNo</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Phone</th>
                                                        <th class="text-center">Subtotal</th>
                                                        <th class="text-center">Tax</th>
                                                        <th class="text-center">Total</th>

                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Order Date</th>
                                                        <th class="text-center">Total Items</th>
                                                        <th class="text-center">Delivered On</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo e($order->id); ?></td>
                                                        <td class="text-center"><?php echo e($order->name); ?></td>
                                                        <td class="text-center"><?php echo e($order->phone); ?></td>
                                                        <td class="text-center">$<?php echo e($order->subtotal); ?></td>
                                                        <td class="text-center">$<?php echo e($order->tax); ?></td>
                                                        <td class="text-center">$<?php echo e($order->total); ?></td>
                                                        <td class="text-center">
                                                        <?php if($order->status =='delivered'): ?>
                                                             <span class="badge bg-success">Delivered</span>
                                                        <?php elseif($order->status=='canceled'): ?>
                                                            <span class="badge bg-danger">Canceled</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-warning">Ordered</span>
                                                        <?php endif; ?>
                                                        </td>
                                                        <td class="text-center"><?php echo e($order->created_at); ?></td>
                                                        <td class="text-center"><?php echo e($order->orderItems->count()); ?></td>
                                                        <td class="text-center"><?php echo e($order->delivered_date); ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo e(route('admin.order.details',['order_id'=>$order->id])); ?>">
                                                                <div class="list-icon-function view-icon">
                                                                    <div class="item eye">
                                                                        <i class="icon-eye"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                         <?php echo e($orders->links('pagination::bootstrap-5')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/orders.blade.php ENDPATH**/ ?>