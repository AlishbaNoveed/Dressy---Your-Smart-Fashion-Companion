<?php $__env->startSection('content'); ?>
<style>
    .skin-age-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 80px;
        margin-bottom: 50px;
    }

    .skin-tone-img {
        width: 75px;
        height: 75px;
        object-fit: cover;
        border: 4px solid transparent;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out;
    }

    .skin-tone-img.selected {
        border-color: #32cd32; /* light green */
        transform: scale(0.95); /* slight zoom-out */
    }

    .skin-tone-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .skin-tone-block,
    .age-block {
        display: flex;
        align-items: center;
        gap: 20px;
        white-space: nowrap;
    }

    .products-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-top: 40px;
        justify-content: center;
    }

    .product-card {
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
        transition: 0.3s;
        width: 250px;
    }

    .product-card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .product-details {
        padding: 10px;
    }
</style>
<main class="pt-90">
   
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">Get Personalized Recommendations</h2>
      </div>
        <form id="recommendForm" method="POST" action="<?php echo e(route('recommendation.fetch')); ?>">
            <?php echo csrf_field(); ?>

            <div class="skin-age-wrapper">
                
                <div class="skin-tone-block">
                    <label class="mb-0"><strong>Select Your Skin Tone:</strong></label>
                    <div class="d-flex gap-3 ms-3">
                        <?php
                            $skinTones = [
                                ['label' => 'Fair', 'value' => 'fair', 'image' => 'fair.png'],
                                ['label' => 'Normal', 'value' => 'normal', 'image' => 'normal.png'],
                                ['label' => 'Dark', 'value' => 'dark', 'image' => 'dull.png']
                            ];
                        ?>
                        <?php $__currentLoopData = $skinTones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="skin-tone-option">
                                <img src="<?php echo e(asset('assets/skin tone/' . $tone['image'])); ?>"
                                     alt="<?php echo e($tone['label']); ?>"
                                     class="skin-tone-img"
                                     data-tone="<?php echo e($tone['value']); ?>">
                                <span><?php echo e($tone['label']); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" name="skin_tone" id="skinToneInput">
                    </div>
                </div>

                
                <div class="age-block">
                    <label class="mb-0"><strong>Select Your Age:</strong>&nbsp;<span id="ageDisplay">18</span></label>
                    <input type="range" name="age" min="18" max="60" value="18" id="ageSlider" class="form-range" style="min-width: 220px;">
                </div>
            </div>
        </form>

        <div id="productResults" class="products-grid mt-5"></div>
    </section>
</main>

<script>
    const toneImages = document.querySelectorAll('.skin-tone-img');
    const skinToneInput = document.getElementById('skinToneInput');
    const ageSlider = document.getElementById('ageSlider');
    const ageDisplay = document.getElementById('ageDisplay');

    function fetchRecommendations() {
        if (!skinToneInput.value) return;

        fetch("<?php echo e(route('recommendation.fetch')); ?>", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                skin_tone: skinToneInput.value,
                age: ageSlider.value
            })
        })
        .then(res => res.text())
        .then(data => {
            document.getElementById('productResults').innerHTML = data;
        });
    }

    toneImages.forEach(img => {
        img.addEventListener('click', () => {
            toneImages.forEach(i => i.classList.remove('selected'));
            img.classList.add('selected');
            skinToneInput.value = img.dataset.tone;
            fetchRecommendations();
        });
    });

    ageSlider.addEventListener('input', function () {
        ageDisplay.innerText = this.value;
        fetchRecommendations();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            fetchRecommendations();
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/recommendation/index.blade.php ENDPATH**/ ?>