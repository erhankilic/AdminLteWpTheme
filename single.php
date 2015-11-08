<?php get_header(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php the_title(); ?>
            </h1>
            <ol class="breadcrumb">
                <?php breadcrums() ?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" id="post">

            <div class="row">
                <?php if(get_option('ad_header') != '') : ?>
                    <div class="col-md-12 hidden-xs hidden-sm ad">
                        <?php echo stripslashes(get_option('ad_header')); ?>
                    </div>
                <?php endif; ?>
                <?php if(get_option('ad_header_mobile') != '') : ?>
                    <div class="col-md-12 visible-xs visible-sm ad">
                        <?php echo stripslashes(get_option('ad_header_mobile')); ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-3 side-bar hidden-xs hidden-sm">

                    <?php dynamic_sidebar('Side Bar'); ?>

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body">

                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <div class='description'>
                                    <h2><?php the_title(); ?></h2>
                                    <span class="pull-right"><?php the_time('d.m.Y') ?></span>
                                </div>
                                <div class="post-content">
                                    <?php the_content();?>
                                </div>
                                <div class="author-info">
                                    <h3 class="author-heading">Published by</h3>

                                    <div class="author-description">
                                        <div class="author-avatar">
                                            <?php
                                            $author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 56 );
                                            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                                            ?>
                                        </div><!-- .author-avatar -->
                                        <h3 class="author-title"><?php echo get_the_author(); ?></h3>

                                        <p class="author-bio">
                                            <?php the_author_meta( 'description' ); ?>
                                        </p><!-- .author-bio -->
                                        <p>
                                            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                                <?php printf( __( 'View all posts by %s', 'twentyfifteen' ), get_the_author() ); ?>
                                            </a>
                                        </p>

                                    </div><!-- .author-description -->
                                </div><!-- .author-info -->
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user margin-r-5"></i>
                                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-sm">
                                            <?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li><i class="fa fa-folder-open margin-r-5"></i> <?php the_category(', ') ?></li>
                                    <li class="pull-right"><i class="fa fa-comments-o margin-r-5"></i> Comments (<?php comments_number('0', '1', '%' );?>)</li>
                                </ul>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-share"></i> Share
                                    </li>
                                    <li>
                                        <div id="fb-root"></div>
                                        <script>(function(d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (d.getElementById(id)) return;
                                                js = d.createElement(s); js.id = id;
                                                js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.4";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>
                                        <div class="fb-share-button" data-href="<?php the_permalink() ?>" data-layout="button_count"></div>
                                    </li>
                                    <li>
                                        <div style="display:inline-block;vertical-align:top">
                                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>"> Tweet</a>
                                            <script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'twitter-wjs');
                                            </script>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display:inline-block;vertical-align:top">
                                            <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
                                            <script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
                                        </div>
                                    </li>
                                    <li>
                                        <div style="display:inline-block;vertical-align:top">
                                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                                            <script type="IN/Share" data-counter="right"></script>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="//www.reddit.com/submit?url=<?php the_permalink() ?>" target="_blank"> <img src="//www.redditstatic.com/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
                                    </li>
                                    <li>
                                        <div style="display:inline-block;vertical-align:top">
                                            <script src="https://apis.google.com/js/platform.js" async defer></script>
                                            <a class="g-plusone" data-size="medium" data-href="<?php the_permalink() ?>"></a>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if (comments_open() || '0' != get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                                <div class="box box-primary">
                                    <div class="box-body no-padding">
                                        <ul class="users-list clearfix">
                                            <?php $posts = get_posts('orderby=rand&numberposts=8'); foreach($posts as $post) { ?>
                                                <li>
                                                    <div class="caption">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php $resim_yolu = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); if ( has_post_thumbnail() ) { ?>

                                                                <img src="<?php echo $resim_yolu[0]; ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title() ?>" />

                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                    <span class="users-list-date"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
                                                </li>
                                            <?php } ?>
                                        </ul><!-- /.users-list -->
                                    </div><!-- /.box-body -->
                                </div><!--/.box -->
                            </div>
                            <!-- /.post -->
                            <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <?php if(get_option('ad_footer') != '') : ?>
                    <div class="col-md-12 hidden-xs hidden-sm ad">
                        <?php echo stripslashes(get_option('ad_footer')); ?>
                    </div>
                <?php endif; ?>
                <?php if(get_option('ad_footer_mobile') != '') : ?>
                    <div class="col-md-12 visible-xs visible-sm ad">
                        <?php echo stripslashes(get_option('ad_footer_mobile')); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php get_footer(); ?>