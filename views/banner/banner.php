<section class="slide__banner">
    <div class="glide home-banner">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <?php foreach ($banners as $banner) : ?> 
                    <li class="glide__slide">
                        <a target="_blank" href="https://ssstutter.com/campaign/more-than-thanks" style="background-image:url(./assets/img/banners/<?php echo $banner['banner']; ?>)"></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>  
</section>