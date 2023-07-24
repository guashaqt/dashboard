<div class="container-fluid">
   <!-- Page Heading -->
   <br>
   <h2 style="text-align: center; font-size: 34px; font-weight: bold; margin-bottom: 50px;">BARANGAY OFFICIALS INFORMATION LISTS</h2>
   <p class="mb-4">
      <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-officials') ?>"> Add Officials </a>
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
                     <th>#</th>
                     <th scope="col">Position</th>
                     <th scope="col">Name</th>
                     <th scope="col">Contact</th>
                     <th scope="col">Address</th>
                     <th scope="col">Start of Term</th>
                     <th scope="col">End of Term</th>
                     <th scope="col">Option</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $c = 1; 
                  foreach($officials_list as $officials_data): ?>
                  <tr class="official-row">
                     <td><?= $c++ ?></td>
                     <td><?= $officials_data->position ?></td>
                     <td><?= $officials_data->name ?></td>
                     <td><?= $officials_data->contact ?></td>
                     <td><?= $officials_data->address ?></td>
                     <td><?= $officials_data->start_term ?></td>
                     <td><?= $officials_data->end_term ?></td>
                     <td>
                     <button type="button" class="btn btn-warning edit-official-btn" data-official="<?= $officials_data->id ?>">Edit</button>
                        <span class="mx-1"></span> <!-- Add a small gap between buttons -->
                     <button class="btn btn-danger  delete-official-btn" data-official="<?= $officials_data->id ?>">Delete</button>
                        <span class="mx-1"></span> 
                     <button class="btn btn-success  view-official-btn" data-official="<?= $officials_data->id ?>">View</button>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $('#searchBtn').click(function() {
         var searchText = $('#searchInput').val().toLowerCase();

         $('.official-row').each(function() {
            var rowData = $(this).find('td').text().toLowerCase();

            if (rowData.includes(searchText)) {
               $(this).show();
            } else {
               $(this).hide();
            }
         });
      });

      $('#searchInput').on('input', function() {
         var searchText = $(this).val().toLowerCase();

         $('.official-row').each(function() {
            var rowData = $(this).find('td').text().toLowerCase();

            if (rowData.includes(searchText)) {
               $(this).show();
            } else {
               $(this).hide();
            }
         });
      });

      $(document).on('click', '.edit-official-btn', function() {
         var officialId = this.dataset.official;

         $.ajax({
            url: '<?= base_url('index.php/dashboard/ajax-update-official-form') ?>',
            method: 'POST',
            data: {
               official_id: officialId
            },
            success: function(response) {
               bootbox.dialog({
                  title: 'Edit Official',
                  message: ' ',
                  size: 'extra-large'
               }).find('.bootbox-body').html(response);
            }
         });
      });

      $(document).on('click', '.delete-official-btn', function(e) {
         var officialId = this.dataset.official;

         bootbox.confirm('Are you sure you want to delete this official', function(answer) {
            if (answer == true) {
               window.location = '<?= base_url('index.php/dashboard/delete-officials/') ?>' + officialId;
            }
         });
      });
   });
</script>
