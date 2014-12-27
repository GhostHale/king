<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Author      : Evii
 * CreateTime  : 14-5-3 下午12:26
 * Email       : i@evii.me
 * Description :
 */
class Captcha_code
{
    /*默认参数*/
    private $width = 120;
    private $height = 40;
    private $length = 6;         //验证码位数
    private $name = 'evii';     //session 的name

    public function __construct($conf = "")
    {
        if ($conf != "") {
            foreach ($conf as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    //显示图片
    public function show()
    {

        /*初始化*/
        $width   = $this->width;
        $height  = $this->height;
        $length  = $this->length;
        $name    = $this->name;

        /*字体文件*/
        $font = FCPATH . '/font/monofont.ttf';

        session_start();

        /*验证码中的字符*/
        $possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
        $random_dots = 10;
        $random_lines = 30;
        $captcha_text_color = "0x142864";
        $captcha_noice_color = "0x142864";

        $code = '';

        $i = 0;
        while ($i < $length) {
            $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1);
            $i++;
        }


        $font_size = $height * 0.75;
        $image = @imagecreate($width, $height);


        /* 设置背景色 */
        $background_color = imagecolorallocate($image, 255, 255, 255);

        $arr_text_color = $this->hexrgb($captcha_text_color);
        $text_color = imagecolorallocate($image, $arr_text_color['red'],
            $arr_text_color['green'], $arr_text_color['blue']);

        $arr_noice_color = $this->hexrgb($captcha_noice_color);
        $image_noise_color = imagecolorallocate($image, $arr_noice_color['red'],
            $arr_noice_color['green'], $arr_noice_color['blue']);


        /* 产生干扰点 */
        for ($i = 0; $i < $random_dots; $i++) {
            imagefilledellipse($image, mt_rand(0, $width),
                mt_rand(0, $height), 2, 3, $image_noise_color);
        }


        /* 干扰线 */
        for ($i = 0; $i < $random_lines; $i++) {
            imageline($image, mt_rand(0, $width), mt_rand(0, $height),
                mt_rand(0, $width), mt_rand(0, $height), $image_noise_color);
        }


        /* 把验证码显示在图片上 */
        $textbox = imagettfbbox($font_size, 0, $font, $code);
        $x = ($width - $textbox[4]) / 2;
        $y = ($height - $textbox[5]) / 2;
        imagettftext($image, $font_size, 0, $x, $y, $text_color, $font, $code);


        /* 输出图片 */
        Header('Content-Type: image/jpeg'); // 定义图片类型
        Imagejpeg($image); //显示图片
        Imagedestroy($image); //销毁图片
        $_SESSION[$name] = $code;

    }


    public function hexrgb($hexstr)
    {
        $int = hexdec($hexstr);

        return array("red" => 0xFF & ($int >> 0x10),
            "green" => 0xFF & ($int >> 0x8),
            "blue" => 0xFF & $int);
    }


}