<?php $__env->startSection('content'); ?>
  <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Slides</h3>
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
                                            <div class="text-tiny">Slides</div>
                                        </li>
                                    </ul>
                                </div>
                            <!-- slides table -->
                                <div class="wg-box">
  <div class="flex items-center justify-between gap10 flex-wrap mb-3">
    <div class="wg-filter flex-grow">
      <!-- <form class="form-search">
        <fieldset class="name">
          <input type="text" placeholder="Search here..." class="" name="name"
              tabindex="2" value="" aria-required="true" required>
        </fieldset>
        <div class="button-submit">
          <button type="submit"><i class="icon-search"></i></button>
        </div>
      </form> -->
    </div>
    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.slide.add')); ?>">
      <i class="icon-plus"></i> Add new
    </a>
  </div>

  <div class="wg-table table-all-user">
    <?php if(Session::has('status')): ?>
      <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-center w-100">
        <thead class="table-light">
          <tr>
            <th class="text-center" style="width: 80px;">#</th>
            <th class="text-center">Image</th>
            <th class="text-center">Tagline</th>
            <th class="text-center">Title</th>
            <th class="text-center">Subtitle</th>
            <th class="text-center">Link</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-center"><?php echo e($slide->id); ?></td>
              <td>
                <div class="image">
                  <img src="<?php echo e(asset('uploads/slides')); ?>/<?php echo e($slide->image); ?>" alt="" class="<?php echo e($slide->title); ?>">
                </div>
              </td>
              <td class="text-center"><?php echo e($slide->tagline); ?></td>
              <td class="text-center"><?php echo e($slide->title); ?></td>
              <td class="text-center"><?php echo e($slide->subtitle); ?></td>
              <td class="text-center"><?php echo e($slide->link); ?></td>
              <td>
                <div class="list-icon-function d-flex justify-content-center align-items-center gap-2">
                  <a href="<?php echo e(route('admin.slide.edit', ['id' => $slide->id])); ?>">
                    <div class="item edit">
                      <i class="icon-edit-3"></i>
                    </div>
                  </a>
                  <form action="<?php echo e(route('admin.slide.delete', ['id' => $slide->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="p-0 border-0 bg-transparent" onclick="return confirm('Are you sure you want to delete this slide?')">
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
</div>

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                     
                                     <?php echo e($slides->links('pagination::bootstrap-5')); ?>

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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/slides.blade.php ENDPATH**/ ?>