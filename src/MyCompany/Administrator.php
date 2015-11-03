<?php


namespace MyCompany;


class Administrator extends Member
{

    public function createUser()
    {
        return "{$this->getFullName()} can create an User</br>";
    }

    public function deleteUser()
    {
        return "{$this->getFullName()} can delete an User</br>";
    }

    public function setRights()
    {
        return "{$this->getFullName()} can set rights for Users</br>";
    }

    public function __toString()
    {
        $str = parent::__toString();
        $str .= 'My rights: ' . "<ul>";
        $str .= "<li>" . $this->createUser() . "</li>";
        $str .= "<li>" . $this->deleteUser() . "</li>";
        $str .= "<li>" . $this->setRights() . "</li></ul>";

        return $str;
    }

}
