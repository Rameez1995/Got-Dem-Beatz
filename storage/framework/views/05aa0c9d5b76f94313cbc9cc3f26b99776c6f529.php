<?php $__env->startSection('title', 'Contact US'); ?>
<?php $__env->startSection('content'); ?>
    <main>
       <section style="background-image: url(../storage/settings/banner/<?php echo e($banner); ?>);background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">Contact US</h1>
            </div>
        </section>
        <section class="services py-md-5 py-3 contact position-relative">
            <div class="container">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col py-md-5 py-3">
                        <span class="Contact_Us">Contact Us</span>
                        <h3 class="fs-1 position-relative new_title">Let’s Get Started</h3>
                        <p class=" pt-3 text-secondary">Do you have any questions related to our services? Feel free to send us a message </p>

                        <form action="#" class="row row-cols-md-2 row-cols-1 ">
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
            <div class="map_contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1648738131288!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('frontend_assets/js/plugins.js')); ?> " defer></script>
<script src="<?php echo e(asset('frontend_assets/js/theme.js')); ?> " defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/pages/contact.blade.php ENDPATH**/ ?>