<footer class="main-footer">
    <strong>Copyright &copy; <?php echo date( 'Y' ); ?> <a href="<?php bloginfo('url'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>.</strong> All rights reserved.
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

<!-- jQuery 2.1.4 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/chartjs/Chart.min.js"></script>
</body>
<?php wp_footer(); ?>
</html>
