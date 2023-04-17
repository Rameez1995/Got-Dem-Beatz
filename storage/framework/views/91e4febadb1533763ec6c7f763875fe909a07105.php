<?php $__env->startSection('title', 'About US'); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <section style="background-image: url(../storage/settings/banner/<?php echo e($banner); ?>);background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">About US</h1>
            </div>
        </section>
        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key % 2 == 0): ?>
        <section class="services services_section_inner_one">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 z-index-1 mb-4 mb-md-0">
                        <div class="position-relative text-center">
                            <img src="../storage/aboutus/<?php echo e($about->image); ?>" alt="" class="img-fluid ">
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h3 class="fs-1 position-relative new_title"><?php echo e($about->heading); ?></h3>
                        <div class="text_dark my-4">
                            <?php echo $about->desc; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php else: ?>
        <section class="services services_section_inner_one membership">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center mb-4 mb-md-0">
                         <h3 class="fs-1 position-relative new_title text-white"><?php echo e($about->heading); ?></h3>
                        <div class="my-4">
                            <?php echo $about->desc; ?>

                        </div>
                    </div>
                    <div class="col-md-6 z-index-1">
                        <img src="../storage/aboutus/<?php echo e($about->image); ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <section class="services py-md-5 py-3 contact position-relative">
            <div class="container">
                <div class="row row-col-1">
                    <div class="col-12  text-center py-md-5 py-3">
                        <span class="Contact_Us">Contact Us</span>
                        <h3 class="fs-1 position-relative">Let’s Get Started</h3>
                        <p class="mx-auto width-50 pt-5 text-secondary">Do you have any questions related to our services? Feel free to send us a message, and we’ll try to get back ASAP. </p>

                        <form action="#" class="row row-cols-md-2 row-cols-1 mx-auto width-50 ">
                            <div class="col py-2">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col py-2">
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                            <div class="col py-2">
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                            <div class="col py-2">
                                <input type="tel" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-12 py-2">
                                <textarea type="text" class="form-control" rows="6" placeholder="Message*"></textarea>
                                <button class="btn-1 text-white mt-4" type="submit">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('frontend_assets/js/plugins.js')); ?> " defer></script>
<script src="<?php echo e(asset('frontend_assets/js/theme.js')); ?> " defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/pages/about.blade.php ENDPATH**/ ?>