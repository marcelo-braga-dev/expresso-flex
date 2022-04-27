<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $id;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $label, $id = null, $class = null)
    {
        //
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->id = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.input');
    }
}
