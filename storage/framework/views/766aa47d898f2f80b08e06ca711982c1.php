<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            padding: 20px;
            color: #000;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .info-header {
            margin-bottom: 20px;
            text-align: left;
        }

        .info-header p {
            margin: 3px 0;
        }

        .section-title {
            font-size: 16px;
            margin: 25px 0 10px 0;
            font-weight: bold;
        }

        .summary-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 25px;
        }

        .summary-box p {
            margin: 6px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .footer-separator {
            margin-top: 30px;
            border-top: 1px solid #444;
        }

        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    
    <h1>DRESSY – Your Smart Fashion Companion</h1>

    
    <div class="info-header">
        <p><strong>Report Period:</strong> <?php echo e($from); ?> to <?php echo e($to); ?></p>
        <p><strong>Generated On:</strong> <?php echo e(now()->format('Y-m-d H:i')); ?></p>
        <p><strong>Generated By:</strong> Admin</p>
    </div>

    
    <div class="section-title">Summary Statistics</div>
    <div class="summary-box">
        <p><strong>Total Orders:</strong> <?php echo e($summary['total']); ?></p>
        <p><strong>Delivered:</strong> <?php echo e($summary['delivered']); ?> (Total: $<?php echo e(number_format($summary['delivered_total'], 2)); ?>)</p>
        <p><strong>Canceled:</strong> <?php echo e($summary['canceled']); ?> (Total: $<?php echo e(number_format($summary['canceled_total'], 2)); ?>)</p>
        <p><strong>Pending:</strong> <?php echo e($summary['pending']); ?> (Total: $<?php echo e(number_format($summary['pending_total'], 2)); ?>)</p>
        <p><strong>Payment Methods:</strong> COD (<?php echo e($summary['cod']); ?>), Stripe (<?php echo e($summary['stripe']); ?>)</p>
        <p><strong>Approved Transaction Revenue:</strong> $<?php echo e(number_format($summary['revenue'], 2)); ?></p>
        <p><strong>Pending Transaction Total:</strong> $<?php echo e(number_format($summary['pending_amount'], 2)); ?></p>
        <p><strong>Total Order Value:</strong> $<?php echo e(number_format($summary['total_amount'], 2)); ?></p>
        <p><strong>Desired Revenue:</strong> $<?php echo e(number_format($summary['desired_revenue'], 2)); ?></p>
        <p><strong>Profit:</strong> $<?php echo e(number_format($summary['profit'], 2)); ?></p>
        <p><strong>Loss:</strong> $<?php echo e(number_format($summary['loss'], 2)); ?></p>
    </div>

    
    <div class="section-title">Order Details</div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Order ID</th>
                <th>Payment Mode</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i+1); ?></td>
                    <td><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                    <td>#<?php echo e($order->id); ?></td>
                    <td><?php echo e(ucfirst(optional($order->transaction)->mode ?? 'N/A')); ?></td>
                    <td><?php echo e(ucfirst($order->status)); ?></td>
                    <td>$<?php echo e(number_format($order->total, 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    
    <div class="footer-separator"></div>
    <div class="footer">
        This report was generated by Dressy – Your Smart Fashion Companion.
    </div>

</body>
</html>
<?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/reports/order-report.blade.php ENDPATH**/ ?>