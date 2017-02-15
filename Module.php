<?php

/**
 * Created by PhpStorm.
 * User: usver
 * Date: 26.01.2017
 * Time: 19:00
 */
date_default_timezone_set('Asia/Tbilisi');
define("SAVE_AREA", "test.txt");
define("COUNT_AREA", "myTime.txt");

class Module
{

    public $save_area;
    public $count_area;
    public $countTime;

    public function startTimer()
    {
        if (!file_exists(SAVE_AREA) || !file_exists(COUNT_AREA)) {
            file_put_contents(SAVE_AREA, time());
            file_put_contents(COUNT_AREA, 0);
            echo "Файл создан,модуль подготовлен, будьте добры проверить";
        } else {
            file_put_contents(SAVE_AREA, time());
            echo "Счётчик сброшен, начат отсчёт";
        }
    }

    public function stopTimer()
    {
        $this->save_area = file_get_contents(SAVE_AREA);
        $this->countTime = time() - (int)$this->save_area;
        if($this->countTime < 60){
            echo "С момента старта таймера прошло : " . $this->countTime . " секунд.</ br>";
        }else{
            echo "С момента старта таймера прошло : " . $this->countTime / 60 . " минут.</ br>";
        }
        $this->count_area = file_get_contents(COUNT_AREA);
        (int)$this->count_area += $this->countTime;
        echo "<br>Всего накопилось " . $this->count_area / 60 . " минут";
        file_put_contents(COUNT_AREA, $this->count_area);
        file_put_contents(SAVE_AREA, time());
    }


    public function statusTimer(){
        $this->save_area = file_get_contents(SAVE_AREA);
        $this->countTime = time() - $this->save_area;
        if($this->countTime < 60){
            echo "С момента старта таймера прошло : " . $this->countTime . " секунд.</ br>";
        }else{
            echo "С момента старта таймера прошло : " . $this->countTime / 60 . " минут.</ br>";
        }
        $this->count_area = file_get_contents(COUNT_AREA);
        echo "<br> Всего минут стажируюсь: ". $this->count_area / 60  . " минут.";
    }
}

