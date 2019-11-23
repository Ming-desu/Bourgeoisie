<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Transaction</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/layout.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/transaction.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/modals.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/notifications.css');?>" />
    <script src="<?=base_url('assets/js/jquery-3.3.1.js'); ?>"></script>
    <script src="<?=base_url('assets/js/qrcode.min.js'); ?>"></script>
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
                        <span class="active">Transaction</span>
                    </div>
                    <a href="#" class="open-modal btn-connect" data-modal="modal-share"><span class="icon">&#xf029;</span>Connect</a>
                </div>

                <div class="transaction-container">
                    <div class="transaction-items">
                        <div class="header">
                            <div class="search-group search-group-transaction">
                                <span class="icon">&#xf002;</span>
                                <input type="text" name="" id="search" placeholder="Search..." />
                                <span class="icon">&#xf02a;</span>
                            </div>
                        </div>

                        <div class="body">
                            <div class="accordion">
                                <div class="accordion-header">
                                    <span class="accordion-text">Categories</span>
                                </div>
                                <div class="accordion-body">
                                    <div class="categories-container"></div>
                                </div>
                            </div>
                            <div class="products-wrapper-again">
                                <div class="products-container">
                                    <div class="products-wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transaction-tools">
                        <div class="header">
                            <div class="cashier">
                                <h3>Shopping Cart</h3>
                                <p>transaction #<span class="transaction_number">0000</span></p>
                            </div>
                            <!--<button type="button" class="btn-circle btn-cancel-transaction">&times;</button>-->
                            <div class="btn-cancel-transaction">
                                <span class="btn-cancel-transaction-icon icon">&#xf00d;</span>
                                <span class="btn-cancel-transaction-text">Cancel</span>
                            </div>
                        </div>
                        <div class="body">
                            <div class="cart-container"></div>
                        </div>
                        <div class="footer">
                            <div class="transaction-details-container">
                                <div class="subtotal">
                                    <span class="subtotal-label">Subtotal</span>
                                    <span class="subtotal-text"></span>
                                </div>
                                <div class="tax">
                                    <span class="tax-label">Tax <span>(VAT included)</span></span>
                                    <span class="tax-text"></span>
                                </div>
                            </div>
                            <div class="total-container">
                                <span class="total-label">Total</span>
                                <span class="total-text"></span>
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
                <a href="<?=site_url('transaction'); ?>" class="aside-item active">
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

    <div class="modal" id="modal-share">
		<div class="modal-wrapper">
			<div class="modal-overlay modal-fade"></div>
			<div class="modal-container modal-fade-in">
				<div class="modal-header">
					<h1>Use phone as a scanner</h1>
					<span class="modal-close close-modal">&times;</span>
				</div>
				<div class="modal-body">
                    <div class="modal-body-center">
                        <div id="share-qr"></div>
                        <p>Scan this QR to your phone to pair.</p>
                    </div>
				</div>
			</div>
		</div>
    </div>

    <div class="modal" id="modal-update-qty">
        <div class="modal-wrapper">
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Enter quantity</h1>
                    <span class="modal-close close-modal" data-modal="modal-update-qty">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="update_qty">New quantity</label>
                            <input type="number" id="update_qty" placeholder="Eg. 12" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-enter-cash">
        <div class="modal-wrapper">
            <div class="modal-container modal-fade">
                <div class="modal-header">
                    <h1>Enter cash</h1>
                    <span class="modal-close close-modal" data-modal="modal-enter-cash">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total_amount">Total Amount:</label>
                        <input type="number" id="total_amount" readonly />
                    </div>
                    <div class="form-group">
                        <label for="cash_tendered">Cash Tendered:</label>
                        <input type="number" id="cash_tendered" placeholder="Enter cash" />
                    </div>
                    <div class="form-group">
                        <label for="cash_change">Total Change:</label>
                        <input type="number" id="cash_change" value="0" readonly />
                    </div>
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
<script type="text/javascript" src="<?=base_url('assets/js/modals.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/notifications.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/nav.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(() => {
        var hasTransaction = false;

        $(document).on('keyup', '#search', function () {
            if ($(this).val().length > 0 && $(this).val().length < 4)
                read_products();
        });

        $(document).on('keydown', '#search', function(e) {
            if (e.keyCode == 13 && $(this).val() != '' && $(this).val().length >= 4) {
                read_products($(this).val());
            }
        });

        $(document).on('click', '.category-item', function() {
            $('.category-item').each((i, l) => { l.classList.remove('category-item-active'); });
            $(this).addClass('category-item-active');
            read_products_category($(this).attr('data-category'));
            console.log($(this).attr('data-category'));
        });

        $(document).on('click', '.btn-add-cart', function() {
            if (!hasTransaction) {
                hasTransaction = true;
                open_notification('Awesome!', 'Transaction is kicking!', false);
                // TODO :: CREATE SALES
                $.ajax({
                    url: "<?=site_url('transaction/new'); ?>",
                    method: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        var transaction_id = "";
                        for (var i = data.id.length; i < 4; i++)
                            transaction_id += "0";
                            
                        transaction_id += data.id;
                        $('.transaction_number').html(transaction_id);
                    }
                });
            }
            else {
                $.ajax({
                    url: "<?=site_url('transaction/add_item'); ?>",
                    method: 'POST',
                    data: {
                        sales_id: $('.transaction_number').html(),
                        product_id: $(this).attr('data-id'),
                        qty: 1,
                        price: $(this).attr('data-price')
                    },
                    success: function(data) {
                        read_sales_details($('.transaction_number').html());
                    }
                });
            }
            
        });

        $(document).on('click', '.cart-item-delete', function() {
            delete_sales_details($(this).attr('data-id'));
        });

        $(document).on('click', '.btn-cancel-transaction', function() {
            if (hasTransaction && confirm('Are you sure to cancel transaction?') == true) {
                hasTransaction = false;
                
                $.ajax({
                    url: "<?=site_url('transaction/cancel'); ?>",
                    method: 'POST',
                    data: {
                        sales_id: $('.transaction_number').html()
                    },
                    success: function() {
                        window.location.reload();
                        alert('Transaction cancelled.');
                    }
                });
            }
        });

        $(document).on('click', '.total-container', () => {
            open_cash($('.transaction_number').html());
        });

        $(document).on('keyup', '#cash_tendered', function() {
            if ($(this).val() == '')
                $('#cash_change').val(0);
            else 
                $('#cash_change').val((parseFloat($(this).val()) - parseFloat($('#total_amount').val())).toFixed(2));
        });

        function read_products_category(value = '') {
            var url = "<?=site_url('products/read_with_category') ?>";
            if (value != '')
                url += "/" + value;

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    if (data !== undefined && data.length != 0) {
                        data.forEach((row) => {
                            html += "<div class='product-item'><div class='product-item-header'><span class='product-item-initial'>"+row.sku[0]+"</span><div class='product-item-details'><span class='product-item-name'>"+row.description+"</span><span class='product-item-price'>Php"+row.price+"</span></div></div><div class='product-item-footer'><input type='button' class='btn-add-cart' name='' value='Add to cart' data-id='"+row.id+"' data-sku='"+row.sku+"' data-description='"+row.description+"' data-price='"+row.price+"' /></div></div>";
                        });
                    }

                    $('.products-wrapper').html(html);
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
                    var html = "";
                    if (data !== undefined && data.length != 0) {
                        data.forEach((row) => {
                            html += "<div class='product-item'><div class='product-item-header'><span class='product-item-initial'>"+row.sku[0]+"</span><div class='product-item-details'><span class='product-item-name'>"+row.description+"</span><span class='product-item-price'>Php"+row.price+"</span></div></div><div class='product-item-footer'><input type='button' class='btn-add-cart' name='' value='Add to cart' data-id='"+row.id+"' data-sku='"+row.sku+"' data-description='"+row.description+"' data-price='"+row.price+"' /></div></div>";
                        });
                    }

                    $('.products-wrapper').html(html);
                }
            });
        }

        read_products();

        function read_categories() {
            $.ajax({
                url: "<?=site_url('category/read_with_count'); ?>",
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "<div class='category-item category-item-active' data-category='--all'><span class='name'>ALL</span><span class='count'><3</span></div>";
                    
                    data.forEach((row) => {
                        html += "<div class='category-item' data-category='"+row.id+"'><span class='name'>"+row.description+"</span><span class='count'>"+row.count+"</span></div>";
                    });

                    $('.categories-container').html(html);
                }
            });
        }

        read_categories();

        function read_sales_details(id) {
            $.ajax({
                url: "<?=site_url('transaction/read_sales_details/'); ?>" + id,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    var html = "";
                    var total = 0;

                    data.forEach((row) => {
                        html += "<div class='cart-item' data-id='"+row.id+"'><span class='cart-item-initial'>"+row.sku[0]+"</span><span class='cart-item-name'>"+row.description+"</span><span class='cart-item-qty'>"+row.qty+"</span><span class='cart-item-total'>Php"+row.total+"</span><span class='cart-item-delete icon' data-id='"+row.id+"'>&#xf1f8;</span></div>";
                        total += parseFloat(row.total);
                    });

                    $('.cart-container').html(html);
                    $('.subtotal-text').html('Php' + total.toFixed(2));
                    $('.tax-text').html('Php' + (total * .12).toFixed(2));
                    $('.total-text').html('Php<span id="total">' + total.toFixed(2) + "</span>");
                }
            });
        }

        function update_sales_details(id, qty) {
            $.ajax({
                url: "<?=site_url('transaction/update_sales_details'); ?>",
                method: 'POST',
                data: {
                    id: id,
                    qty: qty
                },
                success: function() {
                    read_sales_details($('.transaction_number').html());                    
                }
            });
        }

        function delete_sales_details(id) {
            $.ajax({
                url: "<?=site_url('transaction/delete_sales_details/'); ?>" + id,
                method: 'POST',
                success: function() {
                    read_sales_details($('.transaction_number').html());
                }
            });
        }

        function open_cash() {
            openModal('modal-enter-cash');
            $('#total_amount').val($('#total').html());
            $('#cash_tendered').focus();
        }

        function transaction_end(id, cash_tendered, total_amount) {
            $.ajax({
                url: "<?=site_url('transaction/end'); ?>",
                method: 'POST',
                data: {
                    id: id,
                    cash_tendered: cash_tendered,
                    total_amount: total_amount
                },
                success: function() {
                    // TODO :: RESET TRANSACTION
                    // OPEN NEW WINDOW FOR RECEIPT
                    window.open('<?=site_url('receipt/view/'); ?>' + $('.transaction_number').html(), '_blank');
                    window.location.reload();
                }
            });
        }

        var id = undefined;
        $(document).on('keydown', (e) => {
            if (hasTransaction) {
                if (e.keyCode == 113) {
                    e.preventDefault();
                    $('.cart-item').each((i, l) => { l.style.removeProperty('background-color'); });
                    $('.cart-item')[$('.cart-item').length - 1].style.backgroundColor = "#f9f9f9";
                    id = $('.cart-item')[$('.cart-item').length - 1].getAttribute('data-id');
                    openModal('modal-update-qty');
                    $('#update_qty').focus();
                }

                if (e.keyCode == 13) {
                    if (isOpenModal('modal-update-qty')) {
                        let qty = 1;

                        if ($('#update_qty').val() > 1)
                            qty = $('#update_qty').val();

                        update_sales_details(id, qty);
                        
                        $('#update_qty').val('');

                        closeModal('modal-update-qty');
                    }
                    else if (isOpenModal('modal-enter-cash')) {
                        let canPay = parseFloat($('#cash_tendered').val()) - parseFloat($('#total_amount').val()) >= 0 ? true : false;

                        if (canPay) {
                            closeModal('modal-enter-cash');
                            transaction_end($('.transaction_number').html(), $('#cash_tendered').val(), $('#total_amount').val());
                        }
                        else {
                            open_notification('Oops! Something went wrong.', 'Insufficient amount of cash entered.', false, 1);
                            setInterval(() => { $('#cash_tendered').focus(); }, 100);
                        }
                    }
                }  
            }
        });
    });
</script>
</html>