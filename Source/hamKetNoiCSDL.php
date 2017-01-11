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
        if ( $rs === FALSE ){
            echo "<p>".$cn->error."</p>";
            //exit;
        }
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
    function SearchQuyen($tenngdung){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $rs =$cn->query("select * from nguoi_dung where tendn like '$tenngdung'");
        while ($row=$rs->fetch_assoc()) {
            //echo $row["masp"];
            //echo "<p>dog</p>";
           return $row["quyen"];
        }
    }
    function SoLuongBan($idsp){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $rs =$cn->query("select sum(soluongsp) sl from chi_tiet_don_hang where masp like '$idsp' group by masp");
        while ($row=$rs->fetch_assoc()) {
            return $row['sl'];
        }   
    }
    function XuatLoaiOCung($idsp){
        $loai="";
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $truyvan =$cn->query("select * from o_dia_cung where masp='$idsp'");
        if($truyvan->num_rows<2){
            while ($row=$truyvan->fetch_assoc()) {
                return $row['loaiocung'];
            }
        }
        else{
            $dem=0;
            while ($row=$truyvan->fetch_assoc()) {
                if($dem==0)
                    $loai= $row['loaiocung'];
                else
                    $loai=$loai." + ".$row['loaiocung'];
                $dem+=1;
            }
        }
        return $loai;
    }
    function XuatDungLuongTheoLoai($idsp){
        $loai="";
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $truyvan =$cn->query("select * from o_dia_cung where masp='$idsp'");
        if($truyvan->num_rows<2){
            while ($row=$truyvan->fetch_assoc()) {
                return $row['dungluong'];
            }
        }
        else{
            $dem=0;
            while ($row=$truyvan->fetch_assoc()) {
                if($dem==0)
                    $loai = $row['dungluong'];
                else
                    $loai=$loai." + ".$row['dungluong'];
                $dem+=1;
            }
        }
        return $loai;
    }    
    function XuatTenCardDoHoa($macard){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $truyvan =$cn->query("select * from cpu where loai='$macard'");
        while ($row=$truyvan->fetch_assoc()) {
            return $row['congnghe'];
        }
    }
    function mahdGanNhatCuaNguoiDung($ten){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $truyvan =$cn->query("select madh from don_hang where taikhoan like '".$ten."' order by ngaylap desc limit 1");
        while ($row=$truyvan->fetch_assoc()) {
            return $row['madh'];
        }
    }
    function laySoLuongHienTai($masp){
        $cn =new mysqli(server,user,pw,db);
        if($cn->connect_errno){
            die("Lỗi kết nối với server.");
        }
        $cn->query("set names 'utf8'");
        $truyvan =$cn->query("select slkho from san_pham where masp like '".$masp."'");
        while ($row=$truyvan->fetch_assoc()) {
            return $row['slkho'];
        }   
    }
    function capnhatLaiSoLuong($id,$sl){
        $conlai=laySoLuongHienTai($id)-$sl;
        ConnectQuery("update san_pham SET slkho='".$conlai."' WHERE masp like '".$id."'");
    }
    function doiTinhTrangDonHang($madh){
        $tinhtranghientai=0;
        $rs=ConnectQuery("select dagiao from don_hang where madh like '".$madh."'");
        while($row=$rs->fetch_assoc()){
            $tinhtranghientai=$row['dagiao'];
        }
        $tinhtranghientai=($tinhtranghientai+1)%2;
        ConnectQuery("update don_hang set dagiao='".$tinhtranghientai."' where madh like '".$madh."'");
    }
    function TenNguoiDung($makh){
        $rs=ConnectQuery("select hoten from nguoi_dung where tendn like '".$makh."'");
        while($row=$rs->fetch_assoc()){
            return $row['hoten'];
        }
    }
    function slSPTrongDonHang($madh){
        $rs=ConnectQuery("select count(soluongsp) sumsl from chi_tiet_don_hang where madh like '".$madh."'");
        while($row=$rs->fetch_assoc()){
            return $row['sumsl'];
        }   
    }
    function SoTrangTK($sql){
        
    }
?>