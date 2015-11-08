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

<!-- Bootstrap 3.3.5 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
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
<?php endif; ?>

</body>
<?php wp_footer(); ?>
</html>
