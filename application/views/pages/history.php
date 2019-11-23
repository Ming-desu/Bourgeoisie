<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - History</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/layout.css'); ?>" />
    <script src="<?=base_url('assets/js/jquery-3.3.1.js');?>"></script>
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
                        <span class="active">Log Report</span>
                    </div>
                </div>

                <div class="container-products">
                    <div class="header">
                        <h3>History</h3>

                        <div class="search-group">
                            <span class="icon">&#xf002;</span>
                            <input type="text" name="" id="search" placeholder="Search..." />
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Description</td>
                                    <td>Timestamp</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" style="text-align: center;">No data available.</td>
                                </tr>
                            </tbody>
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
                <a href="<?=site_url('sales'); ?>" class="aside-item">
                    <div class="aside-item-flex">
                        <div class="aside-item-icon">
                            <img src="<?=base_url('assets/img/icons/icon_presentation_dark_blue.png'); ?>" />
                        </div>
                        <span class="aside-item-label">Sales Report</span>
                    </div>
                </a>
                <a href="<?=site_url('history'); ?>" class="aside-item active">
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
        function read_products(value = '') {
            var url = "<?=site_url('history/read') ?>";
            if (value != '')
                url += "/" + value;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "<tr><td colspan='3' style='text-align: center;'>No data available.</td></tr>";
                    if (data !== undefined && data.length != 0) {
                        html = "";
                        data.forEach((row) => {
                            html += "<tr>";
                                html += "<td>"+row.name+"</td>";
                                html += "<td>"+row.description+"</td>";
                                html += "<td>"+row.timestamp+"</td>";
                            html += "</tr>";
                        });
                    }

                    $('.table tbody').html(html);
                }
            });
        }

        read_products();

        $(document).on('keyup', '#search', function() {
            if ($(this).val().length >= 4)
                read_products($(this).val())
            else
                read_products();
        });
    });
</script>
</html>