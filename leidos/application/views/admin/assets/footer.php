<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/filter.js"></script>
<script src="<?php echo base_url(); ?>js/chosen.jquery.min.js"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $(function () {
        $('#search').on('keyup', function () {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function () {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();
        });
    });
</script>
</body>
</html>