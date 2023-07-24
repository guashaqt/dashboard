<div class="container-fluid">
   <!-- Page Heading -->
   <br>
   <h2 style="text-align: center; font-size: 34px; font-weight: bold; margin-bottom: 50px;">RESIDENT LISTS</h2>
   <p class="mb-4">
      <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>">Add Resident</a>
   </p>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-6">
               <h6 class="m-0 font-weight-bold text-primary">List</h6>
            </div>
            <div class="col-md-6">
               <form class="form-inline float-right">
                  <div class="form-group">
                     <input type="text" id="searchInput" class="form-control" placeholder="Search">
                  </div>
                  <button type="button" class="btn btn-primary" id="searchBtn">Search</button>
               </form>
            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Resident Image</th>
                     <th scope="col">Full Name</th>
                     <th scope="col">Address</th>
                     <th scope="col">Sex</th>
                     <th scope="col">Birth Date</th>
                     <th scope="col">Birth Place</th>
                     <th scope="col">Contact</th>
                     <th scope="col">Nationality</th>
                     <th scope="col">Marital Status</th>
                     <th scope="col">Religion</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $x = 1;
                  foreach ($resident_list as $resident) : ?>
                     <tr>
                        <th scope="row"><?= $x++ ?></th>
                        <td><img src="<?php echo base_url($resident->image); ?>" height="50 px" width="50px" alt="Resident Image"></td>
                        <td><?= $resident->last_name ?> <?= $resident->first_name ?>, <?= $resident->middle_name ?></td>
                        <td><?= $resident->purok ?>, <?= $resident->streetname ?>, <?= $resident->barangay ?></td>
                        <td><?= $resident->sex ?></td>
                        <td class="birth-date"><?= $resident->birth_date ?></td>
                        <td><?= $resident->birth_place ?></td>
                        <td><?= $resident->contact ?></td>
                        <td class="nationality"><?= $resident->nationality ?></td>
                        <td><?= $resident->civil_status ?></td>
                        <td><?= $resident->religion ?></td>
                        <td>
                           <div class="btn-group">
                              <a class="btn btn-warning update-resident-btn" href="<?= base_url('index.php/dashboard/update-resident/'.$resident->resident_id) ?>">Update</a>
                              <span class="mx-1"></span> <!-- Add a small gap between buttons -->
                              <a class="btn btn-danger delete-resident-btn" href="<?= base_url('index.php/dashboard/delete-resident/'.$resident->resident_id) ?>">Delete</a>
                              <span class="mx-1"></span> <!-- Add a small gap between buttons -->
                              <a class="btn btn-success view-resident-btn" href="<?= base_url('index.php/dashboard/view-resident/'.$resident->resident_id) ?>">View</a>
                           </div>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<br>

<style>
   .birth-date,
   .nationality {
      white-space: nowrap; /* Display the text in one line */
      overflow: hidden; /* Hide any overflow */
      text-overflow: ellipsis; /* Display an ellipsis if the text is too long */
   }
   
   .card-header {
      position: relative;
   }
   
   .input-group {
      position: absolute;
      top: 0;
      right: 0;
      width: 300px;
   }
</style>

<script>
   document.addEventListener('DOMContentLoaded', function() {
      var searchInput = document.getElementById('searchInput');
      var tableRows = document.querySelectorAll('tbody tr');

      searchInput.addEventListener('input', function() {
         var searchQuery = this.value.toLowerCase();

         tableRows.forEach(function(row) {
            var fullName = row.cells[1].textContent.toLowerCase();
            var address = row.cells[2].textContent.toLowerCase();

            if (fullName.includes(searchQuery) || address.includes(searchQuery)) {
               row.style.display = '';
            } else {
               row.style.display = 'none';
            }
         });
      });

   
   $(document).on('click', '.delete-resident-btn', function(e) {
         var residentId = this.dataset.resident;

         bootbox.confirm('Are you sure you want to delete this resident', function(answer) {
            if (answer == true) {
               window.location = '<?= base_url('index.php/dashboard/delete-resident/') ?>' + residentId;
            }
         });
      });
   });
</script>

