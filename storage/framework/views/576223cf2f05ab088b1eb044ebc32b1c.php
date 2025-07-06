<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow p-5">

        
        <h2 class="mb-5 text-center">📊 Generate Reports</h2>

        
        <form action="<?php echo e(route('admin.report.custom')); ?>" method="POST" class="mb-4">
            <?php echo csrf_field(); ?>
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <label for="from" class="form-label">From:</label>
                    <input type="date" name="from" id="from" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-5">
                    <label for="to" class="form-label">To:</label>
                    <input type="date" name="to" id="to" class="form-control form-control-lg" required>
                </div>
            </div>

            
            <div class="row justify-content-center mt-5">
                <div class="col-md-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5 py-3" style="border-radius: 8px; font-size: 1.1rem;">
                        📄 Custom Report
                    </button>
                </div>
                <div class="col-md-4 d-flex justify-content-start">
                    <a href="<?php echo e(route('admin.report.monthly')); ?>" class="btn btn-primary px-5 py-3" style="border-radius: 8px; font-size: 1.1rem;">
                        📅 Monthly Report
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/report.blade.php ENDPATH**/ ?>