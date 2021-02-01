<link href="assets/css/dashboard.css" rel="stylesheet">
<?php @include('header.php')?>
<?php @include('additional_functions.php')?>
<div class="container-fluid">
    <div class="row">
        <?php @include('sideBar.php')?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <!-- Card containers for all Views: students, teachers, groups and notifications -->
            <div class="container">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="card m-3 bg-primary">
                            <div class="content">
                                <div class="row row-cols-2">

                                    <div class="col-xs-7">
                                        <div class="h4 m-3">
                                            <p><strong><?php echo getCount("students"); ?></strong></p>
                                        </div>
                                        <p class="h5 mx-3">Total students</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="text-end">
                                            <img src="assets/images/student1.png" width="150" height="150" alt="">
                                        </div>
                                    </div>
                                </div>
                                <a href="students_view.php">
                                    <div class="footer h5 text-center text-white">
                                        <hr />
                                        <div class="stats my-3">
                                            View students <i class="bi bi-arrow-right-square-fill"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card m-3 bg-success">
                            <div class="content">
                                <div class="row row-cols-2">
                                    <div class="col-xs-7">
                                        <div class="h4 m-3">
                                            <p><strong><?php echo getCount("teachers"); ?></strong></p>
                                        </div>
                                        <p class="h5 mx-3">Total teachers</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="text-end">
                                            <img src="assets/images/faculty.png" width="150" height="150"
                                                alt="Teachers icon">
                                        </div>
                                    </div>
                                </div>
                                <a href="teachers_view.php">
                                    <div class="footer h5 text-center text-warning">
                                        <hr />
                                        <div class="stats my-3">
                                            View teachers <i class="bi bi-arrow-right-square-fill"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card m-3 bg-warning">
                            <div class="content">
                                <div class="row row-cols-2">
                                    <div class="col-xs-7">
                                        <div class="h4 m-3">
                                            <p><strong><?php echo getCount("groups"); ?></strong></p>
                                        </div>
                                        <p class="h5 mx-3">Total groups</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="text-end">
                                            <img src="assets/images/course.png" width="150" height="150"
                                                alt="Groups icon">
                                        </div>
                                    </div>
                                </div>
                                <a href="groups_view.php">
                                    <div class="footer h5 text-center">
                                        <hr />
                                        <div class="stats my-3 ">
                                            View groups <i class="bi bi-arrow-right-square-fill"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card m-3 bg-info">
                            <div class="content">
                                <div class="row row-cols-2">
                                    <div class="col-xs-7">
                                        <div class="h4 m-3">
                                            <p><strong>Coming soon...</strong></p>
                                        </div>
                                        <p class="h5 mx-3">Events</p>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="text-end">
                                            <img src="assets/images/about-us.png" width="220" height="220"
                                                alt="Groups icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

            <h2 class="text-center mb-2">College Calendar</h2>
            <div class="container ml-3">
                <iframe
                    src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FJerusalem&amp;src=MzJtZGxqcjlsbmRsaWlrNzJ0aHNnNzJwOGNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=aHQzamxmYWFjNWxmZDYyNjN1bGZoNHRxbDhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=cnUuanVkYWlzbSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23D50000&amp;color=%234285F4&amp;color=%230B8043"
                    style="border:solid 1px #777" width="1100" height="600" frameborder="0" scrolling="yes"></iframe>
            </div>
        </main>
    </div>
</div>
<?php @include('./footer.php')?>