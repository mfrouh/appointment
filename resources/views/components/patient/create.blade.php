<div id="createpatient" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-header"> أضافة مريض</div>
            <div class="modal-body">
              <form id="createform" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">اسم المريض</label>
                  <input type="text" name="name"  class="form-control" placeholder="اسم المريض">
                  <small id="name" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">العمر</label>
                    <input type="number" name="age" min="1"  class="form-control" placeholder="العمر">
                    <small id="age" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">رقم التلفون</label>
                    <input type="text" name="phone_number"   class="form-control" placeholder="رقم التلفون">
                    <small id="phone_number" class="text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">النوع</label>
                    <select name="gender" class="form-control">
                        <option value="male">ذكر</option>
                        <option value="female">أنثي</option>
                    </select>
                    <small id="gender" class="text-muted"></small>
                </div>
                 <div class="form-group text-center">
                     <input type="submit" class="btn btn-primary" value="حفظ">
                 </div>
              </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
