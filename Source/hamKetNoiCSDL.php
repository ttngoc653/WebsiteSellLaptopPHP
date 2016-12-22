<?php 
    define("server", "localhost");
    define("db", "ltw1_cuoiky");
    define("user", "root");
    define("pw", "");
    
    function ConnectQuery($sql) {
    $cn=new mysqli(server,user,pw,db);
    if($cn->connect_errno){
        die("Error");
    }
    $cn->query("set names 'utf8'");
    $rs=$cn->query($sql);
    return $rs;
}
?>