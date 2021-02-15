<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body b-l calender-sidebar">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

<div id="fullCalModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        
                        <!-- content goes here -->
                        <form method="post" action="<?php echo e(route('reservation.store')); ?>" >
                            <?php echo csrf_field(); ?>
                            <input type="hidden" readonly class="form-control" name="stade" value="<?php echo e($stade); ?>" placeholder="Enter email">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Date evenemts</label>
                                <input type="date" readonly class="form-control" id="eventdate" name="date" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Heure</label>
                                <input type="number" readonly class="form-control" name="crenau" id="crenau" name="crenau" placeholder="Enter email">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">nom prénom</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Prix</label>
                                <input type="text" class="form-control" id="fullname" name="prix" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

     
<script>
        
! function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$calendar = $('#calendar'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#my-event'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function(eventObj, date) {
            var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
        },
        CalendarApp.prototype.enableDrag = function() {
            //init events
            $(this.$event).each(function() {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            });
        }
    /* Initializing */
    CalendarApp.prototype.init = function() {
            this.enableDrag();
            /*  Initialize the calendar  */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var form = '';
            var today = new Date($.now());
            var evts = <?php echo json_encode($reservations); ?>;

            var defaultEvents = [{
                    title: 'Meeting #3',
                    start: new Date($.now() + 506800000),
                    className: 'bg-info'
                }, {
                    title: 'Submission #1',
                    start: today,
                    end: today,
                    className: 'bg-danger'
                }, {
                    title: 'Meetup #6',
                    start: new Date($.now() + 848000000),
                    className: 'bg-info'
                }, {
                    title: 'Seminar #4',
                    start: new Date($.now() - 1099000000),
                    end: new Date($.now() - 919000000),
                    className: 'bg-warning'
                }, {
                    title: 'Event Conf.',
                    start: new Date($.now() - 1199000000),
                    end: new Date($.now() - 1199000000),
                    className: 'bg-purple'
                }, {
                    title: 'Meeting #5',
                    start: new Date($.now() - 399000000),
                    end: new Date($.now() - 219000000),
                    className: 'bg-info'
                },
                {
                    title: 'Submission #2',
                    start: new Date($.now() + 868000000),
                    className: 'bg-danger'
                }, {
                    title: 'Seminar #5',
                    start: new Date($.now() + 348000000),
                    className: 'bg-success'
                }
            ];
            console.log(defaultEvents)

            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                slotDuration: '01:00:00',
                /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '19:00:00',
                defaultView: 'agendaWeek',
                handleWindowResize: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay'
                },
                events: defaultEvents,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                drop: function(date) { $this.onDrop($(this), date); },
                select: function(start, end, allDay) { 
                    console.log(start._i)
                    var month = parseInt(start._i[1]+1)
                    var crenau = parseInt(start._i[3])
                    
                    var day = start._i[2]
                    
                    if(month<10){
                        month ='0'+month
                    }

                    if(day<10){
                        day ='0'+day
                    }

                    var d = start._i[0]+'-'+month+'-'+day;      
                    console.log(start)              
                    console.log(d)              
                    $('#eventdate').val(d)
                    $('#crenau').val(crenau)

                    $('#fullCalModal').modal();
                 },
                eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

            });
            
        },

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
$(window).on('load', function() {

    $.CalendarApp.init()
});


        
        
        
        
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>