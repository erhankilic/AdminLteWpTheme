    <?php if (get_option('theme_layout') == 'layout-top-nav' || get_option('theme_layout') == 'layout-top-nav fixed') : ?>
        </div>
    <?php endif ?>
</section>
<!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <?php echo get_option('footer_text'); ?>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" id="right-bar">
    <!-- Tab pane -->
    <div class="tab-content">
        <?php dynamic_sidebar('Right Bar'); ?>
        <!-- /.control-sidebar-menu -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/dist/css/skins/skin-<?php echo get_option('theme_color') ? get_option('theme_color') : 'blue' ?>.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!-- Bootstrap 3.3.5 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>

</body>
<?php wp_footer(); ?>
</html>
