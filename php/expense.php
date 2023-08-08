<?php

include('header.php');
checkUser();
userArea();
 include('user_header.php');
 $label="Add";
//  if(isset($_GET['id']) && $_GET['id']>0)
//  {
//     $label="Edit";
    
//  }
 if(isset($_GET['type']) && $_GET['type']=='delete'&& isset($_GET['id']) && $_GET['id']>0)
 {
   $id=get_safe_value($_GET['id']);

    mysqli_query($con,"delete from expense where id=$id");
 }
 $res=mysqli_query($con,"select expense.*,category.name from expense,category where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."'order by expense.expense_date asc ");
    if(isset($_SESSION['UID']) && $_SESSION['UID']!='')
{

}
else{
    redirect('index.php');
}
?>
<h2>Expense</h2>
<a href="manage_expense.php">Add Expense</a>
<br/>
<?php
if(mysqli_num_rows($res)>0)
{

?>
    <table border="1">
    <tr>
        <td>ID</td>
        <td>Category</td>
        <td>Item</td>
        <td>Price</td>
        <td>Details</td>
        <td>Expense Date</td>
        </tr>
    <?php
    
    while($row=mysqli_fetch_assoc($res))
     {
        ?>
     
    <tr>
    
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['item'] ?></td>
        <td><?php echo $row['price']?></td>
        <td><?php echo $row['details']?></td>
        <td><?php echo $row['expense_date']?></td>
        <td>
            
            <a href="manage_expense.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
            <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id'];?>','expense.php')">Delete</a>
        </td>
        </tr>
    
        <?php
    
     } ?>
</table>
<?php }
else
{
    echo "Data Not found";
    
} ?>

<?php
include('footer.php');
?>