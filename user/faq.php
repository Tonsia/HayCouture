<?php
include "header.php";
?>


        <!-- faq-area area start here  -->
        <div class="faq-area section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="page-menu-wrap">
                            <ul class="menu-items">
                                <li class="menu-item"><a class="menu-link" href="term.php"><i class="menu-icon far fa-file-alt"></i>Term & Conditions</a></li>
                                <li class="menu-item"><a class="menu-link" href="privacy.php"><i class="menu-icon far fa-file-alt"></i>Privacy Policy</a></li>
                                <li class="menu-item"><a class="menu-link" href="return.php"><i class="menu-icon far fa-file-alt"></i>Shipping & Return</a></li>
                                <li class="menu-item active"><a class="menu-link" href="faq.php"><i class="menu-icon far fa-file-alt"></i>FAQ</a></li>
                                <li class="menu-item"><a class="menu-link" href="refund.php"><i class="menu-icon far fa-file-alt"></i>Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="accordion" id="accordionFaq">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What shipping methods are available?
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                  <p class="faq-text">Flat-rate shipping<br>Local shipping<br> Same day delivery<br> Overnight delivery</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How long will it take to get my package to recieve?
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="faq-text">10-15 Working Days</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do you ship internationally?
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="faq-text">No, we haven't started shipping internationally</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What payment methods are accepted?
                                </button>
                              </h2>
                              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="faq-text">Credit cards<br>Debit cards<br>Digital wallets<br>Direct debit<br>Bank transfer</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Is buying on-line safe?
                                </button>
                              </h2>
                              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p class="faq-text">Yes, Absolutely</p>
                                </div>
                              </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- faq-area area end here  -->
        <?php 
include './footer.php'
?>