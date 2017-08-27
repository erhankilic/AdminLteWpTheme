<?php get_header(); ?>

<div class="row">
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
    <?php if (get_option('carousel_check') == 'true') : ?>
        <div class="col-md-<?php echo get_option('carousel_width'); ?>">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    $carousel_category = get_cat_ID(get_option('carousel_category'));
                    $carousel_count = get_option('carousel_post_count');
                    if (have_posts()) : $ali = new WP_Query("cat=$carousel_category&showposts=$carousel_count");
                        while ($ali->have_posts()) : $ali->the_post();
                            $i++;
                            ?>
                            <div class="item <?php if ($i == 1) {
                                echo "active";
                            } ?>">
                                <?php $carousel = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                                if (has_post_thumbnail()) { ?>

                                    <img src="<?php echo $carousel[0]; ?>" class="img-responsive"
                                         alt="<?php the_title(); ?>" title="<?php the_title() ?>"/>

                                <?php } ?>
                                <div class="carousel-caption">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_excerpt_rss(); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif ?>
                </div>
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php if (get_option('accordion_check') == 'true') : ?>
        <div class="col-md-<?php echo get_option('accordion_width'); ?>">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo get_option('accordion_title'); ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <?php
                        $i = 0;
                        $accordion_category = get_cat_ID(get_option('accordion_category'));
                        $accordion_count = get_option('accordion_post_count');
                        if (have_posts()) : $ali = new WP_Query("cat=$accordion_category&showposts=$accordion_count");
                            while ($ali->have_posts()) : $ali->the_post();
                                $i++;
                                ?>
                                <div class="panel box box-widget">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse<?php echo $i; ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <p><?php the_excerpt_rss(); ?></p>
                                            <p><a class="btn btn-primary" href="<?php the_permalink() ?>">Read More</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    <?php endif; ?>
    <?php if (get_option('last_articles_check') == 'true') : ?>
        <div class="col-md-<?php echo get_option('last_articles_width'); ?>">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo get_option('last_articles_title'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <?php
                        $accordion_category = get_cat_ID(get_option('last_articles_category'));
                        $accordion_count = get_option('last_articles_post_count');
                        if (have_posts()) : $ali = new WP_Query("cat=$accordion_category&showposts=$accordion_count");
                        while ($ali->have_posts()) : $ali->the_post();
                        ?>
                        <li class="item">
                            <div class="product-img">
                            <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                            if (has_post_thumbnail()) : ?>
                                <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">
                            <?php endif ?>
                            </div>
                            <div class="product-info">
                                <a href="<?php the_permalink() ?>" class="product-title"><?php the_title(); ?></a>
                                <span class="product-description">
                                  <?php the_excerpt_rss(); ?>
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <?php endwhile ?>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <?php endif; ?>
    <?php if (get_option('github_check') == 'true') : ?>
        <div class="col-md-<?php echo get_option('github_width'); ?>">
            <!-- GitHub Activity Feed -->
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo get_option('github_title'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="feed"></div>
                </div>
                <!-- ./box-body -->
            </div>
            <!-- /.box -->
        </div>
    <?php endif; ?>
    <div class="col-md-12">
        <?php if (have_posts()) : ?>
            <div class="row" id="posts">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                            <span class="username">
                                                <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"
                                                   title="<?php the_title(); ?> "><?php the_title(); ?></a></span>
                                    <ul class="description list-inline">
                                        <li><i class="fa fa-calendar"></i> <?php the_time('d.m.Y ') ?> |
                                        </li>
                                        <li><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a>
                                            |
                                        </li>
                                        <li><i class="fa fa-folder-open"></i> <?php the_category(', ') ?> |
                                        </li>
                                        <li>
                                            <i class="fa fa-comments"></i> <?php comments_number('0 comment', '1 comment', '% comments'); ?>
                                        </li>
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
                                            <img src="<?php echo $img[0]; ?>" class="img-responsive pad"
                                                 alt="<?php the_title(); ?>" title="<?php the_title() ?>"/>
                                        <?php endif ?>
                                    </a>
                                </div>
                                <a href="<?php the_permalink() ?>"
                                   title="<?php the_title(); ?>"><?php the_excerpt_rss(); ?></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="error-page">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Articles not found.</h3>

                <p>
                    There is no article.
                    Meanwhile, you may <a href="<?php bloginfo('url'); ?>">return to home</a> or try using
                    the
                    search form.
                </p>

                <form action="<?php bloginfo('url'); ?>" class="search-form">
                    <div class="input-group">
                        <input type="text" name="s" class="form-control" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat"><i
                                        class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-page -->
        <?php endif; ?>
    </div>
    <div id="inifiniteLoader"><i class="fa fa-2x fa-refresh fa-spin"></i></div>
</div>
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

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var count = 2;
        var total = <?php echo $wp_query->max_num_pages; ?>;
        $(window).scroll(function () {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                if (count > total) {
                    return false;
                } else {
                    loadArticle(count);
                }
                count++;
            }
        });

        function loadArticle(pageNumber) {
            $('#inifiniteLoader').show();
            $.ajax({
                url: "<?php echo admin_url(); ?>admin-ajax.php",
                type: 'POST',
                data: "action=infinite_scroll&page_no=" + pageNumber + '&loop_file=loop',
                success: function (html) {
                    $('#inifiniteLoader').hide('1000');
                    $("#posts").append(html);
                }
            });
            return false;
        }
    });
</script>
<?php if (get_option('github_check') == 'true') : ?>
    <!-- GitHub Activity -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/github-activity-master/src/github-activity.js"></script>
    <script>
        GitHubActivity.feed({
            username: "<?php echo get_option('github_username'); ?>",
            <?php if(get_option('github_repository') != '') :?>
            repository: "<?php echo get_option('github_repository'); ?>",
            <?php endif; ?>
            <?php if(get_option('github_limit') != '') :?>
            limit: "<?php echo get_option('github_limit'); ?>",
            <?php endif; ?>
            selector: "#feed"
        });
    </script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/github-activity-master/src/github-activity.css">
<?php endif; ?>
<?php get_footer(); ?>
