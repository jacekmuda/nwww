<?php
namespace AkcjaDemokracja;

class Campaign
{

    use Assets;

    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function is_parent()
    {

    }

    public function get_child_campaigns()
    {

    }

    public function get_actions()
    {

    }

    public function get_parent_campaigns()
    {

    }

}