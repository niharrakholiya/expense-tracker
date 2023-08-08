</div>

</div>

<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/animsition/animsition.min.js"></script>


<!-- Main JS-->
<script src="js/main.js"></script>
<!-- end document-->

<script>
    function change_cat()
    {
        var category_id=document.getElementById('category_id').value;
        console.log(category_id);
        window.location.href='?category_id='+category_id;
    }
    function set_to_date()
    {
        var from_date=document.getElementById('from_date').value;
        document.getElementById('to_date').setAttribute("min",from_date);
    }
    function delete_confir(id,page)
    {
        // alert(id);
        // alert(page);
        var check=confirm("Are you sure");
        
        if(check==true)
        {
            window.location.href=page+"?type=delete&id="+id;
        }
    }
    function set_to_date()
    {
        var from_date=document.getElementById('from_date').value;
        document.getElementById('to_date').setAttribute("min",from_date);
    }
</script>
</body>
</html>