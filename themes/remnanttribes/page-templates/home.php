<?php
/**
 * Template Name: Home
 */

get_header(); ?>

<section class="hero home-hero">
    <?php the_title( '<h1 class="hero-title page-title">', '</h1>' ); ?>
    <div class="hero-links">
        <!-- make dynamic -->
        <a class="btn btn-primary" href="<?php echo home_url() . '/comicpage/0'; ?>">First Page</a>
        <a class="btn btn-primary" href="<?php echo home_url() . '/comicpage/13'; ?>">Last Page</a>
    </div>
</section>

<section class="cta cta-hero">
    <!-- make dynamic -->
    <p>Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
</section>

<section class="page-section home-section intro-section">
    <div class="plx-layer"></div>
    <div class="page-section-inner cols">
        <div class="intro-section-text col col-half col-no-grow">
            <!-- make dynamic -->
            <h2>An Epic Fantasy Adventure</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui. Sed sed vestibulum elit. Nam laoreet sem nec elit euismod luctus.</p>
        </div>
    </div>
</section>

<section class="page-section home-section explore-section">
    <div class="page-section-inner full-width">
        <div class="explore-section-world explore-section-row cols">
            <div class="explore-section-row-img col col-third">
                <img src="" alt="" width="500" height="500">
            </div>
            <div class="explore-section-row-text col col-two-thirds">
                <h3 class="explore-section-row-title">World</h3>
                <p class="explore-section-summary">Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
                <div class="explore-section-link"><a href="#" class="btn btn-primary">Explore World</a></div>
            </div>
        </div>
        <div class="explore-section-characters explore-section-row cols">
            <div class="explore-section-row-img col col-third">
                <img src="" alt="" width="500" height="500">
            </div>
            <div class="explore-section-row-text col col-two-thirds">
                <h3 class="explore-section-row-title">Characters</h3>
                <p class="explore-section-summary">Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
                <div class="explore-section-link"><a href="#" class="btn btn-primary">Explore Characters</a></div>
            </div>
        </div>
        <div class="explore-section-history explore-section-row cols">
            <div class="explore-section-row-img col col-third">
                <img src="" alt="" width="500" height="500">
            </div>
            <div class="explore-section-row-text col col-two-thirds">
                <h3 class="explore-section-row-title">History</h3>
                <p class="explore-section-summary">Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
                <div class="explore-section-link"><a href="#" class="btn btn-primary">Explore History</a></div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();