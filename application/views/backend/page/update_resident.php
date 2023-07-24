
<div id="content">
    <div class="container">
        <br>
        <br>
        <br>
        <h2 class="text-center">EDIT RESIDENT INFORMATION</h2>
        <br>
        <br>

        <form method="post" action="<?php echo base_url('index.php/dashboard/update-resident/'.$resident_data->resident_id); ?>">
            <div class="form-row">
                <div class="form-group col">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" value="<?php echo $resident_data->first_name; ?>" id="firstname" class="form-control" required />
                    <span><?= form_error('firstname') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="middlename">Middle Name:</label>
                    <input type="text" name="middlename" value="<?php echo $resident_data->middle_name; ?>" id="middlename" class="form-control" required />
                    <span><?= form_error('middlename') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" value="<?php echo $resident_data->last_name; ?>" id="lastname" class="form-control" required />
                    <span><?= form_error('lastname') ?></span>
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col">
                    <label for="purok">Purok:</label>
                    <select name="purok" value="<?php echo $resident_data->purok; ?>" id="purok" class="form-control" required>
                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <span><?= form_error('purok') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="street">Street Name:</label>
                    <input type="text" name="streetname" value="<?php echo $resident_data->streetname; ?>" id="street" class="form-control" required />
                    <span><?= form_error('street') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="barangay">Barangay:</label>
                    <input type="text" name="barangay" value="<?php echo $resident_data->barangay; ?>" id="barangay" class="form-control" required />
                    <span><?= form_error('barangay') ?></span>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col">
                    <label for="sex">Sex:</label>
                    <select name="sex" value="<?php echo $resident_data->sex; ?>" id="sex" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span><?= form_error('sex') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" name="birth_date" value="<?php echo $resident_data->birth_date; ?>" id="birth_date" class="form-control" required />
                    <span><?= form_error('birth_date') ?></span>
                </div>
                <br>
                <div class="form-group col">
                    <label for="birth_place">Birth Place:</label>
                    <input type="text" name="birth_place" value="<?php echo $resident_data->birth_place; ?>" id="birth_place" class="form-control" required />
                    <span><?= form_error('birth_place') ?></span>
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" value="<?php echo $resident_data->contact; ?>" id="contact" class="form-control" required />
                    <span class="text-danger"><?= form_error('contact'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="nationality">Nationality:</label>
                    <input type="text" name="nationality" value="<?php echo $resident_data->nationality; ?>" id="nationality" class="form-control" required />
                    <span class="text-danger"><?= form_error('nationality'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="civil_status">Marital Status:</label>
                    <select name="civil_status" value="<?php echo $resident_data->civil_status; ?>" id="civil_status" class="form-control" required>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    <span class="text-danger"><?= form_error('civil_status'); ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="religion">Religion:</label>
                    <input type="text" name="religion" value="<?php echo $resident_data->religion; ?>" id="religion" class="form-control" required />
                    <span class="text-danger"><?php echo form_error('religion'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="household_members">Total Household Members:</label>
                    <input min="1" type="number" name="household_members" value="<?php echo $resident_data->household_members; ?>" id="household_members" class="form-control" required />
                    <span class="text-danger"><?= form_error('household_members'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="land_ownership">Land Ownership Status:</label>
                    <select name="land_ownership" value="<?php echo $resident_data->land_ownership; ?>" id="land_ownership" class="form-control" required>
                        <option value="Owned">Owned</option>
                        <option value="Landless">Landless</option>
                        <option value="Tenant">Tenant</option>
                        <option value="Caretaker">Caretaker</option>
                    </select>
                    <span class="text-danger"><?= form_error('land_ownership'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="ownership_status">Household Ownership Status:</label>
                    <select name="ownership_status" value="<?php echo $resident_data->ownership_status; ?>" id="ownership_status" class="form-control" required>
                        <option value="Own House">Own House</option>
                        <option value="Renting">Renting</option>
                        <option value="Living with Parents">Living with Parents</option>
                    </select>
                    <span class="text-danger"><?= form_error('ownership_status'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="blood_type">Blood Type:</label>
                    <select name="blood_type" value="<?php echo $resident_data->blood_type; ?>" id="blood_type" class="form-control" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <span class="text-danger"><?= form_error('blood_type'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="disability">Differently-Abled:</label>
                    <select name="disability" value="<?php echo $resident_data->disability; ?>" id="disability" class="form-control" required>
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    <span class="text-danger"><?= form_error('disability'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="occupation">Occupation:</label>
                    <input type="text" name="occupation" value="<?php echo $resident_data->occupation; ?>" id="occupation" class="form-control" required />
                    <span class="text-danger"><?= form_error('occupation'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="monthly_income">Monthly Income:</label>
                    <input type="number" min="0" name="monthly_income" value="<?php echo $resident_data->monthly_income; ?>" id="monthly_income" class="form-control" required />
                    <span class="text-danger"><?= form_error('monthly_income'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="education">Educational Attainment:</label>
                    <select name="education" value="<?php echo $resident_data->education; ?>" id="education" class="form-control" required>
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
                    <span class="text-danger"><?= form_error('education'); ?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="lightning_facilities">Lightning Facilities:</label>
                    <select name="lightning_facilities" value="<?php echo $resident_data->lightning_facilities; ?>" id="lightning_facilities" class="form-control" required>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                    <span class="text-danger"><?= form_error('lightning_facilities'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="image">Image:</label>
                    <input type="file" name="image" value="<?php echo $resident_data->image; ?>" id="image" class="form-control" accept="image/*" required />
                    <span class="text-danger"><?= form_error('image'); ?></span>
                </div>

                <div class="form-group col-md-4">
                    <label for="remarks">Remarks:</label>
                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
            </div>
            <br>
            
            <div class="form-group text-center">
                <button class="btn btn-primary" href="<?php echo base_url('index.php/dashboard/update-resident')?>">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>


