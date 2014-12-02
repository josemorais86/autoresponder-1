  <body>
    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Wasanga Autoresponder </a>
          </div>
          <div class="navbar-collapse collapse">
          
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;123</a></li>
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Bienvenido <?php echo $username; ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><span class="glyphicon glyphicon-cog"></span> My Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url()."index.php/home/logout"; ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>
              </li>
            
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>