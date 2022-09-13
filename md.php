<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="2";
 
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Master Data</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		
		<script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
?> 

			<hr class="uk-grid-divider">
 
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-users uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_users.php">Users</a></h2>
                            <p>Usr management</p>
                        </div>
                    </div>
                </div>
 
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-desktop uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_hosts.php">Hosts</a></h2>
                            <p>Devices to be monitored.</p>
                        </div>
                    </div>
                </div>
 
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-building-o uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_domains.php">Domains</a></h2>
                            <p>Domain list.</p>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-cubes uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_groups.php">Groups</a></h2>
                            <p>Host Grouping.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-briefcase uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_map.php">Map Setting</a></h2>
                            <p>Map Position Setting.</p>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-3">
                    <div class="uk-grid">
                        <div class="uk-width-1-6">
                            <i class="uk-icon-warning uk-icon-large uk-text-primary"></i>
                        </div>
                        <div class="uk-width-5-6">
                            <h2 class="uk-h3"><a href="md_bi.php">Batch Input</a></h2>
                            <p>Be Carefull...!! This will REPLACE ALL DATA with batch data at once. Use this menu for data init.</p>
                        </div>
                    </div>
                </div>
  
            </div>
 			<hr class="uk-grid-divider">
 
 	</body>
 
</html>
