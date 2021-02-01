<?php
 require_once("personal_info.php");
 require_once("groups.php");
 require_once("dbClass.php");
 require_once("students.php");
 require_once("header.php");
 require_once("group_function.php");
 require_once("additional_functions.php");
?>

<!-- Template of Groups page -->
<!-- In that page will see data of groups  -->
<div class="row h-100 w-100">
    <?php @include('sideBar.php')?>
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100">
        <h2 class="text-center m-3 bg-warning p-4">Manage Groups</h2>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 px-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#addModal"><i class="bi bi-person-plus-fill"></i>
                        Add new Group</button>
                </div>
                <div class="btn-group me-2">
                    <form action='save_in_file.php' method='POST'>
                        <button type="submit" class="btn btn-sm btn-outline-secondary" name="groups"><i
                                class="bi bi-file-earmark-spreadsheet-fill"></i>Export</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container px-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class='bg-primary'>
                        <tr>
                            <th scope='col'>Group id</th>
                            <th scope='col'>Group number</th>
                            <th scope='col'>Number of students</th>
                            <th scope='col'>Semester</th>
                            <th scope='col'>Academic year</th>
                            <th class='d-none' scope='col'>Faculty Id</th>
                            <th scope='col'>Faculty</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php            
                $result=getGroupDetails();
                if($result)
                {
                    foreach($result as $v)
                    {
                        echo "<tr>
                        <td>".$v->getId()."</td>
                        <td>".$v->getGroupNumber()."</td>
                        <td>".$v->getNumOfStudents()."</td>
                        <td>".$v->getSemester()."</td>
                        <td>".$v->getAcademic_year()."</td>
                        <td class='d-none'>".$v->Fac_id."</td>
                        <td>".$v->Fac_name."</td>
                        <td>".
                        "<ul class='list-inline m-0'>            
                        <li class='list-inline-item'>
                            <button class='btn btn-success btn-sm rounded-0 edit' type='button' data-bs-toggle='modal' data-bs-target='#editModal' name='edit'><i class='fa fa-edit'></i></button>
                        </li>
                        <li class='list-inline-item'>
                            <button  class='btn btn-danger btn-sm rounded-0 delete' type='button' data-bs-toggle='modal' data-bs-target='#deleteModal' name='delete'><i class='fa fa-trash'></i></button>
                        </li>
                    </ul>"."</td>
                        </tr>";
                    }
                }
                else 
                echo "<p class='text-center h4 text-warning'>List is empty</p>";
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Popup Modal to add a new group details, will popup form  -->
        <div class="modal" tabindex="-1" id="addModal" aria-labelledby="addGroupLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new Group details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" novalidate action="group_function.php" method=post>
                            <div class="col-md-4">
                                <label for="validationCustom10" class="form-label">Id</label>
                                <input type="number" class="form-control" id="validationCustom10" name="id" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Group</label>
                                <input type="text" class="form-control" id="validationCustom01" name="group" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Academic year</label>
                                <input type="text" class="form-control" id="validationCustom02" name="ayear" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nStud" class="form-label">Number of students</label>
                                <input type="number" class="form-control" id="nStud" name="numStud" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="smtr" class="form-label">Semester</label>
                                <input type="number" class="form-control" id="smtr" name="semester" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="fac" class="form-label">Faculty</label>
                                <select class="form-select" id="fac" name=faculty>
                                    <option selected disabled value="">Choose...</option>
                                    <?=selectFaculty($faculties, $_POST['faculty'])?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <input type="hidden" value="1" name="type">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popup Modal to edit group details, will popup form  -->
        <div class="modal" tabindex="-1" id="editModal" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update group details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate action="group_function.php" method=post>
                            <input type="hidden" class="form-control" id="groupId" name="id">
                            <input type="hidden" class="form-control" id="fac_id" name="fac_id">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Group</label>
                                <input type="text" class="form-control" id="groupNum" name="group" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Academic year</label>
                                <input type="text" class="form-control" id="ayear" name="ayear" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="numStud" class="form-label">Number of students</label>
                                <input type="number" class="form-control" id="numStud" name="numStud" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="number" class="form-control" id="semester" name="semester" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="faculty" class="form-label">Faculty</label>
                                <select class="form-select" id="facul" name=faculty>
                                    <option selected disabled value="">Choose...</option>
                                    <?=selectFaculty($faculties, $_POST['faculty'])?>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <input type="hidden" value="2" name="type">
                                    <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popup Modal to delete student details, will popup form  -->
        <div class="modal" tabindex="-1" id="deleteModal" aria-labelledby="deleteGroupLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure you want to delete this record?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" novalidate action="group_function.php" method=post>
                            <input type="hidden" class="form-control" id="delId" name="gid">
                            <input type="hidden" class="form-control" id="delfac_id" name="fid">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Group</label>
                                <input type="text" class="form-control" id="delgroupNum" name="group" readonly>
                                
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Academic year</label>
                                <input type="text" class="form-control" id="delayear" name="ayear" readonly>
                                
                            </div>
                            <div class="col-md-4">
                                <label for="faculty" class="form-label">Faculty</label>
                                <input type="text" class="form-control" id="delfac" name="delfac" readonly>
                               
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <input type="hidden" value="3" name="type">
                                    <button class="btn btn-primary" type="submit" name="submit">Delete</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
    // functions to get data from selected row
    $(document).ready(function() {
        $('.edit').on('click', function() {
            $('#editModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#groupId').val(data[0]);
            $('#groupNum').val(data[1]);
            $('#numStud').val(data[2]);
            $('#semester').val(data[3]);
            $('#ayear').val(data[4]);
            $('#fac_id').val(data[5]);
            $('#facul').val(data[6]);
        });
    });
    $(document).ready(function() {
        $('.delete').on('click', function() {
            $('#deleteModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delId').val(data[0]);
            $('#delgroupNum').val(data[1]);
            $('#delayear').val(data[4]);
            $('#delfac_id').val(data[5]);
            $('#delfac').val(data[6]);

        });
    });
// JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
</script>

<?php require_once("footer.php");?>