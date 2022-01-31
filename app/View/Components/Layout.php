<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public ?string $menu;
    public ?string $submenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $menu = null, ?string $submenu = null)
    {
        $this->menu = $menu;
        $this->submenu = $submenu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        define('MENU', $this->menu);
        define('SUBMENU', $this->submenu);

        return view('components.layout');
    }
}
