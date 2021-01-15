<div id="createfollowup" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-header"> أضافة متابعة</div>
            <div class="modal-body">
              <form id="followup">
                  <div class="form-group">
                    <input type="hidden" name="patient_id" value="{{$patient}}">
                    <label for="">يوم المتابعة</label>
                    <input type="date" name="day" class="form-control" placeholder="يوم المتابعة">
                  </div>
                  <div class="form-group">
                      <label for="">ساعة المتابعة</label>
                      <input type="time" name="time" class="form-control" placeholder="ساعة المتابعة">
                  </div>
                  <div class="form-group">
                      <label for="">سعر المتابعة</label>
                      <input type="text" name="price" class="form-control" placeholder="سعر المتابعة">
                  </div>
                  <div class="form-group">
                      <label for="">التشخيص</label>
                      <textarea name="diagnose" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group text-center">
                      <input type="submit" class="btn btn-primary" value="حفظ">
                  </div>
              </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
