<?php

namespace App;

enum Status: string
{
    case STARTED = 'started';
    case NOT_STARTED ='not_started';
    case FINISHED = 'finished';
    case CANCELED = 'canceled';

    public function getColor()
    {
        return $this->value;
    }

    public function getName()
    {
        return match ($this){
            self::STARTED => 'В работе',
            self::NOT_STARTED => 'Не начата',
            self::FINISHED => 'Завершена',
            self::CANCELED => 'Отменена'
        };
    }
}
