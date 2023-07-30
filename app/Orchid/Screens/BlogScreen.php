<?php

namespace App\Orchid\Screens;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class BlogScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Blog Posts';
    }

    public function description(): ?string
    {
        return 'Welcome to the Admin Blog Panel, you can create, manage, and publish engaging blog content';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Blog Post')
                ->modal('createblog')
                ->method('create')
                ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            Layout::table('blog', [
                TD::make('title'),
                TD::make('category'),
            ]),

            Layout::modal('createblog', Layout::rows([
                Input::make('title')
                    ->title('Name')
                    ->placeholder('Enter your post title')
                    ->help('The name of the blog post to be created.'),
                Select::make('user_id')
                    ->title('Writer')
                    ->fromModel(User::class,'email','id')
                    ->title('Author/ Writer')
                    ->help('Who is the author your category'),
                Select::make('category')
                    ->fromModel(BlogCategories::class,'category_name','id')
                    ->title('Category Name')
                    ->help('What is yous specific category for this blog'),
                Cropper::make('feature_images')
                    ->minCanvas(500)
                    ->maxWidth(1000)
                    ->maxHeight(800),
                SimpleMDE::make('content')
                    ->title('Blog Post')
                    ->popover('Write your blog post'),


            ]))->title('Create Blog')
                ->applyButton('Add Post')
                ->size(Modal::SIZE_LG),
        ];
    }


    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        $request->validate([
            'title' => 'required|max:255',
            'user_id' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required|max:255',
            'feature_image' => 'file',
        ]);

        $blogPost = new Blog();
        $blogPost->title = $request->title;
        $blogPost->user_id = $request->user_id;
        $blogPost->category = $request->category;
        $blogPost->content = $request->input('content');
        $blogPost->feature_images = $request->feature_image;
        $blogPost->save();
    }
}
