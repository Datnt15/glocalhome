<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Glocal - <?= lang('home-sub-title') ?></title>
	<base href="<?= base_url() ?>">
	<meta name="author" content="Nguyễn Tiến Đạt" />
	<meta name="description" content="Glocal home cung cấp giải pháp căn hộ phức hợp trên khu vực Hồ Tây." />
	<meta name="keywords"  content="" />
	<meta name="Resource-type" content="Document" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="icon" href="assets/img/favicon.png" type="image/png"> 
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/components.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/plugins.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/daterangepicker.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=vietnamese" rel="stylesheet"> 
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit">
							<div class="portlet-body">
                                <div class="mt-element-step">
                                    <div class="row step-background-thin">
                                        <div class="col-md-4 bg-grey-steel mt-step-col <?= $step >= 1 ?'active':'' ?>">
                                            <div class="mt-step-number">1</div>
                                            <div class="mt-step-title uppercase font-grey-cascade">Purchase</div>
                                            <div class="mt-step-content font-grey-cascade">Purchasing the item</div>
                                        </div>
                                        <div class="col-md-4 bg-grey-steel mt-step-col <?= $step >= 2 ?'active':'' ?>">
                                            <div class="mt-step-number">2</div>
                                            <div class="mt-step-title uppercase font-grey-cascade">Payment</div>
                                            <div class="mt-step-content font-grey-cascade">Complete your payment</div>
                                        </div>
                                        <div class="col-md-4 bg-grey-steel mt-step-col <?= $step == 3 ?'active':'' ?>">
                                            <div class="mt-step-number">3</div>
                                            <div class="mt-step-title uppercase font-grey-cascade">Deploy</div>
                                            <div class="mt-step-content font-grey-cascade">Receive item integration</div>
                                        </div>
                                    </div>
                                </div>
                           