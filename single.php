<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
    <section class="news-detail-hero">
        <div class="news-detail-hero_inner">
            <h1 class="news-detail_title">
                <?php the_title(); ?>
            </h1>
            <div class="news-detail_meta">
                <span>New</span>
            </div>
        </div>
    </section>
    <article>
        <div class="news-detail_body">
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>