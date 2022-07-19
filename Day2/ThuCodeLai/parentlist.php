<html>
<body>
<?php
$myDB = new mysqli('localhost', 'root', '', 'testphpdb');
if ($myDB -> connect_errno){
    die('Connect Error (' . $myDB ->connect_errno . ')' . $myDB -> connect_errno);
}
$sqlstm = "Select * from students inner join parents on students.id = parents.id";
$result = $myDB -> query($sqlstm);
?>
<table cellpadding=" 2" cellspacing="6" align="center" border="1" >

    <tr>
        <td colspan="4">
            <h3 align="center">Student info</h3>
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