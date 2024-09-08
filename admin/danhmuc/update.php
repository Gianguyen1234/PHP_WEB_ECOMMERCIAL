<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="form-container row">
     <div class="row frmtitle"> 
         <h1>CẬP NHẬT LẠI TÊN DANH MỤC</h1>
     </div>
     <div class="row form-content">
         <form action="index.php?act=updatedm" method="post">
             <div class="row">
                 MÃ LOẠI <br>
                 <input type="text" name="maloai" disabled>
             </div>
             <div class="row">
                 TÊN LOẠI <br>
                 <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")){echo $name;} ?>">
             </div>
             <div class="row">
                 <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)){echo $id;}?>">
                 <input type="submit" name="capnhat" value="CẬP NHẬT">
                 <input type="reset" value="NHẬP LẠI">
                 <a href="index.php?act=listdm"> <input type="button" value="DANH SÁCH"></a>
             </div>

             <?php
                $thanhcong = "Successfully!";
                if (isset($thongbao) && $thongbao != "") {
                    echo "<div id='notification' class='notification'>
                    $thanhcong<br>
                    $thongbao
                    </div>";
                }
             ?>
            
    
            
         </form>
     </div>
</div>


