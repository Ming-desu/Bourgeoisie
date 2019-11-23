<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Products</title>

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
                        <span class="active">Manage Products</span>
                    </div>
                    
                    <a href="#" class="btn-create open-modal" data-modal="modal-create-product">
                        <span class="icon">&#xf055;</span>Create Record
                    </a>
                </div>

                <div class="container-products">
                    <div class="header">
                        <h3>Store Items</h3>

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
                                    <td>Category</td>
                                    <td>SKU</td>
                                    <td>Description</td>
                                    <td>Qty.</td>
                                    <td>Reorder</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                
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
                <a href="<?=site_url('products'); ?>" class="aside-item active">
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

    <div class="modal" id="modal-create-product">
        <div class="modal-wrapper">
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Create New Product</h1>
                    <span class="modal-close close-modal" data-modal="modal-create-product">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>New Product Entry</h2>
                    <div class="modal-divider"></div>

                    <form class="form-create-product" action="products/create" method="POST">
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="sku">Product SKU</label>
                                <input type="text" id="sku" name="sku" placeholder="Eg. PO901-22" />
                            </div>
                            <div class="form-group">
                                <label>
                                    <div class="grid-category">
                                        <span>Category</span>
                                        <div class="category-tools">
                                            <span class="icon btn-create-category open-modal" data-modal="modal-create-category">&#xf055;</span>
                                            <span class="icon btn-delete-category" id="create-product-delete-category">&#xf1f8;</span>
                                        </div>
                                    </div>
                                </label>
                                <select id="category" name="category">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea placeholder="Eg. Some description" id="description" name="description"></textarea>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" id="qty" name="qty" placeholder="Eg. 98" />
                            </div>
                            <div class="form-group">
                                <label for="reorder">Reorder Point</label>
                                <input type="number" id="reorder" name="reorder" placeholder="Eg. 200" />
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" placeholder="Eg. 128.98" />
                            </div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-create-product" name="btn-submit-create-product" value="Add" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-create-product" value="Cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-update-product">
        <div class="modal-wrapper">
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Update Product Details</h1>
                    <span class="modal-close close-modal" data-modal="modal-update-product">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>Update Entry</h2>
                    <div class="modal-divider"></div>

                    <form class="form-update-product" action="products/update" method="POST">
                        <input type="hidden" id="update_id" name="update_id" />
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label>Product SKU</label>
                                <input type="text" id="update_sku" name="update_sku" placeholder="Eg. PO901-22" />
                            </div>
                            <div class="form-group">
                                <label>
                                    <div class="grid-category">
                                        <span>Category</span>
                                        <div class="category-tools">
                                            <span class="icon btn-create-category open-modal" data-modal="modal-create-category">&#xf055;</span>
                                            <span class="icon btn-delete-category" id="update-product-delete-category">&#xf1f8;</span>
                                        </div>
                                    </div>
                                </label>
                                <select id="update_category" name="update_category">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_description">Description</label>
                            <textarea placeholder="Eg. Some description" id="update_description" name="update_description"></textarea>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="update_qty">Quantity</label>
                                <input type="number" id="update_qty" name="update_qty" placeholder="Eg. 98" />
                            </div>
                            <div class="form-group">
                                <label for="update_reorder">Reorder Point</label>
                                <input type="number" id="update_reorder" name="update_reorder" placeholder="Eg. 200" />
                            </div>
                        </div>
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="update_price">Price</label>
                                <input type="number" id="update_price" name="update_price" placeholder="Eg. 128.98" />
                            </div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-update-product" name="btn-submit-update-product" value="Save" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-update-product" value="Cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-create-category">
        <div class="modal-wrapper">
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Create New Category</h1>
                    <span class="modal-close close-modal" data-modal="modal-create-category">&times;</span>
                </div>
                <div class="modal-body">
                    <h2>New Category Entry</h2>
                    <div class="modal-divider"></div>

                    <form class="form-create-category" action="category/create" method="POST">
                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="category_description">Description</label>
                                <input type="text" id="category_description" name="category_description" placeholder="Eg. Beverages" />
                            </div>
                            <div></div>
                        </div>
                        <div class="align-right">
                            <input type="submit" class="btn btn-primary" id="btn-submit-create-category" name="btn-submit-create-category" value="Add" />
                            <input type="button" class="btn btn-light-bordered close-modal" data-modal="modal-create-category" value="Cancel" />
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
        $(document).on('click', '#btn-submit-create-product', (e) => {
            e.preventDefault();
            $.ajax({
                url: "<?=site_url('products/create'); ?>",
                method: 'POST',
                data: $('.form-create-product').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-create-product')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-create-product');
                        read_products();
                    }
                }
            });
        });

        $(document).on('click', '#btn-submit-create-category', (e) => {
            e.preventDefault();
            $.ajax({
                url: "<?=site_url('category/create'); ?>",
                method: 'POST',
                data: $('.form-create-category').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-create-category')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-create-category');
                        read_categories();
                    }
                }
            });
        });

        $(document).on('keyup', '#search', function() {
            if ($(this).val().length >= 4)
                read_products($(this).val())
            else
                read_products();
        });

        $(document).on('click', '.btn-update-product', function() {
            read_product($(this).attr('data-id'));
        });

        $(document).on('click', '#btn-submit-update-product', (e) => {
            e.preventDefault();
            $.ajax({
                url: "<?=site_url('products/update'); ?>",
                method: 'POST',
                data: $('.form-update-product').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (!data.success)
                        open_notification("Oops! Something went wrong.", data.response, false, 1);
                    else {
                        $('.form-update-product')[0].reset();
                        open_notification("Awesome!", data.response, false);
                        closeModal('modal-update-product');
                        read_products();
                    }
                }
            });
        });

        $(document).on('click', '.btn-delete-product', function(e) {
            e.preventDefault();

            if (confirm('Are you sure to delete this record?') == true) {
                $.ajax({
                    url: "<?=site_url('products/delete/'); ?>" + $(this).attr('data-id'),
                    method: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (!data.success)
                            open_notification("Oops! Something went wrong.", data.response, false, 1);
                        else {
                            open_notification("Awesome!", data.response, false);
                            read_products();
                        }
                    }
                });
            }
        });

        $(document).on('click', '#create-product-delete-category', () => {
            if (confirm("Are you sure to delete this category?") == true) {
                $.ajax({
                    url: "<?=site_url('category/delete'); ?>",
                    method: 'POST',
                    data: {id: $('#category').val()},
                    dataType: 'json',
                    success: function(data) {
                        if (!data.success)
                            open_notification("Oops! Something went wrong.", data.response, false, 1);
                        else {
                            open_notification("Awesome!", data.response, false);
                            read_products();
                            read_categories();
                        }
                    }
                });
            }
        });

        $(document).on('click', '#update-product-delete-category', () => {
            if (confirm("Are you sure to delete this category?") == true) {
                $.ajax({
                    url: "<?=site_url('category/delete'); ?>",
                    method: 'POST',
                    data: {id: $('#update_category').val()},
                    dataType: 'json',
                    success: function(data) {
                        if (!data.success)
                            open_notification("Oops! Something went wrong.", data.response, false, 1);
                        else {
                            open_notification("Awesome!", data.response, false);
                            read_products();
                            read_categories();
                        }
                    }
                });
            }
        });

        function read_product(id) {
            var url = "<?=site_url('products/read/id/') ?>" + id;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#update_id').val(data[0].id);
                    $('#update_sku').val(data[0].sku);
                    $('#update_category').val(data[0].category_id);
                    $('#update_description').val(data[0].description);
                    $('#update_qty').val(data[0].qty);
                    $('#update_reorder').val(data[0].reorder);
                    $('#update_price').val(data[0].price);
                }
            });
        }

        function read_products(value = '') {
            var url = "<?=site_url('products/read') ?>";
            if (value != '')
                url += "/" + value;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "<tr><td colspan='7' style='text-align: center;'>No data available.</td></tr>";
                    if (data !== undefined && data.length != 0) {
                        html = "";
                        data.forEach((row) => {
                            if (row.qty <= row.reorder) 
                                html += "<tr class='low-stocks'>";
                            else
                                html += "<tr>";
                                
                                html += "<td><div class='dropdown-container'><div class='dropdown-overlay'></div><div class='dropdown'><div class='grid grid-1fr-auto dropdown-header'><span class='dropdown-text'>Actions</span><span class='dropdown-icon icon'>&#xf107;</span></div><div class='dropdown-items'><a href='#' class='dropdown-item open-modal btn-update-product' data-id='"+row.id+"' data-modal='modal-update-product'>Update</a><a href='#' class='dropdown-item btn-delete-product' data-id='"+row.id+"'>Delete</a></div></div></div></td>";
                                html += "<td>"+row.category+"</td>";
                                html += "<td>"+row.sku+"</td>";
                                html += "<td>"+row.description+"</td>";
                                html += "<td>"+row.qty+"</td>";
                                html += "<td>"+row.reorder+"</td>";
                                html += "<td>"+row.price+"</td>";
                            html += "</tr>";
                        });
                    }

                    $('.table tbody').html(html);
                }
            });
        }

        read_products();

        function read_categories() {
            $.ajax({
                url: "<?=site_url('category/read'); ?>",
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "<option value='' hidden selected>Select Category</option>";
                    
                    data.forEach((row) => {
                        html += "<option value='"+row.id+"'>"+row.description+"</option>";
                    });

                    $('#category').html(html);
                    $('#update_category').html(html);
                }
            });
        }

        read_categories();
    });
</script>
</html>