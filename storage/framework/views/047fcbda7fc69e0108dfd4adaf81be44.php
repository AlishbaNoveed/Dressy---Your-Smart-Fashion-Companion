   <?php $__env->startSection('content'); ?>

                       <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Brands</h3>
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
                                            <div class="text-tiny">Brands</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <!-- <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form> -->
                                        </div>
                                        <a class="tf-button style-1 w208" href="<?php echo e(route('admin.brand.add')); ?>"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>


                                    <div class="wg-table table-all-user">
  <div class="table-responsive">
    <?php if(Session::has('status')): ?>
      <p class="alert alert-success text-center"><?php echo e(Session::get('status')); ?></p>
    <?php endif; ?>

    <table class="table table-striped table-bordered align-middle text-center w-100">
      <thead class="table-light">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Name</th>
          <th class="text-center">Slug</th>
          <th class="text-center">Products</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="text-center"><?php echo e($brand->id); ?></td>
            <td class="pname">
                                                            <div class="image">
                                                                <img src="<?php echo e(asset('uploads/brands')); ?>/<?php echo e($brand->image); ?>" alt="<?php echo e($brand->name); ?>" class="image">
                                                            </div>
                                                            <div class="name">
                                                                <a href="#" class="body-title-2"><?php echo e($brand->name); ?></a>
                                                            </div>
                                                        </td>
            <td class="text-center"><?php echo e($brand->slug); ?></td>
            <td class="text-center"><a href="#" target="_blank">0</a></td>
            <td class="text-center">
              <div class="list-icon-function d-flex justify-content-center align-items-center gap-2">
                <a href="<?php echo e(route('admin.brand.edit', ['id' => $brand->id])); ?>">
                  <div class="item edit">
                    <i class="icon-edit-3"></i>
                  </div>
                </a>
                <form action="<?php echo e(route('admin.brand.delete', ['id' => $brand->id])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn p-0 border-0 bg-transparent" onclick="return confirm('Are you sure you want to delete this brand?')">
                    <div class="item text-danger delete">
                      <i class="icon-trash-2"></i>
                    </div>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>

                                        <div class="divider"></div>
                                        <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                          <?php echo e($brands->links('pagination::bootstrap-5')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php $__env->stopSection(); ?>
                <?php $__env->startPush('scripts'); ?>
                <script>
                  $(function(){
                    $('.delete').on('click',function(e){
                        e.preventDefault();
                        var form = $(this).closest('form');
                        swal({
                            title:"Are you sure?",
                            text:"You want to delete this record?",
                            type:"warning",
            //                 buttons: {
            //     confirm: {
            //         text: "Yes",
            //         value: true,
            //         visible: true,
            //         className: "btn btn-danger", // 🔴 Red color on "Yes"
            //         closeModal: false
            //     },
            //     cancel: {
            //         text: "No",
            //         value: false,
            //         visible: true,
            //         className: "btn btn-secondary",
            //         closeModal: true
            //     }
            // },
            // dangerMode: true,
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/brands.blade.php ENDPATH**/ ?>