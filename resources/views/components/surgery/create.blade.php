<div id="createsurgery" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-header"> أضافة عملية</div>
            <div class="modal-body">
              <form id="surgery">
                  <div class="form-group">
                    <div class="form-group">
                        <label for="">اسم العملية</label>
                        <input type="text" name="name" class="form-control" placeholder="اسم العملية">
                    </div>
                    <input type="hidden" name="patient_id" value="{{$patient}}">
                    <label for="">يوم العملية</label>
                    <input type="date" name="day" class="form-control" placeholder="يوم العملية">
                  </div>
                  <div class="form-group">
                      <label for="">ساعة العملية</label>
                      <input type="time" name="time" class="form-control" placeholder="ساعة العملية">
                  </div>
                  <div class="form-group">
                      <label for="">سعر العملية</label>
                      <input type="text" name="price" class="form-control" placeholder="سعر العملية">
                  </div>
                  <div class="form-group">
                      <label for="">اسم المستشفي</label>
                      <input type="text" name="hospital_name" class="form-control" placeholder="اسم المستشفي">
                  </div>
                  <div class="form-group text-center">
                      <input type="submit" class="btn btn-primary" value="حفظ">
                  </div>
              </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
