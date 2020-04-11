<section class="hero hero--home">
    <?php the_title( '<h1 class="hero-title page-title">', '</h1>' ); ?>
    <div class="hero__links">
        <!-- make dynamic -->
        <a class="hero__link btn btn-primary" href="<?php echo home_url() . '/comicpage/0'; ?>">First Page</a>
        <a class="hero__link btn btn-primary" href="<?php echo home_url() . '/comicpage/13'; ?>">Last Page</a>
    </div>
</section><!-- end .hero -->

<section class="schedule-info">
    <!-- make dynamic -->
    <p class="schedule-info__content">Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
</section><!-- end .cta-hero -->