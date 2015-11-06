<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Registration form</title>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 15px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <h1>Companies!</h1>

            <div id="body">
                <p><?php echo validation_errors() ?></p>

                <section class="projects-page-section">
                    <div class="container">
                        <div class="col-md-8 project-box iso-call">
                            <div class="moving_steps" >

                                <form class="contact-form" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Company name</label>
                                            <input type="text" placeholder="Company Name" name="name" value="<?php echo set_value('name') ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label> Upload company logo (Optional)</label>
                                            <input type="file" name="logo" value="<?php echo set_value('logo') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Address </label>
                                            <input type="text" placeholder="Address" name="address" value="<?php echo set_value('address') ?>">
                                        </div>

                                        <div class="col-md-5">
                                            <label>City</label>
                                            <select>
                                                <option value="<?php echo set_value('city') ?>"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>State </label>
                                            <input type="text" placeholder="State" name="state" value="<?php echo set_value('state') ?>">
                                        </div>

                                        <div class="col-md-5">
                                            <label>Zip code </label>
                                            <input type="Text" placeholder="Zip code" name="zipcode" value="<?php echo set_value('zipcode') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Website </label>
                                            <input type="text" placeholder="Website"name="website" value="<?php echo set_value('website') ?>">
                                        </div>

                                        <div class="col-md-5">
                                            <label>Account email </label>
                                            <input type="Text" placeholder="Account email " name="account_email" value="<?php echo set_value('account_email') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Quote email  </label>
                                            <input type="text" placeholder="Quote email " name="quote_email" value="<?php echo set_value('quote_email') ?>">
                                        </div>

                                        <div class="col-md-5">
                                            <label>Fax (Optional) </label>
                                            <input type="Text" placeholder="Fax" name="fax" value="<?php echo set_value('fax') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-12">Toll Free number (Optional) – Can add up to 3 number </label><br>

                                        <div class="col-md-3">
                                            <input type="text" placeholder="Toll Free number " name="toll_free1" value="<?php echo set_value('toll_free1') ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="Toll Free number " name="toll_free2" value="<?php echo set_value('toll_free2') ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="Toll Free number " name="toll_free3" value="<?php echo set_value('toll_free3') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-12"> Phone – Can add up to 3 number</label><br>

                                        <div class="col-md-3">
                                            <input type="text" placeholder="Phone"  name="phone1" value="<?php echo set_value('phone1') ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="Phone" name="phone2" value="<?php echo set_value('phone2') ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="Phone" name="phone3" value="<?php echo set_value('phone3') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Moving also(optional)</label><br>
                                            <div class="col-md-3 choose_option">
                                                <input type="checkbox">Local Moving
                                            </div>

                                            <div class="col-md-3 choose_option">
                                                <input type="checkbox">Long Distance Moving
                                            </div>

                                            <div class="col-md-3 choose_option">
                                                <input type="checkbox">Commercial Moving
                                            </div>

                                            <div class="col-md-3 choose_option">
                                                <input type="checkbox">Storage
                                            </div>
                                        </div>	
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Secrete question  </label>
                                            <select class="form-control">
                                                <option value="<?php echo set_value('secrete_question_id') ?>">Select Question</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <label>Answer</label>
                                            <input type="Text" placeholder="Answer" name="answer" value="<?php echo set_value('answer') ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password ">
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-4">
                                            <label>Config Password</label>
                                            <input type="password" placeholder="Password ">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="submit" id="submit_contact" name="submit" value="Register" class="new_submit">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>


            </div>

        </div>

    </body>
</html>