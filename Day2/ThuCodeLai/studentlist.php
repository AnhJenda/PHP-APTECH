<html>
<body>
<?php
$name = '';
if (!empty($_POST['name'])){
    $name = $_POST['name'];
    echo "Finding record, {$_POST['name']}, and Result";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Enter Student Name : <input type="text" name="name">
    <input type="submit" value="Search">
</form>
<?php
$myDB = new mysqli('localhost', 'root', '', 'testphpdb');
if ($myDB -> connect_errno){
    die('Connect Error (' . $myDB ->connect_errno . ')' . $myDB -> connect_errno);
}
if ($name != ''){
    $sqlstm = "Select * From students INNER JOIN parents on students.id = parents.id WHERE students.name like '%{$name}%'";
} else {
    $sqlstm = "Select * From students INNER JOIN parents on students.id = parents.id";
}
echo $sqlstm;
$result = $myDB -> query($sqlstm);
?>
<table cellpadding=" 2" cellspacing="6" align="center" border="1" >

    <tr>
        <td colspan="4">
            <h3 align="center">Search Result</h3>
        </td>
    </tr>

    <tr>
        <td align="center">ID</td>
        <td align="center">Name</td>
        <td align="center">Parent</td>
    </tr>

    <?php
    While ($row = $result-> fetch_assoc()) {
        echo "<tr>";
        echo "<td>";

        echo stripcslashes($row["id"]);
        echo "</td><td align='center'>";
        echo $row ["name"];
        echo "</td><td>";
        echo $row["pname"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>