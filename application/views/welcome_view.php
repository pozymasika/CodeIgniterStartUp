<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style5.css
">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style>
    .payment-method{
    list-style-type: none;
    margin: 0;
    padding: 0;
    border: 1px solid #c8c7cc;
    border-radius: .2em;
    }
    .payment-method>li:not(:last-child){
    border-bottom: 1px solid #c8c7cc;
    }
    .payment-method, .payment-method>li{
    position: relative;
    }
    /* .payment-method-details{
    display: none;
    padding: 1.875rem .9375rem;
    } */
    .mpesadata{
    display: none;
    padding: 1.875rem .9375rem;
    }
    .paypaldata{
    display: none;
    padding: 1.875rem .9375rem;
    }
    .wireTransferdata{
        display: none;
        padding: 1.875rem .9375rem;
    }
</style>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
			<h3>talkTalk</h3>
            </div>
            <ul class="list-unstyled components">
				<li>
                    <a href="<?php echo base_url() . 'index.php/Login/welcome'; ?>"><span><i class="fas fa-tachometer-alt"></i></span> Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/Login/message'; ?>"><span><i class="fas fa-envelope"></i></span> Messages</a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/Login/category'; ?>"><span><i class="fas fa-filter"></i></span> Category</a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/Login/contacts'; ?>"><span><i class="fas fa-phone"></i></span> Contacts</a>
				</li>
				<li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span><i class="fas fa-envelope"></i></span> Settings</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Update Profile</a>
                        </li>
                        <li>
                            <a href="#">Update Password</a>
                        </li>
                        <li>
                            <a href="#">User Settings</a>
                        </li>
                    </ul>
				</li>
				<li>
                    <a href="#"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a>
                </li>
            </ul>
        </nav>
       
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            </nav>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active">Welcome <?php echo $this->session->userdata('user');?></li>
</ol>
<div class="row">
<div class="col-xl-1"></div>
 <div class="col-xl-5 col-sm-6 mb-5">
     <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                    <div class="card-body-icon">
                            <i class="fas fa-users"></i>
                    </div> 
                    <div class="mr-5">
                           Balance: 
                    </div>     
                    <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#myModal">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>   
                                <i class="fa fa-angle-right"></i>
                            </span>
                    </a>
            </div>
     </div>
 </div>
 <div class="col-xl-5 col-sm-6 mb-5">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                    <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                    </div>  
                    <div class="mr-5">
                            Messages sent<?php echo $data2 ?>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'index.php/Login/message';?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>   
                                <i class="fa fa-angle-right"></i>                        
                             </span>
                    </a>
            </div>   
        </div>
</div>
<div class="col-xl-1"></div>
</div>

<div class="row">
    <div class="col-xl-1"></div>
<div class="col-xl-5 col-sm-6 mb-5">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                    <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                    </div>    
                    <div class="mr-5">
                           Categories: <?php  echo $data?>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'index.php/Login/category';?>">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>   
                                <i class="fa fa-angle-right"></i>
                            </span>
                    </a>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-sm-6 mb-5">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                        <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">
                                Contacts: <?php echo $data1?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'index.php/Login/contacts';?>">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-right"></i>   
                                <i class="fa fa-angle-right"></i>
                                </span>
                        </a>
                 </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
</div>
        </div>
    </div>
    <div class="modal  fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Billing - Payment Methods</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>You can make a payment by using M-Pesa, PayPal or by sending a wire transfer to our bank
                        account. </p>
                    <p>Payments made online to PayPal or sent to our M-Pesa paybill will be automatically credited to
                        youraccount and available for use.</p>
                    <div class="payment-method">
                        <ul>
                            <li class="mpesa">
                                <h4>Mpesa<i class="fas fa-chevron-down"></i></h4>
                                <div class="mpesadata">
                                    <ol>
                                        <li>Using your MPesa-enabled phone, select "Pay Bill" from the M-Pesa menu</li>
                                        <li>Enter Africa's Talking Business Number <b>525900</b> </li>
                                        <li>Enter your Africa's Talking Account Number. Your account number is <b>Quadrant.api</b></li>
                                        <li>Enter the Amount of credits you want to buy</li>
                                        <li>Confirm that all the details are correct and press Ok</li>
                                        <li>Check your statement to see your payment. Your API account will also be
                                            updated</li>
                                    </ol>
                                </div>
                            </li>
                            <li class="paypal">
                                <h4>PayPal<i class="fas fa-chevron-down"></i></h4>
                                <di class="paypaldata">
                                    <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                       <div class="form-group">
                                            <label>Enter Amount in USD</label>
                                                <input type="number" name="amount" min="1" class="form-contol">
                                       </div>
                                        <button type="submit" class="btn btn-default">Pay With PayPal</button>
                                    </form>
                                </di>
                            </li>
                            <li class="wireTransfer">
                                <h4>Wire Transfer<i class="fas fa-chevron-down"></i></h4>
                                <div class="wireTransferdata">
                                    <ul>
                                        <li> Bank Name: NIC Bank</li>
                                        <li> Branch: Prestige Plaza</li>
                                        <li> Account Name: AFRICASTALKING (K) LTD.</li>
                                        <li> Account Number: 1000197765</li>
                                        <li> Payment Currency: Kenya Shillings</li>
                                        <li> Bank Routing Code: 41</li>
                                        <li> Bank Routing Method: EFT</li>
                                        <li> Bank Swift Code: NINCKENA</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>