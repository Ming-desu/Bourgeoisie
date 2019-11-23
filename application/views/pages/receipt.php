<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Receipt</title>
</head>
<body>
<div class="container">
	<div class="header center">
		<h2 class="company-name">Bourgeoisie</h2>
		<p>San Pablo City, Laguna</p>
		<p>+6396-1345-4976</p>
		<div class="group-2">
			<span>TIN: 00000000</span>
		</div>
	</div>
	<table>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
		<tr>
			<td class="center bold" colspan="2">SALES RECEIPT</td>
		</tr>
		<tr>
			<td>Transaction #:</td>
			<td class="text-right"><?php for($i = strlen($sales[0]['id']); $i < 4; $i++) {echo '0';} echo $sales[0]['id']; ?></td>
		</tr>
		<tr>
			<td>Date Generated:</td>
			<td class="text-right"><?=date('Y-m-d', strtotime($sales[0]['timestamp'])); ?></td>
		</tr>
		<tr>
			<td>Time Generated:</td>
			<td class="text-right"><?=date('h:i:s', strtotime($sales[0]['timestamp'])); ?></td>
		</tr>
		<tr>
			<td>Cashier:</td>
			<td class="text-right"><?=$sales[0]['firstname']; ?></td>
		</tr>
		<tr>
			<td>Method:</td>
			<td class="text-right">CASH</td>
		</tr>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
		<tr>
			<td class="bold">ITEMS</td>
			<td class="text-right bold">AMOUNT</td>
		</tr>
		<?php $qty = 0; ?>
		<?php foreach($sales_details as $key => $row): ?>
			<?php $qty += 1; ?>
			<tr>
				<td>
					<?=$row['description']; ?>
					<div class="text-right"><?=$row['qty'] ?>pc(s) @ <?=number_format($row['price'], 2); ?></div>
				</td>
				<td class="text-right">Php<?=number_format(($row['qty'] * $row['price']), 2); ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="center bold" colspan="2">----- <?=$qty; ?> Item(s) -----</td>
		</tr>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
		<tr>
			<td class="bold">Amount Due:</td>
			<td class="text-right bold">Php<?=number_format($sales[0]['total_amount'], 2); ?></td>
		</tr>
		<tr>
			<td>Cash Tendered:</td>
			<td class="text-right">Php<?=number_format($sales[0]['cash_tendered'], 2); ?></td>
		</tr>
		<tr>
			<td class="bold">Cash Change:</td>
			<td class="text-right bold">Php<?=number_format($sales[0]['cash_tendered'] - $sales[0]['total_amount'], 2); ?></td>
		</tr>
		<tr>
			<td>Discount:</td>
			<td class="text-right">Php0.00</td>
		</tr>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
		<tr>
			<td>VATable Sales:</td>
			<td class="text-right">Php<?=number_format($sales[0]['total_amount'] - ($sales[0]['total_amount'] * .12), 2); ?></td>
		</tr>
		<tr>
			<td>VAT Exempt Sale:</td>
			<td class="text-right">Php0.00</td>
		</tr>
		<tr>
			<td>Zero-rated Sale:</td>
			<td class="text-right">Php0.00</td>
		</tr>
		<tr>
			<td>12% VAT Sale:</td>
			<td class="text-right">Php<?=number_format($sales[0]['total_amount'] * .12, 2); ?></td>
		</tr>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
		<tr>
			<td>Sold to:</td>
			<td class="text-right">WALK-IN</td>
		</tr>
		<tr>
			<td>TIN:</td>
			<td class="text-right">__________________</td>
		</tr>
		<tr>
			<td>Address:</td>
			<td class="text-right">__________________</td>
		</tr>
		<tr>
			<td class="justify" colspan="2">-----------------------------------------------------------------</td>
		</tr>
	</table>
	<div class="center">
		<p>Thank you for purchasing!</p>
		<p>This will serves as your official receipt.</p>
		<p>Come back again soon!</p>
	</div>
</div>
</body>
<style type="text/css">
	@font-face {
	  font-family: "Montserrat Regular";
	  src: url('http://localhost/Bourgeoisie/assets/fonts/Montserrat-Regular.ttf');
	}

	* {
		margin: 0;
		font-family: "Montserrat Regular";
	}

	.container {
		width: 400px;
		margin: 1rem auto;
	}

	.header p {
		font-size: .9rem;
		text-transform: uppercase;
		letter-spacing: 1px;
	}

	.group-2 {
		margin-top: 6px;
		color: #333;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	.text-right {
		text-align: right;
	}

	.center {
		text-align: center;
	}

	.bold {
		font-weight: bold;
	}

	td {
		width: 50%;
	}

	.border {
		height: 1px;
		width: 100%;
		background-color: #000;
	}
</style>
</html>