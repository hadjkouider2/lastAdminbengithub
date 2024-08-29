<html>

<head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <?php
    require_once 'autoload.php';
    if (isset($_POST['ok'])) {
        $recaptcha = new \ReCaptcha\ReCaptcha("6LcApiUqAAAAAEACtCdFQ1THHsqt9i47lLjiGQR3");
        $gRecaptchaResponse = $_POST["g-recaptcha-response"];
        $resp = $recaptcha->setExpectedHostname('localhost')
            ->verify($gRecaptchaResponse, @$remoteIp);
        if ($resp->isSuccess()) {
            echo "Success ! ";
        } else {
            $errors = $resp->getErrorCodes();
            $errors0 = implode(',', $errors);
            echo  $errors0;
        }
    }
    ?>
    <form method="POST">
        <div class="g-recaptcha" data-sitekey="6LcApiUqAAAAAGqnIh_6Wae6UGUiHnTPA8MoOEIv"></div>
        <br />
        <input type="submit" name='ok' value="Submit">
    </form>
</body>

</html>