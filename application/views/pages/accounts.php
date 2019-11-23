<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Accounts</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/layout.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/modals.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/notifications.css');?>" />
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
                        <span class="active">Manage Accounts</span>
                        <span class="icon active" style="margin: 0;">&#xf105;</span>
                        <span class="active">List of Accounts</span>
                    </div>

                    <a href="#" class="btn-create open-modal" data-modal="modal-create-account"><span class="icon">&#xf055;</span>Create Record</a>
                </div>

                <div class="container-products">
                    <div class="header">
                        <h3>Accounts Information</h3>
                        
                        <div class="search-group">
                            <span class="icon">&#xf002;</span>
                            <input type="text" name="" id="search" placeholder="Search..." />
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <td>Actions</td>
                                    <td>Username</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Sex</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No data available.</td>
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
                <a href="<?=site_url('accounts'); ?>" class="aside-item active">
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

    <div class="modal" id="modal-create-account">
        <div class="modal-wrapper">
            <div class="modal-overlay"></div>
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Create New Account</h1>
                    <span class="modal-close close-modal" data-modal="modal-create-account">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>New Account Entry</h2>
                    <div class="modal-divider"></div>

                    <form action="<?=site_url('accounts/register'); ?>" class="form-create-account" method="POST">
                        <div class="form-grid-auto-2">
                            <h4>Personal Information</h4>
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" placeholder="Eg. Johnny" />
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" placeholder="Eg. Smithy" />
                                </div>
                            </div>
                            <div class="form-group-radio form-grid-2">
                                <label class="title">Sex</label>
                                <div style="display: grid; grid-template-columns: auto auto; grid-gap: 1rem; justify-content: flex-end; margin-bottom: 1rem;">
                                    <input type="radio" name="sex" id="male" value="1" checked />
                                    <label for="male">
                                        <div class="material-radio-button">
                                            <div class="radio-button"></div>
                                            <span class="radio-text">Male</span>
                                        </div>
                                    </label>
                                    <input type="radio" name="sex" id="female" value="0" />
                                    <label for="female">
                                        <div class="material-radio-button">
                                            <div class="radio-button"></div>
                                            <span class="radio-text">Female</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-auto-2">
                            <h4>Account Information</h4>
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" placeholder="Eg. @johndoe12" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Eg. mybuttercup" />
                                </div>
                            </div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-create-account" name="" value="Create" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-create-account" value="Cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-update-account">
        <div class="modal-wrapper">
            <div class="modal-overlay"></div>
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Update Account Details</h1>
                    <span class="modal-close close-modal" data-modal="modal-update-account">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>Update Entry</h2>
                    <div class="modal-divider"></div>

                    <form action="<?=site_url('accounts/update'); ?>" class="form-update-account" method="POST">
                        <input type="hidden" name="update_id" id="update_id" />
                        <div class="form-grid-auto-2">
                            <h4>Personal Information</h4>
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="update_firstname">Firstname</label>
                                    <input type="text" name="update_firstname" id="update_firstname" placeholder="Eg. Johnny" />
                                </div>
                                <div class="form-group">
                                    <label for="update_lastname">Lastname</label>
                                    <input type="text" name="update_lastname" id="update_lastname" placeholder="Eg. Smithy" />
                                </div>
                            </div>
                            <div class="form-group-radio form-grid-2">
                                <label class="title">Sex</label>
                                <div style="display: grid; grid-template-columns: auto auto; grid-gap: 1rem; justify-content: flex-end; margin-bottom: 1rem;">
                                    <input type="radio" class="update_sex" name="update_sex" id="update_male" value="1" checked />
                                    <label for="update_male">
                                        <div class="material-radio-button">
                                            <div class="radio-button"></div>
                                            <span class="radio-text">Male</span>
                                        </div>
                                    </label>
                                    <input type="radio" class="update_sex" name="update_sex" id="update_female" value="0" />
                                    <label for="update_female">
                                        <div class="material-radio-button">
                                            <div class="radio-button"></div>
                                            <span class="radio-text">Female</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-auto-2">
                            <h4>Account Information</h4>
                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label for="update_username">Username</label>
                                    <input type="text" name="update_username" id="update_username" placeholder="Eg. @johndoe12" />
                                </div>
                                <div class="form-group">
                                    <label for="update_password">Password</label>
                                    <input type="password" name="update_password" id="update_password" placeholder="Eg. mybuttercup" />
                                </div>
                            </div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-update-account" name="" value="Save" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-update-account" value="Cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-update-privileges">
        <div class="modal-wrapper">
            <div class="modal-overlay"></div>
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Set Account Privileges</h1>
                    <span class="modal-close close-modal" data-modal="modal-update-privileges">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>Privileges for account <span class="label-username">@ming</span></h2>
                    <div class="modal-divider"></div>

                    <form action="<?=site_url('accounts/privileges/update'); ?>" class="form-update-privileges" method="POST">
                        <input type="hidden" id="account_id" name="account_id" />
                        <div class="form-grid-2">
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_dashboard" name="checkbox_dashboard" id="checkbox_dashboard" value="1" />
                                <label for="checkbox_dashboard">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">Dashboard</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_products" name="checkbox_products" id="checkbox_products" value="1" />
                                <label for="checkbox_products">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">Products</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_accounts" name="checkbox_accounts" id="checkbox_accounts" value="1" />
                                <label for="checkbox_accounts">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">Accounts</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_transaction" name="checkbox_transaction" id="checkbox_transaction" value="1"  />
                                <label for="checkbox_transaction">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">Transaction</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_sales" name="checkbox_sales" id="checkbox_sales" value="1" />
                                <label for="checkbox_sales">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">Sales</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox_history" name="checkbox_history" id="checkbox_history" value="1" />
                                <label for="checkbox_history">
                                    <div class="material-checkbox">
                                        <div class="checkbox-button"></div>
                                        <span class="checkbox-text">History</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-update-privileges" name="" value="Save" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-update-privileges" value="Cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- START OF NOTIFICATION -->

    <div class="notification">
        <div class="notification-wrapper">
            <div class="notification-container notification-fade-in">
                <div class="notification-header">
                    <span class="notification-close notification-close-button">&times;</span>
                    <div class="notification-header-content">
                        <h2 class="notification-title">Awesome.</h2>
                        <p class="notification-message">You have successfully created an account!</p>
                    </div>
                </div>
                <div class="notification-body">
                    <input type="button" class="notification-button notification-close-button" value="okay" />
                </div>
            </div>
        </div>
    </div>
    
    <!-- END OF NOTIFICATION -->
