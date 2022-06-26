<style>
    #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 10px;
        margin: 10px;
        width: 100%;
        height: 800px;
        border:2px solid black;
    }

    .fc .fc-daygrid-event-harness{
        position: absolute;
    }

    .fc-sticky{
        display: none;
    }

    .fc-event-title{
        display: none;
    }

    .fc-daygrid-event-harness a{
        border-radius: 0;
        height: 0px;
        width: 20px;

    }

    .fc-col-header {
        width: 500px;
    }

    .fc-scrollgrid-sync-table{
        width: 500px;
        height: 100px;
    }

    .fc-scrollgrid{
        width: 502px;
        height: 385px;
    }

    #calendar{
        width: 526px;
        height: 480px;
        margin: 0;
    }

    .fc .fc-daygrid-day-events{
        margin-top: 0 !important;
    }

    .fc-direction-ltr .fc-daygrid-event.fc-event-start{
        margin-left: 49px !important;
        /* margin-bottom: 20px !important; */
    }

    .fc-daygrid-event-dot{
        margin: 0 auto !important;
        width: 15px !important;
        border-color: #3f3f3f !important;
    }

    .fc-day-today{
        background: #4ad837 !important;
    }

</style>

<div>
  <div id='calendar-container' wire:ignore>
    <div id='calendar'></div>
  </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var data =   @this.events;
            var calendar = new Calendar(calendarEl, {
            events: JSON.parse(data),
            // events: [{
            //     title: '',
            //     start: '2022-06-12',
            //     color: '#9e9e9e',
            //     url: 'http://google.com/'
            // }],
            eventClick: function(event) {
                if (event.url) {
                //if you want to open url in the same tab
                location.href = "https://example.com";
                //if you want to open url in another window / tab, use the commented code below
                //window.open(event.url);
                return false;
                }
            },
            // dateClick(info)  {
            //    var title = prompt('Enter Event Title');
            //    var description = prompt('Enter Event Description');
            //    var date = new Date(info.dateStr + 'T00:00:00');
            //    if(title != null && title != '' && description != null && description != ''){
            //      calendar.addEvent({
            //         title: title,
            //         description: description,
            //         start: date,
            //         allDay: true
            //       });
            //      var eventAdd = {title: title,description: description,start: date};
            //      @this.addevent(eventAdd);
            //      alert('Great. Now, update your database...');
            //    }else{
            //     alert('Event Title or Description Is Required');
            //    }
            // },
            // editable: true,
            // selectable: true,
            displayEventTime: false,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
            loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e){
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            });
            calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
        });
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush
