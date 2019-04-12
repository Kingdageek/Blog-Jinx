<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Settings;
use App\Category;
use App\Http\Controllers\FrontendController;

class FrontendComposer
{
    private $category;
    private $settings;

    public function __construct(Category $category, Settings $settings)
    {
        $this->category = $category;
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
