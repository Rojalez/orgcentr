<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Select;
use App\Imports\ImportFromRMProfiline;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ImportFromExcel extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Импорт из excel файла';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $categories[$category->name] = $category->id;
        }


        Excel::import(new ImportFromRMProfiline($categories), $fields->file);

        return Action::message('Товары успешно импортированы!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            File::make('Выберите файл', 'file')->rules('required'),
            Select::make('Выберите поставщика', 'maker')->options([
                '1' => 'Первый',
            ])->rules('required'),
        ];
    }
}
