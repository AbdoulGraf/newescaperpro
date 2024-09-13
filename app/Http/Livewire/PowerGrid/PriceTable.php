<?php

namespace App\Http\Livewire\PowerGrid;

use App\Models\Place;
use App\Models\Price;
use App\Models\Reservation;
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
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};

final class PriceTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public bool $multiSort = true;
    public int $perPage = 30;
    public array $perPageValues = [30, 50, 100];


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
            Exportable::make('Black Out Price List')
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
     * @return Builder<Price>
     */
    public function datasource(): Builder
    {
        return Price::query();
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
            'rooms' => [
                'title'
            ],
            'places' => [
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
            ->addColumn('player')
            ->addColumn('player_lower', fn (Price $model) => strtolower(e($model->player)))

            ->addColumn('price')

            ->addColumn('place_id',  fn (Price $model) => $model->place_id)
            ->addColumn('place_name',fn (Price $model) => $model->place->title)
            ->addColumn('room_id',   fn (Price $model) => $model->room_id)
            ->addColumn('room_name', fn (Price $model) => $model->room->title);
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
            Column::make('Place', 'place_name')->searchable(),
            Column::make('Room', 'room_name')->searchable(),
            Column::make('Player', 'player')->sortable()->searchable(),
            Column::make('Price', 'price')->sortable()->searchable(),

        ];
    }



    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('player')->operators(['contains']),
            Filter::inputText('price')->operators(['contains']),
            Filter::select('place_name', 'place_id')
                ->dataSource(Place::all())
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::select('room_name', 'room_id')
                ->dataSource(Room::all())
                ->optionValue('id')
                ->optionLabel('title'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Price Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', '<i class="fa-solid fa-pen fs-4 me-2"></i>')
                ->class('btn btn-color-warning btn-active-color-info ')
                ->target('_self')
                ->route('admin.prices.edit', ['id' => 'id']),

            Button::make('destroy', '<i class="fa-solid fa-trash fs-4 me-2"></i>')
                ->class('btn btn-color-danger btn-active-color-info')
                ->target('_self')
                ->route('admin.prices.destroy', ['id' => 'id'])
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
     * PowerGrid Price Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($price) => $price->id === 1)
                ->hide(),
        ];
    }
    */
}
