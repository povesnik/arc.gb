<?php


namespace Framework\Command;


class RemoteControl
{
    public function submit(ICommand $command)
    {
        echo 'Некоторая бизнес-логика';

        $command->execute();
    }
}