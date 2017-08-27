<?php get_header(); ?>

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
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="/">return to home</a> or try using the search form.
            </p>
            <form action="<?php bloginfo('url'); ?>" class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- /.input-group -->
            </form>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
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

<?php get_footer(); ?>