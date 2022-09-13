
            <nav class="uk-navbar uk-margin-large-bottom">
                <a class="uk-navbar-brand" href="<?php echo $_SESSION['s_HOME']; ?>">PROMISE</a>
                <ul class="uk-navbar-nav">
                    <li <?php if ($menu=="1") { echo ' class="uk-active"';} ?>>
                        <a href="<?php echo $_SESSION['s_HOME']; ?>">Home</a>
                    </li>
<?php if ($_SESSION['s_UGRP']=="0") { ?>
                    <li <?php if ($menu=="2") { echo ' class="uk-active"';} ?>>
                        <a href="md.php">Master Data</a>
                    </li>
<?php }else{ ?>
                    <li <?php if ($menu=="2") { echo ' class="uk-active"';} ?>>
                        <a href="md_hostsed.php">Master Data</a>
                    </li>
<?php } ?>
                    <li <?php if ($menu=="3") { echo ' class="uk-active"';} ?>>
                        <a href="onoff.php">On/Off</a>
                    </li>
                    <li <?php if ($menu=="4") { echo ' class="uk-active"';} ?>>
                        <a href="bandwidth.php">Bandwidth</a>
                    </li>
					<!--li <?php if ($menu=="5") { echo ' class="uk-active"';} ?>>
                        <a href="site.php">Site</a>
                    </li-->
					<li <?php if ($menu=="7") { echo ' class="uk-active"';} ?>>
                        <a href="report.php">Report</a>
                    </li>
<?php if ($_SESSION['s_UGRP']=="0") { ?>
                    <li <?php if ($menu=="6") { echo ' class="uk-active"';} ?>>
                        <a href="tool.php">NET Tools</a>
                    </li>
<?php } ?>
                    <li>
                        <a href="logout.php">Logout [<?php echo $s_ID; ?>]</a>
                    </li>
                </ul>
                <!--a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                <div class="uk-navbar-brand uk-navbar-center uk-visible-small">Brand</div-->
            </nav>