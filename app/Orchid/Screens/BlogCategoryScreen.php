<?php

namespace App\Orchid\Screens;

use App\Models\BlogCategories;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use function Symfony\Component\String\title;

class BlogCategoryScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'blog_categories' => BlogCategories::latest()->get(),
        ];
    }



    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Blog Categories';
    }


    public function description(): ?string
    {
        return 'You can create blog categories on this section';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Blog Category')
                ->modal('createblogcategory')
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
            Layout::table('blog_categories', [
                TD::make('category_name','Category Name'),
                TD::make('category_description', 'Category Description'),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (BlogCategories $blogcategories) {
                        return Button::make('Delete Categories')
                            ->confirm('After deleting, the task will be gone forever.')
                            ->method('delete', ['blogCategories' => $blogcategories->id]);
                    }),

            ]),

            Layout::modal('createblogcategory', Layout::rows([
                Input::make('category_name')
                    ->title('Category Name')
                    ->placeholder('Enter Category Name'),
                Input::make('category_description')
                    ->title('Description')
                    ->placeholder('Enter Category Name'),
                Select::make('status')->title('Status')->options([
                    'active' => 'Enabled',
                    'inactive' => 'Disabled'
                ])
            ]))->title('Create Blog Categories')
                ->applyButton('Add Blog Categories')
                ->size(Modal::SIZE_LG),

        ];
    }

    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        $request->validate([
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
        ]);

        $categoryBlog = new BlogCategories;
        $categoryBlog->category_name = $request->category_name;
        $categoryBlog->category_description  = $request->category_description;
        $categoryBlog->status = $request->status;
        $categoryBlog->save();
    }

    public function delete(BlogCategories $blogCategories)
    {
        $blogCategories->delete();
    }
}
