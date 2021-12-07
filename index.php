<?php include 'controller/insert.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="app/css/index.css">
        <script src="https://unpkg.com/vue@next"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script> 
    </head>
    <body>
        <img class="logo" src="app/images/Union.png" alt="pineapple logo">
        <img class="logo_name" src="app/images/pineapple..png" alt="pineapple name">
        <div class="nav">
            <a href="#" class="about">About</a>
            <a href="#" class="work">How it works</a>
            <a href="#" class="contact">Contact</a>
        </div>
        <div class="image">
            <img src="app/images/image_summer.png">
        </div>
        
        <div id="app">
            <div class="content <?php 
                                    echo !empty($error) ? 'contentStyle' : ''; 
                                    echo $success ? "contentHide contentSuc" : '';
                                ?>" 
            :class="{contentStyle: isError, contentHide: contentDisplay, contentSuc: onSuccess}">
                <h1 class="subHead">Subscribe to newsletter</h1>
                <p class="sub">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
                <form method="post" v-on:submit.prevent>
                    <input v-model="email" v-on:input="emailValid" type="email" name="email" placeholder="Type your email address here…"/>                   
                    <p class="error">
                        <?php 
                            echo $error;
                            if($terms_error){
                                if(!empty($error)){
                                    echo "<br>";
                                    echo "You must accept the terms and conditions";
                                }
                                else{
                                    echo "You must accept the terms and conditions";
                                }
                            } 
                        ?>
                    </p>              
                    <error v-if="reqError" err='Email address is required'></error>
                    <error v-if="regexError" err='Please provide a valid e-mail address'></error>
                    <error v-if="coRegexError" err='We are not accepting subscription from Colombia emails'></error>
                    <error v-if="checkError" :class="{checkStyle: errVisible, otherCheckStyle: coErrVisible}" err='You must accept the terms and conditions'></error>
                    <button v-on:click="buttonClick" :disabled="buttonDisable" :class="{disabledButtonStyle: buttonDisable}" type="submit" name="submit"><img src="app/icons/ic_arrow.png" alt="arrow"></button>
                    <input v-model="checked" v-on:change="checkbox" type="checkbox" id="check" name="check" checked/>
                    <label for="check">I agree to <a href="#">terms of service</a></label>
                </form>
                <success v-if="success"></success>
                <div class="success" style="display: <?php echo $success ? 'block' : 'none'; ?>;">
                    <img src="app/icons/ic_success.png" alt="trophy"/>
                    <h1>Thanks for subscribing!</h1>
                    <p>You have successfully subscribed to our email listing. Check your email for the discount code.</p>
                </div>
                <div class="hr"></div>
                <div class="soc_icons">
                    <a href="#">
                        <div class="facebook">
                            <img src="app/icons/ic_facebook.png" alt="facebook icon"/>
                        </div>
                    </a>
                    <a href="#">
                        <div class="instagram">
                            <img src="app/icons/ic_instagram.png" alt="instagram icon"/>
                        </div>
                    </a>
                    <a href="#">
                        <div class="twitter">
                            <img src="app/icons/ic_twitter.png" alt="twitter icon"/>
                        </div>
                    </a>
                    <a href="#">
                        <div class="youtube">
                            <img src="app/icons/ic_youtube.png" alt="youutube icon"/>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <script src="app.js"></script>
    </body>
</html>