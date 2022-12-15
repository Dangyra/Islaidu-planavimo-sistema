@extends('layouts.header')

@section('content')

<h3 class="page-title">Kalendorius</h3>
<div class="card">
    <div class="card-header">
        Pajamų kalendorius
    </div>

    <div class="card-body">
        <form action="{{ route('calendar.incomesCalendar') }}" method="GET">
            Pajamos:
            <select name="income_id">
                <option value="">-- visos pajamos --</option>
                @foreach($incomes as $income)
                    <option value="{{ $income->id }}"
                            @if (request('id') == $income->id) selected @endif>{{ $income->income_title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filtruoti</button>
        </form>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'></div>


    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            incomes={!! json_encode($incomes) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                incomes: incomes,
            })
        });
</script>
@stop