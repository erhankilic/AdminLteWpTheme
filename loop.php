<?php if (have_posts()) : ?>
    <?php if(get_option('ad_loop') != '') : ?>
        <div class="col-xs-12">
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
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <span class="username"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" title="<?php the_title(); ?> "><?php the_title(); ?></a></span>
                        <ul class="description list-inline">
                            <li><i class="fa fa-calendar"></i> <?php the_time('d.m.Y ') ?> | </li>
                            <li><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a> | </li>
                            <li><i class="fa fa-folder-open"></i> <?php the_category(', ') ?> | </li>
                            <li><i class="fa fa-comments"></i> <?php comments_number('0 comment', '1 comment', '% comments'); ?></li>
                        </ul>
                    </div>
                    <!-- /.user-block -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="caption">
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                            <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                            if (has_post_thumbnail()) : ?>
                                <img src="<?php echo $img[0]; ?>" class="img-responsive pad" alt="<?php the_title(); ?>" title="<?php the_title() ?>"/>
                            <?php endif ?>
                        </a>
                    </div>
                    <a   href="<?php the_permalink() ?>"
                       title="<?php the_title(); ?>"><?php the_excerpt_rss(); ?></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    <?php endwhile; ?>
<?php endif; ?>