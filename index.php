<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/26/2017
 * Time: 10:16 AM
 * Description: This file was created to
 */

include "./includes/header.php";
?>
<div class="container wrap">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body flex-center">
                    <button class="btn btn-primary" id="modalBtn" data-toggle="modal">Add Contact</button>
                </div>

                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog"
                     aria-labeledby="gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="gridSystemModalLabel">Add a New Contact</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form action="insertContact.php" method="post">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <input required class="form-control" type="text" name="fname"
                                                       placeholder="First Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input required class="form-control" type="text" name="lname"
                                                       placeholder="Last Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input required class="form-control" type="text" name="uname"
                                                       placeholder="Username"/>
                                            </div>
                                            <div class="form-group">
                                                <input required class="form-control" type="email" name="email"
                                                       placeholder="Email"/>
                                            </div>
                                            <div class="form-group">
                                                <input required class="form-control" type="password" name="password"
                                                       placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <div class="form-group">
                                                    <button class="btn btn-danger" id="cancel">Cancel</button>
                                                    <button class="btn btn-success" id="submit" type="submit">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            while (($row = $query->fetch_assoc()) !== NULL) {
                $fullName = $row['firstName'] . " " . $row['lastName'];
                $username = $row['username'];
                $email = $row['email'];
                echo "<div class='panel hover panel-default'>";
                echo "<div class='panel-body'>";
                echo "<p class='lead'>$fullName</p>";
                echo "<p>$email</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
</div>

<?php
include "./includes/footer.php";
?>
