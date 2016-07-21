<?php
/**
 * Base - Basic helper class
 * @author hashem <hashemm364@gmail.com>
 *
 */
class Base {
    /**
     * pre - Get array and display into pre tag
     * 
     * @param array $array
     */
    public static function pre($array) 
    {
        echo '<pre>'. print_r($array, true) .'</pre>'.PHP_EOL;
        exit;
    }

    /**
     * basePath
     * @return string Return phisical path root website 
     */
    public static function basePath()
    {
        return str_replace('\\', '/', dirname(dirname(dirname(__FILE__))));
    }

    /**
     * Return url base website
     * @return string $baseUrl 
     */
    public static function baseUrl(){
            return Loader::load('Configs')->baseUrl;
    }

    /**
     * @return string $UrlCss Return url css directory
     */
    public static function baseUrlCss()
    {
        return Loader::load('Configs')->baseUrlCss;
    }

    /**
     * @return string $UrlImgs Return url Images directory
     */
    public static function baseUrlImgs(){
            return Loader::load('Configs')->baseUrlImgs;
    }

    /**
     * @return string $UrlJS Return url Java Scripts directory
     */
    public static function baseUrlJs(){
            return Loader::load('Configs')->baseUrlJs;
    }

    /**
     * Display Errors messages
     * @param array $errors Get errors and display
     */
    public static function errors($errors){
            if(!empty($errors)){
                    echo '<ul class="alert-error" style="padding:10px;list-style-position:inside">'.PHP_EOL;
                            foreach ($errors as $error){
                                    echo '<li>'.$error.'</li>'.PHP_EOL;
                            }
                    echo '</ul>'.PHP_EOL;
            }
    }

    /**
     * Display Success messages
     * @param string $msg
     */
    public static function success($msg){
            echo '<p class="alert-success bg-success" style="padding:10px;list-style-position:inside">'.$msg.'</p>';
    }

    /**
     * Display Success messages
     * @param string $msg
     */
    public static function error($msg){
            echo '<p class="alert-danger bg-danger" style="padding:10px;list-style-position:inside">'.$msg.'</p>';
    }

    /**
     * Redirect to another url
     * @param string $url
     */
    public static function redirect($url){
            $baseUrl = Base::baseUrl();
            return header("location:{$baseUrl}{$url}");
    }

    /**
     * Display Captcha image
     * @return string Image captcha
     */
    public static function captcha(){
            $rainCaptcha = new RainCaptcha();
            $img = '<img id="captchaImage" src="'.$rainCaptcha->getImage().'" />
                            <button class="btn btn-danger" onclick="document.getElementById(\'captchaImage\').src = \'http://raincaptcha.driversworld.us/api/v1/image/153f675f3c69b1e7d39b69c0a77c8173?rand503559&morerandom=\' + Math.floor(Math.random() * 10000);" type="button">
                            <span class="glyphicon glyphicon-repeat" aria-hidden="true">تازه کردن</span></button>';
            return $img;
    }
    /**
     * Check captcha code entered in the form by user
     * @param string $captcha
     * @return boolean true|false
     */
    public static function captchaCheck($captcha){
            $rainCaptcha = new RainCaptcha();
            if($rainCaptcha->checkAnswer($captcha)){
                    return true;
            } else {
                    return false;
            }

    }
}