<?php

namespace MyCompany;

interface MembersInterface
{

    public function getFullName();

    public function setFullName($firstName, $lastName);

    public function getGroup();

    public function setGroup($group);
}
