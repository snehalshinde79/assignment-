<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ART Store</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    table{
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
    }
    td,th{
        text-align: center;
        padding: 20px;
    }
    tr{
        border-bottom: 1px solid black ;
    }
    div{
        margin-left: 10%;
        width: 80%;
    }
    table tr:first-child{
        background: #2E7D32;
    }
    table tr:nth-child(2){
        background: #40c4ff;
    }
    div:first-child{
        margin-top: 10px;
    }
    div:nth-child(3) button{
        margin-right: 10px;
    }
    button, select ,input{
        padding: 3px 15px;
    }
    #on_hover{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 139px;
        width: 200px;
        position: absolute;
        margin-top: -50%;
        margin-left: 32%;
        z-index: 2;
    }

</style>
<body>
<form action="" method="post">
    <div style="padding:20px;border:1px solid black">
        <input type="text" id="search">
        <button>search</button>
    </div>
    <br>
    <div style="border:1px solid black;padding:20px;">
        <select name="field">
            <option>Actions</option>
            <option>Active</option>
            <option>Delete</option>
        </select>
        <button>Apply</button>

        <select name="field1">
            <option>Genre</option>
            <option>Active</option>
            <option>Delete</option>
        </select>
        <button>Filter</button>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <th colspan="7"><h2 text-align="center">Paintings</h2></th>
            </tr>
            <tr>
                <th colspan="3">Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Genre</th>
                <th></th>
            </tr>
            <?php
                include_once "connection.php";
                $res=mysqli_query($sql,"select * from art where active=1");
                while ($row=mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <td ><input type="checkbox"></td>
                <td><img class="image" height="100px" width="100px" src="arts/<?php echo $row['image']; ?>">
                <td><label><?php echo $row['title']; ?></label></td>
                <td><?php echo $row['artist'] ?></td>
                <td><?php echo $row['year'] ?></td>
                <td><?php echo $row['genre'] ?></td>
                <td><button>Edit</button></td>
            </tr>

            <?php } ?>
        </table>
    </div>
</form>
<div id="on_hover"></div>
<script src="jquery1.js"></script>
<script>
    $(document).ready(function () {

       $('.image').mouseover(function (e) {
           console.log($(this).offset().top);
           document.getElementById('on_hover').style.backgroundImage="url("+this.src+")";
           document.getElementById('on_hover').style.top=$(this).offset().top+750+"px";
           document.getElementById('on_hover').style.boxShadow ="2px 2px 20px 0px #000000";
       })
        $('.image').mouseleave(function () {
           document.getElementById('on_hover').style.backgroundImage="none";
            document.getElementById('on_hover').style.boxShadow ="none";
       })
    })
</script>
</body>
</html>
