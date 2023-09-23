<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Blog;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        return [
            'blog_categories' => Blog::latest()->get(),
        ];

    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Welcome to Xelnitor';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Your Gateway to the Future of Crypto Trending and Earnings';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('dashboard.welcome_screen.index'),
        ];
    }
}
