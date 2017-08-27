<?php get_header(); ?>

    <div class="row" id="post">
        <?php if (get_option('ad_header') != '') : ?>
            <div class="col-md-12 hidden-xs hidden-sm ad">
                <?php echo stripslashes(get_option('ad_header')); ?>
            </div>
        <?php endif; ?>
        <?php if (get_option('ad_header_mobile') != '') : ?>
            <div class="col-md-12 visible-xs visible-sm ad">
                <?php echo stripslashes(get_option('ad_header_mobile')); ?>
            </div>
        <?php endif; ?>
        <!-- /.col -->
        <div class="col-md-<?php echo get_option('sidebar_check') == 'true' ? 9 : 12 ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <h2><?php the_title(); ?></h2>
                            <ul class="description list-inline list-unstyled">
                                <li><i class="fa fa-calendar"></i> <?php the_time('d.m.Y') ?></li>
                                <li>
                                    <i class="fa fa-user margin-r-5"></i>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                                       class="text-sm">
                                        <?php the_author(); ?>
                                    </a>
                                </li>
                                <li><i class="fa fa-folder-open margin-r-5"></i> <?php the_category(', ') ?>
                                </li>
                                <li class="pull-right">
                                    <i class="fa fa-comments-o margin-r-5"></i>
                                    Comments (<?php comments_number('0', '1', '%'); ?>)
                                </li>
                            </ul>
                            <ul class="list-inline">
                                <li><i class="fa fa-share"></i> Share</li>
                                <li>
                                    <a target="_blank" title="<?php the_title(); ?>" class="fa fa-facebook-square fa-2x"
                                       href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" title="<?php the_title(); ?>" class="fa fa-twitter-square fa-2x"
                                       href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink() ?>">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" title="<?php the_title(); ?>" class="fa fa-linkedin-square fa-2x"
                                       href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" title="<?php the_title(); ?>" class="fa fa-google-plus-square fa-2x"
                                       href="https://plus.google.com/share?url=<?php the_permalink() ?>"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box box-widget">
                            <div class="box-body box-profile" style="background-image: url('<?php echo has_post_thumbnail() ? $img[0] : bloginfo('template_url') . '/assets/img/default.jpg' ?>')">
                                <a class="author-link"
                                   href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                                   rel="author">
                                    <img class="profile-user-img img-responsive img-circle" src="<?php
                                    $author_bio_avatar_size = apply_filters('twentyfifteen_author_bio_avatar_size', 56);
                                    echo get_avatar_url(get_the_author_meta('user_email'), $author_bio_avatar_size);
                                    ?>" alt="User profile picture">

                                    <h3 class="profile-username text-center"><?php echo get_the_author(); ?></h3>

                                    <p class="text-muted text-center"><?php the_author_meta('description'); ?></p>
                                </a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                        <!-- Social sharing buttons -->
                        <ul class="list-inline">
                            <li><i class="fa fa-share"></i> Share</li>
                            <li>
                                <a target="_blank" title="<?php the_title(); ?>" class="fa fa-facebook-square fa-2x"
                                   href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="<?php the_title(); ?>" class="fa fa-twitter-square fa-2x"
                                   href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink() ?>">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="<?php the_title(); ?>" class="fa fa-linkedin-square fa-2x"
                                   href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="<?php the_title(); ?>" class="fa fa-google-plus-square fa-2x"
                                   href="https://plus.google.com/share?url=<?php the_permalink() ?>"></a>
                            </li>
                        </ul>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                    <div class="box box-widget">
                        <div class="box-body">
                            <div class="row related-articles clearfix">
                                <?php $posts = get_posts('orderby=rand&numberposts=8');
                                foreach ($posts as $post) : ?>
                                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium'); ?>
                                    <div class="col-xs-6 col-sm-4 col-md-3">
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="caption" style="background-image: url('<?php echo $image[0]; ?>')">
                                            <div class="overlay"></div>
                                            <span><?php the_title(); ?></span>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!--/.box -->
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php if (get_option('sidebar_check') == 'true') : ?>
            <div class="col-md-3 side-bar hidden-xs hidden-sm">
                <?php dynamic_sidebar('Side Bar'); ?>
            </div>
        <?php endif ?>

        <?php if (get_option('ad_footer') != '') : ?>
            <div class="col-md-12 hidden-xs hidden-sm ad">
                <?php echo stripslashes(get_option('ad_footer')); ?>
            </div>
        <?php endif; ?>
        <?php if (get_option('ad_footer_mobile') != '') : ?>
            <div class="col-md-12 visible-xs visible-sm ad">
                <?php echo stripslashes(get_option('ad_footer_mobile')); ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- /.row -->

<?php get_footer(); ?>