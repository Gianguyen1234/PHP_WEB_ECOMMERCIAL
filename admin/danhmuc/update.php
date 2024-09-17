<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="form-container row">
     <div class="row frmtitle"> 
         <h1>UPDATE CATEGORY NAME</h1>
     </div>
     <div class="row form-content">
         <form action="index.php?act=updatedm" method="post">
             <div class="row">
                 CATEGORY ID <br>
                 <input type="text" name="maloai" disabled>
             </div>
             <div class="row">
                 CATEGORY NAME<br>
                 <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")){echo $name;} ?>">
             </div>
             <div class="row">
                 <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)){echo $id;}?>">
                 <input type="submit" name="capnhat" value="UPDATE">
                 <input type="reset" value="RESET">
                 <a href="index.php?act=listdm"> <input type="button" value="LIST OF PRODUCTS"></a>
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


