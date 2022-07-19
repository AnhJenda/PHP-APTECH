<html>
<head>
    <title>Search | Bookstore</title>
</head>
<body>
<?php
    $title = '';
    if (!empty($_POST['title'])){
        $title = $_POST['title'];
        echo "Finding record, {$_POST['title']}, and Result";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Enter Book name : <input type="text" name="title">
    <input type="submit" value="Search">
</form>
<?php
$myDB = new mysqli('localhost', 'root', '', 'library');

if ($myDB->connect_error){

    die('Connect Error (' . $myDB->connect_errno .')' .$myDB->connect_error);
}
if ($title != ''){
    $sql = "SELECT * FROM books WHERE available = 1 and title like '%{$title}' order by title";
} else {
    $sql = "SELECT * FROM books WHERE available = 1 order by title";
}
$result = $myDB -> query($sql);
?>
<table cellspacing="2" cellpadding="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">Result</h3>
        </td>
    </tr>

    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">ISBN</td>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row["title"];
        echo "</td><td align = 'center'> ";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["ISBN"];
        echo "</tr>";
        echo "</td>";
    }
    ?>
</table>
</body>
</html>