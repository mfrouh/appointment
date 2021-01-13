<div id="createspeciality" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-header"> أنشاء تخصص</div>
            <div class="modal-body">
              <form id="createform" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">اسم التخصص</label>
                  <input type="text" name="name"  class="form-control" placeholder="اسم التخصص">
                  <small id="name" class="text-muted"></small>
                 </div>
                 <div class="form-group">
                    <label for="">الصورة</label>
                    <input type="file" name="image" class="form-control">
                    <small id="image" class="text-muted"></small>
                 </div>
                 <div class="form-group">
                    <label for="">الحالة</label>
                    <select name="active" class="form-control">
                        <option value="0">مغلق</option>
                        <option value="1">مفعل</option>
                    </select>
                    <small id="active" class="text-muted"></small>
                 </div>
                 <div class="form-group text-center">
                     <input type="submit" class="btn btn-primary" value="حفظ">
                 </div>
              </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
