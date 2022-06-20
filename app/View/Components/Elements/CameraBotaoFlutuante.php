<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class CameraBotaoFlutuante extends Component
{
    public $operacao;
    public $retorno;
    public $icon;
    public $bg;
    public $posicao;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $operacao, string $retorno, ?string $icon = null,
                                ?string $bg = null, ?int $posicao = null)
    {
        $this->operacao = $operacao;
        $this->retorno = $retorno;
        $this->icon = $icon;
        $this->bg = $bg;
        $this->posicao = $posicao;
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
