<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Dashboard</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/layout.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/dashboard.css'); ?>" />
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
                        <span class="active">Dashboard</span>
                    </div>
                </div>

                <div class="container-products dashboard-container">
                    <div class="grid-2">
                        <div class="card card-border-left-blue">
                            <div class="card-header">
                                <h2 class="card-label-md">Total profit</h2>
                                <span class="card-label-sm">in 1 day</span>
                            </div>
                            <div class="card-body">
                                <div class="grid-1fr-auto">
                                    <span class="card-label-lg blue label-profit"></span>
                                    <div class="card-icon card-icon-circle card-icon-bordered">
                                        <span class="icon dark-blue" style="margin: 0;">&#xf3d1;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-border-left-green">
                            <div class="card-header">
                                <h2 class="card-label-md">Total earning</h2>
                                <span class="card-label-sm">in 1 day</span>
                            </div>
                            <div class="card-body">
                                <div class="grid-1fr-auto">
                                    <span class="card-label-lg green label-earning"></span>
                                    <div class="card-icon card-icon-circle card-icon-bordered">
                                        <span class="icon dark-blue" style="margin: 0;">&#xf3d1;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 1rem;">
                        <div class="grid-2">
                            <div class="left-side">
                                <div class="card-header">
                                    <h2 class="card-label-md">Inventory Status</h2>
                                    <span class="card-label-sm">as of today</span>
                                </div>
                                <div class="card-body">
                                    <div class="legends">
                                        <div class="legend-item">
                                            <div class="legend legend-danger legend-out-of-stock"></div> 
                                            Out of Stock
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend legend-warning legend-low-in-stock"></div> 
                                            Low in Stock
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend legend-success legend-total-items"></div> 
                                            Good in Stock
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-side">
                                <div class="bars">
                                    <div class="bar-item">
                                        <div class="bar bar-out-of-stock" id="bar1"></div>
                                        <span class="label-out-of-stock"></span>
                                    </div>
                                    <div class="bar-item">
                                        <div class="bar bar-low-in-stock" id="bar2"></div>
                                        <span class="label-low-in-stock"></span>
                                    </div>
                                    <div class="bar-item">
                                        <div class="bar bar-total-items" id="bar3"></div>
                                        <span class="label-total-items"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <a href="<?=site_url('dashboard'); ?>" class="aside-item active">
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
        $.ajax({
            url: "<?=site_url('dashboard/read'); ?>",
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                var total = data.total_items;
                var good = data.good_in_stock;
                var low = data.low_in_stock;
                var out = data.out_of_stock;
                var earning = data.total_sales;

                $('.label-out-of-stock').html(out);
                $('.label-low-in-stock').html(low);
                $('.label-total-items').html(good);
                $('.label-profit').html("Php" + (earning - (earning * .12)).toFixed(2));
                $('.label-earning').html("Php" + earning);

                document.getElementById('bar1').style.setProperty('--scroll-height', (out / total) * 100 + "%");
                document.getElementById('bar2').style.setProperty('--scroll-height1', (low / total) * 100 + "%");
                document.getElementById('bar3').style.setProperty('--scroll-height2', (good / total) * 100 + "%");
            }
        });
    });
</script>
</html>