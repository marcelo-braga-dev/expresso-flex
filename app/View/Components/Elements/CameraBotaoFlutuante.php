<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class CameraBotaoFlutuante extends Component
{
    public $operacao;
    public $retorno;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $operacao, string $retorno)
    {
        $this->operacao = $operacao;
        $this->retorno = $retorno;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.camera-botao-flutuante');
    }
}
