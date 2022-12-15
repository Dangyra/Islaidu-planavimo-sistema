<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Incomes;
use Carbon\Carbon;

class IncomesCalendar extends Controller
{
    // public function expenseCalendar()
    // {
        

    //     return view('calendar.expenseCalendar');
    // }

    public $sources = [
        [
            'model'      => '\\App\\Models\\Incomes',
            'date_field' => 'start_time',
            'field'      => 'name',
            'prefix'     => 'Incomes',
            'suffix'     => '',
            'route'      => 'admin.events.edit',
        ],
        // [
        //     'model'      => '\\App\\Meeting',
        //     'date_field' => 'start_time',
        //     'field'      => 'attendees',
        //     'prefix'     => 'Meeting with',
        //     'suffix'     => '',
        //     'route'      => 'admin.meetings.edit',
        // ],
    ];

    public function incomesCalendar()
    {
        $incomes = [];

        $incomes =  Incomes::all();

        foreach ($this->sources as $source) {
            $calendarEvents = $source['model']::when(request('id') && $source['model'] == '\App\Models\Incomes', function($query) {
                return $query->where('id', request('id'));
            })->get();
            foreach ($calendarEvents as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('calendar.incomesCalendar', compact('incomes'));
    }
}