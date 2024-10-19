<form name="form1" method="post" id="register1" enctype="multipart/form-data" onsubmit="return false">
      <div id="step1" class="step-1 step-content" data-step="1">
            <div class="container-fluid">
                  <div class="form">
                        <div class="">
                              <li><i class="ico ico-phone-android"></i>
                                    <input type="text" class="w310" name="useracc" id="useracc2" placeholder="<?php echo $lang['Cellphone'] ?>" maxlength="12" onchange="check_user()" onblur="detect_useracc(this.value);">
                              </li>
                              <input type="hidden" id="step_info" value="1" />
                              <div class="btn-flex">
                                    <button type="button" class="js-modal-next btn-next btn register-register" id="next_btn" name="next" data-step="2">
                                          <?php echo $lang['Next'] != '' ? $lang['Next'] : 'Next' ?>
                                    </button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div id="step2" class="step-2 step-content" data-step="2" style="display: none">
            <div class="container-fluid">
                  <div class="row justify-content-center">
                        <div class="form">
                              <li><i class="ico ico-password"></i>
                                    <input type="password" id="passwd" name="passwd" placeholder="<?php echo $lang['Password'] ?>" onblur="detect_passwd(this.value);" />
                              </li>
                              <div id="check_passwd" class="err_div"></div>
                              <li><i class="ico ico-password"></i>
                                    <input type="password" id="repasswd" name="repasswd" placeholder="<?php echo $lang['Confirm Password'] ?>" />
                              </li>
                              <div class="btn-flex">
                                    <input type="hidden" name="referrall_id" value="<?php echo $ref_name; ?>">
                                    <input type="hidden" name="regis_step" value="1">
                                    <button type="button" class="js-modal-next btn-next btn gradient" id="next_btn2" data-step="">
                                          <?php echo $lang['Back'] != '' ? $lang['Back'] : 'Back' ?>
                                    </button>
                                    <button type="button" class="js-modal-next btn-next btn register-register" id="next_btn1" data-step="3">
                                          <?php echo $lang['Next'] != '' ? $lang['Next'] : 'Next' ?>
                                    </button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div id="step3" class="step-3 step-content" data-step="3" style="display: none">
            <div class="container-fluid">
                  <div class="row">
                        <div class="form">
                              <div class="d-none fade--effect reg-bank-detail-wrapper" style="display:none;">
                                    <div class="col-2 px-1 col-sm-f px-sm-2">
                                          <img id="regSelectedBankLogo" data-src="" alt="ซี ไอ เอ็ม บี ไทย - CIMB" width="80px" height="80px" class="lazyload">
                                          <span id="regSelectedBankName"></span>
                                    </div>
                                    <li><i class="ico ico-bank"></i>
                                          <input type="text" id="bankaccount" name="bankaccount" placeholder="<?php echo $lang['Full Name'] != '' ? $lang['Full Name'] : 'Full Name' ?>" onblur="detect_bankacc(this.value);" />
                                    </li>
                                    <li><i class="ico ico-bank"></i>
                                          <input type="text" id="bankno" name="bankno" placeholder="<?php echo $lang['Bank NO'] ?>" onblur="detect_bankno(this.value)" />
                                    </li>
                                    <div id="check_bankaccno" class="err_div"></div>
                                    <div class="btn-flex">
                                          <button type="button" class="js-modal-next btn-next btn register-register" id="next_btn3" data-step="">
                                                <?php echo $lang['Back'] != '' ? $lang['Back'] : 'Back' ?>
                                          </button>
                                          <input type="hidden" id="bank" name="bank">
                                          <!-- <button type="button" name="save" class="btn register-register" onclick="return Check_Field_User(document.getElementById('register'));"><?php echo $lang['Submit'] ?></button>                                            -->
                                          <button id='btn-re-re' type="button" class="js-modal-next btn-next btn register-register" data-step="3" onclick="return Check_Field_User(document.form1,event);">
                                                <?php echo $lang['REGISTER'] != '' ? $lang['REGISTER'] : 'REGISTER' ?>
                                          </button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</form>