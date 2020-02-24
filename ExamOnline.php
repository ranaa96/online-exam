
<html>
<body>

<?php

session_start();
 
 
$questions=
array(
    array("To Decalre Variable using ","#","$","*","@"),
    array("To Put Condition using ","#","break","switch","loop"),
    array("To Dublicate Code using ","While","if","rand","switch"),
    array("To decalre array using ","[]","array","arr","()"),
    array("To join betwen two condition using ","&&","and","or","$$")
);
$model=array("$","switch","While","array","&&");
 
?>


<form method="post">
<p>Welcome <?php 

echo ( $_SESSION['value']);
?> 
</p>

<input type="submit" <?php if(isset($_SESSION["Count"])){if($_SESSION['Count']<5) ; else echo 'disabled'; } ?> value="Previouse Question" name="btnpreviouse"/>

<input type="submit" <?php if(isset($_SESSION["Count"])){if($_SESSION['Count']<5) ; else echo 'disabled';} ?>  value="Next Question" name="btnnext"/>


<?php 
$qno=0;
 
if(isset($_POST['btnnext']))
{
    
        if(isset($_SESSION["Count"]))
        {
            $qno=$_SESSION["Count"];
            $qno++;
            $_SESSION["Count"]=$qno;
        }
        else
        {
            
            $_SESSION["Count"]=$qno;
        }
        if($qno<5)
        {
            
            $stanswer=$_POST['answer'];
            $_SESSION['answer'.$qno]=$stanswer;

                echo("<h4>".$questions[$qno][0]."</h4>");
                for($x=1;$x<=4;$x++)
                {
                    echo("<input type='radio' name='answer' value='".$questions[$qno][$x]."'");
                    // if($x==1) echo 'checked';
                    echo("/>".$questions[$qno][$x]."</br>");
                }
               
        }else
        {
            $stanswer=$_POST['answer'];
            $_SESSION['answer'.$qno]=$stanswer;

            echo("<h4 style=color:red> This Last Question , Press Finish </h4>");
            echo("<input type='submit' value='Finish' name='btnfinih'/>");
        }
}
if(isset($_POST['btnpreviouse']))
{
    if(isset($_SESSION["Count"]))
    {
        $qno=$_SESSION["Count"];
        $qno--;
        $_SESSION["Count"]=$qno;
    }
    else
    {
        $_SESSION["Count"]=$qno;
    }
    if($qno>0)
        {
                echo("<h4>".$questions[$qno][0]."</h4>");
                for($x=1;$x<=4;$x++){

                  echo("<input type='radio' name='answer' value='".$questions[$qno][$x]."'");
                  if($questions[$qno][$x]==$_SESSION['answer'.$qno]) echo 'checked'; else echo ''; 
                  echo("/>".$questions[$qno][$x]."</br>");
                }
           
                
        }else
        {
            
            echo("<h4 style=color:red> This First Question , Press Finish </h4>");
            
        }

}

if(isset($_POST['btnfinih']))
{
      echo("<table border=1><tr><td>Question</td><td>Student Answer</td>
      <td>Model Answer</td><td>Result</td></tr>");

    for($x=1;$x<=5;$x++)
    {
        $q=$questions[$x-1][0];
        $m=$model[$x-1];
        $s=$_SESSION['answer'.$x];
        $result;
        if($m==$s)
            $result="True";
        else
            $result="False";
        echo("<tr><td>$q</td><td>$s</td><td>$m</td><td>$result</td></tr>");
         
    }
    echo("</table>");
    session_destroy();
}

?> 
</form>
</body>
</html>