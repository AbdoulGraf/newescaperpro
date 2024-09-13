<?php

namespace App\Http\Livewire\PowerGrid;

use App\Models\Hour;
use App\Models\Place;
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

final class HoursTable extends PowerGridComponent
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
        return [
            Exportable::make('Black Out Hour List')
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
     * @return Builder<\App\Models\Hour>
     */
    public function datasource(): Builder
    {
        return Hour::query();
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
            ->addColumn('id')
            ->addColumn('place_id',  fn (Hour $model) => optional($model->room->place)->place_id)
            ->addColumn('place_name', fn (Hour $model) => optional($model->room->place)->title)
            ->addColumn('room_id',   fn (Hour $model) => $model->room->id)
            ->addColumn('room_name', fn (Hour $model) => $model->room->title)
            ->addColumn('hour_id', fn (Hour $model) => $model->id)
            ->addColumn('hours', fn (Hour $model) => $model->start->format('H:i') . strtolower($model->start_period) . " / " . $model->end->format('H:i') . strtolower($model->end_period));
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
            Column::make('Room', 'room_name')->searchable(),
            Column::make('Hours', 'hours')->searchable(),
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
     * PowerGrid Hour Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {

        return [

            Button::make('edit', '<i class="fa-solid fa-pen fs-4 me-2"></i>')
            ->class('btn btn-color-warning btn-active-color-info ')
            ->target('_self')
            ->route('admin.hours.edit', ['id' => 'id']),

        Button::make('destroy', '<i class="fa-solid fa-trash fs-4 me-2"></i>')
            ->class('btn btn-color-danger btn-active-color-info')
            ->target('_self')
            ->route('admin.hours.destroy', ['id' => 'id'])
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
     * PowerGrid Hour Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($hour) => $hour->id === 1)
                ->hide(),
        ];
    }
    */
}
