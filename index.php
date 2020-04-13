<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $result= array();
        
        if(isset($_GET['Caculate']))
        {
            $a = isset($_GET['a']) ? $_GET['a'] : '';
            $b = isset($_GET['b']) ? $_GET['b'] : '';
            $c = isset($_GET['c']) ? $_GET['c'] : '';

             if($a==null||$b==null||$c==null)
            {
                $result ['Loigiai']='Day khong phai la so';
            }
            else {
                $delta = ($b*$b) - (4*$a*$c);
                if ($delta < 0){
                    $result ['Loigiai']= 'Phuong trinh vo nghiem';
                }
                else if ($delta == 0){
                    $result ['Loigiai'] = 'Phuong trinh cho nghiem kep'; 
                    $result ['x1']=(-$b/2*$a);
                    $result['x2']=(-$b/2*$a);
                }
                else {
                    $result ['Loigia']= 'Phuong trinh co hai nghiem phan biet' ;
                    $result ['x1']=(-$b - sqrt($delta))/(2*$a);
                    $result ['x2']=(-$b + sqrt($delta))/(2*$a);
                }    
            } 
            $json=json_encode($result);            
        }
    ?>
    <?php
        $result2=array();
        if(isset($_GET['Caculate2']))
        {
            $year=isset($_GET['year']) ? $_GET['year'] : '';
            if($year==null)
            {
                $result2['lg']='Vui long nhap so nam';
            }
            else{
                if($year%4==0)
                {
                    $result2['lg']='Day la nam nhuan';
                }
                else{
                    $result2 ['lg']='Day khong phai la nam nhuan';
                }
            }
            $json=json_encode($result2);
        }
    ?>
    
    <form method="get">
        <h1>Giải phương trình bậc 2</h1>
        <br>Nhập a
        <input type="text" name="a">
        <br>Nhập b
        <input type="text" name="b">
        <br>Nhập c
        <input type="text" name="c">
        <br>
        <input type="submit" name="Caculate" value="Đáp án">
        <br>
        <?php echo json_encode($result); ?>
    </form>
    <form method="get">
        <h1>Xác định năm nhuận/không nhuận</h1>
        <br>Nhập năm cần xác định
        <input type="text" name="year">
        <br>
        <input type="submit" name="Caculate2" value="Đáp án">
    </form>   
    <br>
    <?php echo json_encode($result2); ?>
</body>
</html>