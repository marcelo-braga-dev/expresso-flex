<?php

namespace App\View\Components\Elements\Pacotes;

use Illuminate\View\Component;

class Items extends Component
{
    public $pacotes;
    public $link;

    public function __construct($pacotes, $link)
    {
        $this->pacotes = json_decode($pacotes) ;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.elements.pacotes.items');
    }
}
