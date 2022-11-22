    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>admin"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important;"><a href="<?= base_url(); ?>admin/help" style="color:#fff;"> Help</a></span></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $usr->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $usr->name; ?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url(); ?>admin/settings">Settings<span class="ti-settings pull-right"></span> </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#logout" data-toggle="modal" data-target="#logout">Log Out <span class="ti-power-off pull-right"></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background:#000!important;">
                    <li>
                        <a href="<?= base_url(); ?>admin">Home <span class="ti-home pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/members">Members <span class="ti-user pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/announcements">Announcements <span class="ti-announcement pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/accounts">Accounts <span class="ti-credit-card pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/login_history">Login History <span class="ti-bookmark-alt pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <?php include 'alerts.php'; ?>
            <div class="container-fluid">
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <h3><label>Help</label></h3><br>
                    <a class="lead" id="quest" data-toggle="collapse" href="#question1" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">1. How to update member’s identifying data?</a>
                    <div class="collapse" id="question1">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Identifying Data” link to view and edit member’s identifying data.</h4><br>
                                    <h4>Step 5: Click on the “Update” button to update.</h4><br>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question2" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">2. How to update member’s educational background?</a>
                    <div class="collapse" id="question2">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the educational background link to view and edit member’s educational background.</h4><br>
                                    <h4>Step 5: Click on the “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question3" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">3. How to update member’s siblings?</a>
                    <div class="collapse" id="question3">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Sibling’s” link to view and edit member’s siblings.</h4><br>
                                    <h4>Step 5: Click on the “Add” button to add a new sibling or click on the ”Edit” button to update existing member’s siblings.</h4><br>
                                    <h4>Step 6: Click on the “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question4" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">4. How to update member’s special skills?</a>
                    <div class="collapse" id="question4">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Special Skills” link to view and edit member’s special skills.</h4><br>
                                    <h4>Step 5: Click on the “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question5" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">5. How to update member’s interest/hobbies?</a>
                    <div class="collapse" id="question5">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Interest/Hobbies” link to view and edit member’s special skills.</h4><br>
                                    <h4>Step 5: Click on the “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question6" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">6. How to update member’s work experience?</a>
                    <div class="collapse" id="question6">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Interest/Hobbies” link to view and edit member’s work experience.</h4><br>
                                    <h4>Step 5: Click on the “Add” button to add a new work experience or click on the ”Edit” button to update existing member’s work experience.</h4><br>
                                    <h4>Step 6: Click on “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question7" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">7. How to update member’s membership on organizations?</a>
                    <div class="collapse" id="question7">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Edit” button to show the update member’s info modal.</h4><br>
                                    <h4>Step 4: Click on the “Membership on Organization” link to view and edit member’s organization.</h4><br>
                                    <h4>Step 5: Click on the “Add” button to add a new organization or click on the ”Edit” button to update existing member’s organization.</h4><br>
                                    <h4>Step 6: Click on “Update” button to update.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question8" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">8. How to delete member?</a>
                    <div class="collapse" id="question8">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Delete” button to show the delete confirmation modal.</h4><br>
                                    <h4>Step 4: Click on the “Yes” button to proceed deleting member.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question9" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">9. How to view member’s details?</a>
                    <div class="collapse" id="question9">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Members” link on the sidebar menu then click on any municipality to show the municipality’s barangays.</h4><br>
                                    <h4>Step 2: Click on the any barangay to expand and show the members.</h4><br>
                                    <h4>Step 3: Click on the “Details” button to view member’s details.</h4><br>
                                    <h4>Step 4: If you want to print member’s details click on the “Print Info” button.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question10" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">10. How to add a new announcement?</a>
                    <div class="collapse" id="question10">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Announcements” link on the sidebar menu then click on the “Add” link on the navigation tab.</h4><br>
                                    <h4>Step 2: Input all the required fields on the “Add New Announcement” form.</h4><br>
                                    <h4>Step 3: Click on the “Post” button to post the new announcement.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question11" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">11. How to update announcement?</a>
                    <div class="collapse" id="question11">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Announcements” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: Click on the “Edit” button to show and edit announcement.</h4><br>
                                    <h4>Step 3: Click on the “Update” button to update announcement.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question12" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">12. How to delete announcement?</a>
                    <div class="collapse" id="question12">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Announcements” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: Click on the “Delete” button to show the delete confirmation modal.</h4><br>
                                    <h4>Step 3: Click on the “Yes” button to proceed deleting announcement.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question13" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">13. How to add a new account?</a>
                    <div class="collapse" id="question13">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Accounts” link on the sidebar menu then click on the “Add” link on the navigation tab.</h4><br>
                                    <h4>Step 2: Input all the required fields on the “Add New Account” form.</h4><br>
                                    <h4>Step 3: Click on the “Save” button to save the account.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question14" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">14. How to update account?</a>
                    <div class="collapse" id="question14">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Accounts” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: Click on the “Edit” button to show and edit account.</h4><br>
                                    <h4>Step 3: Click on the “Update” button to update account.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question15" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">15. How to update account password?</a>
                    <div class="collapse" id="question15">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Accounts” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: Click on the “Change Password” button to show and update password.</h4><br>
                                    <h4>Step 3: Click on the “Update” button to update account password.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question16" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">16. How to delete account?</a>
                    <div class="collapse" id="question16">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Accounts” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: Click on the “Delete” button to show the delete confirmation modal.</h4><br>
                                    <h4>Step 3: Click on the “Yes” button to proceed deleting account.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question17" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">17. How to view or clear login history?</a>
                    <div class="collapse" id="question17">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Login History” link on the sidebar menu.</h4><br>
                                    <h4>Step 2: If you want to clear login history, click on the “Clear All History” button and a confirmation modal will show.</h4><br>
                                    <h4>Step 3: Click on the “Yes” button to proceed clearing login history.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question18" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">18. How to print tabular reports?</a>
                    <div class="collapse" id="question18">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Tabular Reports” link on the sidebar.</h4><br>
                                    <h4>Step 2: Click on any tabs which shows different tabular reports such as “Summary, Skills, Reason for Dropping, and Interest/Hobbies”.</h4><br>
                                    <h4>Step 3: Select the type of report you want to generate by clicking on the “Report Type” select box then just fill up some select box that will appear according to which report type you selected.</h4><br>
                                    <h4>Step 4: Click on the “Print Report” button to print the particular tabular report.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question19" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">19. How to print graphical reports?</a>
                    <div class="collapse" id="question19">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on the “Graphical Reports” link on the sidebar.</h4><br>
                                    <h4>Step 2: Click on any tabs which shows different graphical reports such as “Barangay Members, Age Brackets, Educational Background, Skills, Reason for Dropping, and Interest/Hobbies”.</h4><br>
                                    <h4>Step 3: Select the type of report you want to generate by clicking on the “Report Type” select box then just fill up some select box that will appear according to which report type you selected.</h4><br>
                                    <h4>Step 4: Click on the “Print Report” button to print the particular graphical report.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question20" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">20. How to update signatories?</a>
                    <div class="collapse" id="question20">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on your “Name” found on the top navigation to show some options.</h4><br>
                                    <h4>Step 2: Click on the “Settings” option.</h4><br>
                                    <h4>Step 3: Click on the “Signatories” link to show the “Signatories” form.</h4><br>
                                    <h4>Step 4: Fill up some of the required and then click on the “Update” button to update signatories.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question21" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">21. How to update site contacts?</a>
                    <div class="collapse" id="question21">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on your “Name” found on the top navigation to show some options.</h4><br>
                                    <h4>Step 2: Click on the “Settings” option.</h4><br>
                                    <h4>Step 3: Click on the “Site Contact” link to show the “Contacts” form.</h4><br>
                                    <h4>Step 4: Fill up some of the required and then click on the “Update” button to update site contacts.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-lg-12" style="margin-bottom:10px;">
                    <a class="lead" id="quest" data-toggle="collapse" href="#question22" aria-expanded="false" aria-controls="collapseExample" title="Click to show steps">22. How to logout?</a>
                    <div class="collapse" id="question22">
                        <div style="margin-top:20px;color:#fff;">
                            <div class="row-fluid">
                                <div class="col-lg-12 panel" style="background:#00C292;">
                                    <h4>Step 1: On the Administrator panel click on your “Name” found on the top navigation to show some options.</h4><br>
                                    <h4>Step 2: Click on the “Logout” option.</h4><br>
                                    <h4>Step 3: A confirmation modal will show then click on the “Yes” button to logout.</h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div> <!-- End of container -->
        </div>
    </div>

