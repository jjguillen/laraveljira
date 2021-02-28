<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Row extends Component
{
    public $resourceId;
    public $resourceName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resourceId, $resourceName)
    {
        $this->resourceId = $resourceId;
        $this->resourceName = $resourceName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table.row');
    }
}
