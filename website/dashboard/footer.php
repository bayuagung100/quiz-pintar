<!-- jQuery UI 1.11.4 -->
<script src="<?php echo url("website/dashboard/");?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo url("website/dashboard/");?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo url("website/dashboard/");?>plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="<?php echo url("website/dashboard/");?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo url("website/dashboard/");?>plugins/moment/moment.min.js"></script>
        <script src="<?php echo url("website/dashboard/");?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo url("website/dashboard/");?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="<?php echo url("website/dashboard/");?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo url("website/dashboard/");?>plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo url("website/dashboard/");?>plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo url("website/dashboard/");?>plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo url("website/dashboard/");?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo url("website/dashboard/");?>plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo url("website/dashboard/");?>plugins/moment/moment.min.js"></script>
        <script src="<?php echo url("website/dashboard/");?>plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo url("website/dashboard/");?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- fMCE  -->
        <script src="<?php echo url("website/dashboard/");?>plugins/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '.richtext',
                height: 500,
                // link_list: "json/link-list.php",
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount responsivefilemanager'
                ],
                toolbar: 'insertfile undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | responsivefilemanager | link ',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tiny.cloud/css/codepen.min.css'
                ],
                external_filemanager_path: "../filemanager/",
                filemanager_title: "File Manager",
            });
            tinymce.init({
                selector: '.ringkasan',
                height: 300,
                // link_list: "json/link-list.php",
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount responsivefilemanager'
                ],
                toolbar: 'insertfile undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | responsivefilemanager | link ',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tiny.cloud/css/codepen.min.css'
                ],
                external_filemanager_path: "../filemanager/",
                filemanager_title: "File Manager",
            });
        </script>
        <!-- DataTables -->
        <script src="<?php echo url("website/dashboard/");?>plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo url("website/dashboard/");?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script>
            $(function() {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
        <!-- date-range-picker -->
        <script src="<?php echo url("website/dashboard/");?>plugins/daterangepicker/daterangepicker.js"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                });

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });

            });
        </script>
        <!-- overlayScrollbars -->
        <script src="<?php echo url("website/dashboard/");?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo url("website/dashboard/");?>dist/js/adminlte.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo url("website/dashboard/");?>dist/js/demo.js"></script>

        <script>
        $('#kabupaten').change(function() {

        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
        var city_id = $('#kabupaten').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo $set['url']; ?>ajax/admin/cek-kecamatan.php',
                data: {
                    'city_id': city_id
                },
                success: function(data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kecamatan").html(data);
                }
            });
        });
        </script>
    </body>

    </html>