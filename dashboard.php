<?php
include('header.php');
checkUser();
userArea();
 ?>
 <script>
    document.title="Dashboard";
    document.getElementById("dashboard_link").classList.add('active');
 </script>
 <?php
    if(isset($_SESSION['UID']) && $_SESSION['UID']!='')
{

}
else{
    redirect('index.php');
}
?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('today') ?></h2>
                                                <span>Today's Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('yesterday') ?></h2>
                                                <span>Yesterday's Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('week')?></h2>
                                                <span>This Week Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('month')?></h2>
                                                <span>This Month Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('year')?></h2>
                                                <span>This Year Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">

                                            <div class="text">
                                                <h2><?php echo getDashboardExpense('total')?></h2>
                                                <span>Total Expense</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
					   </div>
                        
						
					</div>
                </div>
            </div>
<!-- <table>
    <tr>
        <td>Today's Expense</td>
        <td><?php echo getDashboardExpense('today') ?></td>
    </tr>
    <tr>
        <td>Yesterday's Expense</td>
        <td><?php echo getDashboardExpense('yesterday') ?></td>
    </tr>
    <tr>
        <td>This Week Expense</td>
        <td><?php echo getDashboardExpense('week')?></td>
    </tr>
    <tr>
        <td>This Month Expense</td>
        <td><?php echo getDashboardExpense('month')?></td>
    </tr>
    <tr>
        <td>This year Expense</td>
        <td><?php echo getDashboardExpense('year')?></td>
    </tr>
    <tr>
        <td>Total Expense </td>
        <td><?php echo getDashboardExpense('total')?></td>
    </tr>
</table> -->
<?php
include('footer.php');
?>