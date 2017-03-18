<?php $this->load->view('admin/assets/header'); ?>
<?php $this->load->view('admin/assets/navbar'); ?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/assets/sidebar'); ?>
        <div class="content col-md-9">
            <h3>Notifications</h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Notifications</li>
            </ol>                        
            <hr>
            <div id="row-table" class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Notifications
                    </div>
                    <div class="panel-body">

                        <?php foreach ($notif as $notifs) { ?>
                            <span class="label label-warning"><?php echo $notifs->datetime ?></span><?php echo $notifs->title; ?>
                            <a href = "<?php echo base_url('employee/insert_row/' . $notifs->projectID . '/' . $notifs->userID); ?>">Accept</a>
                            <li class="divider"></li>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF CONTENT -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                    log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log)
                    alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
</body>
</html>
