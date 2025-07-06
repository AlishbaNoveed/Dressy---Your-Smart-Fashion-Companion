<?php $__env->startSection('content'); ?>
 <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Users</h3>
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
                                            <div class="text-tiny">All User</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="wg-table table-all-user">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th >#</th>
                                                        <th >User</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td ><?php echo e($key + 1); ?></td>
                                                        <td class="pname">
                                                            <div class="name">
                                                                <a href="#" class="body-title-2"><?php echo e($user->name); ?></a>
                                                                <div class="text-tiny mt-3"><?php echo e($user->utype); ?></div>
                                                            </div>
                                                        </td>
                                                        <td><?php echo e($user->mobile); ?></td>
                                                        <td><?php echo e($user->email); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                       <?php echo e($users->links()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/user-details.blade.php ENDPATH**/ ?>