<div id="createprescription" class="modal fade">
    <div class="modal-dialog" role="document" style="max-width: 800px">
        <div class="modal-content border-0">
            <div class="modal-header"> أضافة روشتة</div>
            <div class="modal-body">
                <table  class="table key-buttons text-md-nowrap text-center">
                    <thead>
                        <tr>
                        <th>اسم الدواء</th>
                        <th>الكمية</th>
                        <th>توصية</th>
                        <th></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" id="name" class="form-control"></td>
                            <td><input type="number" name="quantity" id="quantity" class="form-control"></td>
                            <td><textarea name="message" id="message" class="form-control" rows="2"></textarea></td>
                            <td><a type="submit" class="btn btn-primary-gradient btn-sm add"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                         </tr>
                    </thead>
                    <tbody class="contents">

                    </tbody>
                </table>
                <div class="form-group text-center">
                    <a class="btn btn-primary addprescription" href="javascript::void(0)">حفظ</a>
                </div>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
