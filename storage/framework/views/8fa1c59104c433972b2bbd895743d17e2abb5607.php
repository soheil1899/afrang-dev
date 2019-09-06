<div>
    <?php if($messege['title'] == 'message'): ?>
        <h2>
            A Contact Us Message
        </h2>
        <h3>
            Subject :
            <?php echo e($messege['subject']); ?>

        </h3>
        <div>
            <strong>
                Full Name:
            </strong>
            <?php echo e($messege['name']); ?>

        </div>
        <div>
            <strong>
                Email:
            </strong>
            <?php echo e($messege['email']); ?>

        </div>
        <div>
            <strong>
                Phone:
            </strong>
            <?php echo e($messege['phone']); ?>

        </div>
        <div class="mt-5">
            <p class="mt-0 pt-0">
                <strong class="d-block">Message:
                </strong>
                <?php echo e($messege['mymessage']); ?>

            </p>
        </div>


    <?php elseif($messege['title'] == 'order'): ?>
        <h2>
            An Order
        </h2>
        <div>
            <strong>
                Full Name:
            </strong>
            <?php echo e($messege['name']); ?>

        </div>
        <div>
            <strong>
                Email:
            </strong>
            <?php echo e($messege['email']); ?>

        </div>
        <div>
            <strong>
                Phone:
            </strong>
            <?php echo e($messege['phone']); ?>

        </div>
        <div>
            <strong>
                Location:
            </strong>
            <?php echo e($messege['location']); ?>

        </div>
        <div>
            <strong>
                Request:
            </strong>

            <?php $__currentLoopData = $messege['request']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($request == true && $key == 0): ?>
                    | Website
                <?php elseif($request == true && $key == 1): ?>
                    | Mobile App
                <?php elseif($request == true && $key == 2): ?>
                    | Portal
                <?php elseif($request == true && $key == 3): ?>
                    | Other
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <div class="mt-5">
            <p class="mt-0 pt-0">
                <strong class="d-block">Message:
                </strong>
                <?php echo e($messege['description']); ?>

            </p>
        </div>
    <?php endif; ?>
</div>