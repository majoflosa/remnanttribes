<section class="page-section home-section blog-section">
    <div class="page-section__inner">
        <header class="page-section__header blog-section-header">
            <h2 class="page-section__title">Recent Blog Posts</h2>
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