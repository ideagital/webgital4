<?php
/**
 * Controller
 */
$appDB = new appModel($connectDB);

$invoices_count = $appDB->findFirst('COUNT(*)','orders');
$invoices_total = $appDB->InvoicesTotal();


isset($uri[2]) ? $invoice_id = $uri[2] : $invoice_id = '';
if($invoice_id != '') :
	$invoice = $appDB->ViewInvoice($invoice_id);
	
	// Set Discount And Vat
	if($invoice['invoice_id'] != ''){
		$vat = $invoice['total_price'] * 0.07 + 0;
		$discount = $invoice['discount'] + 0;
	}else $invoice_id = '';
endif;

 // echo "<pre>"; print_r($invoice); exit();