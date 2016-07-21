<?php

class ExceptionHandler 
{

    public function render($message)
    {
        echo '<p style="text-align:center;margin-top:50px"><span style="background-color: #fdd; border: solid 1px #f00; border-radius: 5px; color: #f00; padding: 5px;">
'. $message .'</span><br /><br /><a href="' . Base::baseUrl() . '">Return</a></p>' . PHP_EOL;
    }

}

