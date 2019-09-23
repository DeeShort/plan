<?php

include_once '../classes/dabclass.php';
include_once 'menu.php';



if($_GET["ID"]>0){
    $dab=new dabclass();
    $wurst=$dab->getplan($_GET["ID"]);
} else {
    $wurst["Verbal"]="";
    $wurst["Dline"]="";
    $wurst["Plus"]="";
    $wurst["Minus"]="";
    $wurst["Status"]="";
}
?>
<form method="POST" action="changeplan.php">
    
    
            <input type="hidden" name="pid" value="<?php echo $_GET['ID']?>">;
    
    <div align="center">
        <?php if($_GET["ID"]>0){echo "<h2>Change Plan</h2>";}else{echo "<h2>New Plan</h2>";} ?>
        
        <table width="80%" border="1">
            
            <tr>
                <th>Verbal</th><td><input value="<?php echo $wurst['Verbal']?>" input="text" name="verbal"> </td>
            </tr>
            <tr>
                <th>DLine</th><td><input type="date" name="dline" value="<?php echo $wurst['DLine']?>"></td>
            </tr>
            <tr>
                <th>Plus</th><td><input type="text" name="plus" value="<?php echo  $wurst['Plus']?>"></td>
            </tr>
            <tr>
                <th>Minus</th><td><input type="text" name="minus" value="<?php echo  $wurst['Minus']?>"></td>
            </tr>
            <tr>             
                <th>Status</th><td><input type="text" name="status" value="<?php echo  $wurst['Status']?>"></td>
            </tr>
            <tr>
                <td><input name="but" type="submit" value="Quit"></td><td><input name="but" type="submit" value="Save"></td>
            </tr>
        </table>
    </div>
</form>
