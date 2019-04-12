<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Settings;
use App\Category;
use App\Http\Controllers\FrontendController;

class FrontendComposer
{
    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function compose(View $view)
    {
        $frontend = new FrontendController();
        $view->with([
            'settings' => $this->settings->first(),
            'categories' => $frontend->sortCategories()
        ]);
    }
}
