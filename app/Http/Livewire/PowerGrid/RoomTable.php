<?php

namespace App\Http\Livewire\PowerGrid;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\{
    Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};
use PowerComponents\LivewirePowerGrid\Rules\{RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class RoomTable extends PowerGridComponent
{
    use ActionButton;

    public bool $multiSort = true;
    public int $perPage = 10;
    public array $perPageValues = [10, 20];

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
//        $this->showCheckBox();

        return [
            Exportable::make('Black Out Reservation List')
                ->csvSeparator('|')
                ->csvDelimiter("'")
                ->striped('#A6ACCD')->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()
                ->showPerPage($this->perPage, $this->perPageValues)
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Room>
    */
    public function datasource(): Builder
    {
        return Room::query()
            ->join('places', 'rooms.place_id', '=', 'places.id')
            ->select('rooms.*', 'places.title as place');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            'place' => [
                'title'
            ],
            'room' => [
                'title'
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
//            ->addColumn('status')
            ->addColumn('order')
            ->addColumn('place_id')
            ->addColumn('title')
            ->addColumn('duration')
            ->addColumn('level')
            ->addColumn('person')

           /** Example of custom column using a closure **/
            ->addColumn('title_lower', function (Room $model) {
                return strtolower(e($model->title));
            })

            ->addColumn('slug')
            ->addColumn('description')
            ->addColumn('poster', fn (Room $model) => "<img src=".asset(e($model->poster ?? 'img/placeholder-poster.jpg'))." width='100'/>")
            ->addColumn('banner', fn (Room $model) => "<img src=".asset(e($model->banner ?? 'img/placeholder-banner.jpg'))." width='120'/>")
            ->addColumn('text_picture', fn (Room $model) => "<img src=".asset(e($model->text_picture ?? 'img/placeholder-text.jpg'))." width='120'/>");
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [

//            Column::make('STATUS', 'status')->toggleable(),

            Column::make('ORDER', 'order'),

            Column::make('PLACE NAME', 'place'),

            Column::make('TITLE', 'title')->sortable()->searchable(),
            Column::make('DURATION', 'duration')->sortable()->searchable(),
            Column::make('LEVEL', 'level')->sortable()->searchable(),
            Column::make('PERSON', 'person')->sortable()->searchable(),

            Column::make('SLUG', 'slug'),

            Column::make('DESCRIPTION', 'description')->hidden(),

            Column::make('POSTER', 'poster'),

            Column::make('BANNER', 'banner')->hidden(true, false),

            Column::make('TEXT PICTURE', 'text_picture')->hidden(true, false),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Room Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', '<i class="fa-solid fa-pen fs-4 me-2"></i>')
                ->class('btn btn-color-warning btn-active-color-info ')
                ->target('_self')
                ->route('admin.rooms.edit', ['room' => 'id']),

            Button::make('destroy', '<i class="fa-solid fa-trash fs-4 me-2"></i>')
                ->class('btn btn-color-danger btn-active-color-info')
                ->target('_self')
                ->route('admin.rooms.destroy', ['room' => 'id'])
                ->method('delete')
        ];
    }



    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Room Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($room) => $room->id === 1)
                ->hide(),
        ];
    }
    */
}
