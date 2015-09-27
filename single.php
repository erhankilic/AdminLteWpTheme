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
                <div class="col-md-3 side-bar">

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
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user margin-r-5"></i>
                                        <a href="<?php bloginfo('url'); ?>/author/<?php the_author(); ?>" class="text-sm">
                                            <?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li><i class="fa fa-folder-open margin-r-5"></i> <?php the_category(', ') ?></li>
                                    <li class="pull-right"><i class="fa fa-comments-o margin-r-5"></i> Comments (<?php comments_number('0', '1', '%' );?>)</li>
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
                                                    <a href="<?php the_permalink() ?>">
                                                        <div class="col-sm-12">
                                                            <?php $resim_yolu = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); if ( has_post_thumbnail() ) { ?>

                                                                <img src="<?php echo $resim_yolu[0]; ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title() ?>" />

                                                            <?php } ?>
                                                        </div>
                                                    </a>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->

<?php get_footer(); ?>