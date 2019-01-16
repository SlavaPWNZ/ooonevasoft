<?php

namespace App\MyClasses;

use App\Balance;

class MyClass
{
    public $TAXI_URL;
    public $TAXI_LOGIN;
    public $TAXI_PASSWORD;
    public $TAXI_COOKIE_FILE;
    public $TAXI_REGEXP;

    public function isAuth( $data ){
        return preg_match('/action=logout/',$data);
    }

    public function connect(){
        $ch = curl_init();
        $url = $this->TAXI_URL;
        curl_setopt($ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).$this->TAXI_COOKIE_FILE);
        curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).$this->TAXI_COOKIE_FILE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'action'=>'login',
            'login'=>$this->TAXI_LOGIN,
            'password'=>$this->TAXI_PASSWORD,
        ));
        $result=$this->isAuth($data = curl_exec($ch))?1:0;
        curl_close($ch);
        if ($result) return $data;
        return false;
    }

    public function getBalanceHTML($page){
        preg_match($this->TAXI_REGEXP,$page,$balance);
        return $balance[1];
    }

    public function main()
    {
        $page=$this->connect();
        if ($page) {
            $balanceHTML=$this->getBalanceHTML($page);
            if (Balance::saveBalanceTable($balanceHTML))
            {
                $last_balances=Balance::getBalanceTable();
                return view('testpage', ['last_balances' => $last_balances]);
            }
            echo 'Невозможно сохранить баланс.';
        }
        echo 'Невозможно авторизоваться на сайте. Неверные логин/пароль или сайт не отвечает.';
    }
}
