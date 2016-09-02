<div class="row">
    <div class="col-md-4 col-md-offset-4"><h4><?= lang('common_report_filter'); ?></h4>

        <form method="get">
            <div class="form-group">
                <div class="inner-addon left-addon"><i class="glyphicon glyphicon-calendar"></i> <input type="text"
                                                                                                        name="filters[date]"
                                                                                                        id="report-filter-date"
                                                                                                        class="form-control">
                </div>
                <!--<div class="input-group-btn">                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-arrow-right fa fa-arrow-right"></i>                </div>-->
            </div>
        </form> <?php /* */
        $report_daterange = isset($_GET['filters']['date']) ? explode(" - ", $_GET['filters']['date']) : false;
        if ($report_daterange !== false) list($start_date, $end_date) = [trim($report_daterange[0]), trim($report_daterange[1])]; elseif (!isset($start_date)) list($start_date, $end_date) = [date('d-m-Y', strtotime(date('d-m-Y') . "- 30 days")), date('d-m-Y')]; ?>
        <script>            start_date = "<?php /* */ echo $start_date;?>";
            end_date = "<?php /* */ echo $end_date;?>";
            $(document).ready(function () {
                $('#report-filter-date').daterangepicker({
                    "showDropdowns": true,
                    "autoApply": true,
                    "locale": {"format": "DD-MM-YYYY"}
                });
                $('#report-filter-date').data('daterangepicker').setStartDate(start_date);
                $('#report-filter-date').data('daterangepicker').setEndDate(end_date);
                $('#report-filter-date').on('apply.daterangepicker', function (ev, picker) {
                    start_date = picker.startDate.format("DD-MM-YYYY");
                    end_date = picker.endDate.format("DD-MM-YYYY");
                    $('#report-table').bootstrapTable('refresh', {query: {start_date: start_date, end_date: end_date}});
                });
            });
            function set_params(params) {
                params.start_date = start_date;
                params.end_date = end_date;
                return params;
            }        </script>
    </div>
</div>
