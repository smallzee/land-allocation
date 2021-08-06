<div id="wrapper">

	<nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="admin.php">Osun Land</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">        	  
            <div class="clearfix"> </div>
           </div>		   
		    
			<div class="clearfix"></div>

       
     </div>

     <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="admin.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
                   
                    <li>
                        <a href="allocate.php" class=" hvr-bounce-to-right"> <i class="fa fa-plus nav_icon"></i>Allocate Land</a>
                    </li>
                    <li>
                        <a href="update_allocation.php" class=" hvr-bounce-to-right"> <i class="fa fa-pencil nav_icon"></i>Update Allocation</a>
                    </li>
                    <li>
                        <a href="delete_allocation.php" class=" hvr-bounce-to-right"> <i class="fa fa-trash-o nav_icon"></i>Delete Allocation</a>
                    </li>

                    <li>
                        <a href="report.php" class=" hvr-bounce-to-right"><i class="fa fa-file nav_icon"></i> <span class="nav-label">Report</span> </a>
                    </li>

                    <li>
                        <a href="print.php" class=" hvr-bounce-to-right">
                            <i class="fa fa-print nav_icon"></i> <span class="nav-label">Print Receipt</span>
                        </a>
                    </li>

                    <li>
                        <a href="add_admin.php" class="hvr-bounce-to-right">
                            <i class="fa fa-user nav_icon"></i> <span class="nav-label">Add Admin</span></a>
                        </a>
                    </li>

                    <li>
                        <a href="logout.php" class=" hvr-bounce-to-right"><i class="fa fa-sign-out nav_icon"></i> <span class="nav-label">Logout</span> </a>
                    </li>

                </ul>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
	     <div class="banner">
	    	<h2>
			<a href="admin.php">Admin Home</a>
			<i class="fa fa-angle-right"></i>            
            <span><?php echo @$page_title;?></span>
			</h2>
	    </div>
		<!--//banner-->
 	 
 	<div class="blank">
		<div class="blank-page">	