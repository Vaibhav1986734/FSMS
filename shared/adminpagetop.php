<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
     <a class="navbar-brand" href="javascript:void();">FSMS</a>
         <button class="btn btn-link btn-sm order-1 order-lg-0"  
                                          id="sidebarToggle" href="#">
              <i class="fa fa-bars"></i>
         </button>
           
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" 
	     	   href="#" role="button" data-toggle="dropdown" 
     	     	aria-haspopup="true" aria-expanded="false">

		  <i class="icon-user"></i>&nbsp;&nbsp;
                 <?php echo $_SESSION["email"] ?>
            </a>

	<div class="dropdown-menu dropdown-menu-right" 
	   aria-labelledby="userDropdown">

                <a class="dropdown-item" href="signout">
                       <i class="icon-power-off"></i>
                              &nbsp; Log Out
                </a>
        </div>
      </li>
   </ul>
</nav>