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
</section><!-- end .hero -->

<section class="cta cta-hero">
    <!-- make dynamic -->
    <p>Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
</section><!-- end .cta-hero -->

<section class="page-section home-section intro-section">
    <div class="plx-layer"></div>
    <div class="page-section-inner cols">
        <div class="intro-section-text col col-half col-no-grow">
            <!-- make dynamic -->
            <h2>An Epic Fantasy Adventure</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui. Sed sed vestibulum elit. Nam laoreet sem nec elit euismod luctus.</p>
        </div>
    </div>
</section><!-- end .intro-section -->

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
        </div><!-- end .explore-section-world -->
        <div class="explore-section-characters explore-section-row cols row-reverse">
            <div class="explore-section-row-img col col-third">
                <img src="" alt="" width="500" height="500">
            </div>
            <div class="explore-section-row-text col col-two-thirds">
                <h3 class="explore-section-row-title">Characters</h3>
                <p class="explore-section-summary">Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
                <div class="explore-section-link"><a href="#" class="btn btn-primary">Explore Characters</a></div>
            </div>
        </div><!-- end .explore-section-characters -->
        <div class="explore-section-history explore-section-row cols">
            <div class="explore-section-row-img col col-third">
                <img src="" alt="" width="500" height="500">
            </div>
            <div class="explore-section-row-text col col-two-thirds">
                <h3 class="explore-section-row-title">History</h3>
                <p class="explore-section-summary">Cras lobortis, turpis non auctor suscipit, ligula ligula blandit risus, ut pharetra diam turpis sit amet massa. Mauris convallis nec ligula ac egestas. Nulla est diam, ullamcorper ut urna id, pellentesque tempor dui.</p>
                <div class="explore-section-link"><a href="#" class="btn btn-primary">Explore History</a></div>
            </div>
        </div><!-- end .explore-section-history -->
    </div>
</section><!-- end .explore-section -->

<section class="page-section home-section blog-section">
    <div class="page-section-inner">
        <header class="page-section-header blog-section-header">
            <h2 class="page-section-title">Recent Blog Posts</h2>
        </header>
        <main class="blog-section-list">
            <?php for ( $i = 0; $i < 3; $i++ ) { ?> 
            <article class="blog-section-item">
                <header class="blog-section-item-header">
                    <div class="blog-section-item-image">
                        <img src="http://remnanttribes.com/wp-content/uploads/2015/12/midbanner-e1468349027471-300x160.jpg" alt="" />
                    </div>
                    <h3 class="blog-section-item-title"><a href="#">Post Title</a></h3>
                </header>
                <main class="blog-section-item-body">
                    <p>Welcome to the home of the official Remnant Tribes webcomic! I'm excited to share this little project with the world.</p>
                </main>
                <footer class="blog-section-item-footer">
                    <a href="#">Continue reading ></a>
                </footer>
            </article><!-- end blog post -->
            <?php } ?>
        </main>
        <footer class="blog-section-footer">
            <a href="#" class="btn btn-primary">See all Blog Posts</a>
        </footer>
    </div>
</section><!-- end .blog-section -->

<div class="page-section home-section midbanner-section"></div>

<section class="page-section home-section about-section">
    <div class="page-section-inner">
        <header class="about-section-header page-section-header">
            <h2 class="about-section-title">About the Project and Author</h2>
        </header>
        <main class="about-section-body">
            <div class="about-section-image">
                <img src="http://remnanttribes.com/wp-content/uploads/2015/12/homeoffice.jpg" alt="">
            </div>
            <p>My name is Mauricio J Flores, illustrator and web designer, and here's where you can learn more about me and this comic project. You can also check out more of my work on the social media platforms below.</p>
            <div class="about-section-social">
                <a href="#">IG</a>
                <a href="#">Tw</a>
                <a href="#">Fb</a>
                <a href="#">Pin</a>
            </div>
        </main>
        <footer class="about-section-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
        </footer>
    </div>
</section>

<?php
get_footer();