<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('message'))
{
    function message() {
        $CI =& get_instance();

        $message = $CI->message->viewMessage();

        if($message['type'] == 'error'){
            ?>
        <div class="viewMessage" style='background:red; width:100%; line-height: 35px; color: #fff; padding: 0 30px 0 20px; font-size: 14px; border-bottom: 1px solid #000;'>
            <div style="float:left;"><i class="glyphicon glyphicon-remove"></i> <?php echo $message['msg']; ?></div>
            <a href="#"><div style="float:right; color: #fff;" id="target"></div></a>
            
            <div style="clear:both;"></div>
        </div>
        <?php
        }
        if($message['type'] == 'success'){
            ?>
        <div class="viewMessage" style='background:green; width:100%; line-height: 35px; color: #fff; padding: 0 30px 0 20px; font-size: 14px; border-bottom: 1px solid #000;'>
            <div style="float:left;"><i class="glyphicon glyphicon-ok"></i> <?php echo $message['msg']; ?></div>
            <a href="#"><div style="float:right; color: #fff;" id="target"></div></a>
            
            <div style="clear:both;"></div>
        </div>
        <?php
        }
        ?>
        <script>
            $( "#target" ).click(function() {
                $(".viewMessage").css("display","none");
              });
        </script>
        <?php
    }
}


if ( ! function_exists('message_error'))
{
    function message_error($message) {
        $CI =& get_instance();

        $CI->message->error($message);
        
        return true;
    }
}


if ( ! function_exists('message_success'))
{
    function message_success($message) {
        $CI =& get_instance();

        $CI->message->success($message);
        
        return true;
    }
}