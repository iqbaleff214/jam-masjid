<footer class="footer">
    <div class="container-fluid">
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with 
            <!-- <i class="material-icons">favorite</i> -->
            <i class="fa fa-heart"></i>
             by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> and developed by abu.mubarmij@gmail.com.
        </div>
    </div>
</footer>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin keluar dari aplikasi ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-primary">Iya</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
        console.log(window.location.href);
        
    });
</script>
</body>

</html>