<?php
    require_once 'views/header.php';
    require_once 'views/menu.php';
?>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <?php require_once 'views/ui_alert.php' ?>

            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Manage</p>
                <h1 class="display-6 mb-5">EVENTS</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="manage.php?menu=events" method="POST">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="event_title" name="Event_Title" placeholder="Event Title">
                                    <label for="event_title">*Title</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="event_start" name="Event_Start" placeholder="Starts On">
                                    <label for="event_start">*Starts on</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="event_end" name="Event_End" placeholder="Ends On">
                                    <label for="event_end">Ends on</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="event_location" name="Event_Location" placeholder="Event Location">
                                    <label for="event_location">*Location</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description" id="event_desc" name="Event_Desc" style="height: 200px"></textarea>
                                    <label for="event_desc">*Description</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="hidden" name="add" value="event" />
                                <button class="btn btn-primary py-3 px-5" type="submit">Add Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; padding-top: 50px;">
                <h3 class="display-6 mb-0">UPCOMING EVENTS</h3>
            </div>
            <?php
                require_once 'views/ui_events_carousel.php';
            ?>  
        </div>
    </div>
    <!-- Contact End -->

<?php
    require_once 'views/footer.php';
?>
