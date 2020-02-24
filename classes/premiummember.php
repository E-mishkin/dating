<?php

class PremiumMember extends Member
{
    private $_inDoorInterests = array();
    private $_outDoorInterests = array();

    public function getIndoor()
    {
        return $this->_inDoorInterests;
    }

    public function setIndoor($_inDoorInterests)
    {
        $this->_inDoorInterests = $_inDoorInterests;
    }

    public function getOutdoor()
    {
        return $this->_outDoorInterests;
    }

    public function setOutdoor($_outDoorInterests)
    {
        $this->_outDoorInterests = $_outDoorInterests;
    }
}