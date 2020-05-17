<?php 
include '../../../system/config.php';
if(empty($_SESSION['username'])){
 echo $Core->href('/account/login'); exit;
}else{
$title = "Thêm BOT tương tác";
include '../../layout/header.php'; 
?>
<div class="row">
          <div class="col-md-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-shopping-cart"></i>
                 Thêm BOT tương tác
                </h3>
              </div>
              <div class="card-body">
<div class="form-group">
  <label for="">Cookie :</label>
  <input type="text" class="form-control" id="cookie" placeholder="Nhập cookie cần cài BOT">
</div>
<div class="form-group">
<label for="">Cảm Xúc :</label>   
<center>
          <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="RANDOM" id="camxuc" name="camxuc" checked="">
                                                        <label class="custom-control-label" for="camxuc">RANDOM</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="LIKE" id="camxuc1" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc1">LIKE</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                               <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="LOVE" id="camxuc2" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc2">LOVE</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="CARE" id="camxuc3" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc3">CARE</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                         <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="HAHA" id="camxuc4" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc4">HAHA</label>
                                                    </div>
                                                </fieldset>
                                            </li>   
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="WOW" id="camxuc5" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc5">WOW</label>
                                                    </div>
                                                </fieldset>
                                            </li>  
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="SAD" id="camxuc6" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc6">SAD</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                              <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" value="ANGRY" id="camxuc7" name="camxuc">
                                                        <label class="custom-control-label" for="camxuc7">ANGRY</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        </ul>
                                              </center>
</div>
<div class="form-group">
  <label for="">Nội dung bình luận : (Nếu cần)</label>
  <textarea class="form-control" id="binhluan" rows="5" placeholder="Mỗi nội dung 1 dòng"></textarea>
</div>
<div class="form-group">
  <label for="">Chế độ tương tác :</label>
  <select class="form-control" id="chedo">
    <option value="1">Tương tác bạn bè</option>
    <option value="2">Tương tác bản tin</option>
  </select>
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="buy_bot">Thanh toán</button>
</div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-money-check-alt"></i>
                Thông tin thanh toán
                </h3>
              </div>
              <div class="card-body">

              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <script>
            $('#buy_bot').click(function () {
                var cookie = $('#cookie').val();
                var camxuc = $('input[name=camxuc]:checked').val();
                swal(camxuc,'error');
            });
        </script>
<?php
include '../../layout/footer.php';
}
?>