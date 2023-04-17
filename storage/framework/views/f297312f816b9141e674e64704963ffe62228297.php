<?php $__env->startSection('title', 'FAQS'); ?>
<?php $__env->startSection('content'); ?>
    <main>
       <section style="background-image: url(../storage/settings/banner/<?php echo e($banner); ?>);background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">FAQ'S</h1>
            </div>
        </section>
        <section class="membership_inner_section my-5 py-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item custom-accordion">
                                <h2 class="accordion-header" id="headingTwo1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                        01) What kind of beats do you offer?
                                    </button>
                                </h2>
                                <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="accordion-desc">
                                            Our roster of producers are versatile and whether you need a loop or beat for a hip hop, pop, trap, dance, or R&B track you can find quality tracks here.                                        </p>
                                    </div>
                                </div> 
                            </div> 
                            <div class="accordion-item custom-accordion ">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        02) Do you guys offer beats on a lease?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="accordion-desc">
                                            Yes, that’s how GotDemBeatz works. We offer original beats on lease in exchange for an affordable price. As long as your premium membership is current, you’re free to use the beats.   
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item custom-accordion ">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        03) What makes you different than other beats-producing companies?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="accordion-desc">
                                            We eat, sleep, and breathe music, which means you can expect beats of the highest quality from GotDemBeatz. And the best part? We offer them at an affordable price in exchange for premium membership
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="accordion-item custom-accordion ">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseFive">
                                        04) What do you hope to achieve by producing beats for artists?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="accordion-desc">
                                           Well, it’s quite simple: we want to support artists who envision great things for their future. And by offering a wide range of music-related services, we hope to help them achieve all their goals.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
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


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/pages/faqs.blade.php ENDPATH**/ ?>