<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Tag;

class SidebarComposer
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function compose(View $view)
    {
        $view->with('tags', $this->tag->all());
    }
}
