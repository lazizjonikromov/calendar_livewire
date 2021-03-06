<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calendar</title>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('animation-calendar/dist/simple-calendar.css') }}">
  <link rel="stylesheet" href="{{ asset('animation-calendar/assets/demo.css') }}">
</head>
<body>

<h1 class="title">Simple Calendar</h1>
<div id="container" class="calendar-container"></div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="{{ asset('animation-calendar/dist/jquery.simple-calendar.js') }}"></script>
<script>
  var $calendar;
//   var data =   @this.events;

  $(document).ready(function () {
    let container = $("#container").simpleCalendar({
      fixedStartDay: 0, // begin weeks by sunday
      disableEmptyDetails: true,

        // eventLimit: true, // allow "more" link when too many events


        // events: JSON.parse(data),




    //   events: [{
    //             startDate: '2022-06-12',
    //             endDate: '2022-06-12',
    //             summary: 'Laziz'
    //         }],
      events: [
        // generate new event after tomorrow for one hour
        {
          startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
          endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
          summary: 'Visit of the Eiffel Tower'
        },
        // generate new event for yesterday at noon
        {
          startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
          endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
          summary: 'Restaurant'
        },
        // generate new event for the last two days
        {
          startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
          endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
          summary: 'Visit of the Louvre'
        }
      ],

    });
    $calendar = container.data('plugin_simpleCalendar')
  });
</script>
</body>
</html>
