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
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">

                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="post">
                                    <div class='description'>
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                    <div class="post-content">
                                        <?php the_content();?>
                                    </div>
                                </div>
                                <!-- /.post -->
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number()) :
                                comments_template();
                            endif;
                            ?>

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