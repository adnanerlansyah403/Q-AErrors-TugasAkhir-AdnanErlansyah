<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * The alert message.
     *
     * @var string
     */
    public $icon;

    /**
     * The alert message.
     *
     * @var string
     */
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = "", $message = null, $icon = "", $status = "")
    {
        $this->type = $type;
        $this->message = $message;
        $this->icon = $icon;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
