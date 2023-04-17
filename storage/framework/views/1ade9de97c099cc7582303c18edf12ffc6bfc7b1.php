<?php $__env->startSection('title', 'Shopping Cart'); ?>
<?php $__env->startSection('content'); ?>
        <section style="background-image: url(../storage/settings/banner/<?php echo e($banner); ?>);background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">Our Services</h1>
            </div>
        </section>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key % 2 == 0): ?>
        <section class="services services_section_inner_one">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center mb-4 mb-md-0">
                        <h3 class="fs-1 position-relative new_title"><?php echo e($service->name); ?></h3>
                        <div class="text_dark my-4">
                            <?php echo $service->desc; ?>

                        </div>
                        <div class="mt-4">
                            <a href="./services/<?php echo e($service->slug); ?>" class="btn-1 text-white">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 z-index-1">
                        <div class="position-relative text-center">
                            <img src="../storage/services/<?php echo e($service->image); ?>" style="width:1920px;height:400px" class="img-fluid ">
                            <!--<img src="<?php echo e(asset('frontend_assets/img/img_inner_1_fixed.png')); ?>" alt="" class="img-fluid position-absolute img_fixed_one two">-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php else: ?>
        <section class="services services_section_inner_one membership">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 z-index-1 mb-4 mb-md-0">
                        <div class="position-relative text-center">
                            <img src="../storage/services/<?php echo e($service->image); ?>" style="width:1920px;height:400px" alt="" class="img-fluid ">
                            <!--<img src="<?php echo e(asset('frontend_assets/img/img_inner_1_fixed.png')); ?>" alt="" class="img-fluid position-absolute img_fixed_one">-->
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h3 class="fs-1 position-relative new_title text-white"><?php echo e($service->name); ?></h3>
                        <div class="my-4">
                            <?php echo $service->desc; ?>

                        </div>
                        <div class="mt-4">
                            <a href="./services/<?php echo e($service->slug); ?>" class="btn-1 text-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('frontend_assets/js/plugins.js')); ?> " defer></script>
<script src="<?php echo e(asset('frontend_assets/js/theme.js')); ?> " defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/pages/services/index.blade.php ENDPATH**/ ?>