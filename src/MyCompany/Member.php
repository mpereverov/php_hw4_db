<?php

namespace MyCompany;

class Member implements MembersInterface
{
    protected $firstName;
    protected $lastName;
    protected $group;

    public function __construct($firstName, $lastName)
    {
        $this->setFullName($firstName, $lastName);
    }

    public function setFullName($firstName, $lastName)
    {
        if (is_string($firstName) && is_string($lastName))
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }
    }

    public function getFullName()
    {
        return "$this->firstName $this->lastName";
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }

    public function __toString()
    {
        $str = '';
        $str .= 'Full Name: ' . $this->getFullName() . "</br>";
        $str .= 'Group: ' . $this->getGroup() . "</br>";

        return $str;
    }

}
