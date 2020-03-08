<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url('assets/'); ?>img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
                    Masjid Ar-Rahmah
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item <?php if ($title == "Dashboard") echo 'active'; ?>">
                        <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                            <!-- <i class="material-icons">dashboard</i> -->
                            <i class="fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($title == "Ustadz") echo 'active'; ?>">
                        <a class="nav-link" href="<?php echo base_url('ustadz'); ?>">
                            <!-- <i class="material-icons">person</i> -->
                            <i class="fas fa-user-alt"></i>
                            <p>Ustadz</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($title == "Jadwal Kajian") echo 'active'; ?>">
                        <a class="nav-link" href="<?php echo base_url('kajian'); ?>">
                            <!-- <i class="material-icons">assignment</i> -->
                            <i class="fas fa-calendar-alt"></i>
                            <p>Jadwal Kajian</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($title == "Khotib Jumat") echo 'active'; ?>">
                        <a class="nav-link" href="<?php echo base_url('khotib'); ?>">
                            <!-- <i class="material-icons">assignment_ind</i> -->
                            <i class="fas fa-calendar-day"></i>
                            <p>Khotib Jumat</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>