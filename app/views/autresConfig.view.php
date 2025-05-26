<!-- header -->
<?php $this->view("partials/header") ?>
<!-- header -->

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <?php $this->view("partials/navbar") ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php $this->view("partials/sidebar") ?>
        <!-- /Sidebar -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Autres Configuration</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Vertical Tab Style-1
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-start">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills me-3 tab-style-7" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button class="nav-link text-start active" id="main-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#main-profile" type="button" role="tab"
                                                aria-controls="main-profile" aria-selected="true"><i
                                                    class="feather-user me-1 align-middle d-inline-block"></i>Profile</button>
                                            <button class="nav-link text-start" id="man-password-tab" data-bs-toggle="pill"
                                                data-bs-target="#man-password" type="button" role="tab"
                                                aria-controls="man-password" aria-selected="false"><i
                                                    class="feather-monitor me-1 align-middle d-inline-block"></i>Password</button>
                                            <button class="nav-link text-start" id="main-team-tab" data-bs-toggle="pill"
                                                data-bs-target="#main-team" type="button" role="tab"
                                                aria-controls="main-team" aria-selected="false"><i
                                                    class="feather-users me-1 align-middle d-inline-block"></i>Team</button>
                                            <button class="nav-link text-start" id="main-billing-tab" data-bs-toggle="pill"
                                                data-bs-target="#main-billing" type="button" role="tab"
                                                aria-controls="main-billing" aria-selected="false"><i
                                                    class="feather-file me-1 align-middle d-inline-block"></i>Billing</button>
                                            <button class="nav-link text-start mb-1" id="main-email-tab" data-bs-toggle="pill"
                                                data-bs-target="#main-email" type="button" role="tab"
                                                aria-controls="main-email" aria-selected="false"><i
                                                    class="feather-mail me-1 align-middle d-inline-block"></i>Email</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane show active" id="main-profile" role="tabpanel" tabindex="0">
                                                <div class="d-sm-flex">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-xxl">
                                                            <img src="assets/img/avatar/avatar-2.jpg" alt="img">
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div class="my-md-auto mt-4 ms-md-3">
                                                            <h5 class="font-weight-semibold mb-1 pb-0">Adam Smith</h5>
                                                            <p class="text-muted ms-0 mb-2 pb-2 ">
                                                                <span class="me-3"><i class="far fa-address-card me-2"></i>Ui/Ux Developer</span>
                                                                <span class="me-3"><i class="fa fa-taxi me-2"></i>West fransisco,Alabama</span>
                                                                <span><i class="far fa-flag me-2"></i>New Jersey</span>
                                                            </p>
                                                            <p class="text-muted ms-0 mb-2"><span><i class="fa fa-phone me-2"></i></span><span class="font-weight-semibold me-2">Phone:</span><span>+9412345 6789</span> </p>
                                                            <p class="text-muted ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold me-2">Email:</span><span>spruko.space@gmail.com</span></p>
                                                            <p class="text-muted ms-0 mb-2"><span><i class="fa fa-globe me-2"></i></span><span class="font-weight-semibold me-2">Website:</span><span>sprukotechnologies</span></p>
                                                            <p class="text-muted mb-0"><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem
                                                                Ipsum has been standard.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                <ul class="list-unstyled text-muted mb-0">
                                                    <li class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <b>standard dummy text ever since the 1500s</b>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                                                    <li class="mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</li>
                                                    <li class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="main-team" role="tabpanel"
                                                aria-labelledby="main-team-tab" tabindex="0">
                                                <ul class="list-unstyled text-muted mb-0">
                                                    <li class="mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</li>
                                                    <li class="mb-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                                    </li>
                                                    <li class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <b>standard dummy text ever since the 1500s</b>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="main-billing" role="tabpanel"
                                                aria-labelledby="main-billing-tab" tabindex="0">
                                                <ul class="list-unstyled text-muted mb-0">
                                                    <li class="mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</li>
                                                    <li class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <b>standard dummy text ever since the 1500s</b>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </li>
                                                    <li class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="main-email" role="tabpanel"
                                                aria-labelledby="main-email-tab" tabindex="0">
                                                <ul class="list-unstyled text-muted mb-0">
                                                    <li class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <b>standard dummy text ever since the 1500s</b>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </li>
                                                    <li class="mb-0">How hotel deals can help you live a better life. <b>How celebrity cruises</b> aren't as bad as you think. How cultural solutions can help you predict the future. How to cheat at dog friendly hotels and get away with it. </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- foot -->
        <?php $this->view("partials/foot") ?>
        <!-- /foot -->

    </div>
    <!-- /Main Wrapper -->

    <!-- footer -->
    <?php $this->view("partials/footer") ?>
    <!-- /footer -->
</body>

</html>