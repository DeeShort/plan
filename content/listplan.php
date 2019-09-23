<?php
require_once '../classes/dabclass.php';
include_once 'menu.php';
?>
<html>
    <head>        
    </head>
    <body>
       
    <br>    
    <div align="center"> 
        
        <table width="90%" border="1">            
            <tr>
            <th>                Edit            </th>
            <th>                Delete            </th>
            <th>                PlanID            </th>
            <th>                Plan            </th>
            <th>                DLine            </th>
            <th>                Plus            </th> 
            <th>                Minus            </th>
            <th>                Status            </th> 
            </tr>            
            <?php
            $dab=new dabclass(); 
          
            $data = $dab->showplan();                    
            foreach($data as $detail){
               
                
                echo"<tr>";
                ?>
            <form action="updateplan.php" method="POST">
                <td><input type="submit" name="but" value="Edit"></td>
                <td><input type="submit" name="but" value="Delete"></td>
            <input type="hidden" name="planid" value="<?php echo $detail[0];?>">
            </form>
                   <?php
                for($i=0;$i<=5;$i++){
                    echo "<td>".$detail[$i]."</td>";                   
                }
                echo"</tr>";
            }
            ?>
            
            
        </table>
    </div>
    </body>
</html>
