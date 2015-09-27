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
                                    <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-user margin-r-5"></i> <?php the_author(); ?></a></li>
                                    <li><a href="#" class="link-black text-sm"><i
                                                class="fa fa-folder-open margin-r-5"></i> <?php the_category(', ') ?></a></li>
                                    <li class="pull-right"><a href="#" class="link-black text-sm"><i
                                                class="fa fa-comments-o margin-r-5"></i> Comments (<?php comments_number('0', '1', '%' );?>)</a></li>
                                </ul>
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