<?php

namespace App\View\Components\Entregadores;

use Illuminate\View\Component;

class BotoesHeaderEntregador extends Component
{
    public string $categoria;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $btnColetas = 'btn-primary';
        $btnEntregas = 'btn-neutral';

        if ($this->categoria == 'entregas') {
            $btnEntregas = 'btn-primary';
            $btnColetas = 'btn-neutral';
        }

        return view('components.entregadores.botoes-header-entregador', compact('btnColetas', 'btnEntregas'));
    }
}
