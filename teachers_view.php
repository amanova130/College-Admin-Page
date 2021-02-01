<?php

 require_once("personal_info.php");
 require_once("groups.php");
 require_once("teachers.php");
 require_once("dbClass.php");
 require_once("students.php");
 require_once("header.php");
 require_once("teacher_function.php");
 
?>
<div class="row h-100 w-100">
    <?php @include('sideBar.php')?>
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100">
        <h2 class="text-center m-3 bg-success p-4">Manage Teachers</h2>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 px-3 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2 ml-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#addModal"><i class="bi bi-person-plus-fill"></i>
                        Add new teacher</button>
                </div>
                <div>
                    <form class="btn-group me-2 mr-2" action='save_in_file.php' method="POST">
                        <button type="submit" class="btn btn-sm btn-outline-secondary" name="teachers"><i
                                class="bi bi-file-earmark-spreadsheet-fill"></i> Export</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container px-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class='bg-primary'>
                        <tr>
                            <th scope='col'>First name</th>
                            <th scope='col'>Last name</th>
                            <th scope='col'>Id</th>
                            <th scope='col'>Gender</th>
                            <th scope='col'>Birth date</th>
                            <th scope='col'>Phone</th>
                            <th scope='col'>E-mail</th>
                            <th class="d-none" scope='col'>Address id</th>
                            <th scope='col'>City</th>
                            <th scope='col'>Address</th>
                            <th scope='col'>Zipcode</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
               $result=getTeacherDetails();
               if($result)
                {
                    foreach($result as $v)
                    {
                        echo "<tr>
                        <td>".$v->getFirstName()."</td>
                        <td>".$v->getLastName()."</td>
                        <td>".$v->getId()."</td>
                        <td>".$v->getGender()."</td>
                        <td>".$v->getBirthDate()."</td>
                        <td>".$v->getPhone()."</td>
                        <td>".$v->getEmail()."</td>
                        <td class='d-none'>".$v->getAddId()."</td>
                        <td>".$v->getCityName()."</td>
                        <td>".$v->getAddress()."</td>
                        <td>".$v->getZipCode()."</td>
                        <td>".
                        "<ul class='list-inline m-0'>            
                        <li class='list-inline-item'>
                            <button class='btn btn-success btn-sm rounded-0 edit' type='button' data-bs-toggle='modal' data-bs-target='#editModal' name='edit'><i class='fa fa-edit'></i></button>
                        </li>
                        <li class='list-inline-item'>
                            <button  class='btn btn-danger btn-sm rounded-0 delete' type='button' data-bs-toggle='modal' data-bs-target='#deleteModal' name='delete'><i class='fa fa-trash'></i></button>
                        </li>
                    </ul> "."</td>
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

    </div>
    <!-- Popup Modal to add a new teacher -->
    <div class="modal" tabindex="-1" id="addModal" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new teacher details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate action="teacher_function.php" method=post>
                        <div class="col-md-4">
                            <label for="validationCustom10" class="form-label">Id</label>
                            <input type="number" class="form-control" id="validationCustom10" name="id" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomEmail" class="form-label">E-mail</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" name="email" required>
                                <div class="invalid-feedback">
                                    Please write valid E-mail.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom08" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="validationCustom08" name="phone" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Gender</label>
                            <select class="form-select" id="validationCustom04" name="gender" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom12" class="form-label">Birth date</label>
                            <input type="date" class="form-control" id="validationCustom12" name="bdate" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom09" class="form-label">Address Id</label>
                            <input type="number" class="form-control" id="validationCustom09" name="addId" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom03" name="city" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom11" class="form-label">Address</label>
                            <input type="text" class="form-control" id="validationCustom11" name="address" required>
                            <div class="invalid-feedback">
                                Please provide a valid Address.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" name="zipcode" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <input type="hidden" value="1" name="type">
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Popup Modal to edit a teacher details, will popup form  -->
    <div class="modal" tabindex="-1" id="editModal" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update teacher details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate action="teacher_function.php" method=post
                        id="frmdemo">
                        <input type="hidden" class="form-control" name="addId" id="addId">
                        <input type="hidden" class="form-control" name="id" id="updateId">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" name="fname" id="fname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lname" id="lname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom12" class="form-label">Birth date</label>
                            <input type="date" class="form-control" name="bdate" id="bdate" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom08" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomEmail" class="form-label">E-mail</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend"
                                    name="email" id="email" required>
                                <div class="invalid-feedback">
                                    Please write valid E-mail.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom11" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                            <div class="invalid-feedback">
                                Please provide a valid Address.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <input type="hidden" value="2" name="type">
                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup Modal to delete a teacher details, will popup form  -->
    <div class="modal" tabindex="-1" id="deleteModal" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content bg-light bg-gradient">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure you want to delete this record?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" novalidate action="teacher_function.php" method=post>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="hidden" class="form-control" name="addressId" id="addressId">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" name="delfname" id="delfname" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="dellname" id="dellname" readonly>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <input type="hidden" value="3" name="type">
                                <button class="btn btn-primary" type="submit" name="submit">Delete</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Javascript function to fetch data from selected <trow> to update the details -->
<script>
$(document).ready(function() {
    $('.edit').on('click', function() {
        $('#editModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#fname').val(data[0]);
        $('#lname').val(data[1]);
        $('#updateId').val(data[2]);
        $('#email').val(data[6]);
        $('#phone').val(data[5]);
        $('#gender').val(data[3]);
        $('#bdate').val(data[4]);
        $('#addId').val(data[7]);
        $('#city').val(data[8]);
        $('#address').val(data[9]);
        $('#zipcode').val(data[10]);
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
        $('#id').val(data[2]);
        $('#addressId').val(data[7]);
        $('#delfname').val(data[0]);
        $('#dellname').val(data[1]);

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