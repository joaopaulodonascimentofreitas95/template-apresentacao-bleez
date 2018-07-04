<?php
/**
 * Created by PhpStorm.
 * User: João Paulo do Nascimento Freitas
 * Date: 04/07/2018
 * Time: 17:50
 */
namespace Source\Helper;

class Trigger {

    public function notify($title, $color,$icon, $timer){
        return [
            'title' => $title,
            'color' => $color,
            'icon' => $icon,
            'timer' => $timer
        ];
    }

}