@extends('app')

@section('section')

  <div class="row">
    <div class="col-sm-3"> </div>

      @foreach ($dow as $d)
        <div class="col-sm-1">
          {{$d}}
        </div>
      @endforeach
  </div>
  <hr/>

  <?php $counter = 0 ?>
  @for ($i=0; $i<7; $i++)

    <div class="row">
      <div class="col-sm-3">
      </div>
      @for ($j=0; $j<7; $j++)

        <div class="col-sm-1">
          {{ $khmerCalendars[$counter]->international_date }}
          {{ $khmerMonths[$khmerCalendars[$counter]->khmer_months_id-1]->name }}
          {{ $day[$khmerCalendars[$counter]->khmer_day-1] }}

          <?php $counter++ ?>
        </div>

      @endfor
    </div>
    <hr/>

  @endfor

@endsection
