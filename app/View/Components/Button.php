<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * available color
     * ['primary', 'secondary', 'default', 'warning', 'info', 'success', 'danger']
     */
    public $color;

    /**
     * If true change with route name or url
     */
    public $route;

    /**
     * String Icon
     */
    public $icon;

    /**
     * String title
     */
    public $title;


    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'primary', $route = '', $icon = '', $title = 'Unkown Title', $type = 'button')
    {
        $this->color = $color;
        $this->route = $route;
        $this->icon = $icon;
        $this->title = $title;
        $this->type = $type;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
