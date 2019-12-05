<div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                           <p>Copyright © 2019. ASCON - Bimbel Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/vendor/jquery-1.12.4.min.js') ?>"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/bootstrap.min.js') ?>"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/wow.min.js') ?>"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery-price-slider.js') ?>"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.meanmenu.js') ?>"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/owl.carousel.min.js') ?>"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.sticky.js') ?>"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/jquery.scrollUp.min.js') ?>"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/counterup/jquery.counterup.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/counterup/waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/counterup/counterup-active.js') ?>"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/scrollbar/mCustomScrollbar-active.js') ?>"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/metisMenu/metisMenu.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/metisMenu/metisMenu-active.js') ?>"></script>
    <!-- data table JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/data-table/bootstrap-table.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/tableExport.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/data-table-active.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/bootstrap-table-editable.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/bootstrap-editable.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/bootstrap-table-resizable.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/colResizable-1.5.source.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/data-table/bootstrap-table-export.js') ?>"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/morrisjs/raphael-min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/morrisjs/morris.js') ?>"></script>
    <!-- <script src="<?php echo base_url('kiaalap/js/morrisjs/morris-active.js') ?>"></script> -->
    <!-- morrisjs JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/sparkline/jquery.sparkline.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/sparkline/jquery.charts-sparkline.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/sparkline/sparkline-active.js') ?>"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/calendar/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/calendar/fullcalendar.min.js') ?>"></script>
    <script src="<?php echo base_url('kiaalap/js/calendar/fullcalendar-active.js') ?>"></script>
    <!-- tab JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/tab.js') ?>"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/plugins.js') ?>"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/main.js') ?>"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="<?php echo base_url('kiaalap/js/tawk-chat.js') ?>"></script>

    <script type="text/javascript">
        Morris.Area({
            element: 'extra-area-chart',
            data: [{
                period: '2010',
                CSE: 50,
                Accounting: 80,
                Electrical: 20
            }, {
                period: '2011',
                CSE: 130,
                Accounting: 100,
                Electrical: 80
            }, {
                period: '2012',
                CSE: 80,
                Accounting: 60,
                Electrical: 70
            }, {
                period: '2013',
                CSE: 70,
                Accounting: 200,
                Electrical: 140
            }, {
                period: '2014',
                CSE: 180,
                Accounting: 150,
                Electrical: 140
            }, {
                period: '2015',
                CSE: 105,
                Accounting: 100,
                Electrical: 80
            },
             {
                period: '2016',
                CSE: 250,
                Accounting: 150,
                Electrical: 200
            }],
            xkey: 'period',
            ykeys: ['CSE', 'Accounting', 'Electrical'],
            labels: ['CSE', 'Accounting', 'Electrical'],
            pointSize: 3,
            fillOpacity: 0,
            pointStrokeColors:['#006DF0', '#933EC5', '#65b12d'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 1,
            hideHover: 'auto',
            lineColors: ['#006DF0', '#933EC5', '#65b12d'],
            resize: true
            
        });
    </script>
</body>

</html>