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
                            Messages sent
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
                           Categories: 
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
                                Contacts: 
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