<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/user.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Lịch sử login</div>
        <div class="content">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 100px;">Device</th>
                    <th style="width: 10%">Platform</th>
                    <th class="text-center">Platform_ver</th>
                    <th class="text-center">Browser</th>
                    <th class="text-center">Browser_ver</th>
                    <th style="width: 30%" class="text-center">Time</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $historyLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center">
                            <span><?php echo e($item['device']); ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo e($item['platform']); ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo e($item['platform_ver']); ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo e($item['browser']); ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo e($item['browser_ver']); ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo e($item['time']); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/user/history_login.blade.php ENDPATH**/ ?>