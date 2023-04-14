<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<?php if ( is_singular() ) { ?>
    <div class="blog-banner" style="background-image:url(<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>)">
       <h1> <?php the_title(); ?></h1>
        <div class="blog-meta">
        <div class="entry-meta">
            <span class="dashicons-admin-users dashicons"></span>
            <span class="author vcard"<?php if ( is_single() ) { echo ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">'; } else { echo '><span>'; } ?><?php the_author_posts_link(); ?></span></span>
            <span class="meta-sep"> | </span>
            <span class="dashicons-calendar dashicons"></span>
            <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php the_time( get_option( 'date_format' ) ); ?></time>
            <?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '" />'; } ?>
        </div>
        </div>
    </div>

    <?php } else { ?>    
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    <?php } ?>

</header>
<div class="blog-container">
    <div class="container">
        <div class="text-right"><?php edit_post_link(); ?></div>
        <div class="blog-excerpt">
            <meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
        </div>
        <div class="blog-description">
            <?php the_content(); ?>
        </div>
        <?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
    </div>
</div>
</article>