<!-- use this for popup-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<div id="boxes">
    <div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window">
        <div class="card card-modal">
            <i class="material-icons close-modal close agree">close</i>
            <h3 class="wizard-title"> Getting <span>Married</span> Soon? </h3>
            <p class="center-align">We will help you find the best wedding services in your city !</p>

            <ul class="tabs tt-a">
                <li class="tab col s6 m4 l4"><a href="#test1">Assistant</a></li>
                <li class="tab col s6 m4 l4"><a href="#test3">Your Details</a></li>
                <li class="tab col s6 m4 l4"><a href="#test4">Wedding Details</a></li>
            </ul>


            <div id="test1">
                <div class="row">
                    <div class="col S12 m6 l6">
                        <div class="rem-img">
                            <img src="assets/images/1.png" class="img-responsive" alt="Assistant">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <h4 class="info-text"> Need help with wedding <br> Planning vendor selection?
                        </h4>

                        <div class="button-group">
                            <label class="btn  btn-fill btn-danger btn-wd" for="yes"><i class="fa fa-check"></i>
                <span>Yes</span>
                <div class="ripple-container"></div>
              </label>
                            <input type="radio" id="yes" name="first_step" value="yes">
                            <label class=" btn btn-fill btn-danger btn-wd" for="no"><i class="fa fa-times"></i>
                <span>No</span></label>
                            <input type="radio" id="chat_bot_no" class="chat_bot_no" name="" value="no">
                        </div>

                        <ul class="center-align">
                            <li> Get assistance for vendor selection from Shaadibaraati.</li>
                            <li>Sit back and relax while we take care of the rest </li>
                            <li>Get wedding service quotation now</li>
                        </ul>


                    </div>
                </div>
            </div>

            <div id="test3">
                <h4 class="info-text-new">Fill your details to view our list of suggestions </h4>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <ul class="discrpt-pointer">
                            <li><i class="far fa-hand-pointer"></i>Help is just a click away</li>
                            <li><i class="far fa-file-alt"></i> Get quotations from top vendors in town </li>
                        </ul>
                    </div>
                    <div class="col s12 m6 l6">
                        <form ref="formss" @submit.prevent="formSubmits" id="contactForm" method="POST" action="#">
                            <div class="input-field col m6 s12 ">
                                <div class="form-group">
                                    <i class="material-icons prefix pp-c">person</i>
                                    <input type="text" v-model="popname" name="name" id="name" placeholder="Your Name*" name="name" aria-required="true" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <i class="material-icons prefix pp-c">phone</i>
                                    <input v-model="popphone" name="name" id="name" placeholder="Mobile No*" name="name" aria-required="true" class="form-control" required=""  type="number"    >
                                </div>
                                <div class="form-group">
                                    <i class="material-icons prefix pp-c">mail</i>
                                    <input type="email" v-model="popmail" name="name" id="name" placeholder="Your Email*" name="name" aria-required="true" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-next  btn-fill btn-danger btn-wd" for="yes"> NEXT </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

            <div id="test4">
                <h4 class="info-text-new"> Get customized list of suggestions according to your preference. </h4>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <ul class="discrpt-pointer">
                            <li><i class="fab fa-get-pocket"></i> Now best wedding services fit your pocket </li>
                            <li><i class="far fa-file-alt"></i> Provide your details to get best quotations </li>
                            <li><i class="far fa-envelope"></i> You enquire we provide. </li>
                        </ul>
                    </div>
                    <div class="col s12 m6 l6">
                         <div class="input-field mm-b file-box"><i class="fas fa-map-pin prefix mm-c"></i>
                            <select class="browser-default" name="chat_bot_city">
                            <option value="">Select City</option>
                            <option value="1">Agartala</option>
                            <option value="32">Agra</option>
                            <option value="15">Ahmedabad</option>
                            <option value="54">Ahmednagar</option>
                            <option value="25">Ajmer</option>
                            <option value="55">Akola</option>
                          </select>
                        </div>

                        <div class="input-field mm-b"><i class="far fa-heart prefix mm-c"></i>
                            <select class="browser-default" name="chat_bot_category" id="chat_bot_category">
                                <option value="">Select Services</option>
                                <option value="11">Makeup Artist</option>
                                <option value="5">Photographers</option>
                                <option value="8">Wedding Planners</option>
                                <option value="7">Caterers</option>
                                <option value="33">Mehndi Artist</option>
                                <option value="3">Venues</option>
                                <option value="36">Decorators</option>
                                <option value="2">Bands</option>
                                <option value="16">Honeymoon Packages</option>

                            </select>
                        </div>
                        <div class="input-field mm-b"><i class="far fa-money-bill-alt prefix mm-c"></i>
                            <select class="browser-default" name="chat_bot_budget" id="chat_bot_budget">
                <option value="">Select Budget</option>
                <option value="Upto Rs. 01 Lacs">Upto 01 Lacs</option>
                <option value="01 Lacs to 05 Lacs"> 01 Lacs to 05 Lacs</option>
                <option value="05 Lacs to 10 Lacs">05 Lacs to 10 Lacs</option>
                <option value="10 Lacs to 20 Lacs">10 Lacs to 20 Lacs</option>
                <option value="20 Lacs to 30 Lacs">20 Lacs to 30 Lacs</option>
                <option value="Above 30 Lacs">Above 30 Lacs</option>
                <option value="Above 50 Lacs">Above 50 Lacs</option>
                <option value="Above 01 Crore">Above 01 Crore</option>
              </select>
                        </div>
                        <div class="input-field mm-b "><i class="fas fa-calendar-alt prefix mm-c"></i>
                            <input name="chat_bot_service_date" id="chat_bot_service_date" type="text" placeholder="Service Date" class="datepicker alt-dat" readonly="">
                        </div>
                        <div class="input-field mm-b"><i class="far fa-comment prefix mm-c"></i>
                            <textarea class="materialize-textarea mm-t" rows="2" name="chat_bot_message" placeholder="Message" id="chat_bot_message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="main-bt">
                    <div class="but-cen">
                        <a class="left previous-color">previous</a>
                        <a class="right submit-color">submit</a>
                    </div>
                </div>
            </div>
            <ul class="wizard-hashtag hidden-xs">
                <li>#weddingpreparation</li>
                <li>#customerservice</li>
                <li>#weddingplanning</li>
                <li>#enquiry</li>
                <li>#service</li>
            </ul>
        </div>
        <!-- <div id="popupfoot"> <a href="http://webenlance.com/" class="">I agree</a></div> -->
    </div>
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>
<!-- use this for popup-->