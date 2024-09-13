<?php

namespace App\Http\Livewire\PowerGrid;

use App\Models\Place;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use NumberFormatter;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};

final class AbudhabiReservationTable extends PowerGridComponent
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
            Exportable::make('Black Out Reservation List')
                ->csvSeparator('|')->csvDelimiter("'")
                ->striped('#A6ACCD')->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make() ->showPerPage($this->perPage, $this->perPageValues)->showRecordCount(),
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
     * @return Builder<\App\Models\Reservation>
     */
    public function datasource(): Builder
    {
        return Reservation::query()
            ->where('place_id', 2)
            ->where('reservation_date', \Carbon\Carbon::today());
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
        $fmt = new NumberFormatter('uk_UK', NumberFormatter::CURRENCY);
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('status', fn (Reservation $model) => $model->status)

            ->addColumn('place_id', fn (Reservation $model) => $model->place_id)
            ->addColumn('place_name', fn (Reservation $model) => strtoupper($model->place->title))

            ->addColumn('room_id', fn (Reservation $model) => $model->room_id)
            ->addColumn('room_name', fn (Reservation $model) => strtoupper($model->room->title))

            ->addColumn('hour_id', fn (Reservation $model) => $model->hour_id)
            ->addColumn('hours', fn (Reservation $model) => strtoupper($model->hour->start->format("H:i") . " / " . $model->hour->end->format("H:i")))


            ->addColumn('client_fullname', fn (Reservation $model) => $model->clientInfo->fullname ?? 'N/A')
            ->addColumn('client_email', fn (Reservation $model) => strtolower($model->clientInfo->email ?? 'N/A'))
            ->addColumn('client_phone', fn (Reservation $model) => $model->clientInfo->phone ?? 'N/A' )

            ->addColumn('payment_info_id', fn (Reservation $model) => $model->paymentInfo->id ??  "WebSite")
            ->addColumn('reservation_date', fn (Reservation $model) => $model->reservation_date)
            ->addColumn('reservation_date_formatted', fn (Reservation $model) => Carbon::parse($model->reservation_date)->format('Y-m-d'))

            ->addColumn('players')
            ->addColumn('price_calculated', fn (Reservation $model) => $fmt->formatCurrency(($model->price::where(['place_id' => $model->place_id, 'room_id' => $model->room_id, 'player' => $model->players])->get('price')[0]->price * $model->players), "AED") )

            /** Example of custom column using a closure **/
            ->addColumn('players_lower', fn (Reservation $model) => strtolower(e($model->players)))

            ->addColumn('payment_method', fn (Reservation $model) => ($model->payment_method == 1) ? "Upon Arrival" : "Online")
            ->addColumn('promotion_code')
            ->addColumn('discount')
            ->addColumn('comment', fn (Reservation $model) => Str::words(e($model->description), 10));
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

            Column::make('Room', 'room_name'),
            Column::make('Reservation', 'reservation_date_formatted','reservation_date')->sortable(),
            Column::make('Hour', 'hours')->headerAttribute('text-center'),
            Column::make('Players', 'players')->sortable(),
            Column::make('Fullname', 'client_fullname')->headerAttribute('text-center'),
            Column::make('Email', 'client_email')->hidden(true, false)->headerAttribute('text-center'),
            Column::make('Phone', 'client_phone')->hidden(true, false)->headerAttribute('text-center'),
            Column::add()->title('Price')->field('price_calculated')->headerAttribute('text-center'),

            Column::make('Payment Info', 'payment_info_id')->hidden(true, false)->headerAttribute('text-center'),
            Column::make('Payment method', 'payment_method')->hidden(true, false)->sortable()->searchable()->visibleInExport(true),

            Column::make('Promotion code', 'promotion_code')->hidden(true, false)->sortable()->searchable()->visibleInExport(true),
            Column::make('Discount', 'discount')->hidden(true, false)->sortable()->searchable()->visibleInExport(true),
            Column::make('Comment', 'comment')->hidden(true, false)->sortable()->searchable()->visibleInExport(true),

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
            Filter::boolean('status'),
//            Filter::datepicker('reservation_date'),

            Filter::select('place_name', 'place_id')
                ->dataSource(Place::where("id", 2)->get())
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::select('room_name', 'room_id')
                ->dataSource(Room::where("place_id", 2)->get())
                ->optionValue('id')
                ->optionLabel('title'),

            Filter::inputText('promotion_code')->operators(['contains']),
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
     * PowerGrid Reservation Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('edit', '<i class="fa-solid fa-pen fs-4 me-2"></i>')
                ->class('btn btn-color-warning btn-active-color-info ')
                ->target('_self')
                ->route('admin.reservations.edit', ['reservation' => 'id']),

            Button::make('destroy', '<i class="fa-solid fa-trash fs-4 me-2"></i>')
                ->class('btn btn-color-danger btn-active-color-info')
                ->target('_self')
                ->route('admin.reservations.destroy', ['reservation' => 'id'])
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
     * PowerGrid Reservation Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [
           Rule::button('delete')->when(fn ($reservation) => $reservation->trashed() == true)->hide(),
           Rule::button('edit')->when(fn($reservation) => $reservation->id !== null)->setAttribute('data-id', 7),
        ];
    }

}
