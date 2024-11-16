<?php 
    if(isset($thanhcong_msg)){
        foreach($thanhcong_msg as $thanhcong_msg){
        echo '<scipt>swal("'.$thanhcong_msg.'","","thanh cong");</sript>';
    }
    }
    if(isset($canhbao_msg)){
        foreach($canhbao_msg as $canhbao_msg){
        echo '<scipt>swal("'.$canhbao_msg.'","","canh bao");</sript>';
    }
    }
    if(isset($info_msg)){
        foreach($info_msg as $info_msg){
        echo '<scipt>swal("'.$info_msg.'","","info");</sript>';
    }
    }
    if(isset($loi_msg)){
        foreach($info_msg as $loi_msg){
        echo '<scipt>swal("'.$loi_msg.'","","loi");</sript>';
    }
    }
?>