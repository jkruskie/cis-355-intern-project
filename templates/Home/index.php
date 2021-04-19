<?php $this->loadHelper('Authentication.Identity'); ?>


<!-- HEADER -->
<div style="margin-bottom: -1%;">
    <div class="column column-100 full-width">
        <div class="card">
        <!-- NOTE:
        Corser was having issues with images on showing.
        This is due to not have a documentroot for each website.
        Document root is: /htdocs
        When you have the / in front of the image src, it looks
        for the image at the documentroot.
        Removing the first / makes it look in the currently directory
        that the user is viewing.
        Old Example: <img src="/img/business-suit.jpg" alt="Avatar" style="width:100%">
        New Example: <img src="img/business-suit.jpg" alt="Avatar" style="width:100%">
        4/19/21 jtk
         -->
            <img src="img/business-suit.jpg" alt="Avatar" style="width:100%">
        </div>
    </div>
</div>
<div class="bg-lb pb-10 full-width">
    <div class="row">
        <div class="column column-100 text-center">
            <br>
            <h2><b>Start your career early</b></h2>
            <h5>Jump start your career early. Land an internship or entry-level job at a cutting edge
                startup, Fortune 500, or anything in between.
            </h5>
        </div>
    </div>
</div>
<div class="row text-center display-table">
    <img src="img/arrow.svg" class="bounce" alt="Scroll to continue" style="margin-top: -4rem;">
</div>
<br><br>
<div class="row">
    <div class="column column-100 text-center">
        <h1><b>Here’s how it works.</b></h1>
    </div>
</div>
<br><br>
<!-- END HEADER -->

<!-- HOW TO -->
<div class="row pb-10">
    <div class="row">
        <div class="column column-100 text-center" style="padding-top: 8%;">
            <h3><b>Tell us about yourself.</b></h3>
            <h5>We know finding a job can be stressful, 
                so we’ve made it simple. It only takes a 
                few minutes. Create a free profile on JobCorse 
                to show your best self and get discovered by 
                top employers. The jobs will literally come to you.</h5>
        </div>
        <div class="column column-100">
                <div class="card">
                    <img src="img/girl-with-laptop.jpg" style="width:100%">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row pb-10">
        <div class="column column-100">
            <div class="card">
                <img src="img/apply-now.jpg" style="width:100%">
            </div>
        </div>
        <div class="column column-100 text-center" style="padding-top: 10%;">
            <h3><b>Browse available jobs.</b></h3>
            <h5>We know choosing where to apply can be
                difficult. We make it easy.
                Simply click apply and be done!
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="column column-100 text-center">
            <h1><b>Stop scrolling, start interviewing.</b></h1>
        </div>
    </div>
    <div class="row pb-10 display-table">
        <?php
            if ($this->Identity->isLoggedIn()) {
                echo('<a href="/internships"><div class="column column-100 text-center"><button class="button">Get Hired</button></div></a>');
            } else {
                // User is not authenticated
                echo('<a href="/register"><div class="column column-100 text-center"><button class="button">Get Hired</button></div></a>');
            }
        ?>
    </div>
</div>
<!-- END HOW TO -->