<?php

namespace App\Orchid\Screens;

use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class FilterExample extends Screen
{
    const PER_PAGE = 30;

    /**
     * @return array
     */
    public function query(): iterable
    {
        return [
            'table' => User::filters([])
                ->defaultSort('id', 'desc')
                ->paginate(self::PER_PAGE),
        ];
    }

    /**
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Example';
    }

    /**
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('table', [

                TD::make('id', 'ID')
                    ->render(fn(User $user) => $user->id)
                    ->filter(Input::make())
                    ->sort(),

                TD::make('is_private', 'Private')
                    ->filter(Select::make()
                        ->empty()
                        ->options([
                            'yes' => 'Yes',
                            'no' => 'No',
                        ])
                    )
                    ->render(fn(User $user) => $user->is_private ? 'Yes' : 'No'),

                TD::make('show', 'Show')
                    ->filter(Select::make()
                        ->empty()
                        ->options([
                            'yes' => 'Yes',
                            'no' => 'No',
                        ]))
                    ->render(fn(User $user) => $user->show ? 'Yes' : 'No'),

            ]),
        ];
    }
}
