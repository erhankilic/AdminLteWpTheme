<?php get_header(); ?>
<?php
$tag = get_queried_object();
$tag_slug = $tag->slug;
?>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    "<?php single_tag_title(); ?>"
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <?php bloginfo('name'); ?></li>
                    <li class="active"><?php echo $tag_slug; ?></li>
                </ol>
            </section>

            <!-- row -->
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
                <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                                            <i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a> | <i class="fa fa-folder-open"></i> <?php the_category(', ') ?> | <i class="fa fa-comments"></i> <?php comments_number('0 comment', '1 comment', '% comments' );?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                        <?php endwhile; ?>
                        <?php else : ?>
                    </ul>
                    <div class="error-page">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! Articles not found.</h3>
                        <p>
                            There is no article.
                            Meanwhile, you may <a href="<?php bloginfo('url'); ?>">return to home</a> or try using the search form.
                        </p>
                        <form action="<?php bloginfo('url'); ?>" class="search-form">
                            <div class="input-group">
                                <input type="text" name="s" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                                </div>
                            </div><!-- /.input-group -->
                        </form>
                    </div><!-- /.error-page -->
                    <?php endif; ?>
                    </ul>
                    <div id="inifiniteLoader"><i class="fa fa-2x fa-refresh fa-spin"></i></div>
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
                    data: "action=infinite_scroll&page_no=" + pageNumber + '&loop_file=loop&what=tag&value=<?php echo $tag_slug; ?>',
                    success: function (html) {
                        $('#inifiniteLoader').hide('1000');
                        $("ul.timeline").append(html);
                    }
                });
                return false;
            }

        });
    </script>

<?php get_footer(); ?>