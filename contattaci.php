<!DOCTYPE html>
<html lang="en">

    <?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    ?>

<body>
    <div id="all">
        <!-- start header -->
        <?php include 'header.php';?>
        <!-- end header -->

<div classe="row">
    
             <section id="main" class="clearfix">

                    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js'></script>
                    <script src='http://ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.validate.unobtrusive.min.js'></script>

                    <script type="text/javascript">
                    $(document).ready(function () {
                    $("#menu li a").removeClass("selected");
                    $("#contact").addClass("selected");
                    });
                    </script>
            <h1>Salve, inviaci un messaggio!!</h1>

            <div class="contact-form grid_6 clearfix">
                            <div class="grid_2 alpha">
                            <img src='/pizzeria2/img/banner2.jpg'  />
                            <p>
                            Scrivici due righe...
                            </p>
                            </div>
                    <div class="grid_4 omega">
                            <div class="editor-label">
                            <label for="Nome">Nome</label>
                            </div>
                            <div class="editor-field">
                            <input class="text-box single-line" data-val="true" data-val-required="The Nome field is required." id="Nome" name="Nome" type="text" value="" />
                            <br />
                            <span class="field-validation-valid" data-valmsg-for="Nome" data-valmsg-replace="true"></span>
                            </div>
                            <div class="editor-label">
                            <label for="Mail">Mail</label>
                            </div>
                            <div class="editor-field">
                            <input class="text-box single-line" data-val="true" data-val-regex="Inserire una mail valida" data-val-regex-pattern="^([\w\!\#$\%\&amp;\&#39;\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&amp;\&#39;\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-zA-Z0-9]{1}[a-zA-Z0-9\-]{0,62}[a-zA-Z0-9]{1})|[a-zA-Z])\.)+[a-zA-Z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$" data-val-required="The Mail field is required." id="Mail" name="Mail" type="text" value="" />
                            <br />
                            <span class="field-validation-valid" data-valmsg-for="Mail" data-valmsg-replace="true"></span>
                            </div>
                            <div class="editor-label">
                            <label for="Message">Message</label>
                            </div>
                            <div class="editor-field">
                            <textarea cols="20" data-val="true" data-val-required="The Message field is required." id="Message" name="Message" rows="2">
                            </textarea>
                            <br />
                            <span class="field-validation-valid" data-valmsg-for="Message" data-valmsg-replace="true"></span>
                            </div>
                    </div>
                    <div class="clearfix" style="margin-top:50px;"></div>
                    <div class="clearfix" style="margin-top:50px;">
                    <p>
                    <input type="submit" value="Invia Messaggio" />
                    </p>
                    </div>
                    </div>
            </section>
<?php include 'footer.php';?>
        
</div>

</body>
</html>
