<div id="content">
    <div class="container">
        <h2 style="text-align: center; font-size: 34px; font-weight: bold; margin-bottom: 30px;">RESIDENT INFORMATION</h2>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('firstname'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" id="middlename" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('middlename'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('lastname'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="purok">Purok No:</label>
                    <select name="purok" id="purok" class="form-control" required>
                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('purok'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="streetname">Street Name:</label>
                    <input type="text" name="streetname" id="streetname" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('streetname'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="barangay">Barangay:</label>
                    <input type="text" name="barangay" id="barangay" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('barangay'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="sex">Sex:</label>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('sex'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('birth_date'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="birth_place">Birth Place:</label>
                    <input type="text" name="birth_place" id="birth_place" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('birth_place'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" id="contact" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('contact'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="nationality">Nationality:</label>
                    <input type="text" name="nationality" id="nationality" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('nationality'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="civil_status">Marital Status:</label>
                    <select name="civil_status" id="civil_status" class="form-control" required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('civil_status'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="religion">Religion:</label>
                    <input type="text" name="religion" id="religion" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('religion'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="household_members">Total Household Members:</label>
                    <input min="1" type="number" name="household_members" id="household_members" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('household_members'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="land_ownership">Land Ownership Status:</label>
                    <select name="land_ownership" id="land_ownership" class="form-control" required>
                        <option value="Owned">Owned</option>
                        <option value="Landless">Landless</option>
                        <option value="Tenant">Tenant</option>
                        <option value="Caretaker">Caretaker</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('land_ownership'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="ownership_status">Household Ownership Status:</label>
                    <select name="ownership_status" id="ownership_status" class="form-control" required>
                        <option value="Own House">Own House</option>
                        <option value="Renting">Renting</option>
                        <option value="Living with Parents">Living with Parents</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('ownership_status'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="blood_type">Blood Type:</label>
                    <select name="blood_type" id="blood_type" class="form-control" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('blood_type'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="disability">Differently-Abled:</label>
                    <select name="disability" id="disability" class="form-control" required>
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('disability'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="occupation">Occupation:</label>
                    <input type="text" name="occupation" id="occupation" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('occupation'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="monthly_income">Monthly Income:</label>
                    <input type="number" min="0" name="monthly_income" id="monthly_income" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('monthly_income'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="education">Educational Attainment:</label>
                    <select name="education" id="education" class="form-control" required>
                        <option value="No schooling completed">No schooling completed</option>
                        <option value="Elementary Graduate">Elementary Graduate</option>
                        <option value="Elementary Undergraduate">Elementary Undergraduate</option>
                        <option value="High School Graduate">High School Graduate</option>
                        <option value="High School Undergraduate">High School Undergraduate</option>
                        <option value="College Undergraduate">College Undergraduate</option>
                        <option value="Vocational">Vocational</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master Degree">Master Degree</option>
                        <option value="Doctorate Degree">Doctorate Degree</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('education'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="lightning_facilities">Lightning Facilities:</label>
                    <select name="lightning_facilities" id="lightning_facilities" class="form-control" required>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('lightning_facilities'); ?></span>
                </div>

                <?php
if(isset($_SESSION['error'])):?>
	<div style="color:red;"><?= $_SESSION['error'] ?></div>
<?php endif;?>

<?php
if(isset($_SESSION['success'])):?>
	<div style="color:green;"><?= $_SESSION['success'] ?></div>
<?php endif;?>
            <!--    <form action="<?base_url('index.php/dashboard/add-resident/') ?>" method="POST" enctype="multipart/form-data">-->
                <div class="form-group col">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required />
                        
                        <span><?= form_error('image') ?></span>
                    </div>

                <div class="form-group col-md-4">
                    <label for="remarks">Remarks:</label>
                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">Add Resident</button>
            </div>
        </form>
    </div>
</div>
