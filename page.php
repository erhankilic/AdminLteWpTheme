<?php get_header(); ?>

    <div class="row" id="post">
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
        <div class="col-md-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <h2><?php the_title(); ?></h2>
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
                            <li class="pull-right text-muted">
                                <i class="fa fa-comments-o margin-r-5"></i>
                                Comments (<?php comments_number('0', '1', '%'); ?>)
                            </li>
                        </ul>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || '0' != get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
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
<?php get_footer(); ?>