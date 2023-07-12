<?php

namespace App\Utilities;

class Constant
{
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;
    public static $user_level = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'client',
    ];
    const order_status_unfinished=0;
    const order_status_finish=1;

    public static $order_status =[
      self::order_status_unfinished=>'unfinished' ,
      self::order_status_finish=>'finish'
    ];


}
