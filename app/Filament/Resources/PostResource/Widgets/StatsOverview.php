<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Posts', Post::count())
                ->description(Post::published()->count()." Published")
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Categories', Category::count()),
            Card::make('Tags', Tag::count()),
        ];
    }
}
