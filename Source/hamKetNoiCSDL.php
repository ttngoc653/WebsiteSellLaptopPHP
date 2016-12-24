<?php 
    define("server", "localhost");
    define("db", "ltw1_cuoiky");
    define("user", "root");
    define("pw", "");
        
    function ConnectQuery($sql) {
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $rs =$cn->query($sql);
        return $rs;
    }
    function SearchIDLap($tenmay){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $rs =$cn->query("select * from san_pham where tensp like '$tenmay'");
        while ($row=$rs->fetch_assoc()) {
            //echo $row["masp"];
            //echo "<p>dog</p>";
           return $row["masp"];
        }
    }
?>