<?php


namespace Scrum;


class View
{
    public function display(string $template)
    {
        include $template;
    }
}
