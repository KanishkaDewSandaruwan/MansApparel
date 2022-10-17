         <!-- Footer -->
         <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Man's Apparel. All rights reserved.
                  , Created By A.G.A.P.C.AKMEEMANA
                  
                </div>

              </div>
            </footer>
            
    <div class="modal fade" id="ChangePassword" tabindex="-1" aria-labelledby="ChangePasswordLabel" aria-hidden="true">
         <div class="modal-dialog ">
             <div class="modal-content">
                 <div class="modal-header bg-dark">
                     <h5 class="modal-title text-white" id="ChangePasswordLabel">Change Password</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body ">
                     <form method="POST" class="row g-3 needs-validation " novalidate enctype="multipart/form-data">
                         <div class="col-md-12">
                             <label for="current_password" class="form-label">Current Password Name</label>
                             <input type="password" class="form-control" name="current_password" id="current_password"
                                 placeholder="Current Password Name" required>
                         </div>

                         <div class="col-md-12">
                             <label for="new_password" class="form-label">New Password</label>
                             <input type="password" class="form-control" name="new_password" id="new_password"
                                 placeholder="New Password" required>
                         </div>

                         <div class="col-md-12">
                             <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                             <input type="password" class="form-control" name="confirm_new_password"
                                 id="confirm_new_password" placeholder="Confirm New Password" required>
                         </div>

                         <div class="col-md-12">
                             <input type="hidden" class="form-control" name="email"
                                 value="<?php echo $_SESSION['admin']; ?>" id="email">
                         </div>


                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                     <button type="button"  onclick="changePasswordAdmin(this.form)" class="btn btn-primary">Save
                         changes</button>
                 </div>
                 </form>
             </div>
         </div>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>

    
    <script src="https://kit.fontawesome.com/6e8b05f9c5.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
    <script src="js/include/alerts.js"></script>
    <script src="js/include/validation.js"></script>
    <script src="js/include/homejs.js"></script>
    <script src="js/include/upload.js"></script>
    <script src="js/include/add.js"></script>
    <script src="js/include/delete.js"></script>

    <script src="js/admin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- toast -->
        <script src="assets/plugin/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/plugin/iziToast-master/dist/css/iziToast.min.css">
    <!-- endbuild -->

     <!-- Simple table -->
     <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

