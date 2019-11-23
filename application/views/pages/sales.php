<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Sales</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/layout.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/daterangepicker.css'); ?>" />
    <script src="<?=base_url('assets/js/jquery-3.3.1.js');?>"></script>
    <script src="<?=base_url('assets/js/moment.min.js');?>"></script>
    <script src="<?=base_url('assets/js/daterangepicker.js');?>"></script>
</head>
<body>
    <header>
        <div class="wrapper">
            <nav>
                <h2>Bourgeoisie</h2>
                <div class="navigation">
                    <span class="btn-open-menu">Menu <span class="icon">&#xf104;</span></span>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <main>
            <div class="wrapper-sm">
                <div class="breadcrumbs">
                    <div>
                        <a href="#">Bourgeoisie</a>
                        <span class="icon" style="margin: 0;">&#xf105;</span>
                        <span class="active">Sales Report</span>
                    </div>
                </div>

                <div class="container-products">
                    <div class="header">
                        <h3>Sales Transaction</h3>

                        <div id="daterange">
                            <span class="icon">&#xf133;</span>
                            <span class="label-date"></span>
                            <span class="icon">&#xf107;</span>
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <td>Transaction No.</td>
                                    <td>Cashier</td>
                                    <td>Timestamp</td>
                                    <td>Total Amount</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </main>
        <aside id="nav">
            <div class="aside-header">
                <h2>NAVIGATION</h2>
                <span class="btn-close-menu">&times;</span>
            </div>
            <div class="aside-body">
                <div class="aside-header-responsive">
                    <div class="aside-item-icon btn-minimize-menu">
                        <img src="<?=base_url('assets/img/icons/icon_menu.png'); ?>" />
                    </div>
                    <h3 class="aside-item-label">MENU</h3>
                </div>
                <a href="<?=site_url('dashboard'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_home_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Dashboard</span>
                    </div>
                </a>
                <a href="<?=site_url('products'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_box_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Manage Products</span>
                    </div>
                </a>
                <a href="<?=site_url('accounts'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_user_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Manage Accounts</span>
                    </div>
                </a>
                <a href="<?=site_url('transaction'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_cart_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Transaction</span>
                    </div>
                </a>
                <a href="<?=site_url('sales'); ?>" class="aside-item active">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_presentation_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Sales Report</span>
                    </div>
                </a>
                <a href="<?=site_url('history'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_history_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">History</span>
                    </div>
                </a>
                <a href="<?=site_url('accounts/logout'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_shutdown_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Logout</span>
                    </div>
                </a>
            </div>
        </aside>
    </section>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/nav.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(() => {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function setDate(start, end) {
            $('#daterange .label-date').html(start.format('MMMM DD, YYYY') + ' - ' + end.format('MMMM DD, YYYY'));

            read();
        }

        $('#daterange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            alwaysShowCalendars: true,
            opens: 'left',
            maxDate: moment()
        }, setDate);

        setDate(start, end);

        function read() {
            var date = $('#daterange .label-date').html();
            date = date.split(" - ");

            $.ajax({
                url: "<?=site_url('transaction/read'); ?>",
                method: 'POST',
                data: {
                    startDate: date[0],
                    endDate: date[1]
                },
                dataType: 'json',
                success: function(data) {
                    var html = "<tr><td colspan='4' style='text-align: center;'>No data available.</td></tr>";
                    if (data !== undefined && data.length != 0) {
                        html = "";
                        var total_amount = 0;

                        data.forEach((row) => {
                            var transaction_id = "";

                            for (i = row.id.length; i < 4; i++)
                                transaction_id += "0";

                            html += "<tr>";
                                html += "<td>"+transaction_id + row.id+"</td>";
                                html += "<td>"+row.firstname+"</td>";
                                html += "<td>"+row.timestamp+"</td>";
                                html += "<td>Php"+row.total_amount+"</td>";
                            html += "</tr>";

                            total_amount += parseFloat(row.total_amount);
                        });

                        html += "<tr class='footer'><td colspan='3' style='text-align: right; text-transform: uppercase;'>Total Sales:</td><td>Php"+total_amount.toFixed(2)+"</td></tr>";
                    }

                    $('.table tbody').html(html);
                }
            });
        }
    });
</script>
<style type="text/css">
    #daterange {
        cursor: pointer;
        border: 1px solid gainsboro;
        padding: .5rem .5em;
        border-radius: 4px;
        color: #333;
    }

    .label-date {
        margin: 0 .2rem;
    }

    .icon {
        margin: 0;
    }
</style>
</html>