<?php

namespace MyCompany;

class User extends Member
{


    public function readTasks()
    {
        return "{$this->getFullName()} can read their Tasks</br>";
    }

    public function sendFeedback()
    {
        return "{$this->getFullName()} can send a Feedback for Administrators</br>";
    }

    public function __toString()
    {
        $str = parent::__toString();
        $str .= 'My rights: ' . "<ul>";
        $str .= "<li>" . $this->readTasks() . "</li>";
        $str .= "<li>" . $this->sendFeedback() . "</li></ul>";

        return $str;
    }

}
