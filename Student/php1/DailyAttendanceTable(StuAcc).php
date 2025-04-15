<table>
        <tr>
            <th>
                SubName
            </th>
            <th>
                Percentage
            </th>
        </tr>
        <?php
            include('../../db_connect.php');
            $eno=$_SESSION['StuRollno'];
            
            $date=date("Y-m-d");
            $query="select Sub_ID,Status,Type from attendance where StuRollno='$eno' AND ADate='$date'";
            $cmd=mysqli_query($con,$query);

            while($row=mysqli_fetch_array($cmd))
            {
                $subid=$row['Sub_ID'];
                $query="select SubName from subject where Sub_ID='$subid'";
                $cmd1=mysqli_query($con,$query);
                $sname=mysqli_fetch_array($cmd1);
                $sname=$sname['SubName'];
                
                $status=$row['Status'];
                $type=$row['Type'];
            ?>
               <tr>
                   <td>
                       <?php echo $sname."($type)"; ?>
                   </td>
                   <td>
                       <?php if($status==1){echo "Present";}else{echo "Absent";} ?>
                   </td>
               </tr>
            <?php } ?>
            </table>