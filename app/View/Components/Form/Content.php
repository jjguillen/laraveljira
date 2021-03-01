<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Content extends Component
{
    public $routeForCancel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeForCancel)
    {
        $this->routeForCancel = $routeForCancel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.content');
    }
}
