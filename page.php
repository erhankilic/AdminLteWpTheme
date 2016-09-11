<?php get_header(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
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
                <div class="col-md-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <h2><?php the_title(); ?></h2>
                                    <ul class="list-inline">
                                        <li><i class="fa fa-share"></i> Share</li>
                                        <li><div class="fb-share-button" data-href="<?php the_permalink() ?>"
                                                 data-layout="button_count"></div></li>
                                        <li><div style="display:inline-block;vertical-align:top">
                                                <a href="https://twitter.com/share" class="twitter-share-button"
                                                   data-url="<?php the_permalink() ?>"
                                                   data-text="<?php the_title(); ?>"> Tweet</a></div></li>
                                        <li><div style="display:inline-block;vertical-align:top"><a href="//www.pinterest.com/pin/create/button/"
                                                                                                    data-pin-do="buttonBookmark" data-pin-color="red">
                                                    <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png"/>
                                                </a></div></li>
                                        <li><div style="display:inline-block;vertical-align:top"><script type="IN/Share" data-counter="right"></script></div>
                                        </li>
                                        <li><a href="//www.reddit.com/submit?url=<?php the_permalink() ?>"
                                               target="_blank"> <img src="//www.redditstatic.com/spreddit7.gif"
                                                                     alt="submit to reddit" border="0"/> </a></li>
                                        <li><div style="display:inline-block;vertical-align:top"><a class="g-plusone" data-size="medium"
                                                                                                    data-href="<?php the_permalink() ?>"></a></div></li>
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
                                    <li><div class="fb-share-button" data-href="<?php the_permalink() ?>"
                                             data-layout="button_count"></div></li>
                                    <li><div style="display:inline-block;vertical-align:top">
                                            <a href="https://twitter.com/share" class="twitter-share-button"
                                               data-url="<?php the_permalink() ?>"
                                               data-text="<?php the_title(); ?>"> Tweet</a></div></li>
                                    <li><div style="display:inline-block;vertical-align:top"><a href="//www.pinterest.com/pin/create/button/"
                                                                                                data-pin-do="buttonBookmark" data-pin-color="red">
                                                <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png"/>
                                            </a></div></li>
                                    <li><div style="display:inline-block;vertical-align:top"><script type="IN/Share" data-counter="right"></script></div>
                                    </li>
                                    <li><a href="//www.reddit.com/submit?url=<?php the_permalink() ?>"
                                           target="_blank"> <img src="//www.redditstatic.com/spreddit7.gif"
                                                                 alt="submit to reddit" border="0"/> </a></li>
                                    <li><div style="display:inline-block;vertical-align:top"><a class="g-plusone" data-size="medium"
                                                                                                data-href="<?php the_permalink() ?>"></a></div></li>
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

        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');
    </script>
    <script type="text/javascript" async defer
            src="//assets.pinterest.com/js/pinit.js"></script>
    <script src="//platform.linkedin.com/in.js"
            type="text/javascript"> lang: en_US</script>
    <script src="https://apis.google.com/js/platform.js" async
            defer></script>
<?php get_footer(); ?>