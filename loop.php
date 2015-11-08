<?php if (have_posts()) : ?>
    <?php if(get_option('ad_loop') != '') : ?>
        <li>
            <i class="fa fa-bookmark-o bg-blue"></i>

            <div class="timeline-item">
                <div class="timeline-body">
                    <?php if(get_option('ad_footer') != '') : ?>
                        <div class="hidden-xs hidden-sm ad">
                            <?php echo stripslashes(get_option('ad_footer')); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(get_option('ad_footer_mobile') != '') : ?>
                        <div class="visible-xs visible-sm ad">
                            <?php echo stripslashes(get_option('ad_footer_mobile')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </li>
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-green"><?php the_time('d.m.Y ') ?></span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <li>
        <i class="fa fa-newspaper-o bg-blue"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php the_time('H:i') ?></span>

            <h3 class="timeline-header"><a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?> "><?php the_title(); ?></a></h3>

            <div class="timeline-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-5">
                        <div class="caption">
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                                if (has_post_thumbnail()) { ?>

                                    <img src="<?php echo $img[0]; ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title() ?>"/>

                                <?php } ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-7">
                        <?php the_excerpt_rss(); ?>
                        <div style="margin-top: 10px">
                            <a class="btn btn-primary btn-xs" href="<?php the_permalink() ?>"
                               title="<?php the_title(); ?>">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="timeline-footer">
                <p>
                    <i class="fa fa-user"></i> <a href="<?php bloginfo('url'); ?>/author/<?php the_author(); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a> | <i class="fa fa-folder-open"></i> <?php the_category(', ') ?> | <i class="fa fa-comments"></i> <?php comments_number('0 comment', '1 comment', '% comments' );?>
                </p>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
<?php endwhile; ?>
<?php endif; ?>