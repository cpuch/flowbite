<?php

namespace Cpuch\Flowbite\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $id;

    public $type;

    public $icon;

    public $border;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id = '', string $type = 'info', bool $icon = false, bool $border = false)
    {
        $this->id = $id;
        $this->type = $type;
        $this->icon = $icon;
        $this->border = $border;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('flowbite::components.alert');
    }
}
