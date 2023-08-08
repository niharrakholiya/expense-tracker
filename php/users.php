<?php

include('header.php');
checkUser();
adminArea();
 include('user_header.php');
 $label="Add";
 if(isset($_GET['id']) && $_GET['id']>0)
 {
    $label="Edit";
    
 }
 if(isset($_GET['type']) && $_GET['type']=='delete'&& isset($_GET['id']) && $_GET['id']>0)
 {
   $id=get_safe_value($_GET['id']);

    mysqli_query($con,"delete from users where id=$id");
    mysqli_query($con,"delete from expense where added_by=$id");
 }
 $res=mysqli_query($con,"select * from users  where role='User' order by id desc ");
    if(isset($_SESSION['UID']) && $_SESSION['UID']!='')
{

}
else{
    redirect('index.php');
}
?>
<h2>Users</h2>
<a href="manage_users.php">Add Users</a>
<br/>
<?php
if(mysqli_num_rows($res)>0)
{

?>
    <table>
    <tr>
        <td>ID</td>
        <td>Username</td>
        </tr>
    <?php
    $i=1;
    while($row=mysqli_fetch_assoc($res))
     {
        ?>
     
    <tr>
    
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['username']; ?></td>
        <td>
            
            <a href="manage_users.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
            <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id'];?>','users.php')"`>Delete</a>
        </td>
        </tr>
    
        <?php
    $i++;
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