</body>
<script type="text/javascript" src="<?=base_url('assets/js/nav.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/modals.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/dropdowns.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/notifications.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(() => {
        $(document).on('click', '#btn-submit-create-account', (e) => {
            e.preventDefault();

            $.ajax({
                url: "<?=site_url('accounts/register'); ?>",
                method: 'POST',
                data: $('.form-create-account').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-create-account')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-create-account');
                        read_accounts();
                    }
                }
            });
        });

        $(document).on('keyup', '#search', function() {
            if ($(this).val().length >= 4)
                read_accounts($(this).val())
            else
                read_accounts();
        });

        $(document).on('click', '.btn-update-account', function() {
            read_account($(this).attr('data-id'));
        });

        $(document).on('click', '#btn-submit-update-account', (e) => {
            e.preventDefault();
            $.ajax({
                url: "<?=site_url('accounts/update'); ?>",
                method: 'POST',
                data: $('.form-update-account').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-update-account')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-update-account');
                        read_accounts();
                    }
                }
            });
        });

        $(document).on('click', '.btn-delete-account', function(e) {
            e.preventDefault();

            if (confirm('Are you sure to delete this record?') == true) {
                $.ajax({
                    url: "<?=site_url('accounts/delete/'); ?>" + $(this).attr('data-id'),
                    method: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (!data.success)
                            open_notification("Oops! Something went wrong.", data.response, false, 1);
                        else {
                            open_notification("Awesome!", data.response, false);
                            read_accounts();
                        }
                    }
                });
            }
        });

        $(document).on('click', '.btn-update-privileges', function() {
            var account_id = $(this).attr('data-id');
            var username = $(this).attr('data-username');

            // TODO :: Remove this after doing things in db
            $('.form-update-privileges')[0].reset();

            $('.label-username').html(username);
            $('#account_id').val(account_id);

            $.ajax({
                url: "<?=site_url('accounts/privileges_read/'); ?>" + account_id,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data !== undefined && data.length != 0) {
                        $('#checkbox_dashboard').prop('checked', data.dashboard);
                        $('#checkbox_products').prop('checked', data.products);
                        $('#checkbox_accounts').prop('checked', data.accounts);
                        $('#checkbox_transaction').prop('checked', data.transaction);
                        $('#checkbox_sales').prop('checked', data.sales);
                        $('#checkbox_history').prop('checked', data.history);
                    }
                }
            });
        });

        $(document).on('click', '#btn-submit-update-privileges', (e) => {
            e.preventDefault();

            $.ajax({
                url: "<?=site_url('accounts/privileges_update'); ?>",
                method: 'POST',
                data: $('.form-update-privileges').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-update-privileges')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-update-privileges');
                    }
                }
            });
        });

        function read_account(id) {
            var url = "<?=site_url('accounts/read/id/') ?>" + id;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#update_id').val(data[0].id);
                    $('#update_username').val(data[0].username);
                    $('#update_firstname').val(data[0].firstname);
                    $('#update_lastname').val(data[0].lastname);
                    $('input[name=update_sex][value="'+data[0].sex+'"]').prop('checked', true);
                }
            });
        }

        function read_accounts(value = '') {
            var url = "<?=site_url('accounts/read') ?>";
            if (value != '')
                url += "/" + value;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "<tr><td colspan='5' style='text-align: center;'>No data available.</td></tr>";
                    if (data !== undefined && data.length != 0) {
                        html = "";
                        data.forEach((row) => {
                            let sex = 'F';
                            if (row.sex == 1)
                                sex = 'M';

                            html += "<tr>";
                                html += "<td><div class='dropdown-container'><div class='dropdown-overlay'></div><div class='dropdown'><div class='grid grid-1fr-auto dropdown-header'><span class='dropdown-text'>Actions</span><span class='dropdown-icon icon'>&#xf107;</span></div><div class='dropdown-items'><a href='#' class='dropdown-item open-modal btn-update-account' data-id='"+row.id+"' data-modal='modal-update-account'>Update</a><a href='#' class='dropdown-item btn-delete-account' data-id='"+row.id+"'>Delete</a><a href='#' class='dropdown-item open-modal btn-update-privileges' data-id='"+row.id+"' data-username='"+row.username+"' data-modal='modal-update-privileges'>Privileges</a></div></div></div></td>";
                                html += "<td>"+row.username+"</td>";
                                html += "<td>"+row.firstname+"</td>";
                                html += "<td>"+row.lastname+"</td>";
                                html += "<td>"+sex+"</td>";
                            html += "</tr>";
                        });
                    }

                    $('.table tbody').html(html);
                }
            });
        }

        read_accounts();
    });
</script>
</html